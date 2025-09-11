window.addEventListener("DOMContentLoaded", () => {
  const sliders = document.querySelectorAll('[data-slider="testimonials-slider"]');
  sliders.forEach((slider) => {
    const nextButtons = slider.querySelectorAll(".nav-btn.next");
    const prevButtons = slider.querySelectorAll(".nav-btn.prev");
    const cards = slider.querySelectorAll("[data-review-card]");

    cards.forEach((card) => {
      const btnShowAll = card.querySelector('[data-action="show-all"]');
      const textContainer = card.querySelector("[data-text-container]");

      if (!textContainer) return;

      if (textContainer.scrollHeight > textContainer.clientHeight) {
        btnShowAll.classList.remove("hidden");
        textContainer.classList.add("can-open");
      }
    });

    const swiper = new Swiper(slider.querySelector(".swiper"), {
      speed: 600,
      pagination: {
        ...createCustomSliderPagination(slider),
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 10,
          loop: false,
        },
        744: {
          slidesPerView: "auto",
          spaceBetween: 10,
          loop: true,
          centeredSlides: true,
        },
        1024: {
          slidesPerView: "auto",
          spaceBetween: 24,
          loop: true,
          centeredSlides: true,
        },
      },
      on: {
        slideChange: (swiper) => {
          nextButtons.forEach((btn) =>
            btn.classList.toggle("swiper-button-disabled", swiper.isEnd)
          );
          prevButtons.forEach((btn) =>
            btn.classList.toggle("swiper-button-disabled", swiper.isBeginning)
          );

          const slides = swiper.slides;

          slides.forEach((slide) => {
            slide.classList.remove(
              "swiper-slide-prev-prev",
              "swiper-slide-next-next"
            );
          });

          const secondPrevIndex =
            swiper.activeIndex - 2 < 0
              ? slides.length + (swiper.activeIndex - 2)
              : swiper.activeIndex - 2;
          const secondNextIndex =
            swiper.activeIndex + 2 >= slides.length
              ? (swiper.activeIndex + 2) % slides.length
              : swiper.activeIndex + 2;

          slides[secondPrevIndex]?.classList.add("swiper-slide-prev-prev");
          slides[secondNextIndex]?.classList.add("swiper-slide-next-next");
        },
      },
    });

    if (swiper.isLocked) {
      [...nextButtons, ...prevButtons].forEach((btn) =>
        btn.classList.add("swiper-button-lock")
      );
    }

    nextButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        swiper.slideNext();
      });
    });

    prevButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        swiper.slidePrev();
      });
    });

    const reviewPopupContent = document.querySelector("[data-review-content]");
    if (reviewPopupContent) {
      slider.addEventListener("click", (e) => {
        if (e.target.closest('[data-action="show-all"]')) {
          const card = e.target.closest("[data-review-card]");
          if (card) {
            const clonedCard = card.cloneNode(true);
            reviewPopupContent.innerHTML = "";
            reviewPopupContent.append(clonedCard);
            window.popup.open("#popup-full-review");
          }
        }
      });
    }
  });
});
