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
              // 現在のページ番号を取得
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              // URLからタームスラッグを取得する
              $url_path = $_SERVER['REQUEST_URI']; // 例: /blog-category/blog-cat3/?page=2
              $parsed_url = parse_url($url_path, PHP_URL_PATH); // 例: /blog-category/blog-cat3/
              $path_segments = explode('/', trim($parsed_url, '/')); // 例: ['blog-category', 'blog-cat3']
              $term_slug = $path_segments[1];  // 例: 'blog-cat3'

              // WP_Query引数を設定する
              $args = array(
                'post_type' => 'blog',
                'posts_per_page' => 10,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'blog-category',
                    'field' => 'slug',
                    'terms' => $term_slug,
                  ),
                ),
              );

              $the_query = new WP_Query($args);
              if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
              ?>
                  <li class="p-post__thumbnail p-post-box">
                    <a href="<?php the_permalink(); ?>" class="p-post-box__link">
                      <div class="p-post-box__card is-new">
                        <figure class="p-post-box__img">
                          <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                          <?php else : ?>
                            <img src="<?= get_template_directory_uri(); ?>/img/dummy.webp" alt="新着記事画像" width="244" height="153" />
                          <?php endif; ?>
                        </figure>
                      </div>
                      <div class="p-post-box__caption">
                        <?php $terms = get_the_terms(get_the_ID(), 'blog-category'); ?>
                        <?php if ($terms && !is_wp_error($terms)) : ?>
                          <?php foreach ($terms as $term) : ?>
                            <div class="p-post-box__category c-tag-md"><?= esc_html($term->name); ?></div>
                          <?php endforeach; ?>
                        <?php endif; ?>
                        <p class="p-post-box__text">
                          <?php the_title(); ?>
                        </p>
                        <time class="p-post-box__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
                      </div>
                    </a>
                  </li>
              <?php endwhile;
              endif;
              wp_reset_postdata(); ?>
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