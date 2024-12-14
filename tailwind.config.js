import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                sora: ["Sora", ...defaultTheme.fontFamily.sans], // Add Sora font here
                fraunces: ["Fraunces", ...defaultTheme.fontFamily.sans],
            },
            animation: {
                "spin-slow": "spin 15s linear infinite",
                "spin-slow-reverse": "spin 15s linear infinite reverse", // Add this for reverse spin
                marquee: "marquee 25s linear infinite",
                marquee2: "marquee2 25s linear infinite",
            },
            keyframes: {
                marquee: {
                    "0%": { transform: "translateX(0%)" },
                    "100%": { transform: "translateX(-100%)" },
                },
                marquee2: {
                    "0%": { transform: "translateX(100%)" },
                    "100%": { transform: "translateX(0%)" },
                },
            },
            // Extend the default color palette
            colors: {
                gray: {
                    75: "#f1f1f1", // Add your custom gray color
                },
                green: {
                    75: "#29B694", // Add your custom green color
                },
                blue: {
                    75: "#2282AD", // Add your custom blue color
                },
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
