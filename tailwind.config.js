/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './templates/**/*.{html,php}',
    './**/*.{html,php}',
    './src/**/*.{js,ts,jsx,tsx}',
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
