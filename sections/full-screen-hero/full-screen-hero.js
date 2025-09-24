{
    const marquee = document.querySelector('.full-scree-hero [data-marquee]');
    if (marquee) {
        const logoContainer = marquee.querySelector('[data-marquee-container]');
        if (logoContainer) {
            const countsOfClone = Math.ceil((document.documentElement.clientWidth * 1.5) / logoContainer.clientWidth);

            for (let index = 0; index < countsOfClone; index++) {
                marquee.append(logoContainer.cloneNode(true));
            }

            marquee.classList.add('animate');
            marquee.classList.remove('opacity-0');
            marquee.style.setProperty('--speed', `${20 / 800 * logoContainer.clientWidth}s`);

            if (isMobile()) {
                marquee.addEventListener('pointerdown', () => {
                    marquee.classList.add('paused');
                });
                marquee.addEventListener('pointerup', () => {
                    marquee.classList.remove('paused');
                });
            } else {
                marquee.addEventListener('mouseenter', () => {
                    marquee.classList.add('paused');
                });
                marquee.addEventListener('mouseleave', () => {
                    marquee.classList.remove('paused');
                });
            }
        }
    }
}