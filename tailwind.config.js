/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js" // Tambahkan ini
    ],
    theme: {
        extend: {
            colors: {
                primary: "#064e3b", // Hijau tua (tailwind: emerald-900)
                secondary: "#065f46", // Hijau sekunder
                accent: "#047857" // Hijau terang
            },
        },
    },
    plugins: [
        require('flowbite/plugin'), // Tambahkan ini
        require('@tailwindcss/forms'), // ✅ tambahkan ini
    ],
};
