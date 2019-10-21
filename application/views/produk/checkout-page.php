<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('produk/_partials-heda.php') ?>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>assets/SBAdmin2/select2/dist/css/select2.min.css">
  <script src="<?= base_url() ?>assets/SBAdmin2/select2/dist/js/select2.min.js"></script>   
  <script src="<?= base_url() ?>assets/SBAdmin2/select2/dist/js/i18n/id.js"></script> 
</head>

<body>
<style>
footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>
  <!-- Begin Nav -->
  <?php $this->load->view('produk/_partials-nav.php') ?>
  <!-- End Nav -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

              <!--Card content-->
              <form class="card-body" id="ongkir" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-3">Kota Tujuan</label>
                <div class="col-sm-12">          
                  <select class="form-control" id="kota_tujuan" name="kota_tujuan" required>
                    <option></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Kurir</label>
                <div class="col-sm-12">          
                  <select class="form-control" id="kurir" name="kurir" required>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS INDONESIA</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Berat (Kg)</label>
                <div class="col-sm-12">          
                  <input type="text" class="form-control" id="berat" name="berat" required="" value='1' readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Service</label>
                <div class="col-sm-12" id="response_ongkir">          
                  <select class="form-control serviceRO" disabled="true">
                    <option value="pilih"></option>
                  </select>
                </div>
              </div>
              <div class="form-group">        
                <div class="col-sm-offset-3 col-sm-8">
                  <button type="submit" id="cekOngkir" class="btn btn-default">Cek</button>
                </div>
              </div>
            </form>
            <!-- <div class="col-md-7" id="response_ongkir"> -->
          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed" id="cartOngkir">
              <div class="text-primary">
                <h6 class="my-0" id="ROkurir"><strong>Biaya Kirim</strong></h6>
                <small id="ROest"></small>
              </div>
              <span  class="text-primary" id="ROcost"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
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
 
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
  <!-- Select2 -->

  <script src="<?= base_url('assets/js/') ?>Ongkir.js"></script>
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>