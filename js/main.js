jQuery(function ($) {
  $(document).ready(function () {
    //ドロワーメニュー
    $("#js-drawer-open").on("click", function () {
      $(this).children().toggleClass("is-open");
      $("#drawer").fadeToggle(300);
      if ($(this).hasClass("is-open")) {
        $("html, body").css("overflow", "hidden");
      } else {
        $("html, body").removeAttr("style");
      }
    });
    $(".p-dnav__item").on("click", function () {
      $("#js-drawer-open").removeClass("is-open");
    });

    //Index Fv Swiper
    var swiper = new Swiper(".fv-swiper", {
      loop: true,
      speed: 500,
      effect: "fade",
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        direction: "vertical", // 縦方向に設定
        orientation: "vertical", // 縦方向に設定
      },
    });
  });
});
