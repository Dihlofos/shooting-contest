$(document).ready(function () {
  window.sendForm = false;
  $(".open-popup").magnificPopup({
    type: "inline",
    preloader: false,
    focus: "#name-form",

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function () {
        if ($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = "#name-form";
        }
      },
    },
  });

  $(".open-popup").click(function (e) {
    e.preventDefault();

    console.log(
      '$(this).attr("data-type-sport")',
      $(this).attr("data-type-sport")
    );
    console.log('$(this).attr("data-type-step")', $(this).attr("data-step"));
    $("input[name='type-sport']").val($(this).attr("data-type-sport"));
    $("input[name='step']").val($(this).attr("data-step"));
    $(".open-popup").magnificPopup("open");
  });

  $("input[name='phone']").mask("+7(999) 999-9999");
  $("input[name='birthday']").mask("99.99.9999");
  new AirDatepicker("#birthday");

  $("#form-popup").submit(function () {
    if ($(".form-step-2").hasClass("show") && window.sendForm == false) {
      window.sendForm = true;
      $.ajax({
        url: "/send-form.php",
        data: $("#form-popup").serialize(),
        processData: false,
        contentType: false,
        type: "GET",
        success: function (data) {
          $("#form-popup > div").html(
            '<div class="form-popup__title">ВАША ЗАЯВКА ОТПРАВЛЕНА</div><div class="form-popup__scroll show"><div>В ближайшее время с вами свяжутся по указанным в форме контактам.</div></div>'
          );
        },
      });
    } else {
      $(".form-step-2").addClass("show");
      $(".form-step-1").removeClass("show");
      $('input[type="checkbox"]').attr("required", "");
      $(".form-popup__title span").text("2/2");
    }
    return false;
  });

  $(".js-back").click(function () {
    $(".form-step-1").addClass("show");
    $(".form-step-2").removeClass("show");
    $('input[type="checkbox"]').attr("required", false);
    $(".form-popup__title span").text("1/2");
  });

  const formOpenParam = window.location.search.split("?")?.[1];

  if (formOpenParam && formOpenParam === "registerForm") {
    $(".open-popup").magnificPopup("open");
  }
});
