<?php $this->load->view('user/_partials/user_header') ?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('user/_partials/user_sidebar.php') ?>
    <!-- End Of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('user/_partials/user_navbar') ?>
            <!-- End of Topbar -->



            <!-- Begin Page Content -->
            <!-- KONTEN DI SINI -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

            </div>
            <!-- BATAS KONTEN -->
            <!-- /.container-fluid -->



        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php $this->load->view('user/_partials/user_copyright') ?>
        <!-- End Of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Footer -->
<?php $this->load->view('user/_partials/user_footer') ?>
<!-- End Of Footer -->