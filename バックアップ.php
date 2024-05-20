<?php
/*--------------------------------------------------------------------
⭐️Footerメニューのカスタムウォーク
--------------------------------------------------------------------*/
class My_Footer_Nav_Walker extends Walker_Nav_Menu {
  private $depth1_li_count = 0;

  /*----- start_lvl（リスト開始タグ:ulの設定） -----*/
  function start_lvl(&$output, $depth = 0, $args = null) {
    //⇩ 階層の深さによってインデント(空白)の数を変更 ※1階層=1空白
    $indent = str_repeat("\t", $depth);
    if ($depth === 0) {
      //⇩ 組み立て($outputに値を繋げていく)
      $output .= "\n" . $indent . '<div class="p-lnav__secondary p-lnav-secondary__box">' . "\n";
      $output .= $indent . '<ul class="p-lnav-secondary__list">' . "\n";
      //⇩ liの数を数えるカウント数を、<ul>タグが始まる度にリセットする
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

    //⇩ esc_attr()=>エスケープ(文字の安全化)処理、implode()=>' 'で文字列を結合、apply_filters()=>$item(現在のメニューアイテムオブジェクト)内のクラス($classes)に対し、array_filter()で空白(false)を除去
    $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item))); //ここで、"class1, class2, class3"という形で文字列として安全に取得

    // 階層が1以上のliが現れた時、カウントをプラス
    if ($depth > 0) {
      $this->depth1_li_count++;
    }

    //⇩ 組み立て($outputに値を繋げていく)
    if ($depth === 0) {
      $output .= $indent . '<li class="p-lnav__item ' . $class_names . '">';
    } else {
      //⇩ 5つ以上のセカンダリメニューアイテムがある場合
      if ($this->depth1_li_count > 4) {
        $output .= "\n" . '</ul>' . "\n"; // 現在のulを閉じる
        $output .= "\n" . $indent . '<ul class="p-lnav-secondary__list">' . "\n"; // 新しいulリストを開始
        $this->depth1_li_count = 0; // 新しいリストのためにカウントをリセット
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
