{
    const pageNews = document.querySelector('[data-news-archive]');
    if (pageNews) {
        const postsContainer = pageNews.querySelector('[data-list]');
        const btnShowMore = pageNews.querySelector('[data-action="show-more"]');
        const paginationWrapper = pageNews.querySelector('[data-pagination-wrapper]');

        const loader = Loader.create();
        const state = new Store({
            page: +pageNews.getAttribute('data-paged'),
        });
        let isPaginationClick = false;

        state.onUpdate(async (prevState, state) => {
            loader.addTo(postsContainer);
            btnShowMore.classList.add('disabled');
            paginationWrapper.classList.add('disabled');


            const result = await WpFetch({
                action: "get_news",
                page: state.page,
            });

            if(result.html) {
                if (isPaginationClick) {
                    isPaginationClick = false;
                    postsContainer.innerHTML = result.html;
                    scrollToEl(postsContainer, -20);

                } else {
                    postsContainer.insertAdjacentHTML('beforeend', result.html);
                }

                btnShowMore.parentElement.classList.toggle('hidden', state.page >= result.max_num_pages);
            }
            
            if(result.pagination) {
                paginationWrapper.innerHTML = result.pagination;
            }

            loader.remove();
            btnShowMore.classList.remove('disabled');
            paginationWrapper.classList.remove('disabled');
        });

        btnShowMore && btnShowMore.addEventListener('click', () => {
            const currentURL = new URL(window.location.href);
            const page = state.getState().page + 1;
            const url = `${currentURL.origin}/news/page/${page}/`;
            window.history.pushState({}, '', url);
            state.setState({ page });
        });

        paginationWrapper.addEventListener('click', (e) => {
            if (e.target.closest('a')) {
                e.preventDefault();
                isPaginationClick = true;
                const link = e.target.closest('a');
                const url = new URL(link.href);
                const cleanedUrl = url.origin + url.pathname;
                const page = getPageNumberFromPaginationUrl(cleanedUrl);
                window.history.pushState({}, '', url);
                state.setState({ page });
            }
        });
    }
}