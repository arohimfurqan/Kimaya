<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_user;

class Login extends BaseController
{
  protected $Model;
  protected $validation;
  protected $db;

  public function __construct()
  {
    $this->Model = new M_user();
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
}
