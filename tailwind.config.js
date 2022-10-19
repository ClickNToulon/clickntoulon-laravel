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
            colors: {
                azure: {
                    DEFAULT: "#3185FC",
                    50: "#9AC4FE",
                    100: "#85B8FE",
                    200: "#72ACFE",
                    300: "#5EA0FD",
                    400: "#4A94FC",
                    500: "#3185FC",
                    600: "#227DFC",
                    700: "#0E71FB",
                    800: "#0467F1",
                    900: "#035EDD",
                },
                success: "#57A773",
                warning: "#FFCF56",
                danger: "#DD1C1A",
                lightgrey: "#F5F5FA"
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
