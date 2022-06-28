<?php

session_start();

require "lib/db.php";
require "lib/content.php";
require "lib/category.php";
require "lib/helper.php";

$content = new content;
$getallcontent = $content->selectcontents();

$category = new category;
$getcategories = $category->selectcategories();





?>



<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

  <!--- basic page needs
    ================================================== -->
  <meta charset="utf-8">
  <title>Category - Calvin</title>
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
          <li class="has-children current">
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


  </header> <!-- end s-header -->


  <!-- content
    ================================================== -->
  <section class="s-content">


    <!-- page header
        ================================================== -->
    <div class="s-pageheader">
      <div class="row">
        <div class="column large-12">
          <h1 class="page-title">
            <!-- <span class="page-title__small-type">Category</span> -->
            All Categories content
          </h1>
        </div>
      </div>
    </div> <!-- end s-pageheader-->


    <!-- masonry
        ================================================== -->
    <div class="s-bricks s-bricks--half-top-padding">

      <div class="masonry">
        <div class="bricks-wrapper h-group">

          <div class="grid-sizer"></div>

          <div class="lines">
            <span></span>
            <span></span>
            <span></span>
          </div>


          <?php foreach ($getallcontent as $blog) : ?>



            <article class="brick entry" data-aos="fade-up">

              <div class="entry__thumb">
                <a href="singleblog.php?id=<?= $blog['id']; ?>" class="thumb-link">
                  <img src="design/upload/<?= $blog['cover']; ?>" srcset="design/upload/<?= $blog['cover']; ?> 1x, design/upload/<?= $blog['cover']; ?> 2x" alt="">
                </a>
              </div> <!-- end entry__thumb -->

              <div class="entry__text">
                <div class="entry__header">
                  <h1 class="entry__title"><a href="https://www.dreamhost.com/r.cgi?287326"><?= $blog['title']; ?></a></h1>

                  <div class="entry__meta">

                    </span>

                  </div>
                </div>
                <div class="entry__excerpt">
                  <p>
                    <?= $blog['short_desc']; ?>
                  </p>
                </div>
              </div> <!-- end entry__text -->

            </article> <!-- end article -->



          <?php endforeach; ?>




        </div> <!-- end brick-wrapper -->

      </div> <!-- end masonry -->

    </div> <!-- end s-bricks -->

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
            <span>Design by <a href="https://www.styleshout.com/">Abdelrahman Sameh</a></span>
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

</body>

</html>