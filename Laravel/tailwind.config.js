/** @type {import('tailwindcss').Config} */
import plugin from "tailwindcss/plugin";
const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        // "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["InterVariable", ...defaultTheme.fontFamily.sans],
                body: [
                    "Inter",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                    950: "#172554",
                },
            },
        },
    },
    plugins: [
        require("flowbite/plugin"),
        require("flowbite-typography"),
        plugin(({ addVariant, e }) => {
            addVariant("sidebar-expanded", ({ modifySelectors, separator }) => {
                modifySelectors(
                    ({ className }) =>
                        `.sidebar-expanded .${e(
                            `sidebar-expanded${separator}${className}`
                        )}`
                );
            });
        }),
    ],
    safelist: [
        "bg-blue-50",
        "bg-red-50",
        "bg-green-50",
        "bg-yellow-50",
        "bg-indigo-50",
        "bg-purple-50",
        "bg-pink-50",
        "bg-blue-100",
        "bg-red-100",
        "bg-green-100",
        "bg-yellow-100",
        "bg-indigo-100",
        "bg-purple-100",
        "bg-pink-100",
        "text-blue-400",
        "text-red-400",
        "text-green-400",
        "text-yellow-400",
        "text-indigo-400",
        "text-purple-400",
        "text-pink-400",
        "text-red-800",
        "text-blue-800",
        "text-green-800",
        "text-yellow-800",
        "text-indigo-800",
        "text-purple-800",
        "text-pink-800",
    ],
};
