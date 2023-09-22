/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './templates/**/*.{html,php}',
    './**/*.{html,php}',
    './src/**/*.{js,ts,jsx,tsx,php}',
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
      colors: {
        primary: '#e53673',
        secondary: '#6b1a38',
      },
    },
  },
  blocklist: ['container'],
  plugins: [],
};
