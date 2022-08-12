<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Terkirim</h3>
        <div class="card-tools">
          <!-- <a href="<?= BASE ?>/produk/add" class="btn btn-success">Add</a> -->
        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body">

        <h4 class="mb-10 font-weight-bold text-dark">Review your and Submit</h4>
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
                foreach ($cart as $row) {
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
                  @$total = @$total + ($row->harga * $row->jumlah);
                } ?>

                <tr>
                  <td colspan="2"></td>
                  <td class=" font-weight-bolder font-size-h5 text-right">Grand Total</td>
                  <td class=" font-weight-bolder font-size-h5 text-success text-right pr-0">Rp. <?= number_format(@$total) ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <label for="">Bukti Pembayaran</label>
        <a href="<?= BASE ?>/uploads/<?= $cart2->bukti_pembayaran ?>"><br>
          <img src="<?= BASE ?>/uploads/<?= $cart2->bukti_pembayaran ?>" alt="" height="150px" width="150px">
        </a>
      </div>
      <div class="card-footer text-muted">
        <?php
        if ($cart2->status == 'Lunas') { ?>
          <a href="<?= BASE ?>/order/kirim/<?= $cart2->id_keranjang ?>" class="btn btn-success btn-sm">Konfirmasi / Kirim</a>

          <a href="<?= BASE ?>/order/cancel/<?= $cart2->id_keranjang ?>" class="btn btn-danger btn-sm">Cancel</a>
        <?php } ?>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>