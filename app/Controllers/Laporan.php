<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_biodata;
use App\Models\M_keranjang;
use App\Models\M_keranjang_produk;
use App\Models\M_produk;
use App\Models\M_user;

class Laporan extends BaseController
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

  public function produk()
  {


    $data = [
      'produk' =>  $this->Model_produk->join('brand', 'id_brand=brand_id')->join('kategori', 'id_kategori=kategori_id')->findAll()
    ];

    // $template = [
    //   'isi' => view('laporan/L_produk', $data)
    // ];
    return view('laporan/L_produk', $data);
  }

  public function order()
  {


    $data = [
      'produk' =>  $this->Model_produk->join('brand', 'id_brand=brand_id')->join('kategori', 'id_kategori=kategori_id')->findAll()
    ];



    if ($this->request->getMethod() === 'post') {
      $tahun =  $this->request->getPost('tahun');

      $cart = $this->Model_keranjang->like('tanggal_pesan', $tahun)->where('status', 'Lunas')->findall();

      // print_r($cart);
      // die;

      // $cart2 = $this->Model_keranjang->where('id_keranjang', $id)->first();

      // $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', $cart2->user_id)->first();

      $dt = ['cart' => $cart, 'tahun' => $tahun];

      return view('laporan/L_order', $dt);
    }

    $template = [
      'isi' => view('laporan/F_order', $data)
    ];
    return view('layout/main', $template);
  }

  public function terkirim()
  {


    $data = [
      'produk' =>  $this->Model_produk->join('brand', 'id_brand=brand_id')->join('kategori', 'id_kategori=kategori_id')->findAll()
    ];



    if ($this->request->getMethod() === 'post') {
      $tahun =  $this->request->getPost('tahun');

      $cart = $this->Model_keranjang->like('tanggal_pesan', $tahun)->where('status', 'Pengiriman')->findall();

      // print_r($cart);
      // die;

      // $cart2 = $this->Model_keranjang->where('id_keranjang', $id)->first();

      // $cariuserbio2 = $this->Model_user->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', $cart2->user_id)->first();

      $dt = ['cart' => $cart, 'tahun' => $tahun];

      return view('laporan/L_terkirim', $dt);
    }

    $template = [
      'isi' => view('laporan/F_terkirim', $data)
    ];
    return view('layout/main', $template);
  }
  public function add()
  {
    $validasi = [];
    if ($this->request->getMethod() === 'post') {
      $fotoutama = $this->request->getFile('foto_produk');
      $foto1 = time() . $fotoutama->getClientName();
      // die;
      $data = [
        'nama_produk' => $this->request->getPost('nama_produk'),
        'qty' => $this->request->getPost('qty'),
        'harga' => $this->request->getPost('harga'),
        'brand_id' => $this->request->getPost('brand'),
        'kategori_id' => $this->request->getPost('kategori'),
        'status_produk' => $this->request->getPost('status'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'foto_produk' => $foto1
      ];
      // if ($this->request->getFileMultiple('foto_lainnya')) {
      //     print_r($this->request->getFileMultiple('foto_lainnya'));
      //     die;
      // } else {
      //     echo 'oi';
      //     die;
      // }

      // }


      // if ($_FILES['foto_lainnya']['name'][0]) {
      //     echo '1';
      // } else {
      //     echo '0';
      // }
      // // print_r($_FILES['foto_lainnya']);
      // die;

      if ($this->Model->save($data)) {
        // echo $this->Model->getInsertID();
        // die;
        $fotoutama->move('uploads', $foto1);
        $db      = \Config\Database::connect();

        $builder = $db->table('foto_lain_produk');

        if ($_FILES['foto_lainnya']['name'][0]) {

          foreach ($this->request->getFileMultiple('foto_lainnya') as $file) {

            $file->move('uploads');

            $data = [
              'foto_lain' =>  $file->getClientName(),
              'produk_id'  => $this->Model->getInsertID()
            ];

            $save = $builder->insert($data);
          }
        }
        $validasi = [
          'berhasil' => 'Berhasil Menyimpan Data'
        ];
      } else {
        $validasi = [
          'errors' => $this->Model->errors()
        ];
        // print_r($this->Model->errors());
        // die;
      }
    }
    $template = [
      'isi' => view('produk/form', $validasi)
    ];
    return view('layout/main', $template);
  }

  public function edit($id)
  {


    $validasi = [
      'update' => $id,
      'model' => $this->Model->where(['id_produk' => $id])->first(),


    ];
    if ($this->request->getMethod() === 'post') {
      $fotoutama = $this->request->getFile('foto_produk');
      $foto1 = time() . $fotoutama->getClientName();

      // echo  $fotoutama;
      // die;

      if ($_FILES['foto_produk']['name']) {
        // echo 'oi';
        // die;
        $cariproduk =   $this->Model->where(['id_produk' => $id])->first();
        unlink('uploads/' . $cariproduk->foto_produk);
        $data = [
          'nama_produk' => $this->request->getPost('nama_produk'),
          'qty' => $this->request->getPost('qty'),
          'harga' => $this->request->getPost('harga'),
          'brand_id' => $this->request->getPost('brand'),
          'kategori_id' => $this->request->getPost('kategori'),
          'status_produk' => $this->request->getPost('status'),
          'deskripsi' => $this->request->getPost('deskripsi'),
          'foto_produk' => $foto1
        ];

        if ($this->Model->update($id, $data)) {
          // echo $this->Model->getInsertID();
          // die;
          $fotoutama->move('uploads', $foto1);

          $builder = $this->db->table('foto_lain_produk');

          if ($_FILES['foto_lainnya']['name'][0]) {

            $carifotolain = $this->db->table('foto_lain_produk')->where('produk_id', $id)->get();

            foreach ($carifotolain->getResult() as $row) {
              unlink('uploads/' . $row->foto_lain);
            }

            $this->db->table('foto_lain_produk')->where('produk_id', $id)->delete();

            foreach ($this->request->getFileMultiple('foto_lainnya') as $file) {

              $file->move('uploads');

              $data = [
                'foto_lain' =>  $file->getClientName(),
                'produk_id'  => $id
              ];

              $save = $builder->insert($data);
            }
          }
          $validasi = [
            'berhasil' => 'Berhasil Menyimpan Data',
            'update' => $id,
            'model' => $this->Model->where(['id_produk' => $id])->first(),
          ];
          $template = [
            'isi' => view('produk/form', $validasi)
          ];
          return view('layout/main', $template);
        } else {
          $validasi = [
            'errors' => $this->Model->errors(),
            'update' => $id,
            'model' => $this->Model->where(['id_produk' => $id])->first(),
          ];
          $template = [
            'isi' => view('produk/form', $validasi)
          ];
          return view('layout/main', $template);
        }
      } else {

        $data = [
          'nama_produk' => $this->request->getPost('nama_produk'),
          'qty' => $this->request->getPost('qty'),
          'harga' => $this->request->getPost('harga'),
          'brand_id' => $this->request->getPost('brand'),
          'kategori_id' => $this->request->getPost('kategori'),
          'status_produk' => $this->request->getPost('status'),
          'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        if ($this->Model->update($id, $data)) {
          // echo $this->Model->getInsertID();
          // die;
          // $fotoutama->move('uploads', $foto1);

          $builder = $this->db->table('foto_lain_produk');

          if ($_FILES['foto_lainnya']['name'][0]) {

            $carifotolain = $this->db->table('foto_lain_produk')->where('produk_id', $id)->get();

            foreach ($carifotolain->getResult() as $row) {
              unlink('uploads/' . $row->foto_lain);
            }

            $this->db->table('foto_lain_produk')->where('produk_id', $id)->delete();

            foreach ($this->request->getFileMultiple('foto_lainnya') as $file) {

              $file->move('uploads');

              $data = [
                'foto_lain' =>  $file->getClientName(),
                'produk_id'  => $id
              ];

              $save = $builder->insert($data);
            }
          }
          $validasi = [
            'berhasil' => 'Berhasil Menyimpan Data',
            'update' => $id,
            'model' => $this->Model->where(['id_produk' => $id])->first(),
          ];
          $template = [
            'isi' => view('produk/form', $validasi)
          ];
          return view('layout/main', $template);
        }
      }
      // die;

      // print_r($data);

      // }


    }
    $template = [
      'isi' => view('produk/form', $validasi)
    ];
    return view('layout/main', $template);
  }


  public function delete($id)
  {

    $lain = $this->db->table('foto_lain_produk')->where('produk_id', $id);
    if ($lain) {
      $lain->delete();
    }
    $this->Model->delete($id);
    return  redirect()->to('/produk');
  }
}
