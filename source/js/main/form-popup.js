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
