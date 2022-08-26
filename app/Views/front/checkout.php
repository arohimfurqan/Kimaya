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
											<div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
												<!--begin: Wizard Nav-->
												<div class="wizard-nav">
													<div class="wizard-steps" data-total-steps="2">
														<!--begin::Wizard Step 1 Nav-->
														<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
															<div class="wizard-wrapper">
																<div class="wizard-number">1</div>
																<div class="wizard-label">
																	<div class="wizard-title">Delivery Address</div>
																	<div class="wizard-desc">Setup Your Address</div>
																</div>
															</div>
														</div>
														<!--end::Wizard Step 1 Nav-->
														<!--begin::Wizard Step 2 Nav-->
														<div class="wizard-step" data-wizard-type="step">
															<div class="wizard-wrapper">
																<div class="wizard-number">2</div>
																<div class="wizard-label">
																	<div class="wizard-title">Purchase</div>
																	<div class="wizard-desc">Review and Submit</div>
																</div>
															</div>
														</div>
														<!--end::Wizard Step 2 Nav-->
														<!--begin::Wizard Step 3 Nav-->
														<!-- <div class="wizard-step" data-wizard-type="step">
															<div class="wizard-wrapper">
																<div class="wizard-number">2</div>
																<div class="wizard-label">
																	<div class="wizard-title">Purchase</div>
																	<div class="wizard-desc">Review and Submit</div>
																</div>
															</div>
														</div> -->
														<!--end::Wizard Step 3 Nav-->
													</div>
												</div>
												<!--end: Wizard Nav-->
												<!--begin: Wizard Body-->
												<div class="card card-custom card-shadowless rounded-top-0">
													<div class="card-body p-0">
														<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
															<div class="col-xl-12 col-xxl-7">
																<!--begin: Wizard Form-->
																<form class="form mt-0 mt-lg-10" id="kt_form" method="post" action="<?= BASE ?>/front/checkout/<?= $keranjang ?>">
																	<input type="hidden" name="id_biodata" value="<?= $biodata->id_biodata ?>">
																	<!--begin: Wizard Step 1-->
																	<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
																		<h4 class="mb-10 font-weight-bold text-dark">Enter Your Address</h4>
																		<!--begin::Input-->
																		<div class="form-group">
																			<label>Alamat</label>
																			<input type="text" class="form-control form-control-solid form-control-lg" name="alamat" placeholder="Alamat" value="<?= $biodata->alamat ?>" required />
																			<span class="form-text text-muted">Silahkan masukan alamat anda.</span>
																		</div>
																		<!--end::Input-->
																		<!--begin::Input-->
																		<div class="form-group">
																			<label>No. Handphone</label>
																			<input type="text" class="form-control form-control-solid form-control-lg" name="nohp" placeholder="No Hp" value="<?= $biodata->no_hp ?>" required />
																			<span class="form-text text-muted">Silahkan masukan no hp anda.</span>
																		</div>
																		<!--end::Input-->
																		<div class="row">
																			<div class="col-xl-6">
																				<!--begin::Input-->
																				<div class="form-group">
																					<label>Provinsi</label>
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
																					<span class="form-text text-muted">Silahkan pilih provinsi.</span>
																				</div>
																				<!--end::Input-->
																			</div>
																			<div class="col-xl-6">
																				<!--begin::Input-->
																				<div class="form-group">
																					<label>Kota</label>
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
																					<span class="form-text text-muted">Silahkan pilih kota anda.</span>
																				</div>
																				<!--end::Input-->
																			</div>
																		</div>

																	</div>

																	<!--end: Wizard Step 1-->

																	<!--begin: Wizard Actions-->
																	<div class="d-flex justify-content-between border-top mt-5 pt-10">
																		<div class="mr-2">
																			<!-- <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button> -->
																		</div>
																		<div>
																			<!-- <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button> -->
																			<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Next</button>
																		</div>
																	</div>
																	<!--end: Wizard Actions-->
																</form>
																<!--end: Wizard Form-->
															</div>
														</div>
													</div>
												</div>
												<!--end: Wizard Bpdy-->
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