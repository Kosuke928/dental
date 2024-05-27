<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<main>
  <section id="policy" class="p-policy">
    <div class="p-policy__inner l-inner">
      <div class="p-policy__wrapper">
        <h2 class="p-policy__title c-title-sec">ポリシーと特徴</h2>
        <div class="p-policy__container p-about-policy">
          <div class="p-about-policy__contents">
            <p class="p-about-policy__title-en c-title-en">POLICY</p>
            <h2 class="p-about-policy__title-ja c-title-ja">
              コミュニケーションから始まる最適な医療提供
            </h2>
            <p class="p-about-policy__text">
              当院ではまず患者様から詳しくお話を伺います。<br />
              難しい言葉は使わず、実際に感じている小さな違和感からあらゆる可能性を考え、最適な治療方法をご提案いたします。
            </p>
            <p class="p-about-policy__text">
              「どこよりも本音で話せる歯医者さん」を目指し、スタッフ一同、「人間力の向上」にも勤めております。
            </p>
          </div>
          <figure class="p-about-policy__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_policy_pc.webp" alt="歯科医が患者様に歯の治療に関する説明をしている画像" width="640" height="438" />
          </figure>
        </div>
      </div>
    </div>
  </section>

  <section id="feature" class="p-feature">
    <div class="p-feature__inner l-inner">
      <div class="p-feature__container p-about-feature">
        <div class="p-about-feature__contents">
          <p class="p-about-feature__title-en c-title-en">FEATURE</p>
          <h2 class="p-about-feature__title-ja c-title-ja">
            「医療技術の追求」と<br />「通いやすさ」
          </h2>
          <p class="p-about-feature__text">
            歯の治療において、小さな違和感は大きなストレスにつながります。私たちは常に快適な歯科医療技術の研究を行っております。<br />
            また、「通いやすさ」も医院選びの重要なポイントと考え、2019年のリニューアルを期に更に駅の近くへ場所を移しました。
          </p>
          <p class="p-about-feature__text">
            朝から夜までお仕事をされている方のために診療時間を見直し、平日でもご利用いただけるようにいたしました。
          </p>
        </div>
        <figure class="p-feature__img">
          <img src="<?= get_template_directory_uri(); ?>/img/about_feature_pc.webp" alt="院内の清潔なフロントの画像" width="640" height="438" />
        </figure>
      </div>
    </div>
  </section>

  <section id="exhibition" class="p-exhibition">
    <div class="p-exhibition__inner l-inner">
      <h2 class="p-exhibition__title c-title-sec">院内の様子</h2>
      <ul class="p-exhibition__list">
        <li class="p-exhibition__item">
          <figure class="p-exhibition__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_exhibition_pc_01.webp" alt="院内の画像1" width="317" height="317" />
          </figure>
        </li>
        <li class="p-exhibition__item">
          <figure class="p-exhibition__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_exhibition_pc_02.webp" alt="院内の画像2" width="317" height="317" />
          </figure>
        </li>
        <li class="p-exhibition__item">
          <figure class="p-exhibition__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_exhibition_pc_03.webp" alt="院内の画像3" width="317" height="317" />
          </figure>
        </li>
        <li class="p-exhibition__item">
          <figure class="p-exhibition__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_exhibition_pc_04.webp" alt="院内の画像4" width="317" height="317" />
          </figure>
        </li>
        <li class="p-exhibition__item">
          <figure class="p-exhibition__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_exhibition_pc_05.webp" alt="院内の画像5" width="317" height="317" />
          </figure>
        </li>
        <li class="p-exhibition__item">
          <figure class="p-exhibition__img">
            <img src="<?= get_template_directory_uri(); ?>/img/about_exhibition_pc_06.webp" alt="院内の画像6" width="317" height="317" />
          </figure>
        </li>
      </ul>
    </div>
  </section>
</main>
<?php get_footer(); ?>