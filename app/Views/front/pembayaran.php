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

				              <!--begin: Wizard Body-->
				              <div class="card card-custom card-shadowless rounded-top-0">
				                <div class="card-body p-0">
				                  <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
				                    <div class="col-xl-12 col-xxl-7">
				                      <!--begin: Wizard Form-->
				                      <form class="form mt-0 mt-lg-10" id="kt_form" method="post" action="<?= BASE ?>/front/bayar/<?= $cart2->id_keranjang ?>" enctype="multipart/form-data">
				                        <?= csrf_field() ?>

				                        <input type="hidden" name="id_keranjang" value="<?= $cart2->id_keranjang ?>">

				                        <!--begin: Wizard Step 1-->
				                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
				                          <!--begin::Section-->
				                          <h4 class="mb-10 font-weight-bold text-dark">Oder dan upload bukti pembayaran</h4>
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

				                                          <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
				                                            <div class="symbol-label" style="background-image: url('<?= BASE ?>/front_assets/custom/apps/ecommerce/img/no-image.png')"></div>
				                                          </div>
				                                        <?php } else { ?>
				                                          <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
				                                            <div class="symbol-label" style="background-image: url('<?= BASE ?>/uploads/<?= $row->foto_produk ?>')"></div>
				                                          </div>
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
				                                  <!-- <tr>
																							<td colspan="2"></td>
																							<td class="font-weight-bolder text-right">Subtotal</td>
																							<td class="font-weight-bolder text-right pr-0">Rp. <?= number_format(@$total) ?></td>
																						</tr> -->
				                                  <!-- <tr>
																							<td colspan="2" class="border-0 pt-0"></td>
																							<td class="border-0 pt-0 font-weight-bolder text-right">Delivery Fees</td>
																							<td class="border-0 pt-0 font-weight-bolder text-right pr-0">$15.00</td>
																						</tr> -->
				                                  <tr>
				                                    <td colspan="2"></td>
				                                    <td class=" font-weight-bolder font-size-h5 text-right">Grand Total</td>
				                                    <td class=" font-weight-bolder font-size-h5 text-success text-right pr-0">Rp. <?= number_format(@$total) ?></td>
				                                  </tr>
				                                </tbody>
				                              </table>
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
				                        <label for=""><strong>Upload Bukti Pembayaran</strong></label><br>
				                        <input type="file" name="bukti" accept="image/*" required>
				                        <!--end: Wizard Step 1-->

				                        <!--begin: Wizard Actions-->
				                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
				                          <div class="mr-2">
				                            <!-- <a href="<?= BASE ?>/front/checkout" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Previous</a> -->
				                          </div>
				                          <div>

				                            <button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Submit</button>
				                          </div>
				                        </div>
				                        <!--end: Wizard Actions-->
				                      </form>
				                      <!--end: Wizard Form-->
				                      <span style="color: red;">Lakukan pembayaran sesuai nominal total pembayaran dan transfer ke :<br>
				                        1. BNI 111-222-333-44 <br>
				                        2. BCA 111-222-333-44 <br>
				                      </span>
				                    </div>

				                  </div>

				                </div>
				              </div>

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