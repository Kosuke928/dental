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
              $text_en = esc_html($hero_paths['en']);
              $text_home = esc_html($hero_paths['home']);
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
          <a property="item" typeof="WebPage" href="./page-contact.html" class="page-page"><span property="name"><?= $text_jp; ?></span></a>
          <meta property="position" content="2" />
        </span>
      </div>
    </div>
  </div>
</div>