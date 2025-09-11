{
  const vacanciesGridSections = document.querySelectorAll(
    "[data-vacancies-grid]"
  );
  vacanciesGridSections.forEach((section) => {
    const postsContainer = section.querySelector("[data-list]");
    const btnLoadMore = section.querySelector('[data-action="load-more"]');

    const postsPerPage = section.getAttribute("data-posts-per-page");
    const loader = Loader.create();
    const state = new Store({ page: 1 });

    state.onUpdate(async (prevState, state) => {
      loader.addTo(postsContainer);
      btnLoadMore.classList.add("disabled");

      const result = await WpFetch({
        action: "get_vacancies",
        page: state.page,
        posts_per_page: postsPerPage
      });

      if(result) {
        postsContainer.insertAdjacentHTML('beforeend', result.html);
        btnLoadMore.parentElement.classList.toggle('hidden', state.page >= result.max_num_pages)
      }

      btnLoadMore.classList.remove("disabled");
      loader.remove();
    });

    btnLoadMore &&
      btnLoadMore.addEventListener("click", () => {
        state.setState({ page: state.getState().page + 1 });
      });
  });
}
