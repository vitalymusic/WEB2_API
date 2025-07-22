<?= $this->extend('admin/layout') ?>

<?= $this->section('title') ?>
   <?= $title?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1><?= $title?></h1>
    <form method="post" action="">
    <div class="row">
      <!-- Available Courses -->
      <div class="col-md-6 mb-3">
        <label for="availableCourses" class="form-label">Pircēji</label>
        <select class="form-select" id="availableCustomers" name="customers">
          <option value="html">HTML Basics</option>
        </select>
      </div>

      <!-- Selected Courses (e.g. from a pre-filled list) -->
      <div class="col-md-6 mb-3">
        <label for="selectedCourses" class="form-label">Pieejamie produkti</label>
        <select class="form-select" id="selectedCourses" name="courses">
          <option value="react" selected>React Fundamentals</option>
        </select>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary btn-lg">Reģistrēt pakalpojumu</button>
    </div>
  </form>





    <script>
            // 1. Jaaizpilda lietotāju saraksts
            // 2. Jaaizpilda produktu saraksts saraksts
            // 3. Jāapstrādā formas darbība 
                

            function getCustomers(){
                  $.get('<?=base_url('/admin/getCustomers')?>',function(resp){

                  })  

            }

            function getProducts(){
                    $.get('<?=base_url('/admin/getProducts')?>',function(resp){
                        
                  }) 

            }



    </script>
  
    
<?= $this->endSection() ?>