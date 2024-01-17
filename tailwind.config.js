/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'xs': {'min': '360px', 'max': '430px'}, //iphone 12 pro and iphone 14 pro max
      ...defaultTheme.screens,
    },
    extend: {},
  },
  plugins: [
    require("tailgrids/plugin"),
    require('tailwindcss-animated')
  ],
}

