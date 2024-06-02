<?php
/*--------------------------------------------------------
初期設定
--------------------------------------------------------*/
function my_script_init() {
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
  wp_enqueue_style('my', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_theme_file_path('css/style.css')), 'all');
  wp_enqueue_script('my', get_template_directory_uri() . '/js/main.js', array('jquery'), filemtime(get_theme_file_path('js/main.js')), true);
  // if (is_single()) {
  //   wp_enqueue_script("sns", get_template_directory_uri() . "/js/sns.js", array("jquery"), filemtime(get_theme_file_path('js/sns.js')), true);
  // }
}
add_action("wp_enqueue_scripts", "my_script_init");

/*--------------------------------------------------------
サムネイルの有効化
--------------------------------------------------------*/
function my_setup() {
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action("after_setup_theme", "my_setup");


/*--------------------------------------------------------
お問い合わせ項目
--------------------------------------------------------*/
// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

/*--------------------------------------------------------
メニューの登録
--------------------------------------------------------*/
function my_menu_init() {
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'drawer' => 'ドロワーメニュー',
      'footer' => 'フッターメニュー',
    )
  );
}
add_action('init', 'my_menu_init');

/*--------------------------------------------------------
カスタムウォーカー(Header / Drawer)
--------------------------------------------------------*/
class My_Custom_Nav_Walker extends Walker_Nav_Menu {
  /*----- start_el（リストアイテム:liの設定） -----*/
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    // WP側のメニューの追加クラス名の有無を確認(追加がなければ空配列、あれば各々配列として$classesに代入)
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    // apply_filters()=>$item(現在のメニューアイテムオブジェクト)内のクラス($classes)に対し、array_filter()で空白(false)を除去
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    // $class_namesが空でない(true)なら、class=""の形で連結、そうでなければクラス無し
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    //  ⇩ 組み立て($outputに値を繋げていく)
    $output .= '<li' . $class_names . '>';


    //  変数定義
    $icon_svg = '';

    // 力技で条件分岐(メニューテキスト毎にsvgを設定)
    // 'global / drawer' テーマロケーションの時はクラス名を変更する
    //⇩globalナビ(PC表示)
    if ($args->theme_location === 'global') {
      $link_class = 'p-gnav__link';
      $text_class = 'p-gnav__text';
      // 現在のページの場合にクラスを追加
      if (in_array('current-menu-item', $item->classes)) {
        $link_class .= ' is-page';
      }
      switch ($item->title) {
        case 'ホーム':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-3 -1 24 24" fill="none">
              <path d="M17.4201 8.1758L9.71012 0.295798C9.52235 0.106486 9.26675 0 9.00012 0C8.73348 0 8.47788 0.106486 8.29012 0.295798L0.580115 8.1858C0.203271 8.56568 -0.00563133 9.08074 0.000115508 9.6158V17.9958C-0.00149334 19.0588 0.828723 19.9373 1.89011 19.9958H16.1101C17.1715 19.9373 18.0017 19.0588 18.0001 17.9958V9.6158C18.0009 9.07873 17.7929 8.56238 17.4201 8.1758V8.1758ZM7.00012 17.9958V11.9958H11.0001V17.9958H7.00012ZM16.0001 17.9958H13.0001V10.9958C13.0001 10.4435 12.5524 9.9958 12.0001 9.9958H6.00012C5.44783 9.9958 5.00012 10.4435 5.00012 10.9958V17.9958H2.00012V9.5758L9.00012 2.4258L16.0001 9.6158V17.9958Z" class="btn__icon-path" />
          </svg>';
          break;
        case '当院について':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-3 0 24 24" fill="none">
          <path d="M5.36761 10.232V8.55462C5.36761 8.27672 5.59292 8.05141 5.87082 8.05141H7.5482C7.8261 8.05141 8.05141 8.27672 8.05141 8.55462V10.232C8.05141 10.5099 7.8261 10.7352 7.5482 10.7352H5.87082C5.59292 10.7352 5.36761 10.5099 5.36761 10.232ZM11.2384 10.7352H12.9158C13.1937 10.7352 13.419 10.5099 13.419 10.232V8.55462C13.419 8.27672 13.1937 8.05141 12.9158 8.05141H11.2384C10.9605 8.05141 10.7352 8.27672 10.7352 8.55462V10.232C10.7352 10.5099 10.9605 10.7352 11.2384 10.7352ZM8.05141 14.2577V12.5803C8.05141 12.3024 7.8261 12.0771 7.5482 12.0771H5.87082C5.59292 12.0771 5.36761 12.3024 5.36761 12.5803V14.2577C5.36761 14.5356 5.59292 14.7609 5.87082 14.7609H7.5482C7.8261 14.7609 8.05141 14.5356 8.05141 14.2577ZM11.2384 14.7609H12.9158C13.1937 14.7609 13.419 14.5356 13.419 14.2577V12.5803C13.419 12.3024 13.1937 12.0771 12.9158 12.0771H11.2384C10.9605 12.0771 10.7352 12.3024 10.7352 12.5803V14.2577C10.7352 14.5356 10.9605 14.7609 11.2384 14.7609ZM18.7866 19.9608V21.4704H0V19.9608C0 19.6829 0.225314 19.4576 0.503213 19.4576H1.32093V3.56589C1.32093 3.07874 1.77152 2.6838 2.32736 2.6838H6.03856V1.00643C6.03856 0.450585 6.48914 0 7.04498 0H11.7416C12.2975 0 12.7481 0.450585 12.7481 1.00643V2.6838H16.4593C17.0151 2.6838 17.4657 3.07874 17.4657 3.56589V19.4576H18.2834C18.5613 19.4576 18.7866 19.6829 18.7866 19.9608ZM3.33379 19.4156H8.05141V16.606C8.05141 16.3281 8.27672 16.1028 8.55462 16.1028H10.232C10.5099 16.1028 10.7352 16.3281 10.7352 16.606V19.4156H15.4528V4.69666H12.7481V5.70308C12.7481 6.25892 12.2975 6.70951 11.7416 6.70951H7.04498C6.48914 6.70951 6.03856 6.25892 6.03856 5.70308V4.69666H3.33379V19.4156ZM11.1546 2.6838H10.0643V1.59351C10.0643 1.45455 9.95161 1.3419 9.81265 1.3419H8.97397C8.83501 1.3419 8.72236 1.45455 8.72236 1.59351V2.6838H7.63206C7.49311 2.6838 7.38046 2.79645 7.38046 2.93541V3.7741C7.38046 3.91306 7.49311 4.0257 7.63206 4.0257H8.72236V5.116C8.72236 5.25496 8.83501 5.36761 8.97397 5.36761H9.81265C9.95161 5.36761 10.0643 5.25496 10.0643 5.116V4.0257H11.1546C11.2935 4.0257 11.4062 3.91306 11.4062 3.7741V2.93541C11.4062 2.79645 11.2935 2.6838 11.1546 2.6838Z" class="btn__icon-path" />
        </svg>';
          break;
        case '診療案内':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 1 24 24" fill="none">
          <path d="M15 16H9C8.44771 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H15C15.5523 18 16 17.5523 16 17C16 16.4477 15.5523 16 15 16Z" class="btn__icon-path" />
          <path d="M9 14H12C12.5523 14 13 13.5523 13 13C13 12.4477 12.5523 12 12 12H9C8.44771 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14Z" class="btn__icon-path" />
          <path d="M19.74 8.32994L14.3 2.32994C14.1109 2.12046 13.8422 2.00061 13.56 1.99994L6.56 1.99994C5.16268 1.98327 4.01647 3.10262 4 4.49994L4 19.4999C4.01647 20.8973 5.16268 22.0166 6.56 21.9999H17.44C18.8373 22.0166 19.9835 20.8973 20 19.4999V8.99994C19.9994 8.7521 19.9067 8.51334 19.74 8.32994L19.74 8.32994ZM14 4.99994L16.74 7.99994H14.74C14.5285 7.98717 14.3309 7.88994 14.1918 7.7301C14.0526 7.57027 13.9835 7.36122 14 7.14994L14 4.99994ZM17.44 19.9999H6.56C6.41938 20.0081 6.28128 19.96 6.17621 19.8662C6.07114 19.7724 6.00774 19.6406 6 19.4999V4.49994C6.00774 4.35929 6.07114 4.22751 6.17621 4.1337C6.28128 4.03988 6.41938 3.99175 6.56 3.99994L12 3.99994V7.14994C11.9664 8.68334 13.1769 9.95633 14.71 9.99994H18V19.4999C17.9923 19.6406 17.9289 19.7724 17.8238 19.8662C17.7187 19.96 17.5806 20.0081 17.44 19.9999Z" class="btn__icon-path" />
        </svg>';
          break;
        case 'スタッフ紹介':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 1 24 24" fill="none">
          <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11H9ZM9 5C10.1046 5 11 5.89543 11 7C11 8.10457 10.1046 9 9 9C7.89543 9 7 8.10457 7 7C7 5.89543 7.89543 5 9 5Z" class="btn__icon-path" />
          <path d="M17 13C18.6569 13 20 11.6569 20 10C20 8.34315 18.6569 7 17 7C15.3431 7 14 8.34315 14 10C14 11.6569 15.3431 13 17 13ZM17 9C17.5523 9 18 9.44772 18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44771 16.4477 9 17 9Z" class="btn__icon-path" />
          <path d="M17 14C15.8918 14.0012 14.8155 14.3706 13.94 15.05C11.9371 13.0549 8.93071 12.4605 6.31923 13.5431C3.70775 14.6258 2.00382 17.173 2 20C2 20.5523 2.44772 21 3 21C3.55229 21 4 20.5523 4 20C4 17.2386 6.23858 15 9 15C11.7614 15 14 17.2386 14 20C14 20.5523 14.4477 21 15 21C15.5523 21 16 20.5523 16 20C16.0024 18.8284 15.7064 17.6756 15.14 16.65C16.0417 15.9375 17.2713 15.8027 18.306 16.303C19.3406 16.8033 19.9985 17.8507 20 19C20 19.5523 20.4477 20 21 20C21.5523 20 22 19.5523 22 19C22 16.2386 19.7614 14 17 14Z" class="btn__icon-path" />
        </svg>';
          break;
        case 'スタッフブログ':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-4 -3 24 24" fill="none">
          <path d="M15.3998 3.33998L12.6598 0.599982C11.9195 -0.0953633 10.7756 -0.125466 9.99981 0.529983L0.999813 9.52998C0.676579 9.85595 0.475318 10.2832 0.429813 10.74L-0.000186928 14.91C-0.0274606 15.2065 0.0788503 15.4998 0.289813 15.71C0.478531 15.8972 0.73401 16.0015 0.999813 16H1.08981L5.25981 15.62C5.71661 15.5745 6.14385 15.3732 6.46981 15.05L15.4698 6.04998C16.1971 5.28165 16.1658 4.06975 15.3998 3.33998L15.3998 3.33998ZM5.07981 13.62L2.07981 13.9L2.34981 10.9L7.99981 5.31998L10.6998 8.01998L5.07981 13.62ZM11.9998 6.67998L9.31981 3.99998L11.2698 1.99998L13.9998 4.72998L11.9998 6.67998Z" class="btn__icon-path" />
        </svg>';
          break;
        case 'お問い合わせ':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="-2 -3 24 24" fill="none">
          <path d="M17 0H3C1.34315 4.76837e-07 -4.76837e-07 1.34315 0 3V13C0 14.6569 1.34315 16 3 16H17C18.6569 16 20 14.6569 20 13V3C20 1.34315 18.6569 4.76837e-07 17 4.76837e-07V0ZM16.33 2L10 6.75L3.67 2H16.33ZM17 14H3C2.44772 14 2 13.5523 2 13V3.25L9.4 8.8C9.5731 8.92982 9.78363 9 10 9C10.2164 9 10.4269 8.92982 10.6 8.8L18 3.25V13C18 13.5523 17.5523 14 17 14Z" class="btn__icon-path" />
        </svg>';
          break;
      }
    } elseif ($args->theme_location === 'drawer') {
      $link_class = 'p-dnav__link';
      $text_class = 'p-dnav__text';
      switch ($item->title) {
        case 'ホーム':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M20.4201 10.1799L12.7101 2.29995C12.5223 2.11064 12.2668 2.00415 12.0001 2.00415C11.7335 2.00415 11.4779 2.11064 11.2901 2.29995L3.58012 10.1899C3.20327 10.5698 2.99437 11.0849 3.00012 11.6199V19.9999C2.99851 21.0629 3.82872 21.9415 4.89011 21.9999H19.1101C20.1715 21.9415 21.0017 21.0629 21.0001 19.9999V11.6199C21.0009 11.0829 20.7929 10.5665 20.4201 10.1799V10.1799ZM10.0001 19.9999V13.9999H14.0001V19.9999H10.0001ZM19.0001 19.9999H16.0001V12.9999C16.0001 12.4477 15.5524 11.9999 15.0001 11.9999H9.00012C8.44783 11.9999 8.00012 12.4477 8.00012 12.9999V19.9999H5.00012V11.5799L12.0001 4.42995L19.0001 11.6199V19.9999Z" fill="white" />
        </svg>';
          break;
        case '当院について':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M8.36761 11.232V9.55462C8.36761 9.27672 8.59292 9.05141 8.87082 9.05141H10.5482C10.8261 9.05141 11.0514 9.27672 11.0514 9.55462V11.232C11.0514 11.5099 10.8261 11.7352 10.5482 11.7352H8.87082C8.59292 11.7352 8.36761 11.5099 8.36761 11.232ZM14.2384 11.7352H15.9158C16.1937 11.7352 16.419 11.5099 16.419 11.232V9.55462C16.419 9.27672 16.1937 9.05141 15.9158 9.05141H14.2384C13.9605 9.05141 13.7352 9.27672 13.7352 9.55462V11.232C13.7352 11.5099 13.9605 11.7352 14.2384 11.7352ZM11.0514 15.2577V13.5803C11.0514 13.3024 10.8261 13.0771 10.5482 13.0771H8.87082C8.59292 13.0771 8.36761 13.3024 8.36761 13.5803V15.2577C8.36761 15.5356 8.59292 15.7609 8.87082 15.7609H10.5482C10.8261 15.7609 11.0514 15.5356 11.0514 15.2577ZM14.2384 15.7609H15.9158C16.1937 15.7609 16.419 15.5356 16.419 15.2577V13.5803C16.419 13.3024 16.1937 13.0771 15.9158 13.0771H14.2384C13.9605 13.0771 13.7352 13.3024 13.7352 13.5803V15.2577C13.7352 15.5356 13.9605 15.7609 14.2384 15.7609ZM21.7866 20.9608V22.4704H3V20.9608C3 20.6829 3.22531 20.4576 3.50321 20.4576H4.32093V4.56589C4.32093 4.07874 4.77152 3.6838 5.32736 3.6838H9.03856V2.00643C9.03856 1.45059 9.48914 1 10.045 1H14.7416C15.2975 1 15.7481 1.45059 15.7481 2.00643V3.6838H19.4593C20.0151 3.6838 20.4657 4.07874 20.4657 4.56589V20.4576H21.2834C21.5613 20.4576 21.7866 20.6829 21.7866 20.9608ZM6.33379 20.4156H11.0514V17.606C11.0514 17.3281 11.2767 17.1028 11.5546 17.1028H13.232C13.5099 17.1028 13.7352 17.3281 13.7352 17.606V20.4156H18.4528V5.69666H15.7481V6.70308C15.7481 7.25892 15.2975 7.70951 14.7416 7.70951H10.045C9.48914 7.70951 9.03856 7.25892 9.03856 6.70308V5.69666H6.33379V20.4156ZM14.1546 3.6838H13.0643V2.59351C13.0643 2.45455 12.9516 2.3419 12.8127 2.3419H11.974C11.835 2.3419 11.7224 2.45455 11.7224 2.59351V3.6838H10.6321C10.4931 3.6838 10.3805 3.79645 10.3805 3.93541V4.7741C10.3805 4.91306 10.4931 5.0257 10.6321 5.0257H11.7224V6.116C11.7224 6.25496 11.835 6.36761 11.974 6.36761H12.8127C12.9516 6.36761 13.0643 6.25496 13.0643 6.116V5.0257H14.1546C14.2935 5.0257 14.4062 4.91306 14.4062 4.7741V3.93541C14.4062 3.79645 14.2935 3.6838 14.1546 3.6838Z" fill="white" />
        </svg>';
          break;
        case '診療案内':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M15 16H9C8.44771 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H15C15.5523 18 16 17.5523 16 17C16 16.4477 15.5523 16 15 16Z" fill="white" />
          <path d="M9 14H12C12.5523 14 13 13.5523 13 13C13 12.4477 12.5523 12 12 12H9C8.44771 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14Z" fill="white" />
          <path d="M19.74 8.32994L14.3 2.32994C14.1109 2.12046 13.8422 2.00061 13.56 1.99994L6.56 1.99994C5.16268 1.98327 4.01647 3.10262 4 4.49994L4 19.4999C4.01647 20.8973 5.16268 22.0166 6.56 21.9999H17.44C18.8373 22.0166 19.9835 20.8973 20 19.4999V8.99994C19.9994 8.7521 19.9067 8.51334 19.74 8.32994L19.74 8.32994ZM14 4.99994L16.74 7.99994H14.74C14.5285 7.98717 14.3309 7.88994 14.1918 7.7301C14.0526 7.57027 13.9835 7.36122 14 7.14994L14 4.99994ZM17.44 19.9999H6.56C6.41938 20.0081 6.28128 19.96 6.17621 19.8662C6.07114 19.7724 6.00774 19.6406 6 19.4999V4.49994C6.00774 4.35929 6.07114 4.22751 6.17621 4.1337C6.28128 4.03988 6.41938 3.99175 6.56 3.99994L12 3.99994V7.14994C11.9664 8.68334 13.1769 9.95633 14.71 9.99994H18V19.4999C17.9923 19.6406 17.9289 19.7724 17.8238 19.8662C17.7187 19.96 17.5806 20.0081 17.44 19.9999Z" fill="white" />
        </svg>';
          break;
        case 'スタッフ紹介':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11H9ZM9 5C10.1046 5 11 5.89543 11 7C11 8.10457 10.1046 9 9 9C7.89543 9 7 8.10457 7 7C7 5.89543 7.89543 5 9 5Z" fill="white" />
          <path d="M17 13C18.6569 13 20 11.6569 20 10C20 8.34315 18.6569 7 17 7C15.3431 7 14 8.34315 14 10C14 11.6569 15.3431 13 17 13ZM17 9C17.5523 9 18 9.44772 18 10C18 10.5523 17.5523 11 17 11C16.4477 11 16 10.5523 16 10C16 9.44771 16.4477 9 17 9Z" fill="white" />
          <path d="M17 14C15.8918 14.0012 14.8155 14.3706 13.94 15.05C11.9371 13.0549 8.93071 12.4605 6.31923 13.5431C3.70775 14.6258 2.00382 17.173 2 20C2 20.5523 2.44772 21 3 21C3.55229 21 4 20.5523 4 20C4 17.2386 6.23858 15 9 15C11.7614 15 14 17.2386 14 20C14 20.5523 14.4477 21 15 21C15.5523 21 16 20.5523 16 20C16.0024 18.8284 15.7064 17.6756 15.14 16.65C16.0417 15.9375 17.2713 15.8027 18.306 16.303C19.3406 16.8033 19.9985 17.8507 20 19C20 19.5523 20.4477 20 21 20C21.5523 20 22 19.5523 22 19C22 16.2386 19.7614 14 17 14Z" fill="white" />
        </svg>';
          break;
        case 'スタッフブログ':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M19.4003 7.3401L16.6603 4.6001C15.92 3.90476 14.7761 3.87466 14.0003 4.5301L5.0003 13.5301C4.67707 13.8561 4.47581 14.2833 4.4303 14.7401L4.0003 18.9101C3.97303 19.2066 4.07934 19.4999 4.2903 19.7101C4.47902 19.8973 4.7345 20.0016 5.0003 20.0001H5.0903L9.2603 19.6201C9.7171 19.5746 10.1443 19.3733 10.4703 19.0501L19.4703 10.0501C20.1976 9.28177 20.1663 8.06987 19.4003 7.34011L19.4003 7.3401ZM9.0803 17.6201L6.0803 17.9001L6.3503 14.9001L12.0003 9.3201L14.7003 12.0201L9.0803 17.6201ZM16.0003 10.6801L13.3203 8.0001L15.2703 6.0001L18.0003 8.7301L16.0003 10.6801Z" fill="white" />
        </svg>';
          break;
        case 'お問い合わせ':
          $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M19 4H5C3.34315 4 2 5.34315 2 7V17C2 18.6569 3.34315 20 5 20H19C20.6569 20 22 18.6569 22 17V7C22 5.34315 20.6569 4 19 4V4ZM18.33 6L12 10.75L5.67 6H18.33ZM19 18H5C4.44772 18 4 17.5523 4 17V7.25L11.4 12.8C11.5731 12.9298 11.7836 13 12 13C12.2164 13 12.4269 12.9298 12.6 12.8L20 7.25V17C20 17.5523 19.5523 18 19 18Z" fill="white" />
        </svg>';
          break;
      }
    }

    /*----- start_el（リンク開始タグ:aの設定）※footerメニューとほぼ一緒 -----*/
    //⇩ $attributesに、クラス名+リンクの属性値を連結していく（WPのカスタムメニューで、各メニューに設定したリンク等の情報を取得）
    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
    $attributes .= ' class="' . $link_class . '"';

    // <a> svg <span>メニュー名</span> </a> という形で連結
    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $icon_svg . '<span class="' . $text_class . '">' . apply_filters('the_title', $item->title, $item->ID) . '</span>' . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}


/*--------------------------------------------------------------------
Footerメニューのカスタムウォーカー
--------------------------------------------------------------------*/
class My_Footer_Nav_Walker extends Walker_Nav_Menu {
  //⇩ depth = 1 の li の数をカウントする変数を定義
  private $depth1_li_count = 0;

  /*----- start_lvl（リスト開始タグ:ulの設定） -----*/
  function start_lvl(&$output, $depth = 0, $args = null) {
    //⇩ 階層の深さによってインデント(空白)の数を変更 ※1階層=1空白
    $indent = str_repeat("\t", $depth);
    if ($depth === 0) {
      //⇩ 組み立て($outputに値を繋げていく)
      $output .= "\n" . $indent . '<div class="p-lnav__secondary p-lnav-secondary">' . "\n";
      $output .= $indent . '<ul class="p-lnav-secondary__list">' . "\n";
      $this->depth1_li_count = 0;
    }
  }

  /*----- end_lvl（リスト終了タグ:ulの設定） -----*/
  function end_lvl(&$output, $depth = 0, $args = null) {
    //⇩ 階層の深さによってインデント(空白)の数を変更 ※1階層=1空白
    $indent = str_repeat("\t", $depth);
    if ($depth === 0) {
      //⇩ 組み立て($outputに値を繋げていく)
      $output .= $indent . '</ul>' . "\n";
      $output .= $indent . '</div>' . "\n";
    }
  }

  /*----- start_el（アイテム開始タグ:liの設定） -----*/
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;
    //⇩ 階層の深さによってインデント(空白)の数を変更 ※1階層=1空白
    $indent = ($depth > 0 ? str_repeat("\t", $depth) : '');

    //⇩ WPのカスタムメニューで、各メニューに設定したクラス名を各々取得してくる
    $classes = empty($item->classes) ? array() : (array) $item->classes; //ここで、[class1, class2, class3]という形で配列として取得

    //⇩ esc_attr()=>エスケープ(文字の安全化)処理、implode()=>' 'で文字列を結合、
    //apply_filters()=>$item(現在のメニューアイテムオブジェクト)内のクラス($classes)に対し、array_filter()で空白(false)を除去
    $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item))); //ここで、"class1, class2, class3"という形で文字列として安全に取得

    // 階層が1以上のliが現れた時、カウントをプラス
    if ($depth > 0) {
      $this->depth1_li_count++;
    }

    //⇩ 組み立て($outputに値を繋げていく)
    if ($depth === 0) {
      $output .= $indent . '<li class="p-lnav__item ' . $class_names . '">';
    } else {
      //⇩ ul内に5つ以上のセカンダリメニューアイテムができる場合
      if ($this->depth1_li_count > 4) {
        $output .= "\n" . '</ul>' . "\n"; // 現在のulを閉じる
        $output .= "\n" . $indent . '<ul class="p-lnav-secondary__list">' . "\n"; // 新しいulリストを開始
        $this->depth1_li_count = 1; // 新しいulリストのためにカウントをリセット(5つ目のliをカウントする為、"1"としている)
      }
      $output .= "\n" . $indent . '<li class="p-lnav-secondary__item ' . $class_names . '">' . "\n";
    }

    /*----- start_el（リンク開始タグ:aの設定） -----*/
    //⇩ $attributesに、クラス名+リンクの属性値を連結していく（WPのカスタムメニューで、各メニューに設定したリンク等の情報を取得）
    $attributes  = ' class="' . ($depth === 0 ? 'p-lnav__link' : 'p-lnav-secondary__link') . '"';
    $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : ''; //href属性(これがメイン)
    $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : ''; //rel属性
    $attributes .= !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : ''; //title属性
    $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : ''; //target属性

    //⇩ <a>メニュータイトル</a> この形で整形する
    $item_output = sprintf(
      '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters('the_title', $item->title, $item->ID),
      $args->link_after,
      $args->after
    );

    //⇩ 組み立て($outputに値を繋げていく)
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}


/*--------------------------------------------------------
テンプレートパーツ
--------------------------------------------------------*/
// URLのセグメントを取得する関数
function get_url_segment() {
  $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  $segments = explode('/', $path);
  return $segments;
}

/*----- Heroセクションの画像をページ毎に変える -----*/
function get_hero_paths() {
  // 初期値を設定
  $args = [
    'pc' => get_template_directory_uri() . '/img/dummy.webp',
    'sp' => get_template_directory_uri() . '/img/dummy.webp',
    'jp' => '404 Error',
    'jp2' => '',
    'en' => 'このページは存在しません',
    'home' => 'ホーム',
  ];
  // ページに応じて値を上書き
  if (is_page('contact') || is_page('contact-thanks')) { // 「お問い合わせ」ページの場合
    $args['pc'] = get_template_directory_uri() . '/img/contact_hero_pc.webp';
    $args['sp'] = get_template_directory_uri() . '/img/contact_hero_sp.webp';
    $args['jp'] = 'お問い合わせ';
    $args['en'] = 'CONTACT';
    if (is_page('contact-thanks')) {
      $args['jp2'] = 'お問い合わせ完了';
    }
  } elseif (is_page('reservation') || is_page('reservation-thanks')) { // 「WEB予約」ページの場合
    $args['pc'] = get_template_directory_uri() . '/img/contact_hero_pc.webp';
    $args['sp'] = get_template_directory_uri() . '/img/contact_hero_sp.webp';
    $args['jp'] = 'WEB予約';
    $args['en'] = 'RESERVE';
    if (is_page('reservation-thanks')) {
      $args['jp2'] = 'WEB予約完了';
    }
  } elseif (is_page('medical')) { // 「診療案内」ページの場合
    $args['pc'] = get_template_directory_uri() . '/img/guid_hero_pc.webp';
    $args['sp'] = get_template_directory_uri() . '/img/guid_hero_sp.webp';
    $args['jp'] = '診療案内';
    $args['en'] = 'MEDICAL';
  } elseif (is_page('about')) { // 「当院について」ページの場合
    $args['pc'] = get_template_directory_uri() . '/img/about_hero_pc.webp';
    $args['sp'] = get_template_directory_uri() . '/img/about_hero_sp.webp';
    $args['jp'] = '当院について';
    $args['en'] = 'ABOUT OUR CLINIC';
  } elseif (is_page('staff')) { // 「スタッフ紹介」ページの場合
    $args['pc'] = get_template_directory_uri() . '/img/staff_hero_pc.webp';
    $args['sp'] = get_template_directory_uri() . '/img/staff_hero_sp.webp';
    $args['jp'] = 'スタッフ紹介';
    $args['en'] = 'STAFF';
  } elseif (is_home() || is_category()) { // 「home.php」もしくは「category.php」ページの場合 ※必ず、下のis_archiveより前に多くこと
    $args['pc'] = get_template_directory_uri() . '/img/post_hero_pc.webp';
    $args['sp'] = get_template_directory_uri() . '/img/post_hero_sp.webp';
    $args['jp'] = 'お知らせ';
    $args['en'] = 'NEWS';
  } elseif (is_single() || is_archive()) { // 「single.php」もしくは「archive.php(他)」ページの場合
    $segments = get_url_segment();
    if (is_single() && strpos($segments[0], 'news') !== false) {
      // single.php で URL に 'news' が含まれる場合
      $args['pc'] = get_template_directory_uri() . '/img/post_hero_pc.webp';
      $args['sp'] = get_template_directory_uri() . '/img/post_hero_sp.webp';
      $args['jp'] = 'お知らせ';
      $args['jp2'] = get_the_title();
      $args['en'] = 'NEWS';
    } elseif (is_single() && strpos($segments[0], 'blog') !== false) {
      // single.php で URL に 'blog' が含まれる場合
      $args['sp'] = get_template_directory_uri() . '/img/post_hero_pc.webp';
      $args['pc'] = get_template_directory_uri() . '/img/post_hero_sp.webp';
      $args['jp'] = 'スタッフブログ';
      $args['jp2'] = get_the_title();
      $args['en'] = 'STAFF BLOG';
    } else {
      // その他の single.php もしくは archive.php ページの場合
      $args['pc'] = get_template_directory_uri() . '/img/post_hero_pc.webp';
      $args['sp'] = get_template_directory_uri() . '/img/post_hero_sp.webp';
      $args['jp'] = 'スタッフブログ';
      $args['en'] = 'STAFF BLOG';
    }
  }

  return $args;
}


/*--------------------------------------------------------
ACFテキスト内リンク表示
--------------------------------------------------------*/
function acf_text_with_link($text_field, $link_field = '', $link_class = '') {
  // ACFフィールドからテキストを取得
  $text = get_field($text_field);
  // リンクフィールドが指定されていない場合、そのままのテキストを返す
  if (empty($link_field)) {
    return $text;
  }
  // ACFフィールドからリンクを取得
  $link = get_field($link_field);
  // リンクのURLとタイトルを取得
  if ($link && isset($link['url']) && isset($link['title'])) {
    $link_url = $link['url'];
    $link_title = $link['title'];
    // クラス名を設定
    $class_attribute = !empty($link_class) ? ' class="' . esc_attr($link_class) . '"' : '';
    // テキスト内の特定のキーワードをリンクに変換
    $link_html = '<a href="' . esc_url($link_url) . '"' . $class_attribute . '>' . esc_html($link_title) . '</a>';
    $text_with_link = str_replace($link_title, $link_html, $text);
    // 出力
    return $text_with_link;
  } else {
    // リンクフィールドが空の場合、そのままのテキストを返す
    return $text;
  }
}

/*--------------------------------------------------------
ACF画像表示
--------------------------------------------------------*/
function display_acf_image($field_key, $dummy_image_url, $dummy_image_alt = 'ダミー画像', $dummy_image_width = 670, $dummy_image_height = 419) {
  $image = get_field($field_key);
  if (!empty($image) && is_array($image)) {
    $image_url = $image['url'];
    $alt_text = isset($image['alt']) ? $image['alt'] : '';
    echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text) . '">';
  } else {
    echo '<img src="' . esc_url($dummy_image_url) . '" alt="' . esc_attr($dummy_image_alt) . '" width="' . intval($dummy_image_width) . '" height="' . intval($dummy_image_height) . '">';
  }
}

/*--------------------------------------------------------
ページネーション(archive.php、taxonomy.php)
--------------------------------------------------------*/
function custom_pagination($query) {
  $pagination = paginate_links(array(
    'total' => $query->max_num_pages,
    'current' => max(1, get_query_var('paged')),
    'end_size' => 1,
    'mid_size' => 4,
    'prev_text' => '<span class="p-pagenation__prev">前へ</span>',
    'next_text' => '<span class="p-pagenation__next">次へ</span>',
    'before_page_number' => '<span class="p-pagenation__numbers">',
    'after_page_number' => '</span>',
    'link_before' => '<span class="p-pagenation__numbers">',
    'link_after' => '</span>',
  ));

  // 現在のページと総ページ数を取得
  $current_page = max(1, get_query_var('paged'));
  $total_pages = $query->max_num_pages;

  // u-md-show--gridを追加する条件を確認
  if ($total_pages >= 6 && $current_page >= 2 && $current_page <= ($total_pages - 6)) {
    $pagination = preg_replace_callback(
      '/<a class="page-numbers" href="([^"]+)"><span class="p-pagenation__numbers">(\d+)<\/span><\/a>/',
      function ($matches) use ($current_page) {
        $page_number = intval($matches[2]);
        if ($page_number >= $current_page + 2 && $page_number <= $current_page + 4) {
          return '<a class="page-numbers u-md-show--grid" href="' . $matches[1] . '"><span class="p-pagenation__numbers">' . $matches[2] . '</span></a>';
        } else {
          return '<a class="page-numbers" href="' . $matches[1] . '"><span class="p-pagenation__numbers">' . $matches[2] . '</span></a>';
        }
      },
      $pagination
    );
  }
  if ($total_pages >= 6 && $current_page >= 7) {
    $pagination = preg_replace_callback(
      '/<a class="page-numbers" href="([^"]+)"><span class="p-pagenation__numbers">(\d+)<\/span><\/a>/',
      function ($matches) use ($current_page) {
        $page_number = intval($matches[2]);
        if ($page_number >= $current_page - 4 && $page_number <= $current_page - 3) {
          return '<a class="page-numbers u-md-show--grid" href="' . $matches[1] . '"><span class="p-pagenation__numbers">' . $matches[2] . '</span></a>';
        } else {
          return '<a class="page-numbers" href="' . $matches[1] . '"><span class="p-pagenation__numbers">' . $matches[2] . '</span></a>';
        }
      },
      $pagination
    );
  }

  // 現在のページのクラスを設定
  $pagination = str_replace('class="page-numbers current"', 'class="page-numbers u-current"', $pagination);
  // ページ数が表示されているspan要素のクラスを設定
  $pagination = preg_replace('/<span class="page-numbers dots">/', '<span class="p-pagenation__numbers dots">', $pagination);

  return $pagination;
}
