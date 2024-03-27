/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
  theme: {
        fontFamily: {
            'sans': ['Figtree', 'serif'],
        },
    extend: {},
  },
    variants: {
        extend: {
            backgroundColor: ['focus'],
            borderColor: ['focus'],
            textColor: ['focus'],
            ringColor: ['focus'],
        }
    },
  plugins: [
      require('@tailwindcss/forms'),
      require('flowbite/plugin')
  ],
}

