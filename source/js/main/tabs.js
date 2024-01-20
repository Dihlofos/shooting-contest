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
