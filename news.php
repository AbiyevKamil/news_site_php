<?= include "./components/header.php" ?>

<!--post-default-->
<section class="section pt-55">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 mb-20">
        <!--Post-single-->
        <div class="post-single">
          <div class="post-single-image">
            <img src="assets/img/blog/6.jpg" alt="" />
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
                  <a href="author.html"><img src="assets/img/author/1.jpg" alt="" /></a>
                </li>
                <li><a href="author.html">David Smith</a></li>
                <li class="dot"></li>
                <li>January 15, 2021</li>
                <li class="dot"></li>
                <li>3 comments</li>
              </ul>
            </div>
          </div>

          <div class="post-single-body">
            <p>
              Its sometimes her behaviour are contented. Do listening am
              eagerness oh objection collected. Together gay feelings
              continue juvenile had off Unknown may service subject her
              letters one bed. Child years noise ye in forty. Loud in this
              in both hold. My entrance me is disposal bachelor remember
              relation
            </p>
          </div>
        </div>
        <!--/-->

        <!--widget-comments-->
        <div class="widget mb-50">
          <div class="title">
            <h5>3 Comments</h5>
          </div>
          <ul class="widget-comments">
            <li class="comment-item">
              <img src="assets/img/user/1.jpg" alt="" />
              <div class="content">
                <ul class="info list-inline">
                  <li>Mohammed Ali</li>
                  <li class="dot"></li>
                  <li>January 15, 2021</li>
                </ul>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Repellendus at doloremque adipisci eum placeat quod non
                  fugiat aliquid sit similique!
                </p>
              </div>
            </li>
          </ul>
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
              <img src="assets/img/author/1.jpg" alt="" />
            </a>
            <h6>
              <span>Hi, I'm David Smith</span>
            </h6>
          </div>
        </div>
        <!--/-->

        <!--widget-latest-posts-->
        <div class="widget">
          <div class="section-title">
            <h5>Latest News</h5>
          </div>
          <ul class="widget-latest-posts">
            <li class="last-post">
              <div class="image">
                <a href="post-default.html">
                  <img src="assets/img/latest/1.jpg" alt="..." />
                </a>
              </div>
              <div class="content">
                <p>
                  <a href="post-default.html">5 Things I Wish I Knew Before Traveling to Malaysia</a>
                </p>
                <small><span class="icon_clock_alt"></span> January 15,
                  2021</small>
              </div>
            </li>
          </ul>
        </div>
        <!--/-->

        <!--/-->
      </div>
    </div>
  </div>
</section>
<!--/-->

<?= include "components/footer.php" ?>