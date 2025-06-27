<?= $this->extend('admin/layout') ?>

<?= $this->section('title') ?>
  Galerija
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Galerija</h1>

    <div class="container mt-5">
    <h3>Augšupielādē failu</h3>
    <form action="" method="POST" enctype="multipart/form-data" id="file_upload">
      <div class="mb-3">
        <label for="formFile" class="form-label">Izvēlies failu</label>
        <input class="form-control" type="file" id="formFile" name="file" accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Augšupielādēt</button>
    </form>
  </div>
  <hr>
  <div>
    Failu saraksts šeit!!!
  </div>


  <script>
    $(document).ready(()=>{
        $('#file_upload').on('submit',(e)=>{
            e.preventDefault();
            let data = new FormData(document.querySelector('#file_upload'));

         $.ajax({
            url: '<?=base_url('admin/gallery/upload')?>',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                // Piemēram: parādi ziņu vai atiestati formu
            },
            error: function(xhr, status, error) {
                console.error('Kļūda:', error);
            }
        });
        })
    })
  </script>
       
<?= $this->endSection() ?>