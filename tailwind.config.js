import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    light: '#38bdf8',    // lighter teal, e.g., for hover states
                    DEFAULT: '#14b8a6',  // main teal
                    dark: '#0f766e',     // darker teal
                },
                coral: {
                    light: '#ff8787',    // lighter for hover / subtle accents
                    DEFAULT: '#FF6B6B',  // main coral
                    dark: '#e55b5b',     // deeper coral for dark mode
                },
                indigo: {
                    light: '#6d5dfc',    // lighter indigo
                    DEFAULT: '#3A0CA3',  // main deep indigo
                    dark: '#2c0880',     // darker indigo for dark backgrounds
                },
                lavender: {
                    light: '#d9caff',    // subtle lavender
                    DEFAULT: '#BFA2DB',  // main soft lavender
                    dark: '#9e82c3',     // darker for dark mode accents
                },
                darkBg: '#1f2937',      // dark background
                lightBg: '#f9fafb',     // light background
                lightText: '#ffffff',    // text-white
                darkText: '#111827',     // text-gray-900
            },
        },
    },

    darkMode: 'class', // enable dark mode via class toggling

    plugins: [forms],
};
