<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<div class="l-wrapper">
  <div class="l-wrapper__inner">
    <div class="l-wrapper__contents">
      <main class="l-main">
        <article class="p-article">
          <div class="p-article__container">


            <!-- 定義を書く -->
            <?php
            // URLからタームスラッグを取得する
            $url_path = $_SERVER['REQUEST_URI']; // 例: /news-post8/ or /blog/blog-post15/
            $parsed_url = parse_url($url_path, PHP_URL_PATH); // 例: /news-post8/ or /blog/blog-post15/
            $path_segments = explode('/', trim($parsed_url, '/')); // 例: ['news-post8'] or ['blog', 'blog-post15']
            // 初期値としてのpost_typeを設定
            $post_type = 'post';
            $post_archive = 'news';
            // post_typeをURLに基づいて設定
            if (strpos($path_segments[0], 'blog') !== false) {
              $post_type = 'blog';
              $post_archive = 'blog';
            }
            ?>

            <!-- ループ開始 -->
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <section class="p-article__sec01 p-article01">
                  <h2 class="p-article01__title">
                    <?= the_title(); ?>
                  </h2>
                  <div class="p-article01__addition">
                    <p class="p-article01__date">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M3.73514 3.79509C3.17755 3.95269 2.73412 4.37605 2.55089 4.92575L0 12.5781L0.401678 12.9798L4.50623 8.87526C4.42447 8.70409 4.37498 8.51487 4.37498 8.31253C4.37498 7.58765 4.96259 7.00003 5.68747 7.00003C6.41235 7.00003 6.99997 7.58765 6.99997 8.31253C6.99997 9.03741 6.41235 9.62502 5.68747 9.62502C5.48513 9.62502 5.29591 9.57553 5.12474 9.49377L1.02019 13.5983L1.42187 14L9.07425 11.4491C9.62395 11.2659 10.0473 10.8224 10.2049 10.2649L11.3749 6.12504L7.87496 2.62506L3.73514 3.79509ZM13.6155 2.02814L11.9719 0.38452C11.4592 -0.128173 10.6276 -0.128173 10.115 0.38452L8.56867 1.9308L12.0692 5.43133L13.6155 3.88505C14.1282 3.37236 14.1282 2.54111 13.6155 2.02814H13.6155Z" fill="#1391E6" />
                      </svg>
                      <time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
                    </p>


                    <?php if ($post_type == "post") : ?>
                      <?php
                      // 現在の投稿のカテゴリーを取得
                      $categories = get_the_category();
                      ?>
                      <?php if ($categories && !is_wp_error($categories)) : ?>
                        <?php foreach ($categories as $category) : ?>
                          <a href="<?= get_category_link($category->term_id); ?>" class="p-post-box__category c-tag-md--single"><?= esc_html($category->name); ?></a>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    <?php else : ?>
                      <?php
                      // 現在の投稿のタームを取得
                      $terms = get_the_terms(get_the_ID(), 'blog-category');
                      ?>
                      <?php if ($terms && !is_wp_error($terms)) : ?>
                        <?php foreach ($terms as $term) : ?>
                          <a href="<?=  get_term_link($term->term_id); ?>" class="p-post-box__category c-tag-md--single"><?= esc_html($term->name); ?></a>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    <?php endif; ?>


                  </div>
                  <div class="p-article01__description">
                    <p class="p-article01__text">
                      <?= acf_text_with_link('text1-1', "link1-1", "u-text-link"); ?>
                    </p>
                    <p class="p-article01__text">
                      <?= acf_text_with_link('text1-2'); ?>
                    </p>
                  </div>
                </section>
                <section class="p-article__sec02 p-article02">
                  <h3 class="p-article02__title">
                    <?= get_field("heading2"); ?>
                  </h3>
                  <figure class="p-article02__img">
                    <?php display_acf_image('img2-1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                  </figure>
                </section>
                <section class="p-article__sec03 p-article03">
                  <h4 class="p-article03__title">
                    <?= get_field("heading3"); ?>
                  </h4>
                  <p class="p-article03__text">
                    <?= acf_text_with_link('text3-1'); ?>
                  </p>
                </section>
                <section class="p-article__sec04 p-article04">
                  <h5 class="p-article04__title">
                    <?= get_field("heading4"); ?>
                  </h5>
                  <p class="p-article04__text">
                    <?= acf_text_with_link('text4-1'); ?>
                  </p>
                  <ul class="p-article04__lists">
                    <li class="p-article04__item"><?= get_field("list4-1"); ?></li>
                    <li class="p-article04__item"><?= get_field("list4-1"); ?></li>
                    <li class="p-article04__item"><?= get_field("list4-1"); ?></li>
                  </ul>
                </section>

              <?php endwhile; ?>
            <?php endif; ?>

            <div class="p-article__pagination">
              <?php if (get_previous_post(false)) : ?>
                <?php previous_post_link('%link', '<span class="p-article__pagination-prev">前の記事<span class="u-sm-show">へ</span></span>', false); ?>
              <?php endif; ?>
                <a href="<?= home_url($post_archive); ?>" class="p-article__pagination-archive">記事一覧</a>
              <?php if (get_next_post(false)) : ?>
                <?php next_post_link('%link', '<span class="p-article__pagination-next">次の記事<span class="u-sm-show">へ</span></span>', false); ?>
              <?php endif; ?>
            </div>

          </div>
        </article>
      </main>
      <?php get_sidebar(); ?>

    </div>
  </div>
</div>
<?php get_footer(); ?>