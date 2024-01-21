"use strict";
(function () {
  let upButton = document.querySelector(".up");

  if (upButton) {
    window.onscroll = function () {
      if (window.pageYOffset > 260) {
        upButton.classList.add("up--shown");
      } else {
        upButton.classList.remove("up--shown");
      }
    };
  }
})();

"use strict";
(function () {
  const dropdowns = document.querySelectorAll(".js-dropdown");

  dropdowns.forEach((dropdown) => {
    const trigger = dropdown.querySelector(".js-dropdown-trigger");

    trigger.addEventListener("click", () => {
      dropdown.classList.toggle("open");
    });
  });
})();

"use strict";
(function () {
  const togglers = document.querySelectorAll(".js-faq-toggler");
  if (!togglers.length) return;

  togglers.forEach((toggler) => {
    toggler.addEventListener("click", (event) => {
      const target = event.currentTarget;
      if (!target) return;
      const content = target.querySelector(".js-content");
      if (!content) return;
      target.classList.toggle("active");
      content.classList.toggle("active");
    });
  });
})();

$(document).ready(function () {
  $(".open-popup").magnificPopup({
    type: "inline",
    preloader: false,
    focus: "#name",

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function () {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = "#name";
        }
      },
    },
  });
  $(".open-popup").click(function (e) {
    e.preventDefault();
    $('select option:contains("' + $(this).attr("data-type-sport") + '")').prop(
      "selected",
      true
    );
    $(".open-popup").magnificPopup("open");
  });

  $("input[name='phone']").mask("+7(999) 999-9999");
  $("input[name='birthday']").mask("99.99.9999");
  new AirDatepicker("#birthday");

  $("#form-popup").submit(function () {
    if ($(".form-step-2").hasClass("show")) {
      console.log("отправка");
    } else {
      $(".form-step-2").addClass("show");
      $(".form-step-1").removeClass("show");
      $('input[type="checkbox"]').attr("required", "");
      $(".form-popup__title span").text("2/2");
    }
    return false;
  });
});

(function () {
  const pins = document.querySelectorAll(".js-pin");
  const vw = window.innerWidth;

  pins.forEach((pin) => {
    if (!isTouchDevice() || vw > 1023) {
      pin.addEventListener("mouseover", () => {
        toggleOpen(pin);
      });

      pin.addEventListener("mouseout", () => {
        pin.classList.toggle("open");
      });
    } else {
      pin.addEventListener("click", () => {
        toggleOpen(pin);
        clearAllExcept(pin);
      });
    }
  });

  function isTouchDevice() {
    return (
      "ontouchstart" in window ||
      navigator.maxTouchPoints > 0 ||
      navigator.msMaxTouchPoints > 0
    );
  }

  function toggleOpen(pin) {
    pin.classList.toggle("open");

    if (pin.dataset.pin === "4" && vw < 768) {
      const pin6 = document.querySelector('[data-pin="6"]');
      if (pin6.classList.contains("open")) {
        pin6.classList.remove("open");
      }
    }
  }

  function clearAllExcept(onePin) {
    pins.forEach((pin) => {
      if (onePin.dataset.pin === pin.dataset.pin) {
        return;
      }
      pin.classList.remove("open");
    });
  }
})();

"use strict";
(function () {
  const nav = document.querySelector('.js-nav');
  const toggler = document.querySelector('.js-nav-toggler');
  const closeButtons = document.querySelectorAll('.js-nav-close');
  const links = nav.querySelectorAll('.js-scroll');

  toggler.addEventListener('click', () => {
    nav.classList.toggle('is-active');
  })

  closeButtons.forEach((item)=> {

    item.addEventListener('click', () => {
      console.log('here?');
      closeNav();
    })
  })

  links.forEach((link) => {
    link.addEventListener('click', () => {
      closeNav();
    })
  })


  function closeNav() {
    nav.classList.remove('is-active');
  }


})();

"use strict";
(function () {
  window.scroll = new SmoothScroll(".js-scroll", {
    speed: 800,
    speedAsDuration: true,
    easing: "easeOutQuad",
  });
})();

"use strict";
(function () {
  const tabsContainer = document.querySelector(".js-tabs");
  const triggers = tabsContainer.querySelectorAll(".js-tab-trigger");
  const tabs = tabsContainer.querySelectorAll(".js-tab");

  if (!tabsContainer || !triggers || !tabs) {
    return;
  }

  triggers.forEach((trigger) => {
    trigger.addEventListener("click", (event) => {
      const tab = trigger.dataset.tab;
      clearTriggersClass();
      trigger.classList.add("active");

      toggle(tab);

      function toggle(tabName) {
        tabs.forEach((tab) => {
          const tabIName = tab.dataset.tab;
          if (tabIName === tabName) {
            tab.classList.add("active");
          } else {
            tab.classList.remove("active");
          }
        });
      }
    });
  });

  function clearTriggersClass() {
    triggers.forEach((trigger) => {
      trigger.classList.remove("active");
    });
  }
})();
