jQuery(function ($) {
  $(document).ready(function () {
    /*--- ドロワーメニュー ---*/
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

    /*--- Index Fv Swiper ---*/
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

    /*--- Page-Staff Swiper ---*/
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

    /*--- トップへ移動(to-top) ---*/
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

    //スムーススクロール
    $("a[href^='#']").on("click", function (e) {
      e.preventDefault();
      const href = $(this).attr("href");
      const point = $(href == "#" || href == "" ? "html" : href);
      const position = point.offset().top - 60;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
    });
  });

  /*--- Contact Form バリデーション ---*/
  const form = $(".p-contact-form");
  const elements = $(
    ".p-contact-form__input, .p-contact-form__textarea, .p-contact-form__radio-input, .p-contact-form__checkbox-input, .p-contact-form__select"
  );
  const errorMessages = $(".p-contact-form__field-error");

  /*--- エラーメッセージの表示／非表示関数 ---*/
  function showError(element) {
    element.addClass("is-error");
    element
      .closest(".p-contact-form__field-item")
      .find(".p-contact-form__field-error")
      .removeClass("u-action-hidden");
  }

  function hideError(element) {
    element.removeClass("is-error");
    element
      .closest(".p-contact-form__field-item")
      .find(".p-contact-form__field-error")
      .addClass("u-action-hidden");
  }

  /*--- チェックボックスの確認 ---*/
  const checkBoxes = $('[name="your-check"]');
  const currentPage = window.location.pathname;

  if (currentPage.includes("page-booking.html")) {
    // チェックボックスの初期状態を確認してrequired属性を設定する
    function updateRequired() {
      const isCheckedCount = checkBoxes.filter(":checked").length;
      if (isCheckedCount > 0) {
        checkBoxes.prop("required", false);
      } else {
        checkBoxes.prop("required", true);
      }
    }

    // チェックボックスの状態変化時に処理する
    checkBoxes.on("change", updateRequired);

    // ページ読み込み時に初期状態を設定
    updateRequired();
  }

  /*--- フォームのバリデーション ---*/
  $(form).on("submit", function (e) {
    e.preventDefault();
    elements.removeClass("is-error");
    errorMessages.addClass("u-action-hidden");

    const form = $(this)[0];
    let isValid = form.checkValidity();

    if (currentPage.includes("page-booking.html")) {
      const radioGroup = $("input[name='your-radio']");
      // ラジオボックスにチェックがあるか確認
      if (!radioGroup.is(":checked")) {
        showError(radioGroup.closest(".p-contact-form__field-item"));
        isValid = false;
      }
      // チェックボックスにチェックがあるか確認
      if (!checkBoxes.is(":checked")) {
        showError(checkBoxes.closest(".p-contact-form__field-item"));
        isValid = false;
      }
    }

    if (isValid) {
      // 適切なサンクスページに遷移
      if (currentPage.includes("page-contact.html")) {
        window.location.href = "page-thanks-contact.html";
      } else if (currentPage.includes("page-booking.html")) {
        window.location.href = "page-thanks-booking.html";
      }
      form.reset();
    }
  });

  /*--- インプット要素のイベントリスナー ---*/
  elements.on("invalid", function () {
    showError($(this));
  });

  elements.on("input change", function () {
    if (this.checkValidity()) {
      hideError($(this));
    }
  });
});
