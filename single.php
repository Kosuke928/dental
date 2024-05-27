<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<div class="l-wrapper">
  <div class="l-wrapper__inner">
    <div class="l-wrapper__contents">
      <main class="l-main">
        <div class="p-article">
          <div class="p-article__container">
            <section class="p-article__sec01 p-article01">
              <h2 class="p-article01__title">
                [見出し1]下層ページのタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル
              </h2>
              <div class="p-article01__addition">
                <p class="p-article01__date">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M3.73514 3.79509C3.17755 3.95269 2.73412 4.37605 2.55089 4.92575L0 12.5781L0.401678 12.9798L4.50623 8.87526C4.42447 8.70409 4.37498 8.51487 4.37498 8.31253C4.37498 7.58765 4.96259 7.00003 5.68747 7.00003C6.41235 7.00003 6.99997 7.58765 6.99997 8.31253C6.99997 9.03741 6.41235 9.62502 5.68747 9.62502C5.48513 9.62502 5.29591 9.57553 5.12474 9.49377L1.02019 13.5983L1.42187 14L9.07425 11.4491C9.62395 11.2659 10.0473 10.8224 10.2049 10.2649L11.3749 6.12504L7.87496 2.62506L3.73514 3.79509ZM13.6155 2.02814L11.9719 0.38452C11.4592 -0.128173 10.6276 -0.128173 10.115 0.38452L8.56867 1.9308L12.0692 5.43133L13.6155 3.88505C14.1282 3.37236 14.1282 2.54111 13.6155 2.02814H13.6155Z" fill="#1391E6" />
                  </svg>
                  <time datetime="2021-01-01">2021.01.01</time>
                </p>
                <div class="p-article01__category">カテゴリ1</div>
              </div>
              <div class="p-article01__description">
                <p class="p-article01__text">
                  テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<a href="#" class="u-text-link">リンクが入ります。</a>テキストが入ります。テキストが入ります。テキストが入ります。
                </p>
                <p class="p-article01__text">
                  テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                </p>
              </div>
            </section>
            <section class="p-article__sec02 p-article02">
              <h3 class="p-article02__title">
                見出し2見出し2見出し2見出し2
              </h3>
              <figure class="p-article02__img">
                <img src="<?= get_template_directory_uri(); ?>/img/dummy.webp" alt="ダミー画像" width="670" height="419" />
              </figure>
            </section>
            <section class="p-article__sec03 p-article03">
              <h4 class="p-article03__title">
                見出し3見出し3見出し3見出し3
              </h4>
              <p class="p-article03__text">
                テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
              </p>
            </section>
            <section class="p-article__sec04 p-article04">
              <h5 class="p-article04__title">
                見出し4見出し4見出し4見出し4
              </h5>
              <p class="p-article04__text">
                テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
              </p>
              <ul class="p-article04__lists">
                <li class="p-article04__item">リスト1</li>
                <li class="p-article04__item">リスト2</li>
                <li class="p-article04__item">リスト3</li>
              </ul>
            </section>
            <div class="p-article__pagination">
              <a href="#" class="p-article__pagination-prev">
                前の記事<span class="u-sm-show">へ</span>
              </a>
              <a href="./single.html" class="p-article__pagination-archive">記事一覧</a>
              <a href="#" class="p-article__pagination-next">
                次の記事<span class="u-sm-show">へ</span>
              </a>
            </div>
          </div>
        </div>
      </main>

      <?php get_sidebar(); ?>

    </div>
  </div>
</div>
<?php get_footer(); ?>