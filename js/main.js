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

  //Contact Form バリデーションエラー

  const form = $(".p-contact-form");
  const elements = $(".p-contact-form__input, .p-contact-form__textarea, .p-contact-form__radio-input, .p-contact-form__checkbox-input, .p-contact-form__select");
  const errorMessages = $(".p-contact-form__field-error");

  function showError(element) {
    element.addClass("is-error");
    element.closest(".p-contact-form__field-item").find(".p-contact-form__field-error").removeClass("u-action-hidden");
  }

  function hideError(element) {
    element.removeClass("is-error");
    element.closest(".p-contact-form__field-item").find(".p-contact-form__field-error").addClass("u-action-hidden");
  }

  $(form).on("submit", function (e) {
    e.preventDefault();
    elements.removeClass("is-error");
    errorMessages.addClass("u-action-hidden");

    const form = $(this)[0];
    const radioGroup = $("input[name='your-radio']");
    const checkBoxGroup = $("input[name='your-check']");
    let isValid = form.checkValidity();

    if (!radioGroup.is(":checked")) {
      showError(radioGroup.closest(".p-contact-form__field-item"));
      isValid = false;
    }
    if (!checkBoxGroup.is(":checked")) {
      showError(checkBoxGroup.closest(".p-contact-form__field-item"));
      isValid = false;
    }

    if (isValid) {
      alert("正常に送信されました");
      form.reset();
    }
  });

  elements.on("invalid", function () {
    showError($(this));
  });

  elements.on("input change", function () {
    if (this.checkValidity()) {
      hideError($(this));
    }
  });



  // const form = $(".p-contact-form");
  // const radio = $(".p-contact-form__radio-input");
  // const Elements = $(".p-contact-form__input, .p-contact-form__textarea, .p-contact-form__radio-input");
  // const ErrorMessages = $(".p-contact-form__field-error");

  // $(form).on("submit", function (e) {
  //   e.preventDefault();
  //   Elements.removeClass("is-error");
  //   const form = $(this)[0];
  //   if (form.checkValidity()) {
  //     alert("正常に送信されました");
  //     form.reset();
  //   }
  // });
  // Elements.on("invalid", function () {
  //   const fieldId = $(this).attr("id");
  //   $(this).addClass("is-error");
  //   $(this).next(ErrorMessages).removeClass("u-action-hidden");
  //   $(radio).parent().parent().next().removeClass("u-action-hidden");
  // });
  // Elements.on("input", function () {
  //   const fieldId = $(this).attr("id");
  //   if (this.checkValidity()) {
  //     $(this).removeClass("is-error");
  //     $(this).next(ErrorMessages).addClass("u-action-hidden");
  //   }
  // });
});
