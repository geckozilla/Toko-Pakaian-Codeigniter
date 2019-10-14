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
                            <div class="col-md-6">

                                <!--begin::Portlet-->
                                <div class="kt-portlet">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Form Tanbah Kategori
                                            </h3>
                                        </div>
                                    </div>

                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <?= $this->session->flashdata('message'); ?>
                                    <?php endif; ?>
                                    <!--begin::Form-->
                                    <form method="POST" action="">
                                        <div class=" kt-portlet__body">
                                            <div class="form-group form-group-last">
                                                <div class="alert alert-secondary" role="alert">
                                                    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                                    <div class="alert-text">
                                                        The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Name Kategori</label>
                                                <?php $nama_cat = $this->freeM->validInvalid('nama_cat', 'submit') ?>
                                                <input name="nama_cat" type="text" value="<?= set_value('nama_cat') ?>" class="form-control  <?= $nama_cat ?>">
                                                <?= form_error('nama_cat', '<div class="invalid-feedback">', '</div>') ?>
                                            </div>
                                            <div class="form-group form-group-last">
                                                <label>Keterangan Kategori</label>
                                                <?php $ket_cat = $this->freeM->validInvalid('ket_cat', 'submit') ?>
                                                <input name="ket_cat" type="text" value="<?= set_value('ket_cat') ?>" class="form-control  <?= $ket_cat ?>">
                                                <?= form_error('ket_cat', '<div class="invalid-feedback">', '</div>') ?>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__foot">
                                            <div class="kt-form__actions">
                                                <button type="submit" name="submit" class="btn btn-primary">Tambah Kategori</button>
                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Daftar Kategori
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">
                                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
                                                        Aktif
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
                                                        Tidak Aktif
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th class="text-center noExport">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($categoryAktif as $key) :  ?>
                                                            <tr>
                                                                <td><?= $key['id_cat'] ?></td>
                                                                <td><?= $key['nama_cat'] ?></td>
                                                                <td><?= $key['ket_cat'] ?></td>
                                                                <td class="text-center">
                                                                    <span class="dropdown">
                                                                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                                            <i class="la la-ellipsis-h"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <button class="dropdown-item btnNonaktif" onclick="set_url('<?= site_url('dashboard/admin/deactive_category/' . encrypt_url($key['id_cat']))  ?>')" data-ket="meng nonaktifkan" data-toggle="modal" data-target="#kt_modal_1"><i class="la la-edit"></i> Nonaktifkan Kategori</button>
                                                                            <button class="dropdown-item btnHapus" onclick="set_url('<?= site_url('dashboard/admin/delete_category/' . encrypt_url($key['id_cat']))  ?>')" data-ket="menghapus" data-toggle="modal" data-target="#kt_modal_1"><i class="la la-edit"></i> Hapus Kategori</button>
                                                                        </div>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="kt_widget5_tab2_content">
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th class="text-center noExport">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($categoryNonaktif as $key) :  ?>
                                                            <tr>
                                                                <td><?= $key['id_cat'] ?></td>
                                                                <td><?= $key['nama_cat'] ?></td>
                                                                <td><?= $key['ket_cat'] ?></td>
                                                                <td class="text-center">
                                                                    <span class="dropdown">
                                                                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                                                            <i class="la la-ellipsis-h"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <button class="dropdown-item btnAktif" onclick="set_url('<?= site_url('dashboard/admin/reactive_category/' . encrypt_url($key['id_cat']))  ?>')" data-ket="mengaktifkan" data-toggle="modal" data-target="#kt_modal_1"><i class="la la-edit"></i> Aktifkan Kategori</button>
                                                                            <button class="dropdown-item btnHapus1" onclick="set_url('<?= site_url('dashboard/admin/delete_category/' . encrypt_url($key['id_cat']))  ?>')" data-ket="menghapus" data-toggle="modal" data-target="#kt_modal_1"><i class="la la-edit"></i> Hapus Kategori</button>
                                                                        </div>
                                                                    </span>
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
                    <p id="ket_modal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a class="fixHapus"><button class="btn btn-danger" type="button">Setuju</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->
    <?php $this->load->view('admin/_partials/admin_js') ?>
    <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="./assets/js/myJS/dataCategory.js" type="text/javascript"></script>
    <script>
        function set_url(url) {
            $('.fixHapus').attr('href', url);
        }
        $(document).ready(function() {
            $('.btnAktif').click(function() {
                const ket = $(this).attr('data-ket');
                $('#ket_modal').text('Anda yakin ingin ' + ket + ' data kategori ini?');
            });
            $('.btnHapus').click(function() {
                const ket = $(this).attr('data-ket');
                $('#ket_modal').text('Anda yakin ingin ' + ket + ' data kategori ini?');
            });
            $('.btnHapus1').click(function() {
                const ket = $(this).attr('data-ket');
                $('#ket_modal').text('Anda yakin ingin ' + ket + ' data kategori ini?');
            });
            $('.btnNonaktif').click(function() {
                const ket = $(this).attr('data-ket');
                $('#ket_modal').text('Anda yakin ingin ' + ket + ' data kategori ini?');
            });
        });
    </script>
</body>

<!-- end::Body -->

</html>