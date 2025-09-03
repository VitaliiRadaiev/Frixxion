function replaceImageToInlineSvg() {
    const images = document.querySelectorAll('.img-svg');

    if (images.length) {
        images.forEach(img => {
            img?.classList.remove('img-svg');
            let xhr = new XMLHttpRequest();
            const src = img.getAttribute('data-src') || img.src;
            xhr.open('GET', src);
            xhr.onload = () => {
                if (xhr.readyState === xhr.DONE) {
                    if (xhr.status === 200) {
                        let svg = xhr.responseXML.documentElement;
                        svg?.classList.add('_svg', ...Array.from(img.classList));
                        img.parentNode.replaceChild(svg, img);
                    }
                }
            }
            xhr.send(null);
        })
    }
}

function initSmoothScrollByAnchors() {
    let anchors = document.querySelectorAll('a[href*="#"]:not([data-action="open-popup"])');
    if (anchors.length) {
        anchors.forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                if (anchor.getAttribute('href').startsWith('#popup-join')) {
                    e.preventDefault();
                    window.popup.open('#popup-join');
                } else {
                    const href = anchor.getAttribute('href')
                    let url = href.startsWith('#') ? href : new URL(href).hash;

                    const id = url.length > 1 ? url : null;
                    if (!id) return;
                    let el = document.querySelector(url);

                    if (el) {
                        e.preventDefault();
                        scrollToEl(el);
                    }
                }
            })
        })
    }
}

function createScrollContainer(htmlEl) {
    const wrapper = document.createElement('div');
    const slide = document.createElement('div');
    const scrollbar = document.createElement('div');

    wrapper.className = 'swiper-wrapper';
    slide.className = 'swiper-slide';
    scrollbar.className = 'swiper-scrollbar';

    htmlEl?.classList.add('swiper');

    slide.append(...htmlEl.children);
    wrapper.append(slide);
    htmlEl.append(wrapper, scrollbar);

    const swiper = new Swiper(htmlEl, {
        observe: true,
        observeParents: true,
        observeSlideChildren: true,
        direction: "vertical",
        slidesPerView: "auto",
        freeMode: true,
        scrollbar: {
            el: scrollbar,
        },
        mousewheel: {
            releaseOnEdges: htmlEl.getAttribute('data-scroll-container-behavior') === 'release',
        },

    });

    htmlEl.swiper = swiper;

    return swiper;
}

function initScrollContainers() {
    const containers = document.querySelectorAll('[data-scroll-container]');
    containers.forEach(container => {
        if (container.classList.contains('_initialized')) return;

        const mode = container.getAttribute('data-scroll-container');
        if (window.innerWidth < 1024 && mode === 'desk') return;
        if (container.classList.contains('_initialized')) return;
        createScrollContainer(container);
        container.classList.add('_initialized');

        const observer = new MutationObserver(_ => {
            observer.disconnect();

            container.swiper && container.swiper.update();

            observer.observe(container, {
                childList: true,
                subtree: true,
            });
        });

        observer.observe(container, {
            childList: true,
            subtree: true,
        });

        container.classList.add('_initialized');
    });
}

function initResponsiveReload(breakpoint) {
    let previousWidth = window.innerWidth;

    window.addEventListener('resize', () => {
        const currentWidth = window.innerWidth;

        if ((previousWidth < breakpoint && currentWidth >= breakpoint) || (previousWidth >= breakpoint && currentWidth < breakpoint)) {
            location.reload();
        }

        previousWidth = currentWidth;
    });
}

function initInputMask() {
    const elements = document.querySelectorAll('[data-mask]');
    elements.forEach(item => {
        if (item.classList.contains('_initialized')) return;

        let maskValue = item.getAttribute('data-mask');
        const input = item.tagName === 'INPUT' ? item : item.querySelector('input[type="text"]');

        if (!input) return;

        Inputmask(maskValue, {
            showMaskOnHover: false,
            showMaskOnFocus: true,
            oncomplete: () => {
                const event = new Event('phonecomplete', { bubbles: true });
                item.dispatchEvent(event);
            },
            oncleared: () => {
                const event = new Event('phonecleare', { bubbles: true });
                item.dispatchEvent(event);
            }
        }).mask(input);

        item.classList.add('_initialized');
    });

    const elementsRegExp = document.querySelectorAll('[data-mask-reg-exp]');
    elementsRegExp.forEach(item => {
        if (item.classList.contains('_initialized')) return;

        let maskValue = item.getAttribute('data-mask-reg-exp');
        const input = item.tagName === 'INPUT' ? item : item.querySelector('input[type="text"]');

        if (!input) return;

        Inputmask({
            regex: maskValue,
            showMaskOnHover: false,
            showMaskOnFocus: true,
            placeholder: '',
            oncomplete: () => {
                const event = new Event('phonecomplete', { bubbles: true });
                item.dispatchEvent(event);
            },
            oncleared: () => {
                const event = new Event('phonecleare', { bubbles: true });
                item.dispatchEvent(event);
            }
        }).mask(input);

        item.classList.add('_initialized');
    });
}

function initFancybox() {
    Fancybox.bind("[data-fancybox]", {});

    document.addEventListener("click", (e) => {
        if (e.target.closest('.fancybox__content')) return;
        if (e.target.closest('.fancybox__slide')) {
            Fancybox.close();
        }
    });
}

function initSetElSizeVariables() {
    const heightFnList = [];
    const widthFnList = [];
    const heightVariables = document.querySelectorAll('[data-height-var]');
    const widthVariables = document.querySelectorAll('[data-width-var]');

    heightVariables.forEach(el => {
        const [varName, selector] = el.getAttribute('data-height-var').split(',');
        const targetElem = selector.trim() === '_self' ? el : el.closest(selector.trim());
        if (!targetElem) return;
        heightFnList.push(debounce(() => {
            targetElem.style.setProperty(varName, `${el.clientHeight}px`);
        }, 150));

        setTimeout(() => {
            targetElem.classList.add('end-animation');
        }, 600);
    });

    widthVariables.forEach(el => {
        const [varName, selector] = el.getAttribute('data-width-var').split(',');
        const targetElem = selector.trim() === '_self' ? el : el.closest(selector.trim());
        if (!targetElem) return;
        widthFnList.push(debounce(() => {
            targetElem.style.setProperty(varName, `${el.clientWidth}px`);
        }, 150));
    });

    heightFnList.forEach(fn => fn());
    widthFnList.forEach(fn => fn());

    window.addEventListener('resize', () => {
        heightFnList.forEach(fn => fn());
        widthFnList.forEach(fn => fn());
    });
}

function initDetectIsDoucementScrolling() {
    if (window.scrollY > 10) {
        document.body.classList.add('document-is-scrolling');
    }

    let isScroll = window.scrollY;

    window.addEventListener('scroll', () => {
        document.body.classList.toggle('document-is-scrolling', window.scrollY > 10);

        if (window.scrollY > 200) {
            if (window.scrollY > isScroll) {
                document.body.classList.add('document-scroll-down');
            } else if (window.scrollY < isScroll) {
                document.body.classList.remove('document-scroll-up');
            }
        }

        isScroll = window.scrollY;
    })
}