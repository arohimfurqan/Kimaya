<html>

<head>
  <title>Laporan Produk</title>
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
      <p>LAPORAN PRODUK</p>
      <!-- <p>SATUAN POLISI PAMONG PRAJA KOTA PADANG</p> -->
      <!-- <p>BULAN JANUARI S/D DESEMBER </p> -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="text-align: center;" v-align="center">NO</th>
            <th style="text-align: center;" v-align="center">NAMA PRODUK</th>
            <th style="text-align: center;" v-align="center">JUMLAH</th>
            <th style="text-align: center;" v-align="center">BRAND</th>
            <th style="text-align: center;" v-align="center">KATEGORI</th>
            <th style="text-align: center;" v-align="center">HARGA</th>
            <th style="text-align: center;" v-align="center">FOTO</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($produk as $row) :
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row->nama_produk ?></td>
              <td><?= $row->qty ?></td>
              <td><?= $row->nama_brand ?></td>
              <td><?= $row->nama_kategori ?></td>
              <td><?= $row->harga ?></td>
              <td><img src="<?= BASE ?>/uploads/<?= $row->foto_produk ?>" width="150px" height="150px"></td>
            </tr>

          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row">
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