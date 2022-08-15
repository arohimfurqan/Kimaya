<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <div class="d-flex flex-row">
        <!--begin::Aside-->

        <!--end::Aside-->
        <!--begin::Layout-->
        <div class="flex-row-fluid ml-lg-8">
          <!--begin::Section-->
          <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder font-size-h3 text-dark">My Shopping Cart</span>
              </h3>
              <div class="card-toolbar">
                <div class="dropdown dropdown-inline">
                  <a href="<?= BASE ?>/front/product" class="btn btn-primary font-weight-bolder font-size-sm">Continue Shopping</a>
                </div>
              </div>
            </div>
            <!--end::Header-->
            <div class="card-body">
              <!--begin::Shopping Cart-->
              <div class="table-responsive refress">
                <table class="table">
                  <!--begin::Cart Header-->
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Toko</th>
                      <th class="text-center">Qty</th>
                      <th class="text-right">Price</th>
                      <th class="text-right">Sub Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <!--end::Cart Header-->

                  <tbody>
                    <!--begin::Cart Content-->
                    <?php
                    foreach ($cart as $row) {
                    ?>
                      <tr>
                        <td class="d-flex align-items-center font-weight-bolder">
                          <!--begin::Symbol-->
                          <?php
                          if (!$row->foto_produk) { ?>

                            <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                              <div class="symbol-label" style="background-image: url('<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png')"></div>
                            </div>
                          <?php } else { ?>
                            <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                              <div class="symbol-label" style="background-image: url('<?= BASE ?>/uploads/<?= $row->foto_produk ?>')"></div>
                            </div>
                          <?php }
                          ?>
                          <!--end::Symbol-->
                          <a href="#" class="text-dark text-hover-primary"><?= $row->nama_produk ?></a>
                        </td>
                        <td class=" align-middle">
                          <?= $row->nama ?>
                        </td>
                        <td class="text-center align-middle">
                          <?php
                          if ($row->jumlah > 1) {
                          ?>
                            <button class="btn btn-xs btn-light-success btn-icon mr-2" onClick="decrement_quantity(<?= $row->produk_keranjang_id; ?>)">
                              <i class="ki ki-minus icon-xs"></i>
                            </button>
                          <?php } ?>
                          <input type="hidden" name="quant" id="input-quantity-<?= $row->produk_keranjang_id ?>" value="<?= $row->jumlah ?>">
                          <span class="mr-2 font-weight-bolder"><?= $row->jumlah ?></span>
                          <?php
                          if ($row->qty > $row->jumlah) {
                          ?>
                            <button class="btn btn-xs btn-light-success btn-icon" onClick="increment_quantity(<?= $row->produk_keranjang_id; ?>)">
                              <i class="ki ki-plus icon-xs"></i>
                            </button>
                          <?php } ?>
                        </td>
                        <td class="text-right align-middle font-weight-bolder font-size-h5">Rp. <?= number_format($row->harga) ?></td>
                        <td class="text-right align-middle font-weight-bolder font-size-h5">Rp. <?= number_format($row->harga * $row->jumlah) ?></td>
                        <td class="text-right align-middle">
                          <a href="<?= BASE ?>/front/hapusprodukkeranjang/<?= $row->produk_keranjang_id ?>" class="btn btn-danger font-weight-bolder font-size-sm">Remove</a>
                        </td>
                      </tr>
                    <?php
                      @$total = @$total + ($row->harga * $row->jumlah);
                    } ?>

                    <!--end::Cart Content-->
                    <!--begin::Cart Footer-->
                    <tr>
                      <td colspan="3"></td>
                      <td class="font-weight-bolder font-size-h4 text-right">Total</td>
                      <td class="font-weight-bolder font-size-h4 text-right">Rp. <?= number_format(@$total) ?></td>
                    </tr>
                    <tr>
                      <td colspan="4" class="border-0 text-muted text-right pt-0"></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="border-0 pt-10">

                      </td>
                      <td colspan="2" class="border-0 text-right pt-10">
                        <a href="<?= BASE ?>/front/checkout" class="btn btn-success font-weight-bolder px-8">Proceed to Checkout</a>
                      </td>
                    </tr>
                    <!--end::Cart Footer-->
                  </tbody>
                </table>
              </div>
              <!--end::Shopping Cart-->
            </div>
          </div>
          <!--end::Section-->
          <!--begin::Section-->

          <!--end::Section-->
        </div>
        <!--end::Layout-->
      </div>
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<!--end::Content-->