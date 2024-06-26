<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<div class="l-wrapper">
  <div class="l-wrapper__inner">
    <div class="l-wrapper__contents">
      <main class="l-main">
        <div class="p-post">
          <div class="p-post__container">
            <ul class="p-post__thumbnails">

              <?php
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'post',              // 投稿タイプ
                'posts_per_page' => '10', // 10件を取得
                'orderby' => 'date', // 日付順で表示
                'order' => 'DESC', //降順(新しいものが上)
                'paged' => $paged,
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

                  <li class="p-post__thumbnail p-post-box">
                    <a href="<?php the_permalink(); ?>" class="p-post-box__link">
                      <div class="p-post-box__card is-new">
                        <figure class="p-post-box__img">
                          <?php display_acf_image('img2-1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                        </figure>
                      </div>
                      <div class="p-post-box__caption">
                        <?php $terms = get_the_category(get_the_ID(), 'category'); ?>
                        <?php foreach ($terms as $term) : ?>
                          <?php if ($term->name) : ?>
                            <div class="p-post-box__category c-tag-md"><?= $term->name; ?></div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                        <p class="p-post-box__text">
                          <?php the_title(); // タイトルを表示 
                          ?>
                        </p>
                        <time class="p-post-box__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
                      </div>
                    </a>
                  </li>

              <?php endwhile;
              endif; ?>
              <?php wp_reset_postdata(); ?>

            </ul>
            <div class="p-post__pagination p-pagination">
              <?= custom_pagination($the_query); ?>
            </div>
          </div>
        </div>
      </main>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>