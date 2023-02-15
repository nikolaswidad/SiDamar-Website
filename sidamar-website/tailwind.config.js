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
        primary: '#dc2626',
        primaryLighten: '#ef4444',
        primaryDarken: '#b91c1c',
        secondary: '#64748b',
        dark: '#0f172a',
      },
      fontFamily: {
        montserrat: ['Montserrat']
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin'),
    require('@tailwindcss/forms'),
  ]
}
