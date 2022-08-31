<?php

namespace App\Controllers;

use App\Models\M_biodata;
use App\Models\M_keranjang;
use App\Models\M_keranjang_produk;
use App\Models\M_kota;
use App\Models\M_produk;
use App\Models\M_tb_provinsi;
use App\Models\M_user;
use CodeIgniter\Email\Email;

class Front extends BaseController
{

  protected $Model_produk;
  protected $Model_biodata;
  protected $Model_keranjang;
  protected $Model_keranjang_produk;
  protected $Model_provinsi;
  protected $Model_kota;
  protected $Model_user;
  protected $validation;
  protected $db;
  private $url = "https://api.rajaongkir.com/starter/";
  private $apiKey = "dc6aa80e6a3c345e1ce1b4407eaa18f5";

  public function __construct()
  {
    $this->Model_produk = new M_produk();
    $this->Model_user = new M_user();
    $this->Model_biodata = new M_biodata();
    $this->Model_provinsi = new M_tb_provinsi();
    $this->Model_kota = new M_kota();
    $this->Model_keranjang = new M_keranjang();
    $this->Model_keranjang_produk = new M_keranjang_produk();
    $this->validation =  \Config\Services::validation();
    $this->db = \Config\database::connect();
    $this->email = \Config\Services::email();
  }
  public function index()
  {
    $data =
      // ['user' => $this->Model_user->where('statuss', 'Aktif')->where('role', 'admin')->orderBy('id_user', 'DESC')->findAll()];
      ['produk' => $this->Model_produk->join('kategori', 'id_kategori=kategori_id')->join('users', 'produk_user_id=id_user')->where('status_produk', 'Aktif')->limit(8)->orderBy('id_produk', 'DESC')->findAll()];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/index', $data)
    ];

    return view('layout/front/main', $template);
  }

  public function product()
  {

    $data =
      // [
      //   'user' => $this->Model_user->where('statuss', 'Aktif')->where('role', 'admin')->orderBy('id_user', 'DESC')->paginate(12, 'product'),
      //   'pager' => $this->Model_user->pager
      // ];
      [
        'produk' => $this->Model_produk->join('kategori', 'id_kategori=kategori_id')->join('users', 'produk_user_id=id_user')->where('status_produk', 'Aktif')->orderBy('id_produk', 'DESC')->paginate(12, 'product'),
        'pager' => $this->Model_produk->pager
      ];
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
      'produk' => $this->Model_produk->join('kategori', 'id_kategori=kategori_id')->join('users', 'produk_user_id=id_user')->where('status_produk', 'Aktif')->where('produk_user_id', $user->id_user)->orderBy('id_produk', 'DESC')->paginate(12, 'product'),
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


  private function rajaongkir($method, $id_province = null)
  {

    $endPoint = $this->url . $method;

    if ($id_province != null) {
      $endPoint = $endPoint . "?province=" . $id_province;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $endPoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: " . $this->apiKey
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    return $response;
  }

  private function rajaongkircost($origin, $destination, $weight, $courier)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: " . $this->apiKey,
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    return $response;
  }


  public function rajaongkirs()
  {
    $prov = json_decode($this->rajaongkir('province'), true);
    // foreach ($prov as $row) {
    //   echo '<br>' . $row['rajaongkir']['results'][0]['province_id'];
    // }
    foreach ($prov['rajaongkir']['results'] as $row) {
      $cari =  $this->Model_provinsi->where('id', $row['province_id'])->first();

      if ($cari) {
      } else {
        $this->Model_provinsi->insert(['id' => $row['province_id'], 'nama' => $row['province']]);
      }
    }
    $kota = json_decode($this->rajaongkir('city'), true);
    foreach ($kota['rajaongkir']['results'] as $row2) {
      $cari2 =  $this->Model_kota->where('id', $row2['city_id'])->first();

      if ($cari2) {
      } else {
        $this->Model_kota->insert(['id' => $row2['city_id'], 'nama' => $row2['city_name'], 'id_provinsi' => $row2['province_id']]);
      }
    }
    // $carikota = $this->Model_kota->where('id',)
    // echo $this->rajaongkir('province');
    // print_r($kota);
  }

  public function kurirdata()
  {
    $tujuan = $this->request->getGet('kota');
    $asal = $this->request->getGet('asal');
    $kurir = $this->request->getGet('kurir');
    $berat = $this->request->getGet('berat');
    // echo $tujuan;
    $cost = json_decode($this->rajaongkircost($asal, $tujuan, $berat, $kurir), TRUE);
    if (!empty($cost['rajaongkir']['results'])) {
      $data['data'] = $cost['rajaongkir']['results'][0]['costs'];
      return  view('front/kurir', $data);
    } else {
      echo '12';
    }
  }
  public function profil()
  {
    $cariuserbio = $this->Model_user->join('biodata', 'user_id=id_user')->where('id_user', session('id2'))->first();

    if ($cariuserbio->provinsi_id == NULL || $cariuserbio->kota_id == NULL || $cariuserbio->kota_id == '' || $cariuserbio->provinsi_id == '' || $cariuserbio->kota_id == 0 || $cariuserbio->provinsi_id == 0) {
      $cariuserbio2 = $this->Model_user->join('biodata', 'user_id=id_user')->where('id_user', session('id2'))->first();
    } else {
      $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', session('id2'))->first();
    }

    if ($this->request->getMethod() === 'post') {
      $nama = $this->request->getPost('nama');
      $email = $this->request->getPost('email');
      $nohp = $this->request->getPost('nohp');
      $provinsi = $this->request->getPost('provinsi');
      $kota = $this->request->getPost('kota');
      $alamat = $this->request->getPost('alamat');
      $password_baru = $this->request->getPost('password_baru');

      if ($password_baru) {
        $datauser = [
          'nama' => $nama,
          'username' => $email,
          'email' => $email,
          'password' => password_hash($password_baru, PASSWORD_DEFAULT),
        ];
        $biodata = [
          'alamat' => $alamat,
          'no_hp' => $nohp,
          'provinsi_id' => $provinsi,
          'kota_id' => $kota,
        ];
      } else {
        $datauser = [
          'nama' => $nama,
          'username' => $email,
          'email' => $email,
        ];
        $biodata = [
          'alamat' => $alamat,
          'no_hp' => $nohp,
          'provinsi_id' => $provinsi,
          'kota_id' => $kota,
        ];
      }
      $caribiodatas = $this->Model_biodata->where('user_id', session('id2'))->first();
      $this->Model_biodata->update($caribiodatas->id_biodata, $biodata);

      if ($this->Model_user->skipValidation(true)->update(session('id2'), $datauser)) {
        echo ("<script>
      window.alert('Berhasil merubah data');
      window.history.back();
      </script>");
      } else {
        echo ("<script>
        window.alert('Gagal merubah data');
        window.history.back();
        </script>");
      }
    }

    $data = ['biodata' => $cariuserbio2];
    $template = [

      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/profile', $data)
    ];

    return view('layout/front/main', $template);
  }

  private function sendEmail($attachment, $to, $title, $message)
  {

    $this->email->setFrom('17sayahim@gmail.com', 'Piaman Market');
    $this->email->setTo($to);

    // $this->email->attach($attachment);

    $this->email->setSubject($title);
    $this->email->setMessage($message);

    if (!$this->email->send()) {
      return false;
    } else {
      return true;
    }
  }

  public function forget()
  {
    if ($this->request->getMethod() === 'post') {
      $email = $this->request->getPost('email');
      $model = $this->Model_user;

      $data = $model->where('username', $email)->where('statuss', 'Aktif')->where('role', 'Customer')->first();
      if ($data) {
        $str = rand(0, 255);
        $tokens = sha1($str);
        $model->skipValidation(true)->update($data->id_user, ['token_reset' => $tokens]);
        //html message untuk body email
        $message = "Email :" . $data->email . "<br>Token = " . $tokens . "<br><strong>Harap masukan token saat reset password !!!</strong><br><a href='" . BASE . "/front/reset/" . $data->id_user . "' target='_blank'>RESET DISINI</a>";
        //memanggil private function sendEmail
        if ($this->sendEmail('', $data->email, 'Reset Password', $message)) {
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Silahkan Cek inbox email anda');
          window.history.back();
          </script>");
        } else {
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Tidak dapat mengirim email terjadi kesalahan');
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
  }


  public function reset($id)
  {
    if ($this->request->getMethod() === 'post') {
      $passwordbaru = $this->request->getPost('newpassword');
      $token = $this->request->getPost('token');
      $model = $this->Model_user;

      $data = $model->where('id_user', $id)->first();
      if ($data) {
        $token_db = $data->token_reset;

        if ($token == $token_db) {
          $model->skipValidation(true)->update($id, ['password' => password_hash($passwordbaru, PASSWORD_DEFAULT), 'token_reset' => '']);
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Berhasil mereset password');
          window.location.href = '" . BASE . "/front/login';
          </script>");
        } else {
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Token yang anda masukan salah atau sudah kadaluwarsa');
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
    $data = ['id' => $id];
    $template = [
      // 'menu' => view('layout/front/menu'),
      'isi' => view('front/reset', $data)
    ];

    return view('layout/front/main_login', $template);
  }
}
