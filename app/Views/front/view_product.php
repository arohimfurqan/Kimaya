<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <div class="d-flex flex-row">
        <!--begin::Layout-->
        <div class="flex-row-fluid">
          <!--begin::Section-->
          <div class="row">
            <div class="col-md-7 col-lg-12 col-xxl-12">
              <!--begin::Engage Widget 14-->
              <div class="card card-custom card-stretch gutter-b">
                <div class="card-body p-15 pb-20">
                  <div class="row mb-17">
                    <div class="col-xxl-5 mb-11 mb-xxl-0">
                      <!--begin::Image-->
                      <div class="card ">

                        <?php
                        $db = Config\database::connect();

                        if ($produk->foto_produk) { ?>

                          <div class="demo">
                            <ul id="lightSlider">
                              <li data-thumb="<?= BASE ?>/uploads/<?= $produk->foto_produk ?>"> <img src="<?= BASE ?>/uploads/<?= $produk->foto_produk ?>" width="100%" height="400px" /> </li>
                              <?php
                              $fotopr = new \App\Models\M_fotoproduk();
                              $carifoto = $fotopr->where('produk_id', $produk->id_produk)->findAll();
                              if ($carifoto) {
                                foreach ($carifoto as $ftl) {
                              ?>
                                  <li data-thumb="<?= BASE ?>/uploads/<?= $ftl->foto_lain ?>"> <img src="<?= BASE ?>/uploads/<?= $ftl->foto_lain ?>" width="100%" height="400px" /> </li>
                              <?php  }
                              }
                              ?>


                            </ul>
                          </div>

                        <?php
                        } else {
                        ?>
                          <div class="demo">
                            <ul id="lightSlider">
                              <li data-thumb="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png"> <img src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png" width="100%" height="400px" /> </li>
                            </ul>
                          </div>
                          <!-- <img src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png" class="mw-100 w-200px" style="transform: scale(1.6);" /> -->
                        <?php }
                        ?>

                      </div>

                      <!--end::Image-->
                    </div>
                    <div class="col-xxl-7 pl-xxl-11">
                      <h2 class="font-weight-bolder text-dark mb-7" style="font-size: 32px;"><?= $produk->nama_produk ?></h2>
                      <div class="font-size-h2 mb-7 text-dark-50">
                        <span class="text-info font-weight-boldest ml-2">Rp. <?= number_format($produk->harga) ?></span>
                      </div>
                      <div class="line-height-xl"><?= $produk->deskripsi ?></div>

                      <div class="row mb-6">
                        <!--begin::Info-->
                        <div class="col-6 col-md-4">
                          <div class="mb-8 d-flex flex-column">
                            <span class="text-dark font-weight-bold mb-4">Brand</span>
                            <span class="text-muted font-weight-bolder font-size-lg"><?= $produk->nama_brand ?></span>
                          </div>
                        </div>



                        <div class="col-6 col-md-4">
                          <div class="mb-8 d-flex flex-column">
                            <span class="text-dark font-weight-bold mb-4">In Stock</span>
                            <span class="text-muted font-weight-bolder font-size-lg"><?= $produk->qty ?></span>
                          </div>

                        </div>
                        <div class="col-6 col-md-4">
                          <div class="mb-8 d-flex flex-column">
                            <span class="text-dark font-weight-bold mb-4">Sold Items</span>
                            <?php
                            $sold = $db->table('keranjang_produk')->join('keranjang', 'keranjang_id=id_keranjang')->where('status', 'Pengiriman')->orWhere('status', 'Dikembalikan')->where('produk_id', $produk->id_produk)->get()->getResult();
                            $jm = 0;
                            foreach ($sold as $s) {
                              @$jm = @$jm + $s->jumlah;
                            }
                            ?>
                            <span class="text-muted font-weight-bolder font-size-lg"><?= @$jm ?></span>
                          </div>
                        </div>
                        <div class="col-6 col-md-4">
                          <div class="mb-8 d-flex flex-column">
                            <span class="text-dark font-weight-bold mb-4">Nama Toko</span>
                            <a href="<?= BASE ?>/front/view_toko/<?= $produk->produk_user_id ?>" class="text-muted font-weight-bolder font-size-lg"><?= $produk->nama_user ?></a>
                          </div>
                        </div>
                        <div class="col-6 col-md-4">
                          <div class="mb-8 d-flex flex-column">
                            <span class="text-dark font-weight-bold mb-4">Kota Toko</span>
                            <span class="text-muted font-weight-bolder font-size-lg"><?= $produk->nama_kota ?></span>
                          </div>
                        </div>

                        <!--end::Info-->
                      </div>
                      <!--begin::Buttons-->
                      <div class="d-flex">
                        <?php
                        if (!session()->has('logged_in2')) {
                        ?>
                          <button type="button" class="btn btn-primary font-weight-bolder mr-6 px-6 font-size-sm" onclick="location.href='<?= BASE ?>/front/login'">
                            <span class="svg-icon">
                              <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon points="0 0 24 0 24 24 0 24" />
                                  <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                  <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                </g>
                              </svg>
                              <!--end::Svg Icon-->
                            </span>Add Chart</button>
                        <?php } else { ?>
                          <form action="<?= BASE ?>/front/add_chart/<?= $produk->id_produk ?>" method="post">

                            <div class="form-group">
                              <div class="input-group mb-3">
                                <input type="number" class="form-control" name="qty" min="1" max="<?= $produk->qty ?>" value="1">
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-primary font-weight-bolder mr-6 px-6 font-size-sm">
                                    <span class=" svg-icon">
                                      <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <polygon points="0 0 24 0 24 24 0 24" />
                                          <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                          <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                        </g>
                                      </svg>
                                      <!--end::Svg Icon-->
                                    </span>Add Chart
                                  </button>
                                </div>
                              </div>
                            </div>

                          </form>
                        <?php } ?>
                      </div>
                      <!--end::Buttons-->
                    </div>

                  </div>
                  <!-- <div class="row">
                    <div class="col">
                      Nama Toko
                    </div>
                  </div>
                </div> -->


                </div>
                <!--end::Engage Widget 14-->
              </div>

            </div>
            <!--end::Section-->

          </div>
          <!--end::Layout-->
        </div>
      </div>
      <!--end::Container-->
    </div>
    <!--end::Entry-->
  </div>