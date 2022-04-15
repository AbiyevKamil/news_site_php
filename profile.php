<?php 

    include "./components/header.php"; 
    include "/AppServ/www/sdf/news_site_php/auth/getProfileData.php";

?>
<div class="pt-55 section">
  <div class="container-fluid">
    <div class="user-info d-flex flex-column align-items-center justify-content-center">
      <div class="avatar">
        <img src="./public/uploads/users/<?= getPicture($pro) ?>" alt="avatar">
      </div>
      <p class="mt-5 text-center"><?= getUsername($pro) ?></p>
      <p class="text-center">
        Contact:
        <a href="mailto:<?= getEmail($pro) ?>"><?= getEmail($pro) ?></a>
      </p>
    </div>
    <h3 style="margin-bottom: 60px;">News</h3>
    <?php
    if (count(getPosts($connection, $user_id)) == 0) {
    ?>
      <div class="alert alert-info p-4">
        There is no posted news from <?= getUsername($pro) ?>.
      </div>
      <?php
    } else {
      foreach (getPosts($connection, $user_id) as $item) {
      ?>
        <div class="col-lg-4 col-md-6">
          <!--Post-1-->
          <div class="post-card">
            <div class="post-card-image">
              <a href="news.php?newsId=<?= $item["id"] ?>">
                <img src="public/uploads/news/<?= $item["banner"] ?>" alt="">
              </a>
            </div>
            <div class="post-card-content">
              <a class="categorie">
                <?= $item["category_name"] ?>
              </a>
              <h5>
                <a href="news.php?newsId=<?= $item["id"] ?>"><?= $item["title"] ?></a>
              </h5>
              <p>
                <?php
                if (strlen($item["content"]) > 50)
                  echo substr($item["content"], 0, 50) . "...";
                else
                  echo $item["content"];
                ?>
              </p>
              <div class="post-card-info">
                <ul class="list-inline">
                  <li>
                    <a href="user.php?userId=<?= getID($pro) ?>">
                      <img src="public/uploads/users/<?= getPicture($pro) ?>" alt="" />
                    </a>
                  </li>
                  <li>
                    <a href="#"><?= getUsername($pro) ?></a>
                  </li>
                  <li class="dot"></li>
                  <li><?= $item["created_at"] ?></li>
                </ul>
              </div>
            </div>
          </div>
          <!--/-->
        </div>
    <?php
      }
    }
    ?>
  </div>
</div>


<?php include "./components/footer.php"; ?>
