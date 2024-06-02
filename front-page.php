<!-- 変数定義 -->
<?php
// スラッグ "news" のページのリンクを取得
$news_page = get_page_by_path('news');
$news_page_link = get_permalink($news_page->ID);
?>

<!-- 本文 -->

<?php get_header(); ?>

<div id="fv" class="p-fv">
  <div class="p-fv__inner l-inner">
    <div class="p-fv__container">
      <div class="p-fv__slide p-slide">
        <div class="p-slide__swiper fv-swiper">
          <ul class="p-slide__wrapper swiper-wrapper">
            <li class="p-slide__slide swiper-slide">
              <figure class="p-slide__card">
                <picture class="">
                  <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_fv_pc_01.webp" />
                  <img src="<?= get_template_directory_uri(); ?>/img/index_fv_sp_01.webp" alt="" decoding="async" width="1160" height="520" />
                </picture>
              </figure>
            </li>
            <li class="p-slide__slide swiper-slide">
              <figure class="p-slide__card">
                <picture class="">
                  <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_fv_pc_02.webp" />
                  <img src="<?= get_template_directory_uri(); ?>/img/index_fv_sp_02.webp" alt="トップページ画像" decoding="async" width="1160" height="520" />
                </picture>
              </figure>
            </li>
            <li class="p-slide__slide swiper-slide">
              <figure class="p-slide__card">
                <picture>
                  <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_fv_pc_03.webp" />
                  <img src="<?= get_template_directory_uri(); ?>/img/index_fv_sp_03.webp" alt="トップページ画像" decoding="async" width="1160" height="520" />
                </picture>
              </figure>
            </li>
          </ul>
        </div>
        <div class="p-slide__arrow">
          <div class="p-slide__arrow-next swiper-button-next"></div>
          <div class="p-slide__arrow-prev swiper-button-prev"></div>
        </div>
        <div class="p-slide__pagination swiper-pagination"></div>
        <div class="p-slide__catch-copy">
          <picture>
            <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_fv_pc_catch-copy.svg" width="420" height="120" />
            <img src="<?= get_template_directory_uri(); ?>/img/index_fv_sp_catch-copy.svg" alt="街の皆さまの笑顔を守るアットホームな歯医者さん" decoding="async" width="270" height="76" />
          </picture>
        </div>
      </div>
      <div class="p-fv__bottom-information">
        <div class="p-fv__calendar">
          <figure class="p-fv__calendar-img">
            <img src="<?= get_template_directory_uri(); ?>/img/index_calendar.webp" alt="営業カレンダー" width="477" height="166" />
          </figure>
        </div>

        <div class="p-fv__news-topic p-news-topic">
          <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
          );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
          ?>
              <div class="p-news-topic__heading">
                <div class="p-news-topic__left">
                  <p class="p-news-topic__left-title">お知らせ</p>
                  <span class="p-news-topic__left-news c-title-en">NEWS</span>
                </div>
                <a href="<?php echo esc_url($news_page_link); ?>" class="p-news-topic-box__right">過去のお知らせはこちら</a>
              </div>
              <a href="<?= the_permalink($post); ?>" class="p-news-topic__contents c-arrow-link" data-custom-date="<?php the_time('Y/m/d'); ?>">
                <p class="p-news-topic_text">年末年始の営業時間のお知らせ</p>
              </a>
          <?php endwhile;
          endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<main>
  <section id="concept" class="p-concept">
    <div class="p-concept__inner l-inner">
      <div class="p-concept__container p-about-concept">
        <div class="p-about-concept__contents">
          <p class="p-about-concept__title-en c-title-en">CONCEPT</p>
          <h2 class="p-about-concept__title-ja c-title-ja">
            健康的で素敵な笑顔あふれる<br />街づくりを目指して
          </h2>
          <p class="p-about-concept__text">
            私たちは最新の医療技術を追求すると共に、患者様とのコミュニケーションを大事することで、気軽に通いやすく些細なことでも相談できる「街の掛かり付け医」を目指しております。<br />
            お子様からご高齢の方まで、快適な空間で治療が受けられる場を作り、地域医療に貢献しきたいと考えております。
          </p>
          <div class="p-about-concept__button">
            <a href="<?= home_url('/about/'); ?>" class="c-button-cir-sm c-arrow-link">当院について</a>
          </div>
        </div>
        <figure class="p-about-concept__img">
          <img src="<?= get_template_directory_uri(); ?>/img/index_concept_01.webp" alt="歯の治療をしている画像" width="640" height="438" />
        </figure>
      </div>
    </div>
  </section>

  <section id="recommend" class="p-recommend">
    <div class="p-recommend__inner l-inner">
      <div class="p-recommend__container">
        <h2 class="p-recommend__title c-title-sec">当院の3つのおすすめ</h2>
        <ul class="p-recommend__list p-recommend-box">
          <li class="p-recommend-box__item">
            <figure class="p-recommend-box__img">
              <picture>
                <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_recommend_pc_01.webp" width="276" height="305" />
                <img src="<?= get_template_directory_uri(); ?>/img/index_recommend_sp_01.webp" alt="おすす01 痛くない歯科医療の追求" width="276" height="300" />
              </picture>
            </figure>
            <p class="p-recommend-box__text">
              歯の治療において、小さな違和感は大きなストレスにつながります。<br />
              私たちは常に快適な歯科医療技術の研究を<span class="u-sm-inline">行っ</span>ております。
            </p>
          </li>
          <li class="p-recommend-box__item">
            <figure class="p-recommend-box__img">
              <picture>
                <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_recommend_pc_02.webp" width="276" height="305" />
                <img src="<?= get_template_directory_uri(); ?>/img/index_recommend_sp_02.webp" alt="おすす02 駅から徒歩3分" width="276" height="300" />
              </picture>
            </figure>
            <p class="p-recommend-box__text">
              「通いやすさ」も医院選びの重要なポイントと考え、2019年のリニューアルを期に更に駅の近くへ場所を移しました。
            </p>
          </li>
          <li class="p-recommend-box__item">
            <figure class="p-recommend-box__img">
              <picture>
                <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_recommend_pc_03.webp" width="276" height="305" />
                <img src="<?= get_template_directory_uri(); ?>/img/index_recommend_sp_03.webp" alt="おすす013 夜20時30分まで営業" width="276" height="300" />
              </picture>
            </figure>
            <p class="p-recommend-box__text">
              朝から夜までお仕事をされている方のために、診療時間を見直しました。<br />
              <em class="u-text-emphasis">※駆け込みでも対応可能ですが、事前にご連絡いただけるとスムーズです。</em>
            </p>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section id="guid" class="p-guid">
    <div class="p-guid__decoration-top"></div>
    <div class="p-guid__wrapper">
      <div class="p-guid__inner l-inner">
        <div class="p-guid__container">
          <h2 class="p-guid__title c-title-sec">診療案内</h2>
          <div class="p-guid__contents p-guid-box">
            <ul class="p-guid-box__thumbnails">
              <li class="p-guid-box__thumbnail">
                <a href="<?= home_url('/medical/#general'); ?>" class="p-guid-box__thumbnail-link">
                  <figure class="p-guid-box__img">
                    <img src="<?= get_template_directory_uri(); ?>/img/index_guid_01.webp" alt="歯ブラシが瓶の中に立てかけてある画像" width="460" height="290" />
                  </figure>
                  <div class="p-guid-box__outline"></div>
                  <div class="p-guid-box__signboard">
                    <h3 class="p-guid-box__signboard-main">一般診療</h3>
                    <p class="p-guid-box__signboard-sub">
                      虫歯・入れ歯・小児歯科
                    </p>
                  </div>
                </a>
              </li>
              <li class="p-guid-box__thumbnail">
                <a href="<?= home_url('/medical/#special'); ?>" class="p-guid-box__thumbnail-link">
                  <figure class="p-guid-box__img">
                    <img src="<?= get_template_directory_uri(); ?>/img/index_guid_02.webp" alt="入れ歯のモデルサンプル画像" width="460" height="290" />
                  </figure>
                  <div class="p-guid-box__outline"></div>
                  <div class="p-guid-box__signboard">
                    <h3 class="p-guid-box__signboard-main">特殊診療</h3>
                    <p class="p-guid-box__signboard-sub">
                      インプラント・ホワイトニング<br />
                      予防歯科・口腔外科・審美歯科
                    </p>
                  </div>
                </a>
              </li>
            </ul>
            <div class="p-guid-box__discription">
              <p class="p-guid-box__discription-text">
                当院では、患者さんの歯の健康状態や治療方針を丁寧にカウンセリングし、十分ご理解していただいた上で治療いたします。<br />
                痛みに配慮することと、可能な限り削らない・抜かない治療に努めております。<br />
                <em class="u-text-emphasis">※特殊性の高い矯正治療などは保険の適応外となります。
                  これらの治療を行う際は事前に詳細と費用のご説明いたします。</em>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-guid__decoration-bottom">
      <div class="p-guid__decoration-parts01">
        <picture>
          <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_guid_pc_decoration01.webp" />
          <img src="<?= get_template_directory_uri(); ?>/img/index_guid_sp_decoration01.webp" alt="" decoding="async" width="57" height="56" />
        </picture>
      </div>
      <div class="p-guid__decoration-parts02">
        <picture>
          <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_guid_pc_decoration02.webp" />
          <img src="<?= get_template_directory_uri(); ?>/img/index_guid_sp_decoration02.webp" alt="" decoding="async" width="125" height="138" />
        </picture>
      </div>
    </div>
  </section>

  <section id="blog" class="p-blog">
    <div class="p-blog__inner l-inner">
      <div class="p-blog__container">
        <h2 class="p-blog__title c-title-sec">スタッフブログ</h2>
        <div class="p-blog__contents p-blog-box">
          <ul class="p-blog-box__thumbnails">

            <?php
            $args = array(
              'post_type' => 'blog',
              'posts_per_page' => 6,
              'orderby' => 'date',
              'order' => 'DESC',
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
                // 投稿の投稿日を取得
                $post_date = get_the_date('Y-m-d');
                // 現在の日付を取得
                $current_date = date('Y-m-d');
                // 日付を比較して3日以内の場合に「is-new」というクラスを追加
                $is_new = (strtotime($current_date) - strtotime($post_date)) < 259200; // 259200は3日間の秒数
            ?>
                <li class="p-blog-box__thumbnail">
                  <a href="<?php the_permalink(); ?>" class="p-blog-box__link">
                    <div class="p-blog-box__card <?php if ($is_new) echo 'is-new'; ?>">
                      <figure class="p-blog-box__img">
                        <?php display_acf_image('img2-1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                      </figure>
                    </div>
                    <div class="p-blog-box__caption">
                      <?php
                      // 現在の投稿のタームを取得
                      $terms = get_the_terms(get_the_ID(), 'blog-category');
                      ?>
                      <?php if ($terms && !is_wp_error($terms)) : ?>
                        <?php foreach ($terms as $term) : ?>
                          <div class="p-blog-box__category"><?= esc_html($term->name); ?></div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                      <p class="p-blog-box__text"><?= the_title(); ?></p>
                      <time class="p-blog-box__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
                    </div>
                  </a>
                </li>
            <?php endwhile;
            endif; ?>
            <?php wp_reset_postdata(); ?>

          </ul>
          <div class="p-blog-box__button">
            <a href="<?= home_url('/blog/'); ?>" class="c-button-cir-sm--long c-arrow-link">スタッフブログ一覧はこちら</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>