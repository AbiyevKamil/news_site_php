<?= include "./components/header.php" ?>
<?= include "./queries/data/get_news.php" ?>
<!--grid-layout-->
<section class="section pt-55">
  <div class="container-fluid">
    <?php if (isset($_GET['success'])) { ?>
      <div class="alert alert-success p-4 mb-5">
        <?php
        switch ($_GET['success']) {
          case 'NewsSentForCheck':
            echo 'News sent to check for publish';
            break;
          case 'SuccessfullyDeletedNews':
            echo 'News successfully deleted';
            break;
        }
        ?>
      </div>
    <?php } ?>
    <?php if (isset($_GET['status'])) { ?>
      <div class="alert alert-danger p-4 mb-5">
        <?php
        switch ($_GET['status']) {
          case 'SomethingWentWrongWhileNewsDelete':
            echo 'Oops, something went wrong. Try again :(';
            break;
          case 'NotAllowedToDelete':
            echo 'You are not allowed to delete this news.';
            break;
          case 'NotValidIdForNews':
            echo 'News does not exist.';
            break;
          default:
            echo 'Oops, something went wrong. Try again :(';
            break;
        }
        ?>
      </div>
    <?php } ?>
    <div class="row">
      <?php
      $data  = getNews();
      // echo 'Hello' . $data[0]['id'];
      if (count($data) > 0) {
        foreach ($data as $element) {
      ?>
          <div class="col-lg-4 col-md-6">
            <!--Post-1-->
            <div class="post-card">
              <div class="post-card-image">
                <a href="news.php?newsId=<?= $element["id"] ?>">
                  <img src="public/uploads/news/<?= $element["banner"] ?>" alt="">
                </a>
              </div>
              <div class="post-card-content">
                <h5>
                  <a href="news.php?newsId=<?= $element["id"] ?>"><?= $element["title"] ?></a>
                </h5>
                <p>
                  <?php
                  if (strlen($element["content"]) > 50)
                    echo substr($element["content"], 0, 50) . "...";
                  else
                    echo $element["content"];
                  ?>
                </p>
                <div class="post-card-info">
                  <ul class="list-inline">
                    <li>
                      <a href="profile.php">
                        <img src="public/uploads/users/<?= $element["profile_picture"] ?>" alt="" />
                      </a>
                    </li>
                    <li>
                      <a href="profile.php"><?= $element["username"] ?></a>
                    </li>
                    <li class="dot"></li>
                    <li><?= $element["created_at"] ?></li>
                  </ul>
                </div>
              </div>
            </div>
            <!--/-->
          </div>

        <?php
        }
      } else {
        ?>
        <div class="p-5 alert alert-info w-100">
          There is no news currently available. Check later.
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
<!--/-->

<?= include "components/footer.php" ?>