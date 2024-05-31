<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<main>
  <section id="treatment" class="p-treatment">
    <div class="p-treatment__inner l-inner">

      <!-- ヘッダー部分 -->
      <div class="p-treatment__container">
        <?php
        // カテゴリ別にタームを設定
        $categories = array(
          'general' => '一般診療',
          'special' => '特殊診療',
        );
        //ターム種類分(general/special)だけループ処理
        foreach ($categories as $slug => $title) {
          // WP_Queryのパラメータを設定
          $args = array(
            'post_type' => 'plan',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'tax_query' => array(
              array(
                'taxonomy' => 'plan-category',
                'field'    => 'slug',
                'terms'    => $slug,
              ),
            ),
          );
          // クエリを実行
          $query = new WP_Query($args);
          if ($query->have_posts()) : ?>
            <div class="p-treatment__box">
              <div class="p-treatment__box-top">
                <h2 class="p-treatment__title"><?= esc_html($title); ?></h2>
                <?php if ($slug == 'general') : ?>
                  <span class="p-treatment__tag c-tag-lg">保険対象</span>
                <? elseif ($slug == 'special') : ?>
                  <span class="p-treatment__tag c-tag-lg--accent">実費</span>
                <?php endif; ?>
              </div>
              <ul class="p-treatment__list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <li class="p-treatment__item">
                    <a href="#<?= esc_attr(get_post_field('post_name')); ?>" class="p-treatment__link c-button-cat"><?= the_title() ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
        <?php endif;
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>
  </section>

  <!-- ボディ部分 -->
  <section id="general" class="p-general">
    <div class="p-general__decoration-top"></div>
    <div class="p-general__wrapper">
      <div class="p-general__inner l-inner">
        <div class="p-general__container">

          <?php
          // カテゴリを指定
          $categories = array(
            'general' => '一般診療',
          );

          // カテゴリループ開始
          foreach ($categories as $slug => $category_name) {

            // WP_Queryのパラメータを設定
            $args = array(
              'post_type' => 'plan',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'plan-category',
                  'field'    => 'slug',
                  'terms'    => $slug,
                ),
              ),
            );

            // クエリを実行
            $query = new WP_Query($args);
            if ($query->have_posts()) : ?>
              <h2 class="p-general__title c-title-sec"><?php echo esc_html($category_name); ?></h2>
              <ul class="p-general__thumbnails">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <li id="<?= esc_attr(get_post_field('post_name')); ?>" class="p-general__thumbnail p-medical">
                    <div class="p-medical__decoration c-tag-flag">保険対象</div>
                    <div class="p-medical__top">
                      <h3 class="p-medical__title"><?php the_title(); ?></h3>
                      <span class="p-medical__supplement">
                        <?php the_field("sub-title"); ?>
                      </span>
                    </div>
                    <div class="p-medical__bottom">
                      <div class="p-medical__description">
                        <p class="p-medical__text">
                          <?php the_field("text1"); ?>
                        </p>
                        <p class="p-medical__text">
                          <?php the_field("text2"); ?>
                        </p>
                      </div>
                      <figure class="p-medical__img">
                        <?php display_acf_image('img1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                      </figure>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ul>
          <?php endif;
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </div>
    <div class="p-general__decoration-bottom">
      <div class="p-general__decoration-parts01 p-decoration-parts">
        <picture>
          <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_guid_pc_decoration01.webp" />
          <img src="<?= get_template_directory_uri(); ?>/img/index_guid_sp_decoration01.webp" alt="" decoding="async" width="57" height="56" />
        </picture>
      </div>
      <div class="p-general__decoration-parts02 p-decoration-parts">
        <picture>
          <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img/index_guid_pc_decoration02.webp" />
          <img src="<?= get_template_directory_uri(); ?>/img/index_guid_sp_decoration02.webp" alt="" decoding="async" width="125" height="138" />
        </picture>
      </div>
    </div>
  </section>
  </section>

  <section id="special" class="p-special">
    <div class="p-special__decoration-top"></div>
    <div class="p-special__wrapper">
      <div class="p-special__inner l-inner">
        <div class="p-special__container">

          <?php
          // カテゴリを指定
          $categories = array(
            'special' => '特殊診療',
          );

          // カテゴリループ開始
          foreach ($categories as $slug => $category_name) {

            // WP_Queryのパラメータを設定
            $args = array(
              'post_type' => 'plan',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'plan-category',
                  'field'    => 'slug',
                  'terms'    => $slug,
                ),
              ),
            );

            // クエリを実行
            $query = new WP_Query($args);
            if ($query->have_posts()) : ?>
              <h2 class="p-special__title c-title-sec"><?php echo esc_html($category_name); ?></h2>
              <ul class="p-special__thumbnails">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <li id="<?= esc_attr(get_post_field('post_name')); ?>" class="p-special__thumbnail p-medical">
                    <div class="p-medical__decoration c-tag-flag--accent">実費</div>
                    <div class="p-medical__top">
                      <h3 class="p-medical__title"><?php the_title(); ?></h3>
                      <span class="p-medical__supplement">
                        <?php the_field("sub-title"); ?>
                      </span>
                    </div>
                    <div class="p-medical__bottom">
                      <div class="p-medical__description">
                        <p class="p-medical__text">
                          <?php the_field("text1"); ?>
                        </p>
                        <p class="p-medical__text">
                          <?php the_field("text2"); ?>
                        </p>
                      </div>
                      <figure class="p-medical__img">
                        <?php display_acf_image('img1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                      </figure>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ul>
          <?php endif;
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </div>
    <div class="p-special__decoration-bottom">
      <div class="p-special__decoration-parts01 p-decoration-parts">
        <picture>
          <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//index_guid_pc_decoration01.webp" />
          <img src="<?= get_template_directory_uri(); ?>/img/index_guid_sp_decoration01.webp" alt="" decoding="async" width="57" height="56" />
        </picture>
      </div>
      <div class="p-special__decoration-parts02 p-decoration-parts">
        <picture>
          <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//index_guid_pc_decoration02.webp" />
          <img src="<?= get_template_directory_uri(); ?>/img/index_guid_sp_decoration02.webp" alt="" decoding="async" width="125" height="138" />
        </picture>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>