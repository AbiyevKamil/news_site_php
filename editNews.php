<?= include "./components/header.php" ?>
<?= include "./queries/data/get_categories.php" ?>
<?php
if (!$_GET['newsId']) {
  header("Location: index.php");
}
// Start fetch area
// Change id later
$user_id = "60423032-ad08-11ec-ba09-002b67e478b5";
$sqlToGetNews = "select * from news where is_deleted = 0 and is_approved = 1 and user_id = '$user_id';";
$queryToGetNews = runQuery($sqlToGetNews);
if ($queryToGetNews) {
  $news = mysqli_fetch_assoc($queryToGetNews);
} else {
  header("Location: index.php?status=SomethingWentWrongWhileUpdateNews");
}
// End fetch area
$categories = getCategories();

?>
<section class="section pt-55 mb-50">
  <h5 class="text-center" style="margin-bottom: 65px;">Latest banner</h5>
  <div class="post-single-image d-flex align-items-center justify-content-center">
    <img src="public/uploads/news/<?= $news['banner'] ?>" style="max-width: 500px; max-height: 350px;min-width: 300px; min-height: 250px;  object-fit: cover;" alt="">
  </div>
  <div class="container-fluid">
    <div class="sign widget add-news">
      <div class="section-title">
        <h5>Edit News</h5>
      </div>
      <form action="edit_news.php" method="post" enctype="multipart/form-data" class="sign-form widget-form contact_form " method="post">
        <input type="hidden" value="<?= $news['id'] ?>" name="newsId">
        <div class="form-group">
          <label class="label" for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $news['title'] ?>">
        </div>
        <div class="form-group">
          <label class="label" for="content">Content</label>
          <textarea style="min-height: 300px;" type="text" class="form-control" id="content" name="content" value="<?= $news['content'] ?>"><?= $news['content'] ?></textarea>
        </div>
        <div class="form-group select-list">
          <label for="category">Category</label>
          <select class="form-control" name="category" id="category">
            <option value="null">Select category</option>
            <?php foreach ($categories as $category) { ?>
              <?php if ($news['category_id'] == $category['id']) { ?>
                <option selected value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php } else { ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php } ?>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="banner">Banner</label>
          <input type="file" accept=".png, .gif, .jpeg, .jpg" class="form-control-file" name="banner" id="banner">
        </div>
        <div class="form-group">
          <button type="submit" class="btn-custom">Update</button>
        </div>
      </form>
    </div>


  </div>
</section>
<?= include "components/footer.php" ?>