<div id="hero" class="p-hero">
  <div class="p-hero__inner l-inner">
    <div class="p-hero__container">
      <div class="p-hero__top">
        <figure class="p-hero__img">
          <picture>
            <?php
            // get_hero_image_paths 関数を呼び出して画像パスを取得
            $hero_paths = get_hero_paths();
            $img_pc = esc_url($hero_paths['pc']);
            $img_sp = esc_url($hero_paths['sp']);
            $text_jp = esc_html($hero_paths['jp']);
            $text_jp2 = esc_html($hero_paths['jp2']);
            $text_en = esc_html($hero_paths['en']);
            $text_home = esc_html($hero_paths['home']);

            // URLからタームスラッグを取得する
            $url_path = $_SERVER['REQUEST_URI']; // 例: /blog-category/blog-cat3/?page=2
            $parsed_url = parse_url($url_path, PHP_URL_PATH); // 例: /blog-category/blog-cat3/
            $path_segments = explode('/', trim($parsed_url, '/')); // 例: ['blog-category', 'blog-cat3']
            $slug1 = isset($path_segments[0]) ? $path_segments[0] : "";  // 'category' or 'blog-category'
            $slug2 = isset($path_segments[1]) ? $path_segments[1] : "";  // 'category' or 'blog-category'
            ?>
            <source media="(min-width: 768px)" srcset="<?= $img_pc; ?>" width="1160" height="340" />
            <img src="<?= $img_sp; ?>" alt="" decoding="async" width="335" height="188" />
          </picture>
        </figure>
        <div class="p-hero__catch-copy">
          <p class="p-hero__text-jp"><?= $text_jp; ?></p>
          <p class="p-hero__text-en"><?= $text_en; ?></p>
        </div>
      </div>
      <div class="breadcrumb">
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" href="/" class="home"><span property="name"><?= $text_home; ?></span></a>
          <meta property="position" content="1" />
        </span>
        >
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" href="<?= home_url($slug1); ?>" class="page-page"><span property="name"><?= $text_jp; ?></span></a>
          <meta property="position" content="2" />
        </span>
        <?php if (is_page('contact-thanks') || is_page('reservation-thanks') || is_single()) : ?>
          >
          <span property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" href="<?= home_url($slug2); ?>" class="page-page">
              <span property="name"><?= $text_jp2; ?></span>
            </a>
            <meta property="position" content="3" />
          </span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>