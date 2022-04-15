<?php include "./components/header.php"; ?>
<?php include "./queries/data/get_news.php" ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $newsId = $_GET["newsId"];
  if ($newsId) {
    $data = getNewsById($newsId);
    if ($data) {
      $user = $data["user"];
      $news = $data["news"];
      $comments = $data["comments"];
      $latestNews = $data["latestNews"];
    } else
      header("Location: index.php");
  } else
    header("Location: index.php");
}
?>
<!--post-default-->
<section class="section pt-55">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 mb-20">
        <!--Post-single-->
        <div class="post-single">
          <div class="post-single-image">
            <img src="public/uploads/news/<?= $news["banner"] ?>" alt="" />
          </div>
          <div class="post-single-content" style="position: relative">
            <!-- Category search add later -->
            <a class="categorie">
              <?= $news["category_name"] ?>
            </a>
            <div class="d-flex align-items-center justify-content-between">
              <h4 class="flex-1">
                <?= $news["title"] ?>
              </h4>
              <!-- Check for authorization -->
              <?php
              if (isset($_SESSION["uid"])) {
                if ($_SESSION["uid"] == $user['id']) {
              ?>
                  <div class="ml-md-3" style="align-self: flex-start;">
                    <div class="dropdown">
                      <button style="padding:10px;outline:none;border:none;background-color: transparent;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <i style="font-size: 16px;" class="fa-solid fa-ellipsis-vertical"></i>
                      </button>
                      <div class="dropdown-menu custom-ddm" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="editNews.php?newsId=<?= $news['id'] ?>">Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#exampleModal">
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>
            </div>
            <!-- Check for authorization -->
            <?php
            if (isset($_SESSION["uid"])) {
              if ($_SESSION["uid"] == $user['id']) {
            ?>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this news?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?= $news["title"] ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <form action="delete_news.php" method="POST">
                          <input type="hidden" value="<?= $news["id"] ?>" name="newsId">
                          <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
            <div class="post-single-info">
              <ul class="list-inline">
                <?php
                if (isset($_SESSION['uid'])) {
                  if ($_SESSION['uid'] == $user['id']) {
                ?>
                    <li>
                      <a href="profile.php"><img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" /></a>
                    </li>
                    <li>
                      <a href="profile.php"><?= $user["user_name"] ?></a>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="user.php?userId=<?= $user["id"] ?>">
                        <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
                      </a>
                    </li>
                    <li>
                      <a href="user.php?userId=<?= $user["id"] ?>"><?= $user["user_name"] ?></a>
                    </li>
                  <?php
                  }
                } else { ?>
                  <li>
                    <a href="user.php?userId=<?= $user["id"] ?>">
                      <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
                    </a>
                  </li>
                  <li>
                    <a href="user.php?userId=<?= $user["id"] ?>"><?= $user["user_name"] ?></a>
                  </li>
                <?php } ?>


                <li class="dot"></li>
                <li><?= $news["created_at"] ?></li>
                <li class="dot"></li>
                <li><?= count($comments) ?> comments</li>
              </ul>
            </div>
          </div>

          <div class="post-single-body">
            <p>
              <?= $news["content"] ?>
            </p>
          </div>
        </div>
        <!--/-->

        <!--widget-comments-->
        <div class="widget mb-50">
          <div class="title">
            <h5><?= count($comments) ?> Comments</h5>
          </div>
          <?php foreach ($comments as $comment) { ?>
            <ul class="widget-comments">
              <li class="comment-item">
                <img src="public/uploads/users/<?= $comment["user_picture"] ?>" alt="" />
                <div class="content">
                  <ul class="info list-inline">
                    <li><?= $comment["user_name"] ?></li>
                    <li class="dot"></li>
                    <li><?= $comment["created_at"] ?></li>
                  </ul>
                  <p>
                    <?= $comment["content"] ?>
                  </p>
                </div>
              </li>
            </ul>
          <?php } ?>
          <!--Leave-comments-->
          <div class="title">
            <h5>Leave a comment</h5>
          </div>
          <form class="widget-form" action="#" method="POST" id="main_contact_form">
            <!-- Make it visible after sending comment -->
            <div class="alert alert-success contact_msg" style="display: none" role="alert">
              Your message was sent successfully.
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="hidden" name="newsId" value="<?= $news['id'] ?>">
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn-custom">
                  Post Comment
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4 max-width">
        <!--widget-author-->
        <div class="widget">
          <div class="widget-author">
            <?php
            if (isset($_SESSION['uid'])) {
              if ($_SESSION['uid'] == $user['id']) {
            ?>
                <a href="profile.php" class="image">
                  <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
                </a>
              <?php } else { ?>
                <a href="user.php?userId=<?= $user["id"] ?>" class="image">
                  <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
                </a>
              <?php
              }
            } else { ?>
              <a href="user.php?userId=<?= $user["id"] ?>" class="image">
                <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
              </a>
            <?php } ?>


            <h6>
              <span>Hi, I'm <?= $user["full_name"] ?></span>
            </h6>
          </div>
        </div>
        <!--/-->

        <?php if (count($latestNews) != 0) { ?>
          <!--widget-latest-posts-->
          <div class="widget">
            <div class="section-title">
              <h5>Latest News</h5>
            </div>
            <?php foreach ($latestNews as $item) { ?>

              <ul class="widget-latest-posts">
                <li class="last-post">
                  <div class="image">
                    <a href="post-default.html">
                      <img src="public/uploads/news/<?= $item["banner"] ?>" alt="..." />
                    </a>
                  </div>
                  <div class="content">
                    <p>
                      <a href="news.php?newsId=<?= $item["id"] ?>">
                        <?php
                        if (strlen($item["title"]) > 50) {
                          echo substr($item["title"], 0, 47) . "...";
                        } else {
                          echo $item["title"];
                        }
                        ?>
                      </a>
                    </p>
                    <small><span class="icon_clock_alt"></span><?= $item["created_at"] ?></small>
                  </div>
                </li>
              </ul>
            <?php } ?>
          </div>
          <!--/-->
        <?php } ?>

        <!--/-->
      </div>
    </div>
  </div>
</section>
<!--/-->

<?php include "./components/footer.php"; ?>