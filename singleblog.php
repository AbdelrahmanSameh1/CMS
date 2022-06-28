<?php


$blog_id = $_GET['id'];

require "lib/db.php";
require "lib/content.php";
require "lib/category.php";
require "lib/helper.php";
require "lib/review.php";

$content = new content;
$details = $content->selectcontent($blog_id);

$review = new review;
$reviews = $review->getReviewByBlogId($blog_id);


$category = new category;
$getcategories = $category->selectcategories();

// print_r($details);die;



?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

  <!--- basic page needs
    ================================================== -->
  <meta charset="utf-8">
  <title>Standard Post - Calvin</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- mobile specific metas
    ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
    ================================================== -->
  <link rel="stylesheet" href="design/front/css/vendor.css">
  <link rel="stylesheet" href="design/front/css/styles.css">

  <!-- script
    ================================================== -->
  <script src="design/front/js/modernizr.js"></script>
  <script defer src="design/front/js/fontawesome/all.min.js"></script>

  <!-- favicons
    ================================================== -->
  <link rel="apple-touch-icon" sizes="180x180" href="design/front/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="design/front/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="design/front/favicon-16x16.png">
  <link rel="manifest" href="design/front/site.webmanifest">

</head>

<body id="top">


  <!-- preloader
    ================================================== -->
  <div id="preloader">
    <div id="loader"></div>
  </div>


  <!-- header
    ================================================== -->
  <header class="s-header s-header--opaque">

    <div class="s-header__logo">
      <a class="logo" href="design/front/index.html">
        <img src="design/front/images/logo.svg" alt="Homepage">
      </a>
    </div>

    <div class="row s-header__navigation">

      <nav class="s-header__nav-wrap">

        <h3 class="s-header__nav-heading h6">Navigate to</h3>

        <ul class="s-header__nav">
          <li><a href="design/front/index.html" title="">Home</a></li>
          <li class="has-children">
            <a href="#0" title="">Categories</a>
            <ul class="sub-menu">

              <?php foreach ($getcategories as $cat) : ?>

                <li><a href="index.php"><?= $cat['name']; ?></a></li>

              <?php endforeach; ?>

            </ul>
          </li>

          <li><a href="design/front/about.html" title="">About</a></li>
          <li><a href="design/front/contact.html" title="">Contact</a></li>
        </ul> <!-- end s-header__nav -->

        <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

      </nav> <!-- end s-header__nav-wrap -->

    </div> <!-- end s-header__navigation -->

    <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

    <div class="s-header__search">

      <div class="s-header__search-inner">
        <div class="row wide">

          <form role="search" method="get" class="s-header__search-form" action="#">
            <label>
              <span class="h-screen-reader-text">Search for:</span>
              <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="s" title="Search for:" autocomplete="off">
            </label>
            <input type="submit" class="s-header__search-submit" value="Search">
          </form>

          <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

        </div> <!-- end row -->
      </div> <!-- s-header__search-inner -->

    </div> <!-- end s-header__search wrap -->

    <a class="s-header__search-trigger" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983">
        <path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z" />
      </svg>
    </a>

  </header> <!-- end s-header -->


  <!-- content
    ================================================== -->
  <section class="s-content">

    <div class="row">
      <div class="column large-12">

        <article class="s-content__entry format-standard">

          <div>
            <h1 class="s-content__title s-content__title--post"><?= $details['category_name']; ?> Category</h1>
          </div> <!-- end s-content__entry-header -->

          <div>
            <h6 class="s-content__title s-content__title--post">This content by <?= $details['user_name']; ?></h6>
          </div> <!-- end s-content__entry-header -->
          <br>

          <div class="s-content__media">
            <div class="s-content__post-thumb">
              <img src="design/upload/<?= $details['cover'] ?>" srcset="design/upload/<?= $details['cover']; ?> 2100w, 
              design/upload/<?= $details['cover'] ?> 1050w, 
              design/upload/<?= $details['cover'] ?> 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
            </div>
          </div> <!-- end s-content__media -->

          <div class="s-content__entry-header">
            <h1 class="s-content__title s-content__title--post"><?= $details['title']; ?></h1>
          </div> <!-- end s-content__entry-header -->

          <div class="s-content__primary">

            <div class="s-content__entry-content">

              <p class="lead">
                <?= $details['main_content']; ?>
              </p>

            </div> <!-- end s-entry__entry-content -->




          </div> <!-- end s-content__primary -->
        </article> <!-- end entry -->

      </div> <!-- end column -->
    </div> <!-- end row -->


    <!-- comments
        ================================================== -->
    <div class="comments-wrap">

      <div id="comments" class="row">
        <div class="column large-12">





          <!-- START commentlist -->

          <ol class="commentlist" id="commentlist">


            <?php if (!empty($reviews)) : ?>

              <?php foreach ($reviews as $review) : ?>

                <li class="depth-1 comment">

                  <div class="comment__avatar">
                    <img class="avatar" src="design/front/images/avatars/user-02.jpg" alt="" width="50" height="50">
                  </div>

                  <div class="comment__content">

                    <div class="comment__info">
                      <div class="comment__author"><?= $review['name']; ?></div>


                    </div>

                    <div class="comment__text">
                      <p><?= $review['content']; ?></p>
                    </div>

                  </div>

                </li> <!-- end comment level 1 -->

              <?php endforeach; ?>


            <?php else : ?>

              <h3 id="myComm">NO Comments</h3>

            <?php endif; ?>





          </ol>
          <!-- END commentlist -->

        </div> <!-- end col-full -->
      </div> <!-- end comments -->


      <div class="row comment-respond">

        <!-- START respond -->
        <div id="respond" class="column">

          <h3>
            Add Comment
            <span>Your email address will not be published.</span>
          </h3>



          <fieldset>

            <div class="form-field">
              <input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
            </div>

            <div class="form-field">
              <input name="cEmail" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
            </div>

            <div class="message form-field">
              <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
            </div>
            <input type="hidden" id="content_id" value="<?= $_GET['id']; ?>">

            <br>
            <input name="submit" id="submit" onclick="sendreview()" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

          </fieldset>


          <!-- end form -->



        </div>
        <!-- END respond-->

      </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->


  </section> <!-- end s-content -->


  <!-- footer
    ================================================== -->
  <footer class="s-footer">

    <div class="s-footer__main">

      <div class="row">

        <div class="column large-3 medium-6 tab-12 s-footer__info">

          <h5>About Our Site</h5>

          <p>
            Lorem ipsum Ut velit dolor Ut labore id fugiat in ut
            fugiat nostrud qui in dolore commodo eu magna Duis
            cillum dolor officia esse mollit proident Excepteur
            exercitation nulla. Lorem ipsum In reprehenderit
            commodo aliqua irure.
          </p>

        </div> <!-- end s-footer__info -->

        <div class="column large-2 medium-3 tab-6 s-footer__site-links">

          <h5>Site Links</h5>

          <ul>
            <li><a href="#0">About Us</a></li>
            <li><a href="#0">Blog</a></li>
            <li><a href="#0">FAQ</a></li>
            <li><a href="#0">Terms</a></li>
            <li><a href="#0">Privacy Policy</a></li>
          </ul>

        </div> <!-- end s-footer__site-links -->

        <div class="column large-2 medium-3 tab-6 s-footer__social-links">

          <h5>Follow Us</h5>

          <ul>
            <li><a href="#0">Twitter</a></li>
            <li><a href="#0">Facebook</a></li>
            <li><a href="#0">Dribbble</a></li>
            <li><a href="#0">Pinterest</a></li>
            <li><a href="#0">Instagram</a></li>
          </ul>

        </div> <!-- end s-footer__social links -->

        <div class="column large-3 medium-6 tab-12 s-footer__subscribe">

          <h5>Sign Up for Newsletter</h5>

          <p>Signup to get updates on articles, interviews and events.</p>

          <div class="subscribe-form">

            <form id="mc-form" class="group" novalidate="true">

              <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="Your Email Address" required="">

              <input type="submit" name="subscribe" value="subscribe">

              <label for="mc-email" class="subscribe-message"></label>

            </form>

          </div>

        </div> <!-- end s-footer__subscribe -->

      </div> <!-- end row -->

    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
      <div class="row">
        <div class="column">
          <div class="ss-copyright">
            <span>© Copyright Abdelrahman 2022</span>
            <span>Design by <a href="https://www.linkedin.com/in/abdelrahman-sameh1/">Abdelrahman Sameh</a></span>
          </div> <!-- end ss-copyright -->
        </div>
      </div>

      <div class="ss-go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
          <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
            <path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path>
          </svg>
        </a>
      </div> <!-- end ss-go-top -->
    </div> <!-- end s-footer__bottom -->

  </footer> <!-- end s-footer -->


  <!-- Java Script
    ================================================== -->
  <script src="design/front/js/jquery-3.5.0.min.js"></script>
  <script src="design/front/js/plugins.js"></script>
  <script src="design/front/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    function sendreview() {
      let name = $("#cName").val();
      let email = $("#cEmail").val();
      let review = $("#cMessage").val();
      let content_id = $("#content_id").val();

      // console.log(name, email, review);

      $.ajax({
        type: 'POST',
        url: 'sendreview.php',
        data: {
          name: name,
          email: email,
          review: review,
          content_id: content_id
        },
        success: function() {
          // alert("test");
          let data = `


          <li class="depth-1 comment">

              <div class="comment__avatar">
                <img class="avatar" src="design/front/images/avatars/user-02.jpg" alt="" width="50" height="50">
              </div>

              <div class="comment__content">

                <div class="comment__info">
                  <div class="comment__author">${name}</div>


                </div>

                <div class="comment__text">
                  <p>${review}</p>
                </div>

              </div>

            </li> <!-- end comment level 1 -->
          
          
          `;


          $("#commentlist").append(data);
          $("#myComm").hide();

        }
      });
    }
  </script>

</body>

</html>