<?php

class review extends db
{
  public function addreview($data)
  {
    return $this->insert("review", $data)->excu();
  }

  public function getReviewByBlogId($blog_id)
  {
    return $this->select("review", "*")->where("content_id", "=", "$blog_id")->getAll();
  }
}
