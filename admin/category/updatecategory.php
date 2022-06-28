<?php

session_start();

require "../../lib/helper.php";

if (empty($_SESSION['user'])) {
  helper::redirect("../../login");
}

require "../../lib/db.php";


require "../../lib/category.php";
require "../../lib/validation.php";





$id = $_GET['id'];

if (isset($_GET['id'])) {
  $category = new category;
  $row = $category->selectcategory($id);
}


if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $newName = $_POST['name'];


  $query = $category->updatecategory($id, ["name" => "$newName"]);
  // echo $category->sql;die;






  if (mysqli_affected_rows($category->connection) > 0) {
    helper::redirect("category", 1);
  } else {
    echo "Not Updated";
  }
}



include "../header.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>





  <form action="updatecategory.php?id=<?= $_GET['id']; ?>" method="post">


    <div class="card-body">

      <input type="hidden" name="id" value="<?= $id; ?>">

      <div class="form-group">
        <label for="exampleInputEmail1">ID</label>
        <input type="number" name="id" value="<?= $row['id']; ?>" class="form-control" id="exampleInputEmail1" disabled>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">The New Name</label>
        <input type="text" name="name" value="<?= $row['name']; ?>" class=" form-control" id="exampleInputPassword1" placeholder="Enter the new name">
      </div>


    </div>

    <div class="card-footer">
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </div>




  </form>



  <?php include "../footer.php"; ?>


</body>

</html>