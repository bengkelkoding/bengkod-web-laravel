import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    darkMode: "",

    theme: {
        extend: {
            fontFamily: {
                sans: ["FigtrePope", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-color": "#114D91",
                "secondary-color": "var(--secondary-color)",
            },
        },
    },

    plugins: [
        forms,
        require("tailwind-scrollbar-hide"),
        require("tw-elements/dist/plugin.cjs"),
    ],
};
