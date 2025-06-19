<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $this->renderSection('title') ?></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="<?=base_url()?>/js/script1.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>/css/admin.css">


</head>
<body>

    <nav class="sidebar d-flex flex-column p-3">
    <h4 class="text-white">Admin Panelis</h4>
    <hr class="text-white" />
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?=base_url('/admin')?>" 
        class="nav-link <?= $active_page=="index"?"active":"" ?>">📊 Pārskats</a>
      </li>
      <li>
        <a href="<?=base_url('/admin/users')?>" class="nav-link <?= $active_page=="users"?"active":"" ?>">👥 Lietotāji</a>
      </li>
      <li>
        <a href="<?=base_url('/admin/posts')?>" class="nav-link <?= $active_page=="posts"?"active":"" ?>">📦 Ziņas</a>
      </li>
      <li>
        <a href="<?=base_url('/admin/gallery')?>" class="nav-link <?= $active_page=="gallery"?"active":"" ?>">📝 Galerija</a>
      </li>
      <li>
        <a href="#" class="nav-link">⚙️ Iestatījumi</a>
      </li>
    </ul>
    <hr class="text-white" />
    <a href="#" class="text-white">🚪 Atslēgties</a>
  </nav>

  <div class="main-content">

    <?= $this->renderSection('content') ?>

  </div>

</body>
</html>