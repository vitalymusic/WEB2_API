<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="<?=base_url()?>/js/shop.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>/css/shop.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url('/veikals')?>">Veikals</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?=base_url('/veikals')?>">Sākums</a></li>
        <li class="nav-item"><a class="nav-link" href="<?=base_url('/veikals/mani_produkti')?>">Mani produkti</a></li>
        <li class="nav-item"><a class="nav-link" href="<?=base_url('/veikals/grozs')?>">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="<?=base_url('/veikals/login')?>">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
    

  <div class="main-content">

    <?= $this->renderSection('content') ?>

  </div>


  <footer class="bg-dark text-white text-center py-3 mt-4">
  <div class="container">
    &copy; <?= date('Y') ?> MyShop. All rights reserved.
  </div>
</footer>
</body>
</html>