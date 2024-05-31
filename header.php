<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- 最後に必ず確認のこと -->
  <meta name="robots" content="noindex" />

  <!-- サイトタイトル,サイト詳細 -->
  <title>みなみ歯科クリニック</title>
  <meta name="description" content="街の皆さまの笑顔を守るアットホームな歯医者さん" />

  <!-- OGP設定 -->
  <meta property="og:title" content="みなみ歯科クリニック" />
  <meta property="og:description" content="街の皆さまの笑顔を守るアットホームな歯医者さん" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://kosuke-blog.com/" />
  <meta property="og:image" content="https://kosuke-blog.com/img/ogp.webp" />

  <!-- GoogleFont -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet" />

  <!-- ファビコン,Swiper,リセットCSS,CSSリンク -->
  <link rel="icon" href="<?= get_template_directory_uri(); ?>/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- <link rel="stylesheet" href="./css/style.css" /> -->
  <?php wp_head(); ?>
</head>

<body>
  <header class="l-header">
    <div class="l-header__inner">
      <h1 class="l-header__left">
        <a href="<?= home_url('/'); ?>" class="c-site-logo"><img src="<?= get_template_directory_uri(); ?>/img/site-logo.webp" alt="みなみ歯科クリニック" width="270" height="32" /></a>
      </h1>
      <div id="js-drawer-open" class="l-header__button u-lg-hidden">
        <button class="c-hamburger" aria-label="Menu">
          <span class="c-hamburger__parts"></span>
          <span class="c-hamburger__parts"></span>
          <span class="c-hamburger__parts"></span>
        </button>
      </div>
      <div class="l-header__right">
        <nav class="p-gnav">
          <?php
          wp_nav_menu(
            array(
              'depth' => 1,
              'theme_location' => 'global',
              'container' => 'false',
              'walker' => new My_Custom_Nav_Walker(),
              'menu_class' => 'p-gnav__list',
            )
          );
          ?>
        </nav>
        <div class="p-header-infomation">
          <p class="p-header-infomation__address">
            <span class="p-header-infomation__address--number">〒166-0001</span>
            <span class="p-header-infomation__address--text">東京都杉並区阿佐谷北7-3-1</span>
          </p>
          <div class="p-header-infomation__tel c-tel">
            <figure class="c-tel__img">
              <img src="<?= get_template_directory_uri(); ?>/img/tel.webp" alt="" width="28" height="28" />
            </figure>
            <span class="c-tel__number">03-1234-5678</span>
          </div>
        </div>
      </div>

      <div id="drawer" class="p-drawer" style="display: none">
        <div class="p-drawer__inner">
          <a href="<?php home_url('/') ?>" class="p-drawer__logo c-site-logo">
            <img src="<?= get_template_directory_uri(); ?>/img/site-logo.webp" alt="みなみ歯科クリニック" width="270" height="32" />
          </a>
          <nav class="p-drawer__nav p-dnav">
          <?php
          wp_nav_menu(
            array(
              'depth' => 1,
              'theme_location' => 'drawer',
              'container' => 'false',
              'walker' => new My_Custom_Nav_Walker(),
              'menu_class' => 'p-dnav__list',
            )
          );
          ?>
          </nav>
        </div>
      </div>
    </div>
  </header>