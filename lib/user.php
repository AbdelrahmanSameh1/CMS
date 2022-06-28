<?php

require "db.php";

class user extends db
{
  // public function getUserByEmailAndPassword($email, $password)
  // {
  //   return $this->select("user", "*")->where("email", "=", $email)->andWhere("password", "=", $password)->getAll();
  // }



  // here we use overloading

  public function __call($name, $arguments)
  {
    if ($name = "getUserByEmailAndPassword") {
      if (count($arguments) > 1) {
        return $this->select("user", "*")->where("email", "=", $arguments[0])->andWhere("password", "=", $arguments[1])->getAll();
      } else {
        return $this->select("user", "id")->where("email", "=", $arguments[0])->getRow();
      }
    }
  }
}
