<?= $this->extend('admin/layout') ?>

<?= $this->section('title') ?>
    Lietotāji
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Lietotāji</h1>
    <?= $users ?>
    
<?= $this->endSection() ?>