<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('produk/_partials-heda.php') ?>
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
  </style>
</head>

<body>
  <!-- Begin Nav -->
  <?php $this->load->view('produk/_partials-nav.php') ?>
  <!-- End Nav -->

  <!--Carousel Wrapper-->

  <!--/.Carousel Wrapper-->
  <br><br>
  <!--Main layout-->
  <main class="mt-5">
    <div class="container">

      <!--Navbar-->
      <?php $this->load->view('produk/_partials-cat') ?>
      <!--/.Navbar-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <?php foreach ($produk as $item) : ?>
            <!--Grid column-->

            <div class="col-lg-3 col-md-6 mb-4">
              <!--Card-->

              <div class="card">

                <!--Card image-->
                <div class="view overlay">
                  <img src="<?= base_url('assets/images/produk/' . $item['gambar_produk']) ?>" class="card-img-top" alt="">
                  <a>
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>
                <!--Card image-->
                <!--Card content-->
                <div class="card-body text-center">
                  <!--Category & Title-->
                  <a href="<?= base_url('produk/kategori/' . $item['nama_cat']) ?>" class="grey-text">
                    <h5><?= ucfirst($item['nama_cat']) ?></h5>
                  </a>
                  <h5>
                    <strong>
                      <a href="<?= base_url('produk/detail/' . encrypt_url($item['unik_produk'])) ?>" class="dark-grey-text"><?= ucwords($item['nama_produk']) ?>
                        <span class="badge badge-pill danger-color">Disc</span>
                      </a>
                    </strong>
                  </h5>

                  <h4 class="font-weight-bold blue-text">
                    <strong>Rp <?= number_format($item['harga_produk'] - $item['harga_produk'] * $item['diskon'] / 100, 0, ',', '.') ?></strong>
                  </h4>
                </div>
                <!--Card content-->
              </div>
              <!--Card-->
            </div>

            <!--Grid column-->
          <?php endforeach; ?>


        </div>
        <!--Grid row-->

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">
        <?= $pagination ?>
        </ul>
      </nav>
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->

  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>