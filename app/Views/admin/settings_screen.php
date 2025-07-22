<?= $this->extend('admin/layout') ?>

<?= $this->section('title') ?>
   <?= $title?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1><?= $title?></h1>
    <form method="post" action="/register">
    <div class="row">
      <!-- Available Courses -->
      <div class="col-md-6 mb-3">
        <label for="availableCourses" class="form-label">Available Courses</label>
        <select multiple class="form-select" id="availableCourses" name="available_courses[]">
          <option value="html">HTML Basics</option>
          <option value="css">CSS Styling</option>
          <option value="js">JavaScript Intro</option>
          <option value="bootstrap">Bootstrap 5</option>
        </select>
        <div class="form-text">Hold Ctrl (or Cmd) to select multiple options.</div>
      </div>

      <!-- Selected Courses (e.g. from a pre-filled list) -->
      <div class="col-md-6 mb-3">
        <label for="selectedCourses" class="form-label">Your Selected Courses</label>
        <select multiple class="form-select" id="selectedCourses" name="selected_courses[]">
          <option value="react" selected>React Fundamentals</option>
          <option value="nodejs" selected>Node.js Basics</option>
        </select>
        <div class="form-text">Pre-selected courses you’ve chosen before.</div>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-4">
      <button type="submit" class="btn btn-primary btn-lg">Register</button>
    </div>
  </form>





    <script>


    </script>
  
    
<?= $this->endSection() ?>