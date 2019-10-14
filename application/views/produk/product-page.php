<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('produk/_partials-heda.php') ?>
</head>

<body>

  <!-- Begin Nav -->
  <?php $this->load->view('produk/_partials-nav.php') ?>
  <!-- End Nav -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">
        <div class="col-md-12 text-center">

          <h4 class="my-4 h2"><?= $produk['nama_produk'] ?></h4>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->

        <!--Grid row-->
        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="<?= base_url('assets/images/produk/' . $produk['gambar_produk']) ?>" height="420" width="420" class="img-fluid" alt="">
          <!--  -->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <p class="lead font-weight-bold">Kategori
                <a href="">
                  <span class="badge red mr-1"><?= $produk['nama_cat'] ?></span>
                </a>
              </p>
              <p class="lead font-weight-bold">Tags
                <?php if (count($tags) > 1) : ?>
                  <?php foreach ($tags as $tag) : ?>
                    <a href="">
                      <span class="badge purple mr-1"><?= $tag['nama_tag'] ?></span>
                    </a>
                  <?php endforeach; ?>
                <?php else :  ?>
                  <a href="">
                    <span class="badge purple mr-1"><?= $tags['nama_tag'] ?></span>
                  </a>
                <?php endif; ?>
              </p>
            </div>
            <p class="lead font-weight-bold">Ukuran
              <?php foreach ($ukuranNew as $uk) : ?>
                <?= '<span class="badge green mr-1">' . $uk . '</span>'  ?>
              <?php endforeach; ?>
            </p>


            <p class="lead">
              <?php if ($produk['diskon'] != 0) { ?>
                <span class="mr-1" style="font-size: 100%;">
                  <del>Rp <?= number_format($produk['harga_produk'], 0, ',', '.') ?></del>
                </span>
                <span class="font-weight-bold blue-text" style="font-size: 100%;">
                  Rp <?= number_format($produk['harga_produk'] - $produk['harga_produk'] * $produk['diskon'] / 100, 0, ',', '.') ?>
                </span>
              <?php } else {  ?>
                <h4 class="font-weight-bold blue-text">Rp <?= number_format($produk['harga_produk'], 0, ',', '.') ?></h4>
              <?php } ?>
            </p>

            <p class="lead font-weight-bold">Deskripsi Produk</p>

            <p><?= $produk['ket_produk'] ?></p>

            <h6> <b>
                <?php
                if ($produk['stok'] != 0) {
                  echo 'Stok tersisa : ' . $produk['stok'];
                }
                ?>
              </b></h6>
            <form class="d-flex justify-content-left" action="<?= base_url('cart/tambahKeranjang') ?>" method="POST">
              <!-- Default input -->
              <?php if ($produk['stok'] != 0) { ?>
                <input type="number" name="qty" value="1" max="<?= $produk['stok'] ?>" aria-label="Search" class="form-control" style="width: 100px">
                <input hidden type="text" name="produk_nama" value="<?= $produk['nama_produk'] ?>">
                <input hidden type="text" name="produk_id" value="<?= decrypt_url($this->uri->segment('3')) ?>">
                <input hidden type="text" name="produk_harga" value="<?= $produk['harga_produk'] ?>">
                <input type="text" hidden name="gambar" value="<?= base_url('assets/images/produk/' . $produk['gambar_produk']) ?>">
                <button type="submit" name="submit" class="btn btn-primary btn-md my-0 p">Tambahkan ke keranjang
                  <i class="fas fa-shopping-cart ml-1"></i>
                </button>
            </form>
          <?php } else { ?>
            <a href="#" class="btn btn-danger btn-md my-0 p">Stok Barang Kosong</a>
          <?php } ?>
          </div>
          <!--Content-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <hr>
      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Foto Lainnya</h4>

          <!-- <p>dfsdfd.</p> -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <?php foreach ($fotoDll as $pic) : ?>
          <div class="col-lg-4 col-md-12 mb-4">

            <img src="<?= base_url('assets/images/produk/' . $pic) ?>" class="img-fluid" alt="">

          </div>
        <?php endforeach; ?>
        <!--Grid column-->
      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> HepiMart.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
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
  <!-- <script type="text/javascript" src="<?= base_url('assets/js/myJS/addToCart.js') ?>"></script> -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>