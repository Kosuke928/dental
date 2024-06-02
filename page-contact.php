<?php get_header(); ?>
<?php get_template_part( 'template-parts/hero' ); ?>

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


<!-- 
<span class="p-contact-form__field-error u-action-hidden">必須項目に入力してください。</span> -->