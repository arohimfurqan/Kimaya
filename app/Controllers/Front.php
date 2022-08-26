<?php

namespace App\Controllers;

use App\Models\M_biodata;
use App\Models\M_keranjang;
use App\Models\M_keranjang_produk;
use App\Models\M_produk;
use App\Models\M_user;

class Front extends BaseController
{

  protected $Model_produk;
  protected $Model_biodata;
  protected $Model_keranjang;
  protected $Model_keranjang_produk;
  protected $Model_user;
  protected $validation;
  protected $db;

  public function __construct()
  {
    $this->Model_produk = new M_produk();
    $this->Model_user = new M_user();
    $this->Model_biodata = new M_biodata();
    $this->Model_keranjang = new M_keranjang();
    $this->Model_keranjang_produk = new M_keranjang_produk();
    $this->validation =  \Config\Services::validation();
    $this->db = \Config\database::connect();
  }
  public function index()
  {
    $data =
      ['user' => $this->Model_user->where('statuss', 'Aktif')->where('role', 'admin')->orderBy('id_user', 'DESC')->findAll()];
    // ['produk' => $this->Model_produk->where('status_produk', 'Aktif')->limit(8)->orderBy('id_produk', 'DESC')->findAll()];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/index', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function product()
  {

    $data =
      [
        'user' => $this->Model_user->where('statuss', 'Aktif')->where('role', 'admin')->orderBy('id_user', 'DESC')->paginate(12, 'product'),
        'pager' => $this->Model_user->pager
      ];
    // [
    //   'produk' => $this->Model_produk->where('status_produk', 'Aktif')->orderBy('id_produk', 'DESC')->paginate(12, 'product'),
    //   'pager' => $this->Model_produk->pager
    // ];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/produk', $data)
    ];

    return view('layout/front/main', $template);
  }


  public function cari_produk()
  {
    if ($this->request->getMethod() === 'post') {
      $namaproduk = $this->request->getPost('produk');


      $data =
        [
          'produk' => $this->Model_produk->like('nama_produk', $namaproduk)->where('status_produk', 'Aktif')->orderBy('id_produk', 'DESC')->paginate(12, 'product'),
          'pager' => $this->Model_produk->pager,
          'pencarian' => $namaproduk
        ];
      $template = [
        // 'menu' => view('layout/front/menu'),
        'isi' => view('front/produk_cari', $data)
      ];

      return view('layout/front/main', $template);
    }
  }


  public function cari_toko()
  {
    if ($this->request->getMethod() === 'post') {
      $namatoko = $this->request->getPost('toko');


      $data =
        [
          'user' => $this->Model_user->like('nama', $namatoko)->where('statuss', 'Aktif')->where('role', 'admin')->orderBy('id_user', 'DESC')->paginate(12, 'product'),
          'pager' => $this->Model_user->pager,
          'pencarian' => $namatoko,



        ];
      $template = [
        // 'menu' => view('layout/front/menu'),
        'isi' => view('front/toko_cari', $data)
      ];

      return view('layout/front/main', $template);
    }
  }
  public function view_product($id)
  {

    $produk =   $this->Model_produk->select('brand.*,kategori.*,produk.*,biodata.*,tb_kota_kabupaten.nama as nama_kota,users.nama as nama_user')->join('brand', 'id_brand=brand_id')->join('kategori', 'id_kategori=kategori_id')->join('users', 'produk_user_id=users.id_user')->join('biodata', 'biodata.user_id=users.id_user')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_produk', $id)->first();

    $data = ['produk' => $produk];

    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/view_product', $data)
    ];

    return view('layout/front/main', $template);
  }


  public function view_toko($id)
  {

    $user =   $this->Model_user->select('users.*,biodata.*,tb_kota_kabupaten.nama as nama_kota,users.nama as nama_user,tb_provinsi.nama as nama_provinsi')->join('biodata', 'biodata.user_id=users.id_user')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->join('tb_provinsi', 'tb_provinsi.id=provinsi_id')->where('id_user', $id)->first();

    $data = [
      'user' => $user,
      'produk' => $this->Model_produk->where('status_produk', 'Aktif')->where('produk_user_id', $user->id_user)->orderBy('id_produk', 'DESC')->paginate(12, 'product'),
      'pager' => $this->Model_produk->pager
    ];

    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/view_toko', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function login()
  {
    if ($this->request->getMethod() === 'post') {
      $session = session();
      $model = $this->Model_user;
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
      $data = $model->where('username', $username)->where('statuss', 'Aktif')->first();
      if ($data) {
        $pass = $data->password;
        $verify_pass = password_verify($password, $pass);
        if ($verify_pass) {
          $ses_data = [
            'id2'       => $data->id_user,
            'nama2'     => $data->nama,
            'username2'    => $data->username,
            'role2'    => $data->role,
            'logged_in2'     => TRUE
          ];
          $session->set($ses_data);
          return redirect()->back()->withInput();
        } else {
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Username atau Password Salah !');
          window.history.back();
          </script>");
        }
      } else {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Username Tidak Terdaftar atau belum dikonfirmasi admin !');
                window.history.back();
                </script>");
        // return redirect()->to(base_url('/front/login'));
      }
    }
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/login')
    ];

    return view('layout/front/main_login', $template);
  }

  public function signup()
  {

    if ($this->request->getMethod() === 'post') {
      if ($this->request->getPost('password') == $this->request->getPost('cpassword')) {
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $data = [
          'nama' => $this->request->getPost('fullname'),
          'username' => $this->request->getPost('email'),
          'email' => $this->request->getPost('email'),
          'role' => 'Customer',
          'password' => $password,
          'statuss' => 'Tidak Aktif'
        ];

        if ($this->Model_user->save($data)) {
          $biodata = ['user_id' => $this->Model_user->getInsertID()];
          $this->Model_biodata->save($biodata);
          echo ("<script>
          window.alert('Berhasil Registrasi harap tunggu dikonfirmasi admin');
          window.location.href = '" . BASE  . "/front/login';
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
      } else {
        echo ("<script>
        window.alert('Konfirmasi Password berbeda');
        </script>");
        $template = [
          // 'menu' => view('layout/front/menu'),
          'isi' => view('front/login')
        ];

        return view('layout/front/main_login', $template);
      }
    }
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/login')
    ];

    return view('layout/front/main_login', $template);
  }


  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->back()->withInput();
  }


  public function add_chart($id)
  {
    $jumlah = $this->request->getPost('qty');
    $iduser = session('id2');

    $cariproduk = $this->Model_produk->where(['id_produk' => $id])->first();

    $carikeranjanglama = $this->Model_keranjang->where(['user_id' => $iduser, 'status' => 'Keranjang', 'penjual_id' => $cariproduk->produk_user_id])->first();



    if ($carikeranjanglama) {
      // echo $carikeranjanglama->id_keranjang;
      // echo $cariproduk->produk_user_id;
      // die;

      if ($carikeranjanglama->penjual_id == $cariproduk->produk_user_id) {
        $cariproduk = $this->Model_produk->where('id_produk', $id)->first();
        $keranjang_produk = [
          'keranjang_id' => $carikeranjanglama->id_keranjang,
          'produk_id' => $id,
          'jumlah' => $jumlah,
          'harga_keranjang' => $cariproduk->harga,
        ];
        $carikeprolama = $this->Model_keranjang_produk->where(['keranjang_id' => $carikeranjanglama->id_keranjang, 'produk_id' => $id])->first();
        if ($carikeprolama) {
          $this->Model_keranjang_produk->update($carikeprolama->produk_keranjang_id, ['jumlah' => $jumlah + $carikeprolama->jumlah]);
        } else {
          $this->Model_keranjang_produk->save($keranjang_produk);
        }

        echo ("<script>
        window.alert('Berhasil menambahkan ke keranjang');
        window.history.back();
        </script>");
      } else {
        $keranjang = [
          'user_id' => $iduser,
          'status' => 'Keranjang',
          'penjual_id' => $cariproduk->produk_user_id
        ];

        if ($this->Model_keranjang->save($keranjang)) {
          $cariproduk = $this->Model_produk->where('id_produk', $id)->first();
          $keranjang_produk = [
            'keranjang_id' => $this->Model_keranjang->getInsertID(),
            'produk_id' => $id,
            'jumlah' => $jumlah,
            'harga_keranjang' => $cariproduk->harga,
          ];
          $this->Model_keranjang_produk->save($keranjang_produk);
          echo ("<script>
          window.alert('Berhasil menambahkan ke keranjang');
          window.history.back();
          </script>");
        } else {
          print_r($this->Model_keranjang->errors());
          die;
        }
      }
    } else {
      $keranjang = [
        'user_id' => $iduser,
        'status' => 'Keranjang',
        'penjual_id' => $cariproduk->produk_user_id
      ];

      if ($this->Model_keranjang->save($keranjang)) {
        $cariproduk = $this->Model_produk->where('id_produk', $id)->first();
        $keranjang_produk = [
          'keranjang_id' => $this->Model_keranjang->getInsertID(),
          'produk_id' => $id,
          'jumlah' => $jumlah,
          'harga_keranjang' => $cariproduk->harga,
        ];
        $this->Model_keranjang_produk->save($keranjang_produk);
        echo ("<script>
        window.alert('Berhasil menambahkan ke keranjang');
        window.history.back();
        </script>");
      } else {
        print_r($this->Model_keranjang->errors());
        die;
      }
    }
  }

  public function cart()
  {
    // $cart = $this->Model_keranjang->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->join('users', 'produk_user_id=id_user')->where('user_id', session('id2'))->where('status', 'Keranjang')->findall();

    $cart = $this->Model_keranjang->join('users', 'penjual_id=id_user')->where('user_id', session('id2'))->where('status', 'Keranjang')->findall();

    // print_r($cart);
    // die;
    $data = ['cart' => $cart];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/cart', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function updatecartproduk()
  {
    $id = $this->request->getPost('cart_id');
    $jumlah = $this->request->getPost('new_quantity');

    $data = ['jumlah' => $jumlah];

    return $this->Model_keranjang_produk->update($id, $data);
  }

  public function hapusprodukkeranjang($id)
  {
    $krpro = $this->Model_keranjang_produk->where('produk_keranjang_id', $id)->first();
    $idkerj = $krpro->keranjang_id;
    if ($this->Model_keranjang_produk->delete($id)) {
      // echo $idkerj;die;
      $cari = $this->Model_keranjang_produk->where('keranjang_id', $idkerj)->first();
      if ($cari) {
      } else {
        $this->Model_keranjang->delete($idkerj);
      }
    }

    return  redirect()->to('/front/cart');
  }

  public function checkout($keranjang)
  {

    $cariuserbio = $this->Model_user->join('biodata', 'user_id=id_user')->where('id_user', session('id2'))->first();

    if ($cariuserbio->provinsi_id == NULL || $cariuserbio->kota_id == NULL || $cariuserbio->kota_id == '' || $cariuserbio->provinsi_id == '' || $cariuserbio->kota_id == 0 || $cariuserbio->provinsi_id == 0) {
      $cariuserbio2 = $this->Model_user->join('biodata', 'user_id=id_user')->where('id_user', session('id2'))->first();
    } else {
      $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', session('id2'))->first();
    }


    if ($this->request->getMethod() === 'post') {

      $this->Model_biodata->update($this->request->getPost('id_biodata'), ['alamat' => $this->request->getPost('alamat'), 'no_hp' => $this->request->getPost('nohp'), 'provinsi_id' => $this->request->getPost('provinsi'), 'kota_id' => $this->request->getPost('kota')]);

      return redirect()->to('front/purchase/' . $keranjang);
    }
    // print_r($cariuserbio2);
    // die;
    $data = ['biodata' => $cariuserbio2, 'keranjang' => $keranjang];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/checkout', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function getdataprov()
  {
    $searchTerm = $this->request->getPost('searchTerm');
    $fetched_records = $this->db->table('tb_provinsi')->select('id, nama')->where("nama like '%" . $searchTerm . "%' ")->orderBy('nama', 'asc');
    // $fetched_records = $this->db->get('provinsi');
    $dataprov = $fetched_records->get();

    $data = array();
    foreach ($dataprov->getResult()  as $prov) {
      $data[] = array("id" => $prov->id, "text" => $prov->nama);
    }
    // return $data;
    echo json_encode($data);
  }

  public function getdatakot($id)
  {
    $searchTerm = $this->request->getPost('searchTerm');
    $fetched_records = $this->db->table('tb_kota_kabupaten')->select('id, nama')->where("nama like '%" . $searchTerm . "%' ")->where('id_provinsi', $id)->orderBy('nama', 'asc');
    // $fetched_records = $this->db->get('provinsi');
    $dataprov = $fetched_records->get();

    $data = array();
    foreach ($dataprov->getResult()  as $prov) {
      $data[] = array("id" => $prov->id, "text" => $prov->nama);
    }
    // return $data;
    echo json_encode($data);
  }

  public function purchase($keranjang)
  {


    $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', session('id2'))->first();

    $cart = $this->Model_keranjang->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('user_id', session('id2'))->where('status', 'Keranjang')->where('id_keranjang', $keranjang)->findall();

    $cart2 = $this->Model_keranjang->where('user_id', session('id2'))->where('status', 'Keranjang')->where('id_keranjang', $keranjang)->first();



    if ($this->request->getMethod() === 'post') {

      $this->Model_keranjang->update($this->request->getPost('id_keranjang'), ['status' => 'Menunggu Pembayaran', 'tanggal_pesan' => date('Y-m-d h:i:s')]);

      return redirect()->to('front/belum_bayar');
    }
    // print_r($cariuserbio2);
    // die;
    $data = ['biodata' => $cariuserbio2, 'cart' => $cart, 'cart2' => $cart2, 'keranjang' => $keranjang];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/checkout_2', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function belum_bayar()
  {
    $caribelumbayar = $this->Model_keranjang->select('keranjang.*,keranjang_produk.*,produk.*, SUM(jumlah * harga_keranjang) AS total')->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('user_id', session('id2'))->where('status', 'Menunggu Pembayaran')->groupBy('id_keranjang')->findAll();
    // print_r($caribelumbayar);
    // die;
    $data = ['data' => $caribelumbayar];
    $template = [

      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/belum_bayar', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function bayar($id)
  {


    $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', session('id2'))->first();

    $cart = $this->Model_keranjang->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('id_keranjang', $id)->findall();

    $cart2 = $this->Model_keranjang->where('id_keranjang', $id)->first();



    if ($this->request->getMethod() === 'post') {

      $fotoutama = $this->request->getFile('bukti');
      $foto1 = time() . $fotoutama->getClientName();

      $this->Model_keranjang->update($this->request->getPost('id_keranjang'), ['status' => 'Lunas', 'tanggal_pembayaran' => date('Y-m-d h:i:s'), 'bukti_pembayaran' => $foto1]);

      $fotoutama->move('uploads', $foto1);

      return redirect()->to('front/kemas');
    }
    // print_r($cariuserbio2);
    // die;
    $data = ['biodata' => $cariuserbio2, 'cart' => $cart, 'cart2' => $cart2];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/pembayaran', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function kemas()
  {
    $carilunas = $this->Model_keranjang->select('keranjang.*,keranjang_produk.*,produk.*, SUM(jumlah * harga_keranjang) AS total')->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('user_id', session('id2'))->where('status', 'Lunas')->groupBy('id_keranjang')->findAll();
    // print_r($carilunas);
    // die;
    $data = ['data' => $carilunas];
    $template = [

      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/kemas', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function dikirim()
  {
    $caripengiriman = $this->Model_keranjang->select('keranjang.*,keranjang_produk.*,produk.*, SUM(jumlah * harga_keranjang) AS total')->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('user_id', session('id2'))->where('status', 'Pengiriman')->groupBy('id_keranjang')->findAll();
    // print_r($caripengiriman);
    // die;
    $data = ['data' => $caripengiriman];
    $template = [

      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/kirim', $data)
    ];

    return view('layout/front/main', $template);
  }
}
