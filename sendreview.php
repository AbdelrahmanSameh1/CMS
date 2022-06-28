<?php

require "lib/db.php";
require "lib/review.php";


$name = $_POST['name'];
$email = $_POST['email'];
$review = $_POST['review'];
$content_id = $_POST['content_id'];

// print_r($name);


$reviewobj = new review;

$result = $reviewobj->addreview([
  "name" => $name,
  "email" => $email,
  "content" => $review,
  "content_id" => $content_id
]);

echo $result;
