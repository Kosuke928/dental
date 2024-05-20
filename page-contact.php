<?php get_header(); ?>
<div id="hero" class="p-hero">
  <div class="p-hero__inner l-inner">
    <div class="p-hero__container">
      <div class="p-hero__top">
        <figure class="p-hero__img">
          <picture>
            <source media="(min-width: 768px)" srcset="./img/contact_hero_pc.webp" width="1160" height="340" />
            <img src="./img/contact_hero_sp.webp" alt="" decoding="async" width="335" height="188" />
          </picture>
        </figure>
        <div class="p-hero__catch-copy">
          <p class="p-hero__text-jp">お問い合わせ</p>
          <p class="p-hero__text-en">CONTACT</p>
        </div>
      </div>
      <div class="breadcrumb">
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" href="/" class="home"><span property="name">ホーム</span></a>
          <meta property="position" content="1" />
        </span>
        >
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" href="./page-contact.html" class="page-page"><span property="name">お問い合わせ</span></a>
          <meta property="position" content="2" />
        </span>
      </div>
    </div>
  </div>
</div>

<main>
  <div id="contact" class="p-contact">
    <div class="p-contact__inner l-inner">
      <div class="p-contact__top">
        <p class="p-contact__top-text">
          お急ぎの方は、お電話(TEL 03-1234-5678)での連絡がスムーズです。
          <br />以下のフォームからお問い合わせ頂いた場合、ご連絡が2～3日後になる場合がございます。
          <br />また、メールアドレスの入力間違いにより送信できない事が発生しておりますので、メールアドレスは正しくご入力下さい。
          <br /><em class="u-text-emphasis">※3営業日以内に当院からの返信がない場合には、お電話(TEL
            03-1234-5678)にてお問い合わせ下さい。</em>
        </p>
      </div>
      <div class="p-contact__bottom">
        <h2 class="p-contact__title c-title-sec u-line-height-140">
          お問い合わせ<br class="u-sm-hidden" />フォーム
        </h2>

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>