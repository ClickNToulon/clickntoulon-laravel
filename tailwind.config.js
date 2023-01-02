const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                '1.5xl': '1440px',
                '2.5xl': '1760px',
            },
            colors: {
                success: "#57A773",
                warning: "#FFCF56",
                danger: "#DD1C1A",
                lightgrey: "#F5F5FA",
                darkblue: "#232f3e",
                primeblue: "#519CC7",
                lightorange: "#FAC552",
                darkorange: "#F26D21",
                primaryblack: "#555555",
                textblack: "#28333E",
                lightgray: "#EAEDED",
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
    ],
};
