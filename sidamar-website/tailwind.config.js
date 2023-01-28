/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#a80e0e',
        secondary: '#64748b',
        dark: '#0f172a',
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ]
}
