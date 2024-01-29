"use strict";
(function () {
  let links = document.querySelectorAll(".detail-links__link");
  if (!links.length) return;

  links.forEach(async (link) => {
    const response = await fetch(link.href, {
      method: "GET",
    });

    if (response.url !== "https://shotgun.sport.moscow/404.html") {
      link.classList.remove("disabled");
    }
  });
})();
