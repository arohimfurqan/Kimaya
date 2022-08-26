<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_biodata;
use App\Models\M_user;

class Login extends BaseController
{
  protected $Model;
  protected $validation;
  protected $db;

  public function __construct()
  {
    $this->Model = new M_user();
    $this->Model_biodata = new M_biodata();
    $this->validation =  \Config\Services::validation();
    $this->db = \Config\database::connect();
  }

  public function index()
  {
    if ($this->request->getMethod() === 'post') {
      $session = session();
      $model = $this->Model;
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
      $data = $model->where('username', $username)->where('statuss', 'Aktif')->first();
      if ($data) {
        $pass = $data->password;
        $verify_pass = password_verify($password, $pass);
        if ($verify_pass) {
          $ses_data = [
            'id'       => $data->id_user,
            'nama'     => $data->nama,
            'username'    => $data->username,
            'role'    => $data->role,
            'logged_in'     => TRUE
          ];
          $session->set($ses_data);
          return redirect()->to(base_url('home'));
        } else {
          echo ("<script>
          window.alert('Username atau Password Anda Salah');
          window.location.href = '" . BASE  . "/login';
          </script>");
        }
      } else {
        echo ("<script>
        window.alert('Username Tidak Terdaftar atau belum dikonfirmasi admin!');
        window.location.href = '" . BASE  . "/login';
        </script>");
        // echo '<script>alert("Username Tidak Terdaftar atau belum dikonfirmasi admin!");</script>';
        // return redirect()->to(base_url('login'));
        // $session->setFlashdata('msg', 'Username Tidak Terdaftar!');
        // return redirect()->to(base_url('C_login'));
      }
    }
    $template = [
      // 'menu' => view('layout/menu'),
      'isi' => view('login/form')
    ];

    return view('layout/main_login', $template);
  }

  public function register()
  {
    if ($this->request->getMethod() === 'post') {
      // $session = session();
      $iktp = $this->request->getFile('ktp');
      $ktp = time() . $iktp->getClientName();

      $isiup = $this->request->getFile('siup');
      $siup = time() . $isiup->getClientName();

      $isitu = $this->request->getFile('situ');
      $situ = time() . $isitu->getClientName();

      $nama = $this->request->getPost('nama');
      $email = $this->request->getPost('email');
      $alamat = $this->request->getPost('alamat');
      $nohp = $this->request->getPost('nohp');
      $provinsi = $this->request->getPost('provinsi');
      $kota = $this->request->getPost('kota');
      $password = $this->request->getPost('password');

      $user = [
        'username' => $email,
        'nama' => $nama,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'email' => $email,
        'role' => 'admin',
        'ktp' => $ktp,
        'siup' => $siup,
        'situ' => $situ,
        'statuss' => 'Tidak Aktif',
      ];
      if ($this->Model->save($user)) {
        $iktp->move('uploads', $ktp);
        $isiup->move('uploads', $siup);
        $isitu->move('uploads', $situ);

        $biodata = [
          'user_id' => $this->Model->getInsertID(),
          'alamat' => $alamat,
          'no_hp' => $nohp,
          'provinsi_id' => $provinsi,
          'kota_id' => $kota,
        ];
        $this->Model_biodata->save($biodata);
        echo ("<script>
        window.alert('Berhasil Registrasi silahkan login');
        window.location.href = '" . BASE  . "/login';
        </script>");
      } else {
        $validasi = [
          'errors' => $this->Model_user->errors()
        ];
        $template = [
          // 'menu' => view('layout/front/menu'),
          'isi' => view('front/login', $validasi)
        ];

        return view('layout/front/main_login', $template);
      }
      // $session->set($ses_data);
      // return redirect()->to(base_url('home'));
    } else {
      $template = [
        // 'menu' => view('layout/menu'),
        'isi' => view('login/register')
      ];

      return view('layout/main_login', $template);
    }
  }

  public function data_user()
  {

    $data = [
      'user' =>  $this->Model->where('statuss', 'Tidak Aktif')->findAll()
    ];

    $template = [
      'isi' => view('produk/data_user', $data)
    ];
    return view('layout/main', $template);
  }

  public function konfirmasi($id)
  {
    $data = ['statuss' => 'Aktif'];
    $this->Model->update($id, $data);
    echo ("<script>
    window.alert('Berhasil konfirmasi user');
    window.location.href = '" . BASE  . "/login/data_user';
    </script>");
  }


  public function data_pembeli()
  {

    $data = [
      'user' =>  $this->Model->select('users.*,biodata.*,tb_provinsi.*,tb_kota_kabupaten.*, tb_provinsi.nama as nama_provinsi, tb_kota_kabupaten.nama as nama_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('role', 'Customer')->findAll()
    ];

    $template = [
      'isi' => view('produk/data_pembeli', $data)
    ];
    return view('layout/main', $template);
  }


  public function data_penjual()
  {

    $data = [
      'user' =>  $this->Model->select('users.*,biodata.*,tb_provinsi.*,tb_kota_kabupaten.*, tb_provinsi.nama as nama_provinsi, tb_kota_kabupaten.nama as nama_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('role', 'admin')->findAll()
    ];

    $template = [
      'isi' => view('produk/data_penjual', $data)
    ];
    return view('layout/main', $template);
  }
}
