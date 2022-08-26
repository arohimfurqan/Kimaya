<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_biodata;
use App\Models\M_keranjang;
use App\Models\M_keranjang_produk;
use App\Models\M_produk;
use App\Models\M_user;

class Order extends BaseController
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
    $cariorder = $this->Model_keranjang->select('keranjang.*,keranjang_produk.*,produk.*, SUM(jumlah * harga_keranjang) AS total')->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('status', 'Lunas')->where('penjual_id', session('id'))->groupBy('id_keranjang')->findAll();
    // print_r($cariorder);
    // die;
    $data = ['data' => $cariorder];
    $template = [

      // 'menu' => view('layout/front/menu'),
      'isi' => view('order/index', $data)
    ];

    return view('layout/main', $template);
  }

  public function detail($id)
  {


    $cart = $this->Model_keranjang->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('id_keranjang', $id)->findall();

    $cart2 = $this->Model_keranjang->where('id_keranjang', $id)->first();

    $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', $cart2->user_id)->first();

    $data = ['biodata' => $cariuserbio2, 'cart' => $cart, 'cart2' => $cart2];
    $template = [

      // 'menu' => view('layout/front/menu'),
      'isi' => view('order/detail', $data)
    ];

    return view('layout/main', $template);
  }

  public function kirim($id)
  {


    $this->Model_keranjang->update($id, ['status' => 'Pengiriman', 'tanggal_pengiriman' => date('Y-m-d h:i:s')]);

    $cariproduk = $this->Model_keranjang_produk->where('keranjang_id', $id)->findAll();
    if ($cariproduk) {
      foreach ($cariproduk as $crp) {
        $cariprodud = $this->Model_produk->where('id_produk', $crp->produk_id)->first();
        if ($cariprodud) {
          $qtybaru = $cariprodud->qty - $crp->jumlah;
          $this->Model_produk->update($crp->produk_id, ['qty' => $qtybaru]);
        }
      }
    }

    return  redirect()->back();
  }
}
