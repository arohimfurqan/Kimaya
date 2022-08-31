<?php
$db = \Config\database::connect();
?>

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
										<div class="wizard-step" data-wizard-type="step">
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
										<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
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
												<form class="form mt-0 mt-lg-10" id="kt_form" method="post" action="<?= BASE ?>/front/purchase/<?= $keranjang ?>">

													<input type="hidden" name="id_keranjang" value="<?= $cart2->id_keranjang ?>">

													<!--begin: Wizard Step 1-->
													<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
														<!--begin::Section-->
														<h4 class="mb-10 font-weight-bold text-dark">Review your Order and Submit</h4>
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
																			<th class="text-right font-weight-bold text-muted text-uppercase">Berat</th>
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
																				<td class="text-right pt-7 align-middle"><?= $row->berat ?>gr</td>
																				<td class="text-right pt-7 align-middle">Rp. <?= number_format($row->harga) ?></td>
																				<td class="text-primary pr-0 pt-7 text-right align-middle">Rp. <?= number_format($row->harga * $row->jumlah) ?></td>
																			</tr>
																		<?php
																			@$total = @$total + ($row->harga * $row->jumlah);
																			@$totalberat = @$totalberat + ($row->berat * $row->jumlah);
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
														<?php
														$asal = $db->table("keranjang")->join('users', 'id_user=penjual_id')->join('biodata', 'id_user=biodata.user_id')->where('id_keranjang', $keranjang)->get()->getRow();

														// echo  $biodata->id_kota;
														?>
														<input type="hidden" value="<?= @$totalberat ?>" name="totalberat" id="totalberat">
														<input type="hidden" value="<?= $biodata->id_kota ?>" name="tujuan" id="tujuan">
														<input type="hidden" value="<?= $asal->kota_id ?>" name="asal" id="asal">
														<div class=" form-group">
															<label for="">Kurir</label>
															<select name="kurir" id="kurir" class="form-control" onchange="return carikurir();">
																<option value="">-- PILIH --</option>
																<option value="jne">JNE</option>
																<option value="pos">POS Indonesia</option>
																<option value="tiki">TIKI</option>
															</select>
														</div>
														<div class="form-group">
															<div id="kuririnfo" style="display: none;">


																<div class='alert alert-info' style='padding:5px; border-radius:0px; margin-bottom:0px'>Service</div>
																<br>
																<p class="form-control-static" id="kurirserviceinfo"></p>


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

													<!--begin: Wizard Actions-->
													<div class="d-flex justify-content-between border-top mt-5 pt-10">
														<div class="mr-2">
															<a href="<?= BASE ?>/front/checkout" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4">Previous</a>
														</div>
														<div>

															<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Submit</button>
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