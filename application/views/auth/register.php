<?php $this->load->view("auth/auth_header") ?>
<?php $this->load->view("auth/auth_nav") ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form class="user" action="<?= base_url('auth/register') ?>" method="POST">
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" name="fname" class="form-control form-control-user" value="<?= set_value('fname') ?>" id="fname" placeholder="First Name">
                  <?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="text" name="lname" value="<?= set_value('lname') ?>" class="form-control form-control-user" id="lname" placeholder="Last Name">
                  <?= form_error('lname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control form-control-user" id="email" placeholder="Email Address">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Repeat Password">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
              <hr>
              <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Register with Google
              </a>
              <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
              </a>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/login') ?>">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("auth/auth_footer") ?>