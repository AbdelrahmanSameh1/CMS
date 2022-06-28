<?php


class helper
{
  // public static function redirectWait(string $page, int $sec)       // note this function
  // {
  //   header("Refresh: $sec; url={$page}.php");      // note this way of concatenation
  // }

  public static function __callStatic($name, $arguments)   // here we use overloading by using magic methods (__call) but it is static here
  {
    if ($name == "redirect") {
      if (count($arguments) > 1) {
        header("Refresh: $arguments[1]; url={$arguments[0]}.php ");
      } else {
        header("LOCATION: $arguments[0].php");
      }
    }
  }
}
