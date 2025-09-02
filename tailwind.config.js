/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./sections/**/*.php",
        "./modules/**/*.php",
        "./templates/**/*.php",
        "./gootenberg_custom_blocks_tailwind_compile_files/**/*.php",
        "./*.php",
    ],
    darkMode: "class",
    theme: {
        screens: {
            'sm': '576px',
            'md': '744px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1440px',
            '3xl': '1600px',
            '4xl': '1920px',
            'sm-max': { 'max': '575.98px' },
            'md-max': { 'max': '743.98px' },
            'lg-max': { 'max': '1023.98px' },
            'xl-max': { 'max': '1279.98px' },
            '2xl-max': { 'max': '1439.98px' },
            '3xl-max': { 'max': '1599.98px' },
            '4xl-max': { 'max': '1919.98px' }
        },
        fontFamily: {
            ['main-font-family']: ['var(--main-font-family)'],
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '16px',
            },
        },
        extend: {
            zIndex: {
                '1': '1',
                '2': '2',
                '3': '3',
                '4': '4',
                '5': '5',
                '6': '6',
                '7': '7',
                '8': '8',
                '9': '9',
                '48': '48',
                '49': '49',
                '50': '50',
            },
            screens: {
                'md-and-lg-max': { 'min': '744px', 'max': '1023.98px' },
                'lg-and-xl-max': { 'min': '1024px', 'max': '1279.98px' },
            },
            backgroundColor: {
                'color-accent-first': 'var(--color-accent-first)',
                'color-accent-second': 'var(--color-accent-second)',
                'color-accent-third': 'var(--color-accent-third)',
                'color-dark': 'var(--color-dark)',
                'color-dark-80': 'var(--color-dark-80)',
                'color-dark-40': 'var(--color-dark-40)',
                'color-dark-20': 'var(--color-dark-20)',
                'color-light': 'var(--color-light)',
                'color-error': 'var(--color-error)',
            },
            colors: {
                'color-accent-first': 'var(--color-accent-first)',
                'color-accent-second': 'var(--color-accent-second)',
                'color-accent-third': 'var(--color-accent-third)',
                'color-dark': 'var(--color-dark)',
                'color-dark-80': 'var(--color-dark-80)',
                'color-dark-40': 'var(--color-dark-40)',
                'color-dark-20': 'var(--color-dark-20)',
                'color-light': 'var(--color-light)',
                'color-error': 'var(--color-error)',
            },
            objectPosition: {
                'center-bottom': 'center bottom',
            }
        },
        transitionDuration: {
            DEFAULT: '200ms'
        }
    },
    corePlugins: {
        //aspectRatio: false,
    },
    future: {
        hoverOnlyWhenSupported: true
    },
    plugins: [],
};
