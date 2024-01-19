/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  mode: 'jit',
  content: ["./develop/**.php",
  "./develop/**/**.php",],
  theme: {
    extend: {
        fontFamily: {
            'sans': ['Raleway', 'sans-serif'],
            },
        fontWeight: {
            'thin': 100,
            'normal': 400,
            'medium': 500,
            'semibold': 600,
            'bold': 700,
            'extrabold': 800,
        },
        colors: {
            'midnight-blue': '#05053D',
            'dark-indigo': '#16164A',
            'electric-pink': '#FF2E5C',
            'vivid-purple': '#7D52FF',
            'aqua-teal': '#0DD4C9',
            'deep-blue': '#176BFF',
            'bright-blue': '#2775FF',
            'button-grey': '#324158',
            'light-grey': '#F5F5F5',
            'lavender-blue' : '#52489C',
            
        },
        screens: {
          'xs': '480px',
          'xxs': '380px',
        },
    },
  },
  plugins: [],
}




           