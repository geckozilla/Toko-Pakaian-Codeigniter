<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

<!-- Navbar brand -->
<span class="navbar-brand">Categories:</span>

<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item <?= ($this->uri->segment(1) == 'welcome' OR $this->uri->segment(1) == '') ? 'active' :''; ?>">
      <a class="nav-link" href="<?= base_url('welcome') ?>">All
      </a>
    </li>
    <?php foreach($cat as $key): ?>
    <li class="nav-item <?= ($this->uri->segment(4) == strtolower($key['nama_cat'])) ? 'active' :''; ?>">
      <a class="nav-link" href="<?= base_url('produk/cari/kategori/'.strtolower($key['nama_cat'])) ?>"><?= $key['nama_cat'] ?>      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <!-- Links -->

  <form class="form-inline">
    <div class="md-form my-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    </div>
  </form>
</div>
<!-- Collapsible content -->

</nav>