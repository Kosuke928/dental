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
              $args = array(
                'post_type' => 'post',              // 投稿タイプ
                'posts_per_page' => '10', // 10件を取得
                'orderby' => 'date', // 日付順で表示
                'order' => 'DESC' //降順(新しいものが上)
              );
              $the_query = new WP_Query($args);
              if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
              ?>

                  <li class="p-post__thumbnail p-post-box">
                    <a href="<?php the_permalink(); ?>" class="p-post-box__link">
                      <div class="p-post-box__card is-new">
                        <figure class="p-post-box__img">
                          <?php if (has_post_thumbnail()) : // アイキャッチ画像が設定されてれば表示 
                          ?>
                            <?php the_post_thumbnail(); ?>
                          <?php else : // なければdummy画像をデフォルトで表示 
                          ?>
                            <img src="<?= get_template_directory_uri(); ?>/img/dummy.webp" alt="新着記事画像" width="244" height="153" />
                          <?php endif; ?>
                        </figure>
                      </div>
                      <div class="p-post-box__caption">
                        <?php $terms = get_the_terms(get_the_ID(), 'blog-category'); ?>
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
              <a href="" class="p-pagenation__prev"> 前へ </a>
              <a href="#" class="p-pagenation__numbers">1</a>
              <a href="#" class="p-pagenation__numbers u-current">2</a>
              <a href="#" class="p-pagenation__numbers">3</a>
              <a href="#" class="p-pagenation__numbers u-md-show--grid">4</a>
              <a href="#" class="p-pagenation__numbers u-md-show--grid">5</a>
              <a href="#" class="p-pagenation__numbers u-md-show--grid">6</a>
              <a href="#" class="p-pagenation__numbers">…</a>
              <a href="#" class="p-pagenation__numbers">20</a>
              <a href="" class="p-pagenation__next"> 次へ </a>
            </div>
          </div>
        </div>
      </main>
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>