{
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    if(mobileMenu) {
        const btnBurger = document.querySelector('[data-action="open-mobile-menu"]');
        const header = document.querySelector('[data-header]');
        let isMenuOpen = false;

        btnBurger.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            mobileMenu.classList.toggle('mobile-menu--open', isMenuOpen);
            btnBurger.classList.toggle('active', isMenuOpen);
            header.classList.toggle('header--no-gradient', isMenuOpen);
            toggleDisablePageScroll(isMenuOpen);
        });
    }
}