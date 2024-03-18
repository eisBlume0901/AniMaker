/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
        fontFamily: {
            'sans': ['Figtree', 'serif'],
        },
    extend: {},
  },
  plugins: [],
}

