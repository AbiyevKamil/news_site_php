<?= include "./components/header.php" ?>
<?= include "./queries/data/get_news.php" ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $newsId = $_GET["newsId"];
  if (isset($newsId)) {
    $data = getNewsById($newsId);
    if (isset($data)) {
      $user = $data["user"];
      $news = $data["news"];
      $comments = $data["comments"];
      $latestNews = $data["latestNews"];
    }
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
          <div class="post-single-content">
            <!-- <a href="blog-grid.html" class="categorie">travel</a> -->
            <h4>
              What the secrets you will know about jordan petra if visit it
              one day?
            </h4>
            <div class="post-single-info">
              <ul class="list-inline">
                <li>
                  <a href="author.html"><img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" /></a>
                </li>
                <li><a href="author.html"><?= $user["user_name"] ?></a></li>
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
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*"
                    required="required"></textarea>
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
            <a href="author.html" class="image">
              <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
            </a>
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
                    <?= $item["title"] ?>
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

<?= include "components/footer.php" ?>