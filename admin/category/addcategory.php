<?php


session_start();

require "../../lib/helper.php";

if (empty($_SESSION['user'])) {
  helper::redirect("../../login");
}

require "../../lib/db.php";

require "../../lib/category.php";
require "../../lib/validation.php";


$success = '';
$error = '';

if (isset($_POST['category'])) {

  $validation_res = Validation::string_empty($_POST['category']);


  if ($validation_res == false) {
    $category = new category;

    $res = $category->addnewcategory(
      ["name" => $_POST['category']]
    );

    if ($res) {
      $success = "Category inserted";
      helper::redirect("category", 1);   // note that here we use anonymous object
    } else {
      $success = "Category not inserted";
    }
  } else {
    $error = "Category input must be required";
  }
}

// echo strlen($success);die;









include "../header.php";

?>





<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Title</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">

      <?php if (strlen($success) > 0) : ?>
        <div class="alert alert-success" role="alert">
          <?= $success; ?>
        </div>
      <?php endif; ?>

      <?php if (strlen($error) > 0) : ?>
        <div class="alert alert-danger" role="alert">
          <?= $error; ?>
        </div>
      <?php endif; ?>

      <h2>Add Category:</h2>

      <form action="addcategory.php" method="POST">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Category name</label>
            <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Enter category name">
          </div>

          <!-- <div class="card-body"> -->
          <button type="submit" class="btn btn-primary">save</button>
          <!-- </div> -->





        </div>
      </form>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->






<?php include "../footer.php"; ?>