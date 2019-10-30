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
    <li class="nav-item <?= ($this->uri->segment(1) == 'home' OR $this->uri->segment(1) == '') ? 'active' :''; ?>">
      <a class="nav-link" href="<?= base_url('home') ?>">All
      </a>
    </li>
    <?php foreach($cat as $key): ?>
    <li class="nav-item <?= ($this->uri->segment(4) == strtolower($key['nama_cat'])) ? 'active' :''; ?>">
      <a class="nav-link" href="<?= base_url('produk/cari/kategori/'.strtolower($key['nama_cat'])) ?>"><?= $key['nama_cat'] ?>      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  <!-- Links -->

      <div class="md-form my-0">
        <input class="form-control" id="keyword" type="text" autocomplete="off" placeholder="Nama Produk.." aria-label="Search">
      </div>
      <a id="gasCari" class="text-muted" href="" ><button class="btn btn-outline-white btn-md my-0 ml-sm-2" id="btnCari" type="submit">Cari</button></a>


</div>
<!-- Collapsible content -->

</nav>
<script>
  $('#keyword').on('input', function() {
    let a = $('#keyword').val();
    $('#gasCari').attr('href',"<?= base_url('produk/cari_produk/') ?>" + a);
  });
  // $('#btnCari').click(function(){

  // })
  
</script>