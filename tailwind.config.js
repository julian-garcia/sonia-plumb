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
        'button-active': '#292E99',
        'button-hover': '#696DB8',
        'button-outline': '#C8C7C7',
        shaded: '#E7E7E7',
      },
    },
  },
  blocklist: ['container'],
  plugins: [],
};
