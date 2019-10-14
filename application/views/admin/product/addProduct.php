<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->

<head>
	<?php $this->load->view('admin/_partials/admin_header') ?>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<?php $this->load->view('admin/_partials/admin_headerMobile') ?>
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
			<?php $this->load->view('admin/_partials/admin_fullSidebar') ?>

			<!-- end:: Aside -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

				<!-- begin:: Header -->
				<?php $this->load->view('admin/_partials/admin_navbar') ?>
				<!-- end:: Header -->

				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

					<!-- begin:: Subheader -->
					<?php $this->load->view('admin/_partials/admin_subheader') ?>
					<!-- end:: Subheader -->

					<!-- begin:: Content -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						<div class="row">
							<div class="col-md-8">

								<!--begin::Portlet-->
								<div class="kt-portlet">
									<div class="kt-portlet__head">
										<div class="kt-portlet__head-label">
											<h3 class="kt-portlet__head-title">
												Form Add Products
											</h3>
										</div>
									</div>

									<?php if ($this->session->flashdata('message')) : ?>
										<?= $this->session->flashdata('message'); ?>
									<?php endif; ?>
									<!--begin::Form-->
									<form method="POST" action="<?= base_url('dashboard/admin/add_product') ?>" enctype="multipart/form-data">
										<div class="kt-portlet__body">
											<div class="form-group">
												<div class="alert alert-secondary" role="alert">
													<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
													<div class="alert-text">
														The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Name Produk</label>
												<?php $nama = $this->freeM->validInvalid('nama', 'submit') ?>
												<input name="nama" type="text" value="<?= set_value('nama') ?>" class="form-control  <?= $nama ?>">
												<?= form_error('nama', '<div class="invalid-feedback">', '</div>') ?>
											</div>
											<div class="form-group row">
												<div class="col-lg-6">
													<label for="exampleInputPassword1">Harga</label>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">
																Rp
															</span>
														</div>
														<?php $harga = $this->freeM->validInvalid('harga', 'submit') ?>
														<input type="number" name="harga" value="<?= set_value('harga') ?>" class="form-control <?= $harga ?>">
														<?= form_error('harga', '<div class="invalid-feedback">', '</div>') ?>
													</div>
												</div>
												<div class="col-lg-6">
													<label for="exampleInputPassword1">Diskon</label>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">
																%
															</span>
														</div>
														<?php $diskon = $this->freeM->validInvalid('diskon', 'submit') ?>
														<input type="number" name="diskon" value="<?= set_value('diskon', 0) ?>" class="form-control <?= $diskon ?>">
														<?= form_error('harga', '<div class="invalid-feedback">', '</div>') ?>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-lg-6">
													<label for="exampleInputPassword1">Stok</label>
													<?php $stok = $this->freeM->validInvalid('stok', 'submit') ?>
													<input type="number" name="stok" value="<?= set_value('stok', 100) ?>" class="form-control <?= $stok ?>">
													<?= form_error('harga', '<div class="invalid-feedback">', '</div>') ?>
												</div>
												<div class="col-lg-6">
													<label for="ukuran">Ukuran Tersedia</label>
													<select required multiple name="ukuran[]" class="form-control kt-select2" id="ukuran">
														<option value="tidak ada" <?= set_select('ukuran[]', 'tidak ada'); ?> selected>Tidak Ada</option>
														<option value="XS" <?= set_select('ukuran[]', 'XS'); ?>>XS</option>
														<option value="S" <?= set_select('ukuran[]', 'S'); ?>>S</option>
														<option value="M" <?= set_select('ukuran[]', 'M'); ?>>M</option>
														<option value="L" <?= set_select('ukuran[]', 'L'); ?>>L</option>
														<option value="XL" <?= set_select('ukuran[]', 'XL'); ?>>XL</option>
														<option value="XXL" <?= set_select('ukuran[]', 'XXL'); ?>>XXL</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-lg-6">
													<label for="exampleSelect1">Kategori Produk</label>
													<select name="kategori" required class="form-control" id="exampleSelect1">
														<option value="" selected> - </option>
														<?php foreach ($cat as $key) : ?>
															<option value="<?= $key['id_cat'] ?>" <?= set_select('kategori', $key['id_cat']); ?>><?= $key['nama_cat'] ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<div class="col-lg-6">
													<label for="exampleSelect1">Tags</label>
													<select required multiple name="tags[]" class="form-control kt-select2" id="kt_select2_11">
														<option value=""></option>
														<?php foreach ($tag as $key) : ?>
															<option value="<?= $key['id_tags'] ?>" <?= set_select('tags[]', $key['id_tags']); ?>><?= $key['nama_tag'] ?></option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="exampleTextarea">Description Product</label>
												<textarea minlength="20" required name="ket_produk" class="form-control" data-provide="markdown" rows="10"><?= set_value('ket_produk') ?></textarea>
											</div>
											<div class="form-group">
												<label>Choose Picture</label>
												<div></div>
												<div class="custom-file">
													<input type="file" required name="foto" class="custom-file-input" id="customFile">
													<label class="custom-file-label" for="customFile">No file selected</label>
												</div>
											</div>
											<div class="alert alert-warning" role="alert">
												<div class="alert-text text-center">
													Tambahkan gambar produk lainnya, yang akan ditampilkan di halaman produk itu sendiri.
												</div>
											</div>
											<div class="form-group row form-group-last">
												<div class="col-lg-4">
													<div class="input-group">
														<input type="file" required name="foto1" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">No file selected</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group">
														<input type="file" required name="foto2" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">No file selected</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group">
														<input type="file" required name="foto3" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">No file selected</label>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-portlet__foot kt-portlet__foot--solid">
											<div class="kt-form__actions kt-form__actions--right">
												<button type="submit" name="submit" class="btn btn-primary">Add Product</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
							</div>
							<div class="col-md-4">

								<!--begin:: Widgets/Best Sellers-->
								<div class="kt-portlet kt-portlet--height-fluid">
									<div class="kt-portlet__head">
										<div class="kt-portlet__head-label">
											<h3 class="kt-portlet__head-title">
												Best Sellers
											</h3>
										</div>
										<div class="kt-portlet__head-toolbar">
											<ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
														Latest
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
														Month
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
														All time
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="kt-portlet__body">
										<div class="tab-content">
											<div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
												<div class="kt-widget5">
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product27.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Great Logo Designn
																</a>
																<p class="kt-widget5__desc">
																	Metronic admin themes.
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Keenthemes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">19,200</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">1046</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product22.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Branding Mockup
																</a>
																<p class="kt-widget5__desc">
																	Metronic bootstrap themes.
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Fly themes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">24,583</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">3809</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product15.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Awesome Mobile App
																</a>
																<p class="kt-widget5__desc">
																	Metronic admin themes.Lorem Ipsum Amet
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Fly themes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">210,054</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">1103</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="kt_widget5_tab2_content">
												<div class="kt-widget5">
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product10.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Branding Mockup
																</a>
																<p class="kt-widget5__desc">
																	Metronic bootstrap themes.
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Fly themes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">24,583</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">3809</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product11.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Awesome Mobile App
																</a>
																<p class="kt-widget5__desc">
																	Metronic admin themes.Lorem Ipsum Amet
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Fly themes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">210,054</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">1103</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product6.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Great Logo Designn
																</a>
																<p class="kt-widget5__desc">
																	Metronic admin themes.
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Keenthemes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">19,200</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">1046</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="kt_widget5_tab3_content">
												<div class="kt-widget5">
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product11.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Awesome Mobile App
																</a>
																<p class="kt-widget5__desc">
																	Metronic admin themes.Lorem Ipsum Amet
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Fly themes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">210,054</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">1103</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product6.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Great Logo Designn
																</a>
																<p class="kt-widget5__desc">
																	Metronic admin themes.
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Keenthemes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">19,200</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">1046</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
													<div class="kt-widget5__item">
														<div class="kt-widget5__content">
															<div class="kt-widget5__pic">
																<img class="kt-widget7__img" src="./assets/media//products/product10.jpg" alt="">
															</div>
															<div class="kt-widget5__section">
																<a href="#" class="kt-widget5__title">
																	Branding Mockup
																</a>
																<p class="kt-widget5__desc">
																	Metronic bootstrap themes.
																</p>
																<div class="kt-widget5__info">
																	<span>Author:</span>
																	<span class="kt-font-info">Fly themes</span>
																	<span>Released:</span>
																	<span class="kt-font-info">23.08.17</span>
																</div>
															</div>
														</div>
														<div class="kt-widget5__content">
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">24,583</span>
																<span class="kt-widget5__sales">sales</span>
															</div>
															<div class="kt-widget5__stats">
																<span class="kt-widget5__number">3809</span>
																<span class="kt-widget5__votes">votes</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!--end:: Widgets/Best Sellers-->
							</div>
						</div>
					</div>
					<!-- end:: Content -->
				</div>

				<?php $this->load->view('admin/_partials/admin_footer') ?>
			</div>
		</div>
	</div>

	<!-- end:: Page -->

	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="fa fa-arrow-up"></i>
	</div>

	<!-- end::Scrolltop -->

	<?php $this->load->view('admin/_partials/admin_js') ?>
	<script src="./assets/js/myJS/addProduct.js" type="text/javascript"></script>
	<script src="./assets/js/demo1/pages/crud/forms/widgets/bootstrap-markdown.js" type="text/javascript"></script>
</body>

<!-- end::Body -->

</html>