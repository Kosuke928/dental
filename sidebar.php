<!-- 変数定義 -->
<?php
$page = get_page_by_path('about');
$about_link = esc_url(get_permalink($page->ID)); //aboutページリンク
?>

<?php
// 現在のページ番号を取得
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
// URLからタームスラッグを取得する
$url_path = $_SERVER['REQUEST_URI']; // 例: /blog-category/blog-cat3/?page=2
$parsed_url = parse_url($url_path, PHP_URL_PATH); // 例: /blog-category/blog-cat3/
$path_segments = explode('/', trim($parsed_url, '/')); // 例: ['blog-category', 'blog-cat3']
$cat = isset($path_segments[1]) ? $path_segments[0] : "blog-category";  // 'category' or 'blog-category'
// $post_type = $path_segments[0] === "category" || $path_segments[0] === "news" ? "post" : "blog"; //'post' or 'blog'

if($path_segments[0] === "category" || $path_segments[0] === "news"){
  $post_type = "post";
} elseif(strpos($path_segments[0], 'news') !== false) {
  $post_type = "post";
} else {
  $post_type = "blog";
}

?>


<!-- 本文 -->
<aside class="l-sidebar p-sidebar">
  <div class="p-sidebar__block p-sidebar-block01">
    <h2 class="p-sidebar__title">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M8.36761 11.232V9.55462C8.36761 9.27672 8.59292 9.05141 8.87082 9.05141H10.5482C10.8261 9.05141 11.0514 9.27672 11.0514 9.55462V11.232C11.0514 11.5099 10.8261 11.7352 10.5482 11.7352H8.87082C8.59292 11.7352 8.36761 11.5099 8.36761 11.232ZM14.2384 11.7352H15.9158C16.1937 11.7352 16.419 11.5099 16.419 11.232V9.55462C16.419 9.27672 16.1937 9.05141 15.9158 9.05141H14.2384C13.9605 9.05141 13.7352 9.27672 13.7352 9.55462V11.232C13.7352 11.5099 13.9605 11.7352 14.2384 11.7352ZM11.0514 15.2577V13.5803C11.0514 13.3024 10.8261 13.0771 10.5482 13.0771H8.87082C8.59292 13.0771 8.36761 13.3024 8.36761 13.5803V15.2577C8.36761 15.5356 8.59292 15.7609 8.87082 15.7609H10.5482C10.8261 15.7609 11.0514 15.5356 11.0514 15.2577ZM14.2384 15.7609H15.9158C16.1937 15.7609 16.419 15.5356 16.419 15.2577V13.5803C16.419 13.3024 16.1937 13.0771 15.9158 13.0771H14.2384C13.9605 13.0771 13.7352 13.3024 13.7352 13.5803V15.2577C13.7352 15.5356 13.9605 15.7609 14.2384 15.7609ZM21.7866 20.9608V22.4704H3V20.9608C3 20.6829 3.22531 20.4576 3.50321 20.4576H4.32093V4.56589C4.32093 4.07874 4.77152 3.6838 5.32736 3.6838H9.03856V2.00643C9.03856 1.45059 9.48914 1 10.045 1H14.7416C15.2975 1 15.7481 1.45059 15.7481 2.00643V3.6838H19.4593C20.0151 3.6838 20.4657 4.07874 20.4657 4.56589V20.4576H21.2834C21.5613 20.4576 21.7866 20.6829 21.7866 20.9608ZM6.33379 20.4156H11.0514V17.606C11.0514 17.3281 11.2767 17.1028 11.5546 17.1028H13.232C13.5099 17.1028 13.7352 17.3281 13.7352 17.606V20.4156H18.4528V5.69666H15.7481V6.70308C15.7481 7.25892 15.2975 7.70951 14.7416 7.70951H10.045C9.48914 7.70951 9.03856 7.25892 9.03856 6.70308V5.69666H6.33379V20.4156ZM14.1546 3.6838H13.0643V2.59351C13.0643 2.45455 12.9516 2.3419 12.8127 2.3419H11.974C11.835 2.3419 11.7224 2.45455 11.7224 2.59351V3.6838H10.6321C10.4931 3.6838 10.3805 3.79645 10.3805 3.93541V4.7741C10.3805 4.91306 10.4931 5.0257 10.6321 5.0257H11.7224V6.116C11.7224 6.25496 11.835 6.36761 11.974 6.36761H12.8127C12.9516 6.36761 13.0643 6.25496 13.0643 6.116V5.0257H14.1546C14.2935 5.0257 14.4062 4.91306 14.4062 4.7741V3.93541C14.4062 3.79645 14.2935 3.6838 14.1546 3.6838Z" fill="#393939" />
      </svg>
      クリニックの紹介
    </h2>
    <figure class="p-sidebar-block01__img">
      <img src="<?= get_template_directory_uri(); ?>/img/single_sidebar_01.webp" alt="クリニックの紹介画像" width="670" height="419" />
    </figure>
    <div class="p-sidebar-block01__description">
      <h3 class="p-sidebar-block01__heading">みなみ歯科クリニック</h3>
      <p class="p-sidebar-block01__text">
        お子様からご高齢の方まで、快適な空間で治療が受けられる場を作り、地域医療に貢献しきたいと考えております。
      </p>
      <a href="<?= $about_link ?>" class="p-sidebar-block01__link">
        当院について
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
          <path d="M7.47002 14.3553C7.29126 14.3557 7.11803 14.2934 6.98038 14.1794C6.82392 14.0497 6.7255 13.863 6.70685 13.6606C6.68819 13.4583 6.75082 13.2568 6.88092 13.1006L10.3084 8.99995L7.00333 4.8916C6.87498 4.73355 6.81492 4.53085 6.83646 4.32838C6.858 4.12592 6.95936 3.94039 7.11809 3.81288C7.27812 3.67208 7.48962 3.60442 7.70166 3.6262C7.91369 3.64799 8.10702 3.75724 8.23507 3.92763L11.9303 8.51797C12.1623 8.80028 12.1623 9.20728 11.9303 9.48959L8.10501 14.0799C7.94935 14.2677 7.71348 14.37 7.47002 14.3553Z" fill="#1391E6" />
        </svg>
      </a>
    </div>
  </div>
  <div class="p-sidebar__block p-sidebar-block02">
    <h2 class="p-sidebar__title">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M13.0612 3H6.79138C5.80203 3 5 3.80203 5 4.79138V19.1224C5 20.1118 5.80203 20.9138 6.79138 20.9138H17.5397C18.529 20.9138 19.3311 20.1118 19.3311 19.1224V9.26984L13.0612 3Z" stroke="#393939" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M13.061 3V9.26984H19.3309" stroke="#393939" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      新着記事
    </h2>
    <ul class="p-sidebar-block02__thumbnails">

      <?php
      $args = array(
        'post_type' => $post_type,
        'posts_per_page' => '5',
        'orderby' => 'date',
        'order' => 'DESC',
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ?>
          <li class="p-sidebar-block02__thumbnail p-sidebar-post">
            <a href="<?php the_permalink(); ?>" class="p-sidebar-post__link">
              <div class="p-sidebar-post__card">
                <figure class="p-sidebar-post__img">
                  <?php display_acf_image('img2-1', get_template_directory_uri() . '/img/dummy.webp'); ?>
                </figure>
              </div>
              <div class="p-sidebar-post__caption">

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




                <!-- <?php $terms = get_the_terms(get_the_ID(), 'blog-category'); ?>
                <?php if ($terms && !is_wp_error($terms)) : ?>
                  <?php foreach ($terms as $term) : ?>
                    <div class="p-sidebar-post__category"><?= $term->name; ?></div>
                  <?php endforeach; ?>
                <?php endif; ?> -->


                <p class="p-sidebar-post__text">
                  <?php the_title(); ?>
                </p>
                <time class="p-sidebar-post__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.j'); ?></time>
              </div>
            </a>
          </li>
      <?php endwhile;
      endif; ?>
      <?php wp_reset_postdata(); ?>

    </ul>
  </div>
  <div class="p-sidebar__block p-sidebar-block03">
    <h2 class="p-sidebar__title">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M20.9382 6.2438H12.4661L10.4725 3.77686H3.99346C2.89693 3.77686 2 4.76353 2 5.96971V18.0303C2 19.2365 2.89693 20.2231 3.99346 20.2231H20.9382C22.0347 20.2231 22.9316 19.2365 22.9316 18.0303V8.43666C22.9316 7.23047 22.0347 6.2438 20.9382 6.2438ZM21.4365 18.0303C21.4365 18.3275 21.2083 18.5785 20.9382 18.5785H3.99346C3.72331 18.5785 3.49512 18.3275 3.49512 18.0303V7.88843H20.9382C21.2083 7.88843 21.4365 8.13949 21.4365 8.43666V18.0303Z" fill="#393939" />
      </svg>
      カテゴリー
    </h2>
    <div class="p-sidebar-block03__contents">

      <?php
      if (is_archive() && $post_type !== "post" || is_single() && $post_type !== "post" || is_tax()) {
        $terms = get_terms(array(
          'taxonomy' => 'blog-category',
          'hide_empty' => false, // 非表示のタームも含む
        ));
      } else {
        $terms = get_categories(array(
          'hide_empty' => false, // 非表示のカテゴリーも含む
        ));
      }
      ?>
      <?php foreach ($terms as $term) : ?>
        <a href="<?php echo (is_taxonomy($term)) ? get_term_link($term) : get_category_link($term); ?>" class="p-sidebar-block03__link">
          <?php echo $term->name; ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</aside>