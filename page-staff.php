<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<main>
  <section id="greeting" class="p-greeting">
    <div class="p-greeting__inner l-inner">
      <div class="p-greeting__container">
        <h2 class="p-greeting__title c-title-sec">院長のあいさつ</h2>
        <div class="p-greeting__boxes">
          <div class="p-greeting__box-left">
            <div class="p-greeting__box-top p-greeting-top">
              <h3 class="p-greeting-top__title c-title-ja">
                気軽に相談できる<br />
                街の歯医者さんでありたい。
              </h3>
              <p class="p-greeting-top__text">
                当院は治療はもちろん、予防歯科にも力を入れておりますので、お口に関する相談だけでもお越しいただきたいと考えております。
              </p>
              <p class="p-greeting-top__text">
                「患部を直すこと」より「未然に防ぐこと」が最も良い歯科医療と言えますので、些細なことでも気軽に話せる街の歯医者さんとして、明るい街づくりに貢献していきたいと考えております。
              </p>
              <p class="p-greeting-top__addition">
                みなみ歯科クリニック<span class="p-greeting-top__name">院長　南 俊雄</span>
              </p>
            </div>
            <figure class="p-greeting__box-img u-sm-hidden">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_greeting_sp.webp" alt="院長の画像" width="335" height="446" />
            </figure>
            <div class="p-greeting__box-bottom p-greeting-bottom">
              <div class="p-greeting-bottom__careea">
                <h3 class="p-greeting-bottom__title">経歴</h3>
                <dl class="p-greeting-bottom__description p-greeting-description">
                  <div class="p-greeting-description__contents">
                    <dt class="p-greeting-description__head">2004年</dt>
                    <dd class="p-greeting-description__body">
                      東京医科歯科大学歯学部 卒業
                    </dd>
                  </div>
                  <div class="p-greeting-description__contents">
                    <dt class="p-greeting-description__head">2008年</dt>
                    <dd class="p-greeting-description__body u-line-height-161">
                      東京歯科大学歯学研究科大学院修了<br />
                      博士(歯学)取得
                    </dd>
                  </div>
                  <div class="p-greeting-description__contents">
                    <dt class="p-greeting-description__head">2012年</dt>
                    <dd class="p-greeting-description__body">
                      みなみ歯科クリニック 開院
                    </dd>
                  </div>
                </dl>
              </div>
              <div class="p-greeting-bottom__skill">
                <h3 class="p-greeting-bottom__title">資格</h3>
                <div class="p-greeting-bottom__contents">
                  <p class="p-greeting-bottom__text">
                    歯科医師臨床研修指導歯科医
                  </p>
                  <p class="p-greeting-bottom__text">博士(歯学)</p>
                  <p class="p-greeting-bottom__text">衛生検査技師</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p-greeting__box-right u-sm-show">
            <figure class="p-greeting__box-img">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_greeting_pc.webp" alt="院長の画像" width="460" height="613" />
            </figure>
          </div>
        </div>
      </div>
    </div>

    <!-- スワイパー -->
    <div class="p-greeting__gallery">
      <div class="p-greeting__swiper greeting-swiper">
        <ul id="js-greeting-slide" class="p-greeting__wrapper swiper-wrapper">
          <li class="p-greeting__slide swiper-slide">
            <figure class="p-greeting__img">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_slide_01.webp" alt="院内の画像" width="305" height="229" />
            </figure>
          </li>
          <li class="p-greeting__slide swiper-slide">
            <figure class="p-greeting__img">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_slide_02.webp" alt="院内の画像" width="305" height="229" />
            </figure>
          </li>
          <li class="p-greeting__slide swiper-slide">
            <figure class="p-greeting__img">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_slide_03.webp" alt="院内の画像" width="305" height="229" />
            </figure>
          </li>
          <li class="p-greeting__slide swiper-slide">
            <figure class="p-greeting__img">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_slide_04.webp" alt="院内の画像" width="305" height="229" />
            </figure>
          </li>
          <li class="p-greeting__slide swiper-slide">
            <figure class="p-greeting__img">
              <img src="<?= get_template_directory_uri(); ?>/img/staff_slide_05.webp" alt="院内の画像" width="305" height="229" />
            </figure>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section id="staff" class="p-staff">
    <div class="p-staff__inner l-inner">
      <div class="p-staff__container">
        <h2 class="p-staff__title c-title-sec">スタッフ紹介</h2>
        <ul class="p-staff__boxes">
          <li class="p-staff__box">
            <h3 class="p-staff__box-title">歯科衛生士</h3>
            <ul class="p-staff__box-list">
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_01.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_01.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    鈴木 太郎
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_02.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_02.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    山田 花子
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
            </ul>
          </li>
          <li class="p-staff__box">
            <h3 class="p-staff__box-title">歯科助手</h3>
            <ul class="p-staff__box-list">
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_03.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_03.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    山田 花子
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_04.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_04.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    山田 花子
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_05.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_05.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    山田 花子
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_06.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_06.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    山田 花子
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
              <li class="p-staff__box-item p-staff-thumbnail">
                <figure class="p-staff-thumbnail__img">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri(); ?>/img//staff_staff_pc_07.webp" width="280" height="280" />
                    <img src="<?= get_template_directory_uri(); ?>/img/staff_staff_sp_07.webp" alt="スタッフの画像" decoding="async" width="335" height="336" />
                  </picture>
                </figure>
                <div class="p-staff-thumbnail__contents">
                  <p class="p-staff-thumbnail__name">
                    <span class="p-staff-thumbnail__job">歯科衛生士</span>
                    山田 花子
                  </p>
                  <table class="p-staff-thumbnail__introduction">
                    <tbody>
                      <tr>
                        <th class="p-staff-thumbnail__head">出身地</th>
                        <td class="p-staff-thumbnail__body">北海道</td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">趣味</th>
                        <td class="p-staff-thumbnail__body">
                          スキー、料理
                        </td>
                      </tr>
                      <tr>
                        <th class="p-staff-thumbnail__head">
                          好きな食べ物
                        </th>
                        <td class="p-staff-thumbnail__body">
                          お寿司、うなぎ
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>