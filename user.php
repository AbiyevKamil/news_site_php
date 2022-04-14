<?= include "./components/header.php" ?>
<?= include "/AppServ/www/sdf/news_site_php/queries/run_query.php" ?>
<?php
$user = array();
$data = array();
if (!$_GET['userId']) {
  header("Location: index.php?");
} else {
  $user_id = $_GET['userId'];
  $sqlUser = "select * from users where id='$user_id' and is_approved=1;";
  $queryUser = runQuery($sqlUser);
  if ($queryUser) {
    $user = mysqli_fetch_assoc($queryUser);
    if (!$user) {
      header("Location: index.php?status=UserNotFound");
    } else {
      $sqlNews = "select * from news where user_id = '$user_id' and is_approved = 1 and is_deleted = 0";
      $queryNews = runQuery($sqlNews);
      if ($queryNews) {
        while ($news = mysqli_fetch_assoc($queryNews)) {
          if ($news) {

            $category_id = $news['category_id'];
            $sqlCategory = "SELECT * FROM `categories` WHERE id = $category_id";
            echo $sqlCategory;
            $queryCategory = runQuery($sqlCategory);
            if ($queryCategory) {
              $category = mysqli_fetch_assoc($queryCategory);
              if ($category) {
                array_push($data, array(
                  'id' => $news['id'],
                  'title' => $news['title'],
                  'banner' => $news['banner'],
                  'content' => $news['content'],
                  'category_name' => $category['name'],
                  'created_at' => $news['created_at'],
                ));
              }
            }
          }
        }
      } else {
        header("Location: index.php?status=CanNotGetUserNews");
      }
    }
  }
}

?>

<div class="pt-55 section">
  <div class="container-fluid">
    <div class="user-info d-flex flex-column align-items-center justify-content-center">
      <div class="avatar">
        <img src="./public/uploads/users/<?= $user['profile_picture'] ?>" alt="avatar">
      </div>
      <p class="mt-5 text-center"><?= $user['user_name'] ?></p>
      <p class="text-center">
        Contact:
        <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a>
      </p>
    </div>
    <h3 style="margin-bottom: 60px;">News</h3>
    <?php
    if (count($data) == 0) {
    ?>
      <div class="alert alert-info p-4">
        There is no posted news from <?= $user['user_name'] ?>.
      </div>
      <?php
    } else {
      foreach ($data as $item) {
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
                    <a href="user.php?userId=<?= $user["id"] ?>">
                      <img src="public/uploads/users/<?= $user["profile_picture"] ?>" alt="" />
                    </a>
                  </li>
                  <li>
                    <a href="user.php?userId=<?= $user["id"] ?>"><?= $user["user_name"] ?></a>
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

<?= include "components/footer.php" ?>