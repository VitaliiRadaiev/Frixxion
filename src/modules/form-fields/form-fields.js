{
    const loader = Loader.create();

    document.addEventListener('wpcf7beforesubmit', (e) => {
        loader.addTo(e.target);
    });

    document.addEventListener('wpcf7mailsent', (e) => {
        loader.remove();
        const isSubscribe = e.target.querySelector('[data-subscribe-form]');

        if(isSubscribe) {
            window.popup.open('#popup-newsletter-feadback-success');
        } else {
            window.popup.open('#popup-feadback-success');
        }
    }, false);

    document.addEventListener('wpcf7mailfailed', (e) => {
        loader.remove();

        window.popup.open('#popup-feadback-unsuccess');
    });


    document.addEventListener('wpcf7invalid', function (e) {
        loader.remove();
    });


    const openPopupFormButtons = document.querySelectorAll('[data-action="open-popup-form"]');
    const popupFormContainer = document.querySelector('[data-popup-form-container]');
    openPopupFormButtons.forEach(btn => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const formShortcode = btn.getAttribute('data-form');
            if (!formShortcode) return;
            const popupContentEl = popupFormContainer.closest('.popup__content');
            const popupBodyEl = popupFormContainer.closest('.popup__body');
            popupFormContainer.innerHTML = '';
            popupContentEl.classList.add('hidden');
            loader.addTo(popupBodyEl);
            window.popup.open('#popup-form');

            const result = await WpFetch({
                action: 'get_contact_form',
                shortcode: formShortcode
            });

            if (result.success) {
                popupFormContainer.insertAdjacentHTML('beforeend', result.data.html);
                popupContentEl.classList.remove('hidden');
                initInputMask();
                if (window.wpcf7 && wpcf7.init) {
                    wpcf7.init(popupFormContainer.querySelector('.wpcf7-form'));
                }

            } else {
                window.popup.open('#popup-feadback-unsuccess');
            }

            loader.remove();
        })
    });


    const searchElements = document.querySelectorAll('[data-search]');
    searchElements.forEach(search => {
        const input = search.querySelector('input');
        const form = search.closest('form');

        search.classList.toggle('can-clear', input.value.trim().length > 2);

        input.addEventListener('input', (e) => {
            const value = e.target.value.trim();
            search.classList.toggle('can-clear', value.length > 2);
        });

        form.addEventListener('reset', (e) => {
            e.preventDefault();
            input.value = '';
            const event = new Event('input');
            input.dispatchEvent(event);
        });

        search.clear = () => {
            input.value = '';
            const event = new Event('input');
            input.dispatchEvent(event);
        }
    });
}