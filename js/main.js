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

    //Page-Staff Swiper
    const parentGallery = document.querySelector("#js-greeting-slide");
    if (parentGallery) {
      const cloneGallery = parentGallery.cloneNode(true);
      const cloneChildren = cloneGallery.querySelectorAll(".p-greeting__slide");
      cloneChildren.forEach((cloneChild) => {
        parentGallery.appendChild(cloneChild.cloneNode(true));
      });
    }


    var swiper = new Swiper(".greeting-swiper", {
      loop: true,
      initialSlide: 2,
      slidesPerView: 1,
      loopAdditionalSlides: 2,
      centeredSlides: true,
      allowTouchMove: true,
      touchRatio: 1,
      spaceBetween: 10,
      speed: 20000,
      autoplay: {
        delay: 0,
      },
      breakpoints: {
        768: {
          initialSlide: 1,
          spaceBetween: 20,
          speed: 0,
        },
      },
    });

    //トップへ移動(to-top)
    let speed = 300;
    $("#js-to-top").hide();
    $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
        $("#js-to-top").fadeIn();
      } else {
        $("#js-to-top").fadeOut();
      }
    });
    $("#js-to-top").on("click", function (e) {
      e.preventDefault();
      $("body, html").animate({ scrollTop: 0 }, speed);
    });
  });
});
