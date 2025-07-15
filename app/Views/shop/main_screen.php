<?= $this->extend('shop/layout') ?>

<?= $this->section('content') ?>
  <div class="text-center">
  <h1>Welcome to MyShop</h1>
  <p>Discover the best deals on our platform!</p>
</div>

<div class="row mt-4">
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
<?= $this->endSection() ?>