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
      <form class="form" action="<?= BASE ?>/front/profil" method="POST">


        <div class="d-flex flex-row">

          <!--begin::Layout-->

          <div class="flex-row-fluid ml-lg-12">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
              <!--begin::Header-->
              <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                  <h3 class="card-label font-weight-bolder text-dark">Profile</h3>
                  <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                </div>
                <div class="card-toolbar">
                  <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                  <!-- <button type="reset" class="btn btn-secondary">Cancel</button> -->
                </div>
              </div>
              <!--end::Header-->
              <!--begin::Form-->
              <!--begin::Body-->
              <div class="card-body">
                <!-- <div class="row">
                  <label class="col-xl-3"></label>
                  <div class="col-lg-9 col-xl-6">
                    <h5 class="font-weight-bold mb-6">Customer Info</h5>
                  </div>
                </div> -->
                <!-- <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                  <div class="col-lg-9 col-xl-6">
                    <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
                      <div class="image-input-wrapper" style="background-image: url(assets/media/users/300_21.jpg)"></div>
                      <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                        <i class="fa fa-pen icon-sm text-muted"></i>
                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="profile_avatar_remove" />
                      </label>
                      <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                      </span>
                      <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                      </span>
                    </div>
                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                  </div>
                </div> -->
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Nama Lengkap</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="text" value="<?= $biodata->nama ?>" name="nama" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="email" value="<?= $biodata->email ?>" name="email" />
                    <!-- <span class="form-text text-muted">Email untuk </span> -->

                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Nohp</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="text" value="<?= $biodata->no_hp ?>" name="nohp" />

                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Provinsi</label>
                  <div class="col-lg-9 col-xl-6">
                    <select id="provinsi" name="provinsi" class="form-control form-control-solid form-control-lg select2" required>
                      <?php
                      if ($biodata->provinsi_id == 0 || $biodata->provinsi_id == NULL || $biodata->provinsi_id == '') { ?>
                        <option value="" selected>Pilih Provinsi</option>
                      <?php
                      } else { ?>
                        <option value="<?= $biodata->id_provinsi ?>" selected><?= $biodata->nama_provinsi ?></option>
                      <?php
                      }
                      ?>

                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Kota</label>
                  <div class="col-lg-9 col-xl-6">
                    <select id="kota" name="kota" class="form-control form-control-solid form-control-lg select2" required>
                      <?php
                      if ($biodata->kota_id == 0 || $biodata->kota_id == NULL || $biodata->kota_id == '') { ?>
                        <option value="" selected>Pilih Kota</option>
                      <?php
                      } else { ?>
                        <option value="<?= $biodata->id_kota ?>" selected><?= $biodata->nama_kota ?></option>
                      <?php
                      }
                      ?>
                      <!-- <option value="" selected>Pilih Kota</option> -->
                    </select>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>
                  <div class="col-lg-9 col-xl-6">
                    <textarea class="form-control form-control-lg form-control-solid" rows="10" name="alamat"><?= $biodata->alamat ?></textarea>

                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-xl-3 col-lg-3 col-form-label">Password Baru</label>
                  <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password_baru" autocomplete="new-password" placeholder="Password Baru" />
                    <span class="form-text text-danger">Kosongkan saja jika tidak ingin merubah password</span>
                  </div>
                </div>

              </div>
              <!--end::Body-->
              <!--end::Form-->
            </div>
          </div>
        </div>
      </form>

    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<!--end::Content-->