(function () {
  "use strict";

  var toggle = document.querySelector(".menu-toggle");
  var navigation = document.getElementById("primary-navigation");
  var progress = document.getElementById("readingProgress");
  var backToTop = document.getElementById("backToTop");

  if (toggle && navigation) {
    toggle.addEventListener("click", function () {
      var isOpen = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!isOpen));
      navigation.classList.toggle("is-open", !isOpen);
    });

    navigation.addEventListener("click", function (event) {
      if (event.target.closest("a") && window.matchMedia("(max-width: 900px)").matches) {
        navigation.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
      }
    });
  }

  function updateScrollUI() {
    var scrollable = document.documentElement.scrollHeight - window.innerHeight;
    var amount = scrollable > 0 ? (window.scrollY / scrollable) * 100 : 0;
    if (progress) progress.style.width = amount + "%";
    if (backToTop) backToTop.classList.toggle("is-visible", window.scrollY > 500);
  }

  window.addEventListener("scroll", updateScrollUI, { passive: true });
  updateScrollUI();

  if (backToTop) {
    backToTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
})();
