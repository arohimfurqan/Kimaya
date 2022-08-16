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
      $data = $model->where('username', $username)->first();
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

          echo '<script>alert("Username atau Password Anda Salah");</script>';
          return redirect()->to(base_url('login'));
        }
      } else {
        echo '<script>alert("Username Tidak Terdaftar!");</script>';
        return redirect()->to(base_url('login'));
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
      ];
      if ($this->Model->save($user)) {
        $biodata = [
          'user_id' => $this->Model->getInsertID(),
          'alamat' => $alamat,
          'nohp' => $nohp,
          'provinsi' => $provinsi,
          'kota' => $kota,
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
}
