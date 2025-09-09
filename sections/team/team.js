{
  const sliders = document.querySelectorAll('[data-slider="team-slider"]');
  sliders.forEach((slider) => {
    const nextButtons = slider.querySelectorAll(".nav-btn.next");
    const prevButtons = slider.querySelectorAll(".nav-btn.prev");

    const swiper = new Swiper(slider.querySelector(".swiper"), {
      speed: 600,
      pagination: {
        ...createCustomSliderPagination(slider),
      },
      breakpoints: {
        0: {
            initialSlide: 0,
          centeredSlides: true,
          slidesPerView: "auto",
          spaceBetween: 9,
        },
        744: {
            initialSlide: 1,
          centeredSlides: true,
          slidesPerView: "auto",
          spaceBetween: 9,
        },
        1024: {
              initialSlide: 0,
          centeredSlides: false,
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1280: {
          centeredSlides: false,
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1920: {
          centeredSlides: false,
          slidesPerView: 5,
          spaceBetween: 20,
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
  });
}
