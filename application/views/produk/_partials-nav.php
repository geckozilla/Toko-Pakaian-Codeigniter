  <!-- Navbar -->
  <style>
    .dropdown-menu {
      width: 750px !important;
      /* height: 400px !important; */
    }
  </style>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?= base_url('home') ?>">
        <strong class="blue-text">Home</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect" href="<?= base_url('contact') ?>" target="_blank">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="<?= base_url('about') ?>" target="_blank">About
            </a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link waves-effect" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-shopping-cart"></i>
                <span class="clearfix d-none d-sm-inline-block"> Keranjang </span>
                <span class="badge red z-depth-1 mr-1"> <?= count($this->cart->contents()); ?> </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="card-body">
                  <!-- Shopping cart table -->
                  <?php if (count($this->cart->contents()) != 0) : ?>
                    <div class="table-responsive mb-0">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            <th scope="col" class="border-0 bg-light">
                              <div class="p-2 px-3 text-uppercase">Produk</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Harga</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Jumlah</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Sub Total</div>
                            </th>
                            <th scope="col" class="border-0 bg-light text-center">
                              <div class="py-2 text-uppercase">Aksi</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody id="detail_cart">
                          <?php foreach ($this->cart->contents() as $items) : ?>
                            <tr>
                              <th scope="row">
                                <div class="p-2">
                                  <img src="<?= $items['gambar'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                  <div class="ml-3 d-inline-block align-middle">
                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><?= $items['name'] ?></a></h5><span class="text-muted font-weight-normal font-italic">Category: Fashion</span>
                                  </div>
                                </div>
                              </th>
                              <td class="align-middle"><strong>Rp <?= number_format($items['price'], 0, ',', '.') ?></strong></td>
                              <td class="align-middle text-center"><strong><?= $items['qty'] ?></strong></td>
                              <td class="align-middle text-center"><strong>Rp <?= number_format($items['subtotal'], 0, ',', '.') ?></strong></td>
                              <td class="align-middle text-center"><a href="<?= base_url('cart/hapus_items/' . $items['rowid']) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                          <?php endforeach; ?>
                          <tr>
                            <td colspan="4" class="align-middle text-right"><span class="badge badge-info">
                                <h5>
                                  Rp <?= number_format($this->cart->total(), 0, ',', '.') ?></h5>
                                </<span>
                            </td>
                            <td><a href="<?= base_url('produk/checkout') ?>"><button class="btn btn-primary btn-md float-right">Bayar</button></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  <?php else : ?>
                    <h3 class="text-center">Keranjang Belanja Kosong!</h3>
                  <?php endif; ?>
                </div>
              </div>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <?php
          if (!$this->session->has_userdata('email')) {
            echo
              '<li class="nav-item mr-2">'; ?>
            <a href="<?= base_url('auth/register') ?>" class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Register
            </a>
          <?= '</li>';
          } ?>
          <?php
          if ($this->session->has_userdata('email')) {
            echo
              '<li class="nav-item mr-2">'; ?>
            <a href="
              <?= ($this->session->level == 'Member') ?  base_url('dashboard/customers') : base_url('dashboard/admin')
                ?>" class="nav-link border border-light rounded waves-effect" target="_blank">
              <i class="fab fa-github mr-2"></i>Dashboard
            </a>
          <?= '</li>';
          } ?>
          <?php
          if ($this->session->has_userdata('email')) {
            echo
              '<li class="nav-item ">'; ?>
            <a href=" <?= base_url('auth/logout') ?> " class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Logout
            </a>
          <?= '</li>';
          } else {
            echo '<li class="nav-item ">'; ?>
            <a href="<?= base_url('auth/login') ?>" class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Login
            </a>
          <?= '</li>';
          }

          ?>

        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->