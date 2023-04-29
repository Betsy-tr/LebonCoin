const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php",
              "./resources/**/*.js",
              "./node_modules/flowbite/**/*.js"
    
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('flowbite/plugin')],
};
