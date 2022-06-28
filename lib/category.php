<?php


class category extends db
{
  function addnewcategory($data)
  {
    $res = $this->insert("category", $data)->excu();
    return $res;
  }

  function selectcategory($id)
  {
    $res = $this->select("category", "id, name")->where("id", "=", "$id")->getRow();
    return $res;
  }
  function selectcategories()
  {
    $res = $this->select("category", "*")->getAll();
    return $res;
  }
  function updatecategory($id, $data)
  {
    $res = $this->update("category", $data)->where("id", "=", "$id")->excu();
    return $res;
  }
  function deletecategory($id)
  {
    $res = $this->delete("category")->where("id", "=", "$id")->excu();
    return $res;
  }
}
