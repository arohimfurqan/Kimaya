				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				  <!--begin::Entry-->
				  <div class="d-flex flex-column-fluid">
				    <!--begin::Container-->
				    <div class="container">
				      <!--begin::Page Layout-->
				      <div class="d-flex flex-row">
				        <!--begin::Aside-->
				        <!-- <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
				        </div> -->
				        <!--end::Aside-->
				        <!--begin::Layout-->
				        <div class="flex-row-fluid ml-lg-12 lg-12">
				          <!--begin::Section-->
				          <div class="card card-custom card-transparent">
				            <div class="card-body p-0">
				              <!--begin: Wizard-->

				              <!--end: Wizard Nav-->
				              <!--begin: Wizard Body-->
				              <div class="card card-custom card-shadowless rounded-top-0">
				                <div class="card-body p-0">
				                  <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
				                    <div class="col-xl-12 col-xxl-7">
				                      <!--begin: Wizard Form-->


				                      <!--begin: Wizard Step 1-->
				                      <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
				                        <!--begin::Section-->

				                        <div class="separator separator-dashed my-5"></div>
				                        <!--end::Section-->
				                        <!--begin::Section-->
				                        <h6 class="font-weight-bolder mb-3">Dikemas :</h6>
				                        <div class="text-dark-50 line-height-lg">
				                          <div class="table-responsive">
				                            <table class="table">
				                              <thead>
				                                <tr>
				                                  <th>No</th>
				                                  <th>Product</th>
				                                  <th>Tanggal Pemesanan</th>
				                                  <th>Tanggal Pembayaran</th>
				                                  <th>Total Bayar</th>
				                                  <!-- <th>Actions</th> -->
				                                </tr>
				                              </thead>
				                              <tbody>
				                                <?php
                                        $no = 1;
                                        foreach ($data as $row) {
                                        ?>
				                                  <tr>
				                                    <td class="pt-7 align-middle"><?= $no++ ?></td>
				                                    <td class="border-0 pl-0 pt-7 d-flex align-items-center">
				                                      <?php
                                              if (!$row->foto_produk) { ?>

				                                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
				                                          <div class="symbol-label" style="background-image: url('<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png')"></div>
				                                        </div>
				                                      <?php } else { ?>
				                                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
				                                          <div class="symbol-label" style="background-image: url('<?= BASE ?>/uploads/<?= $row->foto_produk ?>')"></div>
				                                        </div>
				                                      <?php }
                                              ?> <?= $row->nama_produk ?>
				                                    </td>
				                                    <td class="pt-7 align-middle"><?= $row->tanggal_pesan ?></td>
				                                    <td class="pt-7 align-middle"><?= $row->tanggal_pembayaran ?></td>
				                                    <td class="pt-7 align-middle">Rp. <?= number_format($row->total) ?></td>
				                                    <!-- <td><a href="<?= BASE ?>/front/bayar/<?= $row->id_keranjang ?>" class="btn btn-success">Bayar</a></td> -->
				                                  </tr>
				                                <?php } ?>
				                              </tbody>
				                            </table>
				                            <!-- <div>
				                              <span style="color:red">Note ! : Lakukan pembayaran ke rek <br> 1. BCA 111-222-333-444-55</span>
				                            </div> -->
				                          </div>
				                        </div>
				                        <!-- <div class="separator separator-dashed my-5"></div> -->
				                        <!--end::Section-->
				                        <!--begin::Section-->
				                        <!-- <h6 class="font-weight-bolder mb-3">Delivery Service Type:</h6>
																		<div class="text-dark-50 line-height-lg">
																			<div>Overnight Delivery with Regular Packaging</div>
																			<div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
																		</div> -->
				                        <!--end::Section-->
				                      </div>

				                      <!--end: Wizard Step 1-->


				                      <!--end: Wizard Form-->
				                    </div>
				                  </div>
				                </div>
				              </div>
				              <!--end: Wizard Bpdy-->

				              <!--end: Wizard-->
				            </div>
				          </div>
				          <!--end::Section-->
				        </div>
				        <!--end::Layout-->
				      </div>
				      <!--end::Page Layout-->
				    </div>
				    <!--end::Container-->
				  </div>
				  <!--end::Entry-->
				</div>
				<!--end::Content-->