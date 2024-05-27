<?php get_header(); ?>
<?php get_template_part( 'template-parts/hero' ); ?>

<main>
  <div id="booking" class="p-booking">
    <div class="p-booking__inner l-inner">
      <div class="p-booking__top">
        <div class="p-booking__block p-booking-block01">
          <h2 class="p-booking__block-title">お電話でのご予約/ご相談</h2>
          <div class="p-booking-block01__box">
            <div class="p-booking-block01__tel c-tel">
              <figure class="c-tel__img">
                <img src="<?= get_template_directory_uri(); ?>/img/tel.webp" alt="" />
              </figure>
              <span class="c-tel__number">03-1234-5678</span>
            </div>
            <p class="p-booking-block01__business-hours">
              (年中無休 AM9:00〜PM22:00)
            </p>
          </div>
          <p class="p-booking__block-text p-booking-block01__text">
            お急ぎの方は電話での連絡がスムーズです。<br />
            混雑状況によっては当日受診をご利用いただけない場合がございます。<br />
            あらかじめご了承ください。<br />
          </p>
        </div>
        <div class="p-booking__block p-booking-block02">
          <h2 class="p-booking__block-title">メールでのご予約/ご相談</h2>
          <p class="p-booking__block-text p-booking-block02__text">
            【ご予約に関しての注意点】<br />
            メールアドレスの入力間違いにより送信できない事が発生しておりますので、メールアドレスは正しくご入力下さい。<br />
            ※24時間以内に当院からの返信がない場合には、お電話(TEL
            03-1234-5678)にてお問い合わせ下さい。
          </p>
        </div>
      </div>
      <div class="p-booking__bottom p-contact">
        <h2 class="p-booking__title c-title-sec u-line-height-140">
          予約フォーム
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