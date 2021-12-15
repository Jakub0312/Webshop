const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                customwhite: {
                    DEFAULT: '#F2F2F2',
                },
                customgreen: {
                    light: '#65CCB8',
                    DEFAULT: '#57BA98',
                    mid: '#41a267',
                    dark: '#3B945E',
                },
                customblack: {
                    DEFAULT: '#182628',
                }
            }
        },

        variants: {
            extend: {
                opacity: ['disabled'],
            },
        },

        plugins: [require('@tailwindcss/forms')],
    }
};
