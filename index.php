<?= include "./components/header.php" ?>
<?= include "./queries/data/get_news.php" ?>
<!--grid-layout-->
<section class="section pt-85">
  <div class="container-fluid">
    <div class="row">
      <?php
      $data  = getNews();
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
                  <a href="author.html">
                    <img src="public/uploads/users/<?= $element["profile_picture"] ?>" alt="" />
                  </a>
                </li>
                <li>
                  <a href="author.html"><?= $element["username"] ?></a>
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
      ?>
    </div>
  </div>
</section>
<!--/-->

<?= include "components/footer.php" ?>