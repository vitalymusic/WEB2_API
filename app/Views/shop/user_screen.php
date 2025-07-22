<?= $this->extend('shop/layout') ?>

<?= $this->section('content') ?>
  <div class="text-center">
  <h1>Welcome <?= session()->name?></h1>
  <p>Discover the best deals on our platform!</p>
</div>

<div class="row m-4 ">
  <!-- Example Product Cards -->
  <?php foreach ($products as $product): ?>
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="<?= base_url('uploads/' . $product['image']) ?>" class="card-img-top" alt="<?= esc($product['name']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= esc($product['name']) ?></h5>
          <p class="card-text">€<?= number_format($product['price'], 2) ?></p>
          <a href="/product/<?= $product['id'] ?>" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>



<!-- Login page -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to MyShop</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="customerForm">
        <div class="modal-body">
          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Login</button>
          <p class="text-center mt-2 small">Don't have an account? <a href="<?= base_url('register') ?>">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Login page -->

<script>

   var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));

  function showUserLogin(){
      loginModal.show();
  }


// formas apstrāde


$('#customerForm').submit((e)=>{
  e.preventDefault();
  data = $('#customerForm').serialize();
  $.post('<?= base_url('veikals/login')?>',data,function(data){
    console.log(data);
    if(data.message=="success"){
      loginModal.hide();
    }
  });


})
</script>
<?= $this->endSection() ?>