<!DOCTYPE html>
<html lang="en">
  <head>
	<?php $this->load->view('admin/_partials/admin_header') ?>
	  <!-- bootstrap-wysiwyg -->
		<link href="<?= base_url('assets/gentelella/') ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
		<link href="<?= base_url('assets/gentelella/') ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('welcome') ?>" class="site_title"><i class="fa fa-paw"></i> <span> Toko Millano</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info & nama toko -->
				<?php $this->load->view('admin/_partials/admin_pp') ?>
            <!-- /menu profile quick info & nama toko -->

            <br/>

            <!-- sidebar menu -->
			<?php $this->load->view('admin/_partials/admin_sidebar') ?>
            <!-- /sidebar menu -->

          </div>
        </div>
        <!-- top navigation -->
		<?php $this->load->view('admin/_partials/admin_topnav') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> <!-- Mulai Konten -->
			<div class="">
			<div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>
              <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message'); ?>
              <?php endif; ?>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
						<div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Produk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start form for validation -->
										<form method="POST" action="<?= base_url('dashboard/admin/add_product') ?>" enctype="multipart/form-data">
											<div class="row">
												<div class='col-sm-6'>
													Nama Produk
													<div class="form-group">
														<div class='input-group date' id='myDatepicker'>
															<input name="nama" type="text" value="<?= set_value('nama') ?>" class="form-control" />
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>

												<div class='col-sm-6'>
													Harga Produk
													<div class="form-group">
														<div class='input-group date' id='myDatepicker2'>
															<input type="number" name="harga" value="<?= set_value('harga') ?>" class="form-control" />
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
												
												<div class='col-sm-4'>
													Stok Awal
													<div class="form-group">
														<div class='input-group date' id='myDatepicker3'>
															<input type="number" name="stok" value="<?= set_value('stok', 100) ?>" class="form-control" />
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
												
												<div class='col-sm-4'>
													Diskon <small>Dalam % (persen)</small>
													<div class="form-group">
														<div class='input-group date' id='myDatepicker4'>
															<input type="number" name="diskon" value="<?= set_value('diskon', 0) ?>" class="form-control"/>
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>

												<div class='col-sm-4'>
													Foto Produk
													<div class="form-group">
														<div class='input-group date' id='myDatepicker4'>
															<input type="file" required name="foto" class="form-control"/>
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
												
												<div class='col-sm-4'>
													Ukuran Tersedia
													<div class="form-group">
														<div class='input-group'>
															<select required multiple="multiple" name="ukuran[]" class="form-control ukuran">
																<option value="tidak ada" <?= set_select('ukuran[]', 'tidak ada'); ?>>Tidak Ada</option>
																<option value="XS" <?= set_select('ukuran[]', 'XS'); ?>>XS</option>
																<option value="S" <?= set_select('ukuran[]', 'S'); ?>>S</option>
																<option value="M" <?= set_select('ukuran[]', 'M'); ?>>M</option>
																<option value="L" <?= set_select('ukuran[]', 'L'); ?>>L</option>
																<option value="XL" <?= set_select('ukuran[]', 'XL'); ?>>XL</option>
																<option value="XXL" <?= set_select('ukuran[]', 'XXL'); ?>>XXL</option>
															</select>
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
												<div class='col-sm-4'>
													Kategori Produk
													<div class="form-group">
														<div class='input-group'>
															<select name="kategori" required class="form-control kategori">
																<option value="" selected> Pilih </option>
																<?php foreach ($cat as $key) : ?>
																	<option value="<?= $key['id_cat'] ?>" <?= set_select('kategori', $key['id_cat']); ?>><?= $key['nama_cat'] ?></option>
																<?php endforeach; ?>
															</select>
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
												<div class='col-sm-4'>
													Tags Produk
													<div class="form-group">
														<div class='input-group'>
															<select required multiple name="tags[]" class="form-control tags">
																<option value=""></option>
																<?php foreach ($tag as $key) : ?>
																	<option value="<?= $key['id_tags'] ?>" <?= set_select('tags[]', $key['id_tags']); ?>><?= $key['nama_tag'] ?></option>
																<?php endforeach; ?>
															</select>
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="row">
											<div class="x_panel">
												<div class="x_title">
													<h2>Keterangan Produk<small>Jelaskan sejelas mungkin</small></h2>
													<ul class="nav navbar-right panel_toolbox">
														<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
														</li>
													</ul>
													<div class="clearfix"></div>
												</div>
												<div class="x_content">
												<textarea id="message" required="required" class="form-control" 
												name="ket_produk" data-parsley-trigger="keyup" data-parsley-minlength="20" 
												data-parsley-maxlength="100" data-parsley-minlength-message="Deskripsi kan sejelas mungkin.." 
												data-parsley-validation-threshold="10"><?= set_value('ket_produk') ?></textarea>
												</div>
											</div>
										</div>
										</div>
										<div class="row">
											<div class="col-md-12 col-xs-12">
												<div class="x_panel">
													<div class='col-sm-4'>
														Foto 1
														<div class="form-group">
															<div class='input-group date' id='myDatepicker'>
																<input type="file" required name="foto1" class="form-control" />
																<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
													</div>

													<div class='col-sm-4'>
														Foto 2
														<div class="form-group">
															<div class='input-group date' id='myDatepicker2'>
																<input type="file" required name="foto2" class="form-control" />
																<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
													</div>
													<div class='col-sm-4'>
														Foto 3
														<div class="form-group">
															<div class='input-group date' id='myDatepicker2'>
																<input type="file" required name="foto3" class="form-control" />
																<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-center"> 
											<button type="submit" name="submit" class="btn btn-success">Tambahkan Produk</button>
										</div>
										</form>
                    <!-- end form for validations -->
                  </div>
                </div>
              </div>
						</div>
			</div>
        </div> <!-- Selesai Konten -->
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('admin/_partials/admin_footer'); ?>
        <!-- /footer content -->
      </div>
	</div>
	<?php $this->load->view('admin/_partials/admin_js') ?>
    <!-- bootstrap-wysiwyg -->
		<script src="<?= base_url('assets/gentelella/') ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
		<script src="<?= base_url('assets/gentelella/') ?>vendors/google-code-prettify/src/prettify.js"></script>
		<!-- jQuery Tags Input -->
		<script src="<?= base_url('assets/gentelella/') ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
		<!-- Select2 -->
		<script src="<?= base_url('assets/gentelella/') ?>vendors/select2/dist/js/select2.full.min.js"></script>


		<script>
			$(document).ready(function() {
				$('.ukuran').select2({
					allowClear:true,
					placeholder: 'Pilih'
					});
					$('.tags').select2({
					allowClear:true,
					placeholder: 'Pilih'
					});
			});
		</script>
  </body>
</html>