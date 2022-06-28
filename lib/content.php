<?php


class content extends db
{
  /**
   * @param type [$data]
   * @return true|void
   */
  public function addnewcontent($data)
  {
    return $this->insert("content", $data)->excu();
  }

  function selectcontent($id)
  {
    $res = $this->select("content", "content.*, user.name AS `user_name`, category.name AS `category_name`")->join("user", "user.id", "content.user_id")->join("category", "category.id", "content.category_id")->where("content.id", "=", "$id")->getRow();
    return $res;
  }

  public function selectcontents()
  {
    $res = $this->select("content", "*")->getAll();
    return $res;
  }
  function deletecontent($id)
  {
    $res = $this->delete("content")->where("id", "=", "$id")->excu();
    return $res;
  }
}
