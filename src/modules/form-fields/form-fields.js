{
  const loader = Loader.create();

  document.addEventListener("wpcf7beforesubmit", (e) => {
    loader.addTo(e.target);
  });

  document.addEventListener(
    "wpcf7mailsent",
    (e) => {
      loader.remove();
      popup.open("#popup-success");
    },
    false
  );

  document.addEventListener("wpcf7mailfailed", (e) => {
    loader.remove();

    window.popup.open("#popup-unsuccess");
  });

  document.addEventListener("wpcf7invalid", function (e) {
    loader.remove();
    scrollToEl(e.target);
  });

  const openPopupFormButtons = document.querySelectorAll(
    '[data-action="open-popup-form"]'
  );
  const popupFormContainer = document.querySelector(
    "[data-popup-form-container]"
  );
  openPopupFormButtons.forEach((btn) => {
    btn.addEventListener("click", async (e) => {
      e.preventDefault();
      const formShortcode = btn.getAttribute("data-form");
      if (!formShortcode) return;
      const popupContentEl = popupFormContainer.closest(".popup__content");
      const popupBodyEl = popupFormContainer.closest(".popup__body");
      popupFormContainer.innerHTML = "";
      popupContentEl.classList.add("hidden");
      loader.addTo(popupBodyEl);
      window.popup.open("#popup-form");

      const result = await WpFetch({
        action: "get_contact_form",
        shortcode: formShortcode,
      });

      if (result.success) {
        popupFormContainer.insertAdjacentHTML("beforeend", result.data.html);
        popupContentEl.classList.remove("hidden");
        initInputMask();
        if (window.wpcf7 && wpcf7.init) {
          wpcf7.init(popupFormContainer.querySelector(".wpcf7-form"));
        }
      } else {
        window.popup.open("#popup-unsuccess");
      }

      loader.remove();
    });
  });

  const textareaFields = document.querySelectorAll(
    "[data-adaptive-textarea] textarea"
  );
  textareaFields.forEach((textarea) => {
    const scrollContainer = textarea.closest("[data-scroll-container]");

    textarea.addEventListener("input", () => {
      textarea.style.height = "auto";
      textarea.style.height = textarea.scrollHeight + "px";

      scrollContainer?.swiper && scrollContainer.swiper.update();
    });
  });
}
