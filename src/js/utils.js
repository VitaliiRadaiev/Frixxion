function slideUp(target, duration = 300) {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout(() => {
        target.style.display = 'none';
        target.style.removeProperty('height');
        target.style.removeProperty('padding-top');
        target.style.removeProperty('padding-bottom');
        target.style.removeProperty('margin-top');
        target.style.removeProperty('margin-bottom');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
        target?.classList.remove('_slide');
    }, duration);
}
function slideDown(target, duration = 300, displayContainer = 'block') {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;
    if (display === 'none')
        display = displayContainer;

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout(() => {
        target.style.removeProperty('height');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
        target?.classList.remove('_slide');
    }, duration);
}
function slideToggle(target, duration = 300) {
    if (!target?.classList.contains('_slide')) {
        target?.classList.add('_slide');
        if (window.getComputedStyle(target).display === 'none') {
            return this.slideDown(target, duration);
        } else {
            return this.slideUp(target, duration);
        }
    }
}
function isSafari() {
    let isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    return isSafari;
}
function Android() {
    return navigator.userAgent.match(/Android/i);
}
function BlackBerry() {
    return navigator.userAgent.match(/BlackBerry/i);
}
function iOS() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
}
function Opera() {
    return navigator.userAgent.match(/Opera Mini/i);
}
function Windows() {
    return navigator.userAgent.match(/IEMobile/i);
}
function isMobile() {
    return (Android() || BlackBerry() || iOS() || Opera() || Windows());
}

function toggleDisablePageScroll(state) {
    const needOffsetElements = document.querySelectorAll('[data-popup="add-right-padding"]');

    if (state) {
        const offsetValue = getScrollbarWidth();
        document.documentElement?.classList.add('overflow-hidden');
        document.body?.classList.add('overflow-hidden');
        document.documentElement.style.paddingRight = offsetValue + 'px';
        needOffsetElements.forEach(el => el.style.paddingRight = offsetValue + 'px');
    } else {
        setTimeout(() => {
            document.documentElement?.classList.remove('overflow-hidden');
            document.body?.classList.remove('overflow-hidden');
            document.documentElement.style.removeProperty('padding-right');
            needOffsetElements.forEach(el => el.style.removeProperty('padding-right'));
        }, 400);
    }
}


function getScrollbarWidth() {
    const lockPaddingValue = window.innerWidth - document.querySelector('body').offsetWidth;

    return lockPaddingValue;
}

function debounce(func, wait) {
    let timeout;

    function debounced(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    }

    debounced.cancel = function () {
        clearTimeout(timeout);
    };

    return debounced;
}
function throttle(func, limit) {
    let inThrottle;
    return function (...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

function linear(t) {
    return t;
}

function easeIn(t) {
    return t * t;
}

function easeOut(t) {
    return t * (2 - t);
}

function easeOutQuart(t) {
    return 1 - --t * t * t * t;
}

function easeOutQuint(t) {
    return 1 + --t * t * t * t * t;
}

function createAnimator({ timing, draw, duration, onEnd }) {
    let start = null;
    let pausedAt = null;
    let rafId = null;

    const animate = time => {
        if (!start) start = time;
        if (pausedAt) {
            start += (time - pausedAt);
            pausedAt = null;
        }
        let timeFraction = (time - start) / duration;
        if (timeFraction > 1) timeFraction = 1;

        let progress = timing(timeFraction);
        draw(progress);

        if (timeFraction < 1) {
            rafId = requestAnimationFrame(animate);
        } else {
            onEnd()
            start = null;
        }
    };

    return {
        start: () => {
            if (!rafId) {
                rafId = requestAnimationFrame(animate);
            }
        },
        pause: () => {
            if (rafId) {
                pausedAt = performance.now();
                cancelAnimationFrame(rafId);
                rafId = null;
            }
        },
        reset: () => {
            if (rafId) {
                cancelAnimationFrame(rafId);
                rafId = null;
            }
            start = null;
            pausedAt = null;
        }
    };
};

function buildThresholdList(threshold) { //threshold: number
    const array = [];
    for (let i = 1; i <= threshold; i++) {
        array.push(i / threshold);
    }
    return array;
}

async function WpFetch(requestData) {
    const controller = new AbortController();
    const tId = setTimeout(() => controller.abort(), 8000);

    const queryData = new URLSearchParams();
    for (const key in requestData) {
        queryData.set(key, requestData[key])
    }

    try {
        const res = await fetch(window.wpajax.url, {
            method: "POST",
            body: queryData,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            signal: controller.signal
        });

        clearTimeout(tId);

        if (!res.ok) {
            throw new Error('Network error: ' + res.status);
        }

        return res.json();

    } catch (err) {

        if (err.name == 'AbortError') {
            return { success: false }
        } else {
            throw err;
        }

    }
}

async function Fetch(url) {
    const controller = new AbortController();
    const tId = setTimeout(() => controller.abort(), 5000);

    try {
        const res = await fetch(`${document.location.origin}/wp-json/site-core/v1${url}`, {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            signal: controller.signal
        });

        clearTimeout(tId);

        if (!res.ok) {
            throw new Error('Network error: ' + res.status);
        }

        return res.json();

    } catch (err) {

        if (err.name == 'AbortError') {
            return { success: false }
        } else {
            throw err;
        }

    }
}

function createScrollTrigger(element) {
    return new Promise(res => {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    element.classList.add('_animate');
                    observer.disconnect();
                    res();
                }
            });
        }, {
            root: null,
            rootMargin: "0px 0px -1% 0px",
            threshold: 0.01
        });

        observer.observe(element);
    });
}

function ifNeedToAnimate(element) {
    const scrollPosition = window.scrollY;
    const elementTopPosition = element.getBoundingClientRect().top + scrollPosition;

    if (elementTopPosition > scrollPosition + (window.innerHeight * 0.25)) {
        return true;
    } else {
        return false;
    }
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function checkElementVisibility(el) {
    return new Promise(res => {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {

                if (entry.isIntersecting) {
                    res(true);
                } else {
                    res(false)
                }
                observer.disconnect();
            });
        }, {
            root: null,
            rootMargin: "0px",
            threshold: 1,
        });

        observer.observe(el);
    })
}

function calcProgress(start, end, current) {
    if (current <= start) return 0;
    if (current >= end) return 1;
    return (current - start) / (end - start);
}

function calcValueByProgress(start, end, progress) {
    return start + (end - start) * progress;
}

function calcValueByProgressArr(values, progress) {
    progress = Math.min(1, Math.max(0, progress));

    const totalSteps = values.length - 1;
    const scaledProgress = progress * totalSteps;
    const lowerIndex = Math.floor(scaledProgress);
    const upperIndex = Math.min(lowerIndex + 1, totalSteps);

    const intervalProgress = scaledProgress - lowerIndex;

    return values[lowerIndex] + (values[upperIndex] - values[lowerIndex]) * intervalProgress;
}

function scrollToEl(target) {
    let el = typeof target === 'string' ? document.querySelector(target) : target;
    if (!el) return;

    let header = document.querySelector('[data-header]');
    let elTop = Math.abs(document.body.getBoundingClientRect().top) + el.getBoundingClientRect().top;
    let headerHeight = header ? header.clientHeight : 0;
    let viewportHeight = window.innerHeight;
    let top = elTop - headerHeight;

    setTimeout(() => {
        window.scrollTo({
            top: top,
            behavior: 'smooth',
        });
    }, 0);
}

class Store {
    constructor(initialObject) {
        this.state = initialObject;
        this.prevState = null;
        this.onUpdateFunctions = [];
    }

    onUpdate = (fn) => {
        this.onUpdateFunctions.push(fn);
    }

    setState = (newPartOfState, runEvent = true) => {
        this.prevState = { ...this.state };
        this.state = {
            ...this.state,
            ...newPartOfState
        };
        if (runEvent) {
            this.onUpdateFunctions.forEach(fn => fn(this.prevState, this.state));
        }
    }

    getState = () => {
        return this.state;
    }

    getPrevState = () => {
        return this.prevState;
    }
}

function createCustomSliderPagination($container) {
    let initedSwiper = null;
    let prevCurrentState = 0;
    let shift = 0;
    const bullets = $container.querySelector(".slider-bullets-dots");
    const wrapper = document.createElement('div');
    wrapper.className = 'bullets-wrapper';
    bullets.append(wrapper);

    $container.addEventListener('click', (e) => {
        if (e.target.closest('.bullet')) {
            const $bullet = e.target.closest('.bullet');
            const index = $bullet.getAttribute('data-index');
            initedSwiper?.slideTo(index);
        }
    });

    return {
        el: wrapper,
        type: 'custom',
        dynamicBullets: true,
        renderCustom: function (swiper, current, total) {
            initedSwiper = swiper;
            let paginationHtml = '';
            const realCurrent = current - 1;
            const shiftStep = 16;
            const isShifting = total > 3;

            bullets.classList.add('_animate');
            if (typeof prevCurrentState === 'number') {

                if (prevCurrentState < realCurrent) {
                    bullets.classList.add('forward');

                    if (isShifting) {
                        shift = shiftStep * (realCurrent - 1);
                    }

                    setTimeout(() => {
                        bullets.classList.remove('forward');
                    }, 250)
                } else if (prevCurrentState > realCurrent) {
                    bullets.classList.add('backward');

                    if (isShifting) {
                        shift = shiftStep * (realCurrent - 1);
                    }
                    setTimeout(() => {
                        bullets.classList.remove('backward');
                    }, 250)
                }
            }

            prevCurrentState = +realCurrent;

            for (let i = 0; i < total; i++) {
                const neighboringCssClass =
                    i === (realCurrent - 1) ? "prev" :
                        i === (realCurrent - 2) ? "prev-prev" :
                            i === (realCurrent - 3) ? "prev-prev-prev" :
                                i === (realCurrent + 1) ? "next" :
                                    i === (realCurrent + 2) ? "next-next" :
                                        i === (realCurrent + 3) ? "next-next-next" : "";

                if (i === realCurrent) {
                    paginationHtml += `
                    <div class="bullet active" data-index="${i}"></div>
                    `;
                } else {
                    paginationHtml += `
                    <div class="bullet ${neighboringCssClass}" data-index="${i}"></div>
                    `;
                }
            }

            wrapper.style.setProperty('transform', `translateX(-${Math.min(Math.max(0, shift), (total - 3) * shiftStep)}px)`);
            return paginationHtml;
        }
    }
}


function setUrlParams(params) {
    const currentURL = new URL(window.location.href);

    const cleanedPathname = currentURL.pathname.replace(/\/page\/\d+\/?/, '/');
    currentURL.pathname = cleanedPathname;

    Object.keys(params).forEach(key => {
        currentURL.searchParams.set(key, params[key]);
    });

    window.history.pushState({}, '', currentURL);
}

function deleteUrlParams(params) {
    const currentURL = new URL(window.location.href);

    const cleanedPathname = currentURL.pathname.replace(/\/page\/\d+\/?/, '/');
    currentURL.pathname = cleanedPathname;

    Object.keys(params).forEach(key => {
        currentURL.searchParams.delete(key);
    });

    window.history.pushState({}, '', currentURL);
}

function buildApiPath(basePath, query = {}) {
    const url = new URL(basePath, window.location.origin);
    const params = new URLSearchParams();

    Object.entries(query).forEach(([key, value]) => {
        if (value !== undefined && value !== null && value !== '') {
            params.set(key, value);
        }
    });

    url.search = params.toString();
    return url.pathname + url.search;
};

function getPageNumberFromPaginationUrl(url) {
    const match = url.match(/\/page\/(\d+)/);
    return match ? parseInt(match[1], 10) : 1;
}