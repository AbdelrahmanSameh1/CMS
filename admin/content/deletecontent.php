<?php

session_start();

require "../../lib/helper.php";

if (empty($_SESSION['user'])) {
  helper::redirect("../../login");
}
require "../../lib/db.php";


require "../../lib/content.php";

// $id = $_GET['id'];

$content = new content;
$query = $content->deletecontent($_GET['id']);


if (mysqli_affected_rows($content->connection) > 0) {
  helper::redirect("content");
} else {
  echo "not deleted";
}
