<?php

session_start();

require "../../lib/helper.php";

if (empty($_SESSION['user'])) {
  helper::redirect("../../login");
}
require "../../lib/db.php";


require "../../lib/category.php";


// $id = $_GET['id'];

$category = new category;
$query = $category->deletecategory($_GET['id']);


if (mysqli_affected_rows($category->connection) > 0) {
  helper::redirect("category");
} else {
  echo "not deleted";
}
