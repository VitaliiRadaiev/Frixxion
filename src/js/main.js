@@include('../plugins/swiper/swiper-bundle.js')
@@include('../plugins/aos/aos.js')
@@include('../plugins/inputmask/inputmask.min.js')

@@include('./utils.js')
@@include('./scripts.js')

window.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add('page-loaded');

    AOS && AOS.init({
        duration: 1000,
        once: true,
        //offset: 500,
    });

    if (isMobile()) {
        document.body.classList.add('mobile');
    }

    if (iOS()) {
        document.body.classList.add('mobile-ios');
    }

    if (isSafari()) {
        document.body.classList.add('safari');
    }

    replaceImageToInlineSvg();
    initSmoothScrollByAnchors();
    initResponsiveReload(1024);
    initInputMask();
    initScrollContainers();
    initSetElSizeVariables();
    initDetectIsDoucementScrolling();

    // sections
    // /= sections

    // modules
    @@include('../../modules/header/header.js')
    // /= modules
}); 