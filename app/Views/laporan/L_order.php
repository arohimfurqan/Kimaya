<html>

<head>
  <title>Laporan Order</title>
  <link rel="stylesheet" href="<?= BASE  ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASE ?>/assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body onload="window.print()">

  <div class="row">
    <div class="col-md-1 col-sm-2 text-left">

      <img src="<?= BASE ?>/assets/img/logo.jpeg" alt="" style="width:120px;height:120px;">

    </div>
    <div class="col-md-11 col-sm-10 text-center">
      <h3><?= session('nama') ?></h3>
      <?php

      ?>
      <!-- <h3>Satuan Polisi Pamong Praja</h3> -->
      <h4>&nbsp;&nbsp;&nbsp;<?= $biodata->alamat ?>, Telp. <?= $biodata->no_hp == '' ? '-' : $biodata->no_hp ?>
      </h4>
    </div>
    <!-- <div class="col-md-1 col-sm-2 text-right"> -->
    <!-- <img src="" alt="" style="width:120px;height:120px"> -->
    <!-- </div> -->
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12 text-center">
      <p>LAPORAN ORDER</p>
      <!-- <p>SATUAN POLISI PAMONG PRAJA KOTA PADANG</p> -->
      <p>TAHUN <?= $tahun ?> </p>
    </div>
  </div>
  <div class="container">
    <?php
    $db      = \Config\Database::connect();

    foreach ($cart as $rew) :


      $biodata = $db->table('users')->select('biodata.*,users.*,tb_provinsi.nama as nama_provinsi,tb_kota_kabupaten.nama as nama_kota,tb_provinsi.id as id_provinsi,tb_kota_kabupaten.id as id_kota,users.nama as nama_user')->join('biodata', 'user_id=id_user')->join('tb_provinsi', 'provinsi_id=tb_provinsi.id')->join('tb_kota_kabupaten', 'kota_id=tb_kota_kabupaten.id')->where('id_user', $rew->user_id)->get()->getRow();


    ?>
      <div class="row">
        <div class="col-md-12">
          <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
          <div class="text-dark-50 line-height-lg">
            <div><strong>Alamat :</strong> <?= strtoupper($biodata->nama_provinsi) ?>, <?= strtoupper($biodata->alamat) ?></div>
            <div><strong>No Handphone :</strong> <?= $biodata->no_hp ?></div>
            <div><strong>Penerima :</strong> <?= strtoupper($biodata->nama_user) ?></div>
          </div>
          <div class="separator separator-dashed my-5"></div>
          <!--end::Section-->
          <!--begin::Section-->
          <h6 class="font-weight-bolder mb-3">Order Details:</h6>
          <div class="text-dark-50 line-height-lg">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Ordered Items</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $cart2 = $db->table('keranjang')->join('keranjang_produk', 'id_keranjang=keranjang_id')->join('produk', 'id_produk=produk_id')->where('id_keranjang', $rew->id_keranjang)->get()->getResult();
                  foreach ($cart2 as $row) {
                  ?>
                    <tr class="font-weight-boldest">
                      <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                        <!--begin::Symbol-->
                        <?php
                        if (!$row->foto_produk) { ?>
                          <img src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png" alt="" width="70px" height="70px">

                        <?php } else { ?>
                          <img src="<?= BASE ?>/uploads/<?= $row->foto_produk ?>" alt="" width="70px" height="70px">

                        <?php }
                        ?>
                        <!--end::Symbol-->
                        <?= $row->nama_produk ?>
                      </td>
                      <td class="text-right pt-7 align-middle"><?= $row->jumlah ?></td>
                      <td class="text-right pt-7 align-middle">Rp. <?= number_format($row->harga) ?></td>
                      <td class="text-primary pr-0 pt-7 text-right align-middle">Rp. <?= number_format($row->harga * $row->jumlah) ?></td>
                    </tr>
                  <?php
                    @$total[$rew->id_keranjang] = @$total[$rew->id_keranjang] + ($row->harga * $row->jumlah);
                  } ?>

                  <tr>
                    <td colspan="2"></td>
                    <td class=" font-weight-bolder font-size-h5 text-right">Total</td>
                    <td class=" font-weight-bolder font-size-h5 text-success text-right pr-0">Rp. <?= number_format(@$total[$rew->id_keranjang]) ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    <?php
      @$gt = @$gt + @$total[$rew->id_keranjang];
    endforeach ?>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="pl-0 font-weight-bold text-muted text-uppercase"></th>
            <th class="text-right font-weight-bold text-muted text-uppercase"></th>
            <th class="text-right font-weight-bold text-muted text-uppercase">Grand Total</th>
            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Rp. <?= number_format(@$gt) ?></th>
          </tr>
        </thead>

      </table>
    </div>
  </div>

  <div class="row" style="page-break-inside: avoid;">
    <div class="col-md-6 col-sm-6 text-center ">

    </div>
    <div class="col-md-6 col-sm-6` text-center ">
      <strong>
        <p style="margin-bottom: 1px;">Padang, <?= date('d F Y') ?></p>
        <p>Pimpinan <?= session()->get('nama') ?></p>
        <br>
        <br><br><br><br>
        <p style="margin-bottom: 1px;"><u>PIMPINAN</u> </p>
        <!-- <p>NIP. 19680906 199503 1 001</p> -->
      </strong>
    </div>

  </div>
</body>

</html>