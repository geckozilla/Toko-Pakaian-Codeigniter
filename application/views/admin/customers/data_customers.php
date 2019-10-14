<!DOCTYPE html>
<html lang="en">
  <head>
	<?php $this->load->view('admin/_partials/admin_header') ?>
	    <!-- Datatables -->
		<link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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
						<div class="row top_tiles">
						<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
							<div class="count">179</div>
							<h3>New Sign ups</h3>
							<p>Lorem ipsum psdea itgum rixt.</p>
							</div>
						</div>
						<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-comments-o"></i></div>
							<div class="count">179</div>
							<h3>New Sign ups</h3>
							<p>Lorem ipsum psdea itgum rixt.</p>
							</div>
						</div>
						<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
							<div class="count">179</div>
							<h3>New Sign ups</h3>
							<p>Lorem ipsum psdea itgum rixt.</p>
							</div>
						</div>
						<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-check-square-o"></i></div>
							<div class="count">179</div>
							<h3>New Sign ups</h3>
							<p>Lorem ipsum psdea itgum rixt.</p>
							</div>
						</div>
						</div>
						<?php if ($this->session->flashdata('message')) : ?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
            <div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="x_panel">
										<div class="x_title">
											<h2>Data Pelanggan</h2>
											<ul class="nav navbar-right panel_toolbox">
												<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
										<div class="x_content">
											<p class="text-muted font-13 m-b-30">
												The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
											</p>
											<table id="datatable-keytable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable-keytable_info" style="position: relative;">
												<thead>
													<tr>
														<th style="width:5%;">ID</th>
														<th>Name</th>
														<th>Email</th>
														<th class="text-center" style="width:8%;">Active</th>
														<th>Date Created</th>
														<th class="text-center" style="width:8%;">Status</th>
														<th class="text-center">Actions</th>
													</tr>
												</thead>


												<tbody>
												<?php
												foreach ($customers as $key) :  ?>
													<tr>
														<td><?= $key['id_user'] ?></td>
														<td><?= $key['nama'] ?></td>
														<td><?= $key['email'] ?></td>
														<td class="text-center"><?= ($key['is_active'] == 1)? '<span class="label label-info">Aktif</span>' : '<span class="label label-warning">Tidak Aktif</span>' ; ?></td>
														<td><?= date('d M Y h:i', $key['create_date']) ?></td>
														<td class="text-center"><?= ($key['last_login'] - time() + 7200 > 0) ? '<span class="label label-success">Online</span>' : '<span class="label label-default">Offline</span>'; ?></td>
														<td class="text-center">
																<li role="presentation" class="dropdown" style="list-style: none;">
																	<a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
																		Pilih
																		<span class="caret"></span>
																	</a>
																	<ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
																		<li role="presentation"><a role="menuitem" tabindex="-1" href="#" onclick="set_url('<?= site_url('dashboard/admin/delete_customers/' . encrypt_url($key['id_user']))  ?>')" 
																		id="btnHapus" data-toggle="modal" data-target="#kt_modal_1">Hapus Pelanggan</a>
																		</li>
																		<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Detail Pelanggan</a>
																		</li>
																		<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Edit Pelanggan</a>
																		</li>
																	</ul>
																</li>
														</td>
													</tr>
												<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
						</div>
					</div>
        </div> <!-- Selesai Konten -->
        <!-- /page content -->
				<!--begin::Modal-->
				<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								</button>
							</div>
							<div class="modal-body">
								<p>Anda yakin ingin menghapus data Pelanggan ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<a class="fixHapus"><button class="btn btn-danger" type="button">Hapus</button></a>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal-->
        <!-- footer content -->
        <?php $this->load->view('admin/_partials/admin_footer'); ?>
        <!-- /footer content -->
      </div>
	</div>
	<?php $this->load->view('admin/_partials/admin_js') ?>
	<!-- Datatables -->
	<script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/pdfmake/build/pdfmake.min.js"></script>
		<script src="<?= base_url('assets/gentelella/') ?>vendors/pdfmake/build/vfs_fonts.js"></script>
		<script>
			function set_url(url) {
				$('.fixHapus').attr('href', url);
			}
		</script>
  </body>
</html>