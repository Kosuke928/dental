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
              $cat_type = isset($path_segments[1]) ? $path_segments[0] : "blog-category";  // 'category' or 'blog-category'
              $post_type = $path_segments[0] === "category" ? "post" : $path_segments[0]; //'post' or 'blog'
              $term_slug = $path_segments[1];

              $args = array(
                'post_type' => $post_type,
                'posts_per_page' => 10,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $term_slug,
                  ),
                ),
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
                      <div class="p-post-box__card  <?php if ($is_new) echo 'is-new'; ?>">
                        <figure class="p-post-box__img">
                          <?php display_acf_image('img2-1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                        </figure>
                      </div>
                      <div class="p-post-box__caption">

                        <?php if ($post_type == "post") : ?>
                          <?php
                          // 現在の投稿のカテゴリーを取得
                          $categories = get_the_category();
                          ?>
                          <?php if ($categories && !is_wp_error($categories)) : ?>
                            <?php foreach ($categories as $category) : ?>
                              <div class="p-post-box__category c-tag-md"><?= esc_html($category->name); ?></div>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        <?php else : ?>
                          <?php
                          // 現在の投稿のタームを取得
                          $terms = get_the_terms(get_the_ID(), 'blog-category');
                          ?>
                          <?php if ($terms && !is_wp_error($terms)) : ?>
                            <?php foreach ($terms as $term) : ?>
                              <div class="p-post-box__category c-tag-md"><?= esc_html($term->name); ?></div>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        <?php endif; ?>

                        <p class="p-post-box__text">
                          <?php the_title(); ?>
                        </p>
                        <time class="p-post-box__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
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