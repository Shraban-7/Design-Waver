const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                lightGray: "rgba(102, 102, 102, 1)",
                darkGray: "rgba(26, 26, 26, 1)",
                heroBg: "rgba(245, 251, 255, 1)",
                skyBlue: "#F37D21",
                redDark: "#FF4426",
                redLight: "#FF6952",
            },
            fontFamily: {
                space: "'Space Grotesk', sans-serif",
                dm: "'DM Sans',sans-serif",
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
