<?php

class Validation
{



  public static function string_empty(...$input)    // this function validate if the string empty or not because we shouldn't add an empty category to the database
  {
    $i = 0;
    $result = "true";
    while ($i < count($input)) {
      // echo count($input);die;
      $input[$i] = trim($input[$i], " ");
      $input[$i] = (strlen($input[$i]) == 0) ? true : false;
      if ($input[$i] == true) {
        return true;
      }
      $result = $input[$i];
      $i++;
    }
    return $result;


    // $input[$i] = trim($input[$i], " ");          
    // $input = (strlen($input) == 0) ? true : false;
    // return $input;
  }
}
