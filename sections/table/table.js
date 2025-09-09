{
  const tableSliders = document.querySelectorAll('[data-slider="table"]');
  tableSliders.forEach((slider) => {
    const tableRows = slider.querySelectorAll("[data-row]");
    const chunks = {};
    tableRows.forEach((row) => {
      const key = row.getAttribute("data-row");
      if (!chunks[key]) {
        chunks[key] = [];
      }
      chunks[key].push(row);
    });

    Object.values(chunks).forEach((chunk) => {
      const maxValue = Math.max(...chunk.map(el => el.clientHeight));
      chunk.forEach(el => el.style.setProperty('min-height', `${maxValue}px`));
    });

    if (window.innerWidth < 1024) {
      const swiper = new Swiper(slider.querySelector(".swiper"), {
        speed: 600,
        pagination: {
          ...createCustomSliderPagination(slider),
        },
        navigation: {
          nextEl: slider.querySelector(".nav-btn.next"),
          prevEl: slider.querySelector(".nav-btn.prev"),
        },
        initialSlide: 1,
        centeredSlides: true,
        slidesPerView: "auto",
        spaceBetween: 10,
      });
    } else {
      const swiper = new Swiper(slider.querySelector(".swiper"), {
        speed: 600,
        pagination: {
          ...createCustomSliderPagination(slider),
        },
        freeMode: true,
        navigation: {
          nextEl: slider.querySelector(".nav-btn.next"),
          prevEl: slider.querySelector(".nav-btn.prev"),
        },
        slidesPerView: "auto",
        //spaceBetween: 10,
      });
    }
  });
}
