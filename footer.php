<div class="p-footer-decoration"></div>
<footer id="footer" class="l-footer">
  <div class="l-footer__inner l-inner">
    <div class="l-footer__container">
      <div class="l-footer__infomation">
        <div class="p-access-box">
          <div class="p-access-box__logo">
            <img src="<?= get_template_directory_uri(); ?>/img/site-logo.webp" alt="みなみ歯科クリニック" width="400" height="40" />
          </div>
          <p class="p-access-box__adress">
            〒166-0001<span>東京都杉並区阿佐谷北7-3-1</span>
          </p>
          <div class="p-access-box__tel c-tel">
            <figure class="c-tel__img">
              <img src="<?= get_template_directory_uri(); ?>/img/tel.webp" alt="" width="28" height="28" />
            </figure>
            <span class="c-tel__number">03-1234-5678</span>
          </div>
          <p class="p-access-box__business-hours">
            (年中無休 AM9:00〜PM22:00)
          </p>
          <div class="p-access-box__buttons">
            <div class="p-access-box__bokking">
              <a href="./page-booking.html" class="c-button-cir-md--main">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 30 20" fill="none">
                  <path d="M26.988 6.36243H22.0414C21.4562 6.36243 20.9814 6.83721 20.9814 7.42241V16.6089C20.9814 17.1941 21.4562 17.6689 22.0414 17.6689H26.988C27.5732 17.6689 28.048 17.1941 28.048 16.6089V7.42241C28.048 6.83721 27.5732 6.36243 26.988 6.36243ZM24.5147 16.9623C24.1239 16.9623 23.8081 16.6465 23.8081 16.2556C23.8081 15.8647 24.1239 15.5489 24.5147 15.5489C24.9056 15.5489 25.2214 15.8647 25.2214 16.2556C25.2214 16.6465 24.9056 16.9623 24.5147 16.9623ZM26.988 14.5773C26.988 14.723 26.8688 14.8423 26.723 14.8423H22.3064C22.1607 14.8423 22.0414 14.723 22.0414 14.5773V7.6874C22.0414 7.54166 22.1607 7.42241 22.3064 7.42241H26.723C26.8688 7.42241 26.988 7.54166 26.988 7.6874V14.5773Z" fill="white" />
                  <path d="M18.1274 3H4.37522C3.61598 3 3 3.61598 3 4.37521V13.5433C3 14.3025 3.61598 14.9185 4.37522 14.9185H9.87609L9.41769 16.2937H7.35486C6.97381 16.2937 6.66725 16.6003 6.66725 16.9814C6.66725 17.3624 6.97381 17.669 7.35486 17.669H15.1478C15.5288 17.669 15.8354 17.3624 15.8354 16.9814C15.8354 16.6003 15.5288 16.2937 15.1478 16.2937H13.0849L12.6265 14.9185H18.1274C18.8866 14.9185 19.5026 14.3025 19.5026 13.5433V4.37521C19.5026 3.61598 18.8866 3 18.1274 3ZM17.669 13.0849H4.83362V4.83362H17.669V13.0849Z" fill="white" />
                </svg>
                WEB予約
              </a>
            </div>
            <div class="p-access-box__contact">
              <a href="./page-contact.html" class="c-button-cir-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M4 3.99976H20C21.1 3.99976 22 4.89976 22 5.99976V17.9998C22 19.0998 21.1 19.9998 20 19.9998H4C2.9 19.9998 2 19.0998 2 17.9998V5.99976C2 4.89976 2.9 3.99976 4 3.99976Z" stroke="#1391E6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="btn__icon-path" />
                  <path d="M22 6.13599L12 13.6125L2 6.13599" stroke="#1391E6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="btn__icon-path" />
                </svg>
                お問い合わせ
              </a>
            </div>
          </div>
          <div class="p-access-box__calendar">
            <figure class="p-access-box__calendar-img">
              <img src="<?= get_template_directory_uri(); ?>/img/index_calendar.webp" alt="営業カレンダー" width="477" height="166" />
            </figure>
          </div>
        </div>
        <div class="p-map-box">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6479.637879441591!2d139.63686505!3d35.706072949999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f27648aae941%3A0x56cf7276cf4a64a!2z44CSMTY2LTAwMDEg5p2x5Lqs6YO95p2J5Lim5Yy66Zi_5L2Q6LC35YyX77yR5LiB55uu77yV4oiS77yS77yX!5e0!3m2!1sja!2sjp!4v1713621481755!5m2!1sja!2sjp" width="385" height="385" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <div class="l-footer__nav">
        <?php
        wp_nav_menu(
          array(
            'depth' => 2,
            'theme_location' => 'footer',
            'container' => 'false',
            'walker' => new My_Footer_Nav_Walker(),
            'menu_class' => 'p-lnav',
          )
        );
        ?>
      </div>
    </div>
  </div>
  <div class="l-footer__under">
    <p class="l-footer__under-text">
      <small>&copy;2020-2021 みなみ歯科クリニック</small>
    </p>
  </div>
</footer>

<!-- トップへ戻る -->
<div id="js-to-top" class="c-to-top"></div>

<!-- サイト下部のCAT -->
<div class="p-footer-cta">
  <div class="p-footer-cta__left">
    <div class="p-footer-cta__tel c-tel--cta">
      <figure class="c-tel__img--cta">
        <img src="<?= get_template_directory_uri(); ?>/img/tel.webp" alt="" width="18" height="18" />
      </figure>
      03-1234-5678
    </div>
    <p class="p-footer-cta__business-hours">(年中無休 AM9:00〜PM22:00)</p>
  </div>
  <div class="p-footer-cta__right">
    <a href="./page-booking.html" class="c-button-squ-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="46" height="28" viewBox="0 0 46 28" fill="none">
        <path d="M42.6329 6.83838H34.0469C33.0311 6.83838 32.207 7.66277 32.207 8.67887V24.6298C32.207 25.6459 33.0311 26.4703 34.0469 26.4703H42.6329C43.6487 26.4703 44.4728 25.6459 44.4728 24.6298V8.67887C44.4728 7.66277 43.6487 6.83838 42.6329 6.83838ZM38.3399 25.2433C37.6615 25.2433 37.1133 24.695 37.1133 24.0163C37.1133 23.3377 37.6615 22.7893 38.3399 22.7893C39.0184 22.7893 39.5665 23.3377 39.5665 24.0163C39.5665 24.695 39.0184 25.2433 38.3399 25.2433ZM42.6329 21.1022C42.6329 21.3553 42.4259 21.5623 42.173 21.5623H34.5069C34.2539 21.5623 34.0469 21.3553 34.0469 21.1022V9.139C34.0469 8.88593 34.2539 8.67887 34.5069 8.67887H42.173C42.4259 8.67887 42.6329 8.88593 42.6329 9.139V21.1022Z" fill="white" />
        <path d="M27.2534 1H3.38312C2.06528 1 0.996094 2.06956 0.996094 3.38785V19.3068C0.996094 20.6251 2.06528 21.6947 3.38312 21.6947H12.9312L12.1355 24.0825H8.55501C7.89361 24.0825 7.3615 24.6148 7.3615 25.2765C7.3615 25.9381 7.89361 26.4704 8.55501 26.4704H22.0815C22.7429 26.4704 23.275 25.9381 23.275 25.2765C23.275 24.6148 22.7429 24.0825 22.0815 24.0825H18.501L17.7053 21.6947H27.2534C28.5712 21.6947 29.6404 20.6251 29.6404 19.3068V3.38785C29.6404 2.06956 28.5712 1 27.2534 1ZM26.4577 18.5109H4.1788V4.1838H26.4577V18.5109Z" fill="white" />
      </svg>
      <p class="c-button-squ-lg__text">
        <span class="c-button-squ-lg__text-large">WEB予約</span><br />はこちら
      </p>
    </a>
  </div>
</div>

<!-- サイト横のCAT -->
<div class="p-side-cta u-lg-show">
  <a href="./page-booking.html" class="p-side-cta__link">
    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="32" viewBox="0 0 52 32" fill="none">
      <path d="M47.7899 7.55811H38.1413C36.9998 7.55811 36.0737 8.4842 36.0737 9.62566V27.5444C36.0737 28.6859 36.9998 29.612 38.1413 29.612H47.7899C48.9313 29.612 49.8574 28.6859 49.8574 27.5444V9.62566C49.8574 8.4842 48.9313 7.55811 47.7899 7.55811ZM42.9656 28.2336C42.2032 28.2336 41.5872 27.6176 41.5872 26.8552C41.5872 26.0928 42.2032 25.4769 42.9656 25.4769C43.728 25.4769 44.3439 26.0928 44.3439 26.8552C44.3439 27.6176 43.728 28.2336 42.9656 28.2336ZM47.7899 23.5816C47.7899 23.8659 47.5573 24.0985 47.273 24.0985H38.6582C38.3739 24.0985 38.1413 23.8659 38.1413 23.5816V10.1425C38.1413 9.85825 38.3739 9.62566 38.6582 9.62566H47.273C47.5573 9.62566 47.7899 9.85825 47.7899 10.1425V23.5816Z" fill="white" />
      <path d="M30.5068 0.99939H3.68243C2.20151 0.99939 1 2.20089 1 3.68182V21.5647C1 23.0456 2.20151 24.2471 3.68243 24.2471H14.4122L13.518 26.9295H9.49437C8.75111 26.9295 8.15316 27.5275 8.15316 28.2707C8.15316 29.014 8.75111 29.6119 9.49437 29.6119H24.6948C25.4381 29.6119 26.036 29.014 26.036 28.2707C26.036 27.5275 25.4381 26.9295 24.6948 26.9295H20.6712L19.777 24.2471H30.5068C31.9877 24.2471 33.1892 23.0456 33.1892 21.5647V3.68182C33.1892 2.20089 31.9877 0.99939 30.5068 0.99939ZM29.6126 20.6705H4.57658V4.57596H29.6126V20.6705Z" fill="white" />
    </svg>
    <span class="p-side-cta__text">WEB予約<br />はこちら</span>
  </a>
</div>

<!-- Swiper,JavaScript,JQueryリンク -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- <script src="./js/main.js"></script> -->
<?php wp_footer(); ?>
</body>

</html>