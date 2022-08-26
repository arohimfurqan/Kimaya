<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Page Layout-->
      <!-- <div class="d-flex flex-row"> -->

      <!--begin::Layout-->
      <!-- <div class="flex-row-fluid ml-lg-12 ml-md-12">
          
            <div class="card card-custom card-stretch gutter-b">
              <div class="card-body">
            
                <div class="card card-custom mb-12">
                  <div class="card-body rounded p-0 d-flex">
                  
                    <img src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/atas.jpeg" width="100%">	
                
                </div>
              </div>
            </div>
          </div>
        </div>
        </div> -->


      <div class="d-flex flex-row">

        <!--begin::Layout-->

        <div class="flex-row-fluid ml-lg-12 ml-md-12">


          <!--begin::Card-->
          <div class="card card-custom card-stretch gutter-b">
            <div class="card-body">
              <!--begin::Engage Widget 15-->

              <!--begin::Section-->
              <div class="mb-11">
                <!--begin::Heading-->
                <div class="d-flex justify-content-between align-items-center mb-7">
                  <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Toko : <?= $user->nama_user ?></h2>
                  <!-- <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View All</a> -->
                </div>
                <!--end::Heading-->
                <!--begin::Products-->
                <div class="row">
                  <!--begin::Product-->

                  <div class="col-md-3">
                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless">
                      <div class="card-body p-0">
                        <!--begin::Image-->
                        <div class="overlay">
                          <div class="overlay-wrapper rounded bg-light text-center">


                            <img src="<?= BASE ?>/uploads/user.jpg" alt="" class="mw-100 w-150px" height="150px" />


                          </div>

                        </div>
                        <!--end::Image-->
                        <!--begin::Details-->
                        <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                          <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1"><?= $user->nama_user ?></a>
                          <!-- <span class="font-size-lg">...</span> -->
                        </div>
                        <!--end::Details-->
                      </div>
                    </div>
                    <!--end::Card-->
                  </div>
                  <div class="col-md-9">
                    <table class="table">
                      <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td><?= $user->nama ?></td>
                      </tr>
                      <tr>
                        <th>Provinsi</th>
                        <td>:</td>
                        <td><?= $user->nama_provinsi ?></td>
                      </tr>
                      <tr>
                        <th>Kota</th>
                        <td>:</td>
                        <td><?= $user->nama_kota ?></td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td><?= $user->alamat ?></td>
                      </tr>
                      <tr>
                        <th>No Hp</th>
                        <td>:</td>
                        <td><?= $user->no_hp ?></td>
                      </tr>
                    </table>
                  </div>

                </div>


                <!--end::Products-->
              </div>


              <!--end::Section-->
            </div>
          </div>

        </div>


      </div>

      <div class="d-flex flex-row">

        <!--begin::Layout-->

        <div class="flex-row-fluid ml-lg-12 ml-md-12">


          <!--begin::Card-->
          <div class="card card-custom card-stretch gutter-b">
            <div class="card-body">
              <!--begin::Engage Widget 15-->

              <!--begin::Section-->
              <div class="mb-11">
                <!--begin::Heading-->
                <div class="d-flex justify-content-between align-items-center mb-7">
                  <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Produk</h2>
                  <!-- <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder">View All</a> -->
                </div>
                <!--end::Heading-->
                <!--begin::Products-->
                <div class="row">
                  <!--begin::Product-->
                  <?php
                  foreach ($produk as $prd) :
                  ?>
                    <div class="col-md-3">
                      <!--begin::Card-->
                      <div class="card card-custom card-shadowless">
                        <div class="card-body p-0">
                          <!--begin::Image-->
                          <div class="overlay">
                            <div class="overlay-wrapper rounded bg-light text-center">
                              <?php
                              if ($prd->foto_produk) { ?>
                                <img src="<?= BASE ?>/uploads/<?= $prd->foto_produk ?>" alt="" class="mw-100 w-200px" height="150px" />
                              <?php
                              } else {
                              ?>
                                <img src="<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png" alt="" class="mw-100 w-200px" height="150px" />
                              <?php }
                              ?>

                            </div>
                            <div class="overlay-layer">
                              <a href="<?= BASE ?>/front/view_product/<?= $prd->id_produk ?>" class="btn font-weight-bolder btn-sm btn-primary mr-2">Quick View</a>
                              <!-- <a href="#" class="btn font-weight-bolder btn-sm btn-light-primary">Purchase</a> -->
                            </div>
                          </div>
                          <!--end::Image-->
                          <!--begin::Details-->
                          <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                            <a href="#" class="font-size-h5 font-weight-bolder text-dark-75 text-hover-primary mb-1"><?= $prd->nama_produk ?></a>
                            <span class="font-size-lg"><?= substr(strip_tags($prd->deskripsi), 0, 100) ?>...</span>
                          </div>
                          <!--end::Details-->
                        </div>
                      </div>
                      <!--end::Card-->
                    </div>
                  <?php endforeach ?>

                </div>
                <?= $pager->links('product', 'bootstrap_pagination') ?>

                <!--end::Products-->
              </div>


              <!--end::Section-->
            </div>
          </div>

        </div>


      </div>
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<!--end::Content-->