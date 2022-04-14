<?php include "./components/header.php"; ?>
<?php include "./queries/data/get_categories.php"; ?>
<?php
if (!$_SESSION["uid"]) {
  header("Location: index.php?status=Unauthorized");
} else {
  $categories = getCategories();
}
?>
<section class="section pt-55 mb-50">
  <div class="container-fluid">
    <div class="sign widget add-news">
      <div class="section-title">
        <h5>Add News</h5>
      </div>
      <?php if (isset($_GET['status'])) {  ?>
        <div class="alert alert-danger p-4">
          <?php
          switch ($_GET['status']) {
            case 'AllFieldsRequired':
              echo 'Fill all the fields.';
              break;
            case 'InvalidLengthTitle':
              echo 'Title must be longer than 2 and no longer than 150 characters.';
              break;
            case 'ShortContent':
              echo 'Content must be longer than 100 characters.';
              break;
            case 'IsNotAnImage':
              echo 'Banner must be an image.';
              break;
            case 'FileTooLarge':
              echo 'Banner image is too large.';
              break;
            case 'NotAllowedFileTypes':
              echo 'Only .jpg, .jpeg, .png, .gif files are allowed to upload.';
              break;
            case 'NotUploaded':
              echo 'Oops, something went wrong while uploading banner image. Try again :(';
              break;
            case 'NotPosted':
              echo 'Oops, something went wrong while publishing news. Try again :(';
              break;
            default:
              echo 'Oops, something went wrong. Try again :(';
              break;
          }
          ?>
        </div>
      <?php } ?>
      <form action="add_news.php" method="post" enctype="multipart/form-data" class="sign-form widget-form contact_form " method="post">
        <div class="form-group">
          <label class="label" for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="">
        </div>
        <div class="form-group">
          <label class="label" for="content">Content</label>
          <textarea style="min-height: 300px;" type="text" class="form-control" id="content" name="content" value=""></textarea>
        </div>
        <div class="form-group select-list">
          <label for="category">Category</label>
          <select class="form-control" name="category" id="category">
            <option selected value="">Select category</option>
            <?php foreach ($categories as $category) { ?>
              <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="banner">Banner</label>
          <input type="file" accept=".png, .gif, .jpeg, .jpg" class="form-control-file" name="banner" id="banner">
        </div>
        <div class="form-group">
          <button type="submit" class="btn-custom">Publish</button>
        </div>
      </form>
    </div>


  </div>
</section>
<?php include "./components/footer.php"; ?>