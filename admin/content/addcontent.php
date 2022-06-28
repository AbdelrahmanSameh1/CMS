<?php


session_start();

require "../../lib/helper.php";

if (empty($_SESSION['user'])) {
  helper::redirect("../../login");
}

require "../../lib/db.php";

require "../../lib/category.php";
require "../../lib/content.php";
require "../../lib/validation.php";


$success = '';
$error = '';



$category = new category;
$categorydata = $category->selectcategories();




if (isset($_POST['name'])) {

  $validation_res = Validation::string_empty($_POST['name'], $_POST['short_desc'], $_POST['desc'], $_POST['category'], $_FILES['cover']['name']);

  if ($validation_res == false) {

    $name = $_POST['name'];
    $short_desc = $_POST['short_desc'];
    $desc = addslashes($_POST['desc']);      // note this function ... to skip some characters in the text to avoid errors in database
    $category = $_POST['category'];
    $image_name = $_FILES['cover']['name'];
    $img_tmp = $_FILES['cover']['tmp_name'];

    move_uploaded_file($img_tmp, "../../design/upload/" . $image_name);




    $content = new content;
    $userid = $_SESSION['user']['id'];


    // print_r($userid['id']);       // these lines was for debugging
    // die;
    // echo "<pre>";
    // // print_r($_SESSION['user']['id']);die;
    // echo "</pre>";


    $res = $content->addnewcontent([
      "title" => $name,
      "cover" => $image_name,
      "short_desc" => $short_desc,
      "main_content" => $desc,
      "user_id" => $userid['id'],
      "category_id" => $category
    ]);

    if (!empty($res)) {
      $success = "Content added successfully";
      helper::redirect("content", 1);
    } else {
      $error = "Content not added";
    }
  } else {
    $error = "Please enter all of the fields";
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

      <h2>Add Content:</h2>

      <form action="addcontent.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Short Description</label>
            <input type="text" name="short_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter short description">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea id="summernote" name="desc"></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Cover</label>
            <input type="file" name="cover" class="form-control" id="exampleInputEmail1" placeholder="Enter short description">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select name="category">
              <?php foreach ($categorydata as $category) : ?>
                <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
              <?php endforeach; ?>
            </select>
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