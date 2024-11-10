/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./application/views/**/*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Rethink Sans"', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

