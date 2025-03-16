/** @type {import('tailwindcss').Config} */
export default {
  darkMode: "class",
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {

    extend: {
      screens: {
        'smartphone': '320px',
        'smartphone-md': '375px',

        'smartphone-lg': '425px',
        'smartphone-landscape': '480px',
        'smartphone-xl': '600px',
       
        'tablet': '768px',
        'tablet-large': '900px',
        'laptop': '1024px',
        'desktop': '1280px'
      },

      colors: {
        'bg-lm': '#FAFAFA',
        'bg-dm': '#121212',


        'admin-bg': '#F2F2F2',
        'admin-sb-bg': '#FFFFFF',

        'p-lm': '#000000',
        'p-dm': '#FAFAFA',

        's-lm': '#F3F3F3',
        's-dm': '#1F1F1F',

        'a-lm': '#F4333F',
        'a-dm': '#81619E',


      },

      boxShadow: {
        'right': '0px 0 3px rgba(0, 0, 0, 0.1)'
      }

    },
  },
  plugins: [],
}

