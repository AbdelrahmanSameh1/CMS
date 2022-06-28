<?php

session_start();

require "../../lib/helper.php";

if (empty($_SESSION['user'])) {
  helper::redirect("../../login");
}
require "../../lib/db.php";



require "../../lib/content.php";






$content = new content;

$contentlist = $content->selectcontents();
// echo "<pre>";
// print_r($data);
// echo "</pre>";





include "../header.php";

?>







<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <!-- <h3 class="card-title">Title</h3> -->
      <a href="addcontent.php" class="btn btn-success">Add New Content</a>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">ID</th>
              <th>title</th>
              <th>cover</th>
              <th style="width: 40px">short_desc</th>
              <th style="width: 40px">main_content</th>
              <th style="width: 40px">user_id</th>
              <th style="width: 40px">category_id</th>
              <th style="width: 40px">delete</th>
            </tr>
          </thead>
          <?php foreach ($contentlist as $content) : ?>
            <tbody>
              <tr>
                <td><?= $content['id']; ?></td>
                <td><?= $content['title']; ?></td>
                <td><?= $content['cover']; ?></td>
                <td><?= $content['short_desc']; ?></td>
                <td><?= $content['main_content']; ?></td>
                <td><?= $content['user_id']; ?></td>
                <td><?= $content['category_id']; ?></td>
                <td><a href="deletecontent.php?id=<?= $content['id']; ?>">delete</a></td>
              </tr>
            </tbody>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->







<?php include "../footer.php"; ?>