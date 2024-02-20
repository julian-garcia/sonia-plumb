# Sonia Plumb Dance Company

[![wakatime](https://wakatime.com/badge/user/c3419dbf-0038-499d-9d18-532e0b87876f/project/3441df50-bca0-409e-977b-35450e26d30e.svg)](https://wakatime.com/badge/user/c3419dbf-0038-499d-9d18-532e0b87876f/project/3441df50-bca0-409e-977b-35450e26d30e)

This is a custom WordPress theme, built on a voluntary basis for non profit organisation "Sonia Plumb Dance Company".

![Built](https://ForTheBadge.com/images/badges/built-with-love.svg)
![WordPress](https://img.shields.io/badge/Wordpress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![VS Code](https://img.shields.io/badge/Visual_Studio_Code-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white)
![JS](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![HTML](https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-239120?&style=for-the-badge&logo=css3&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

## Dependencies

- Vite
- Prettier
- TailwindCSS
- Swiper
- LocalWP

## Critical WordPress plugins

- Advanced Custom Fields
- WP Forms Lite
- Wordfence

An online WordPress instance generator such as TasteWP can be used for test deployments.

## Developer Notes

Serve a local instance of WordPress, e.g. using LocalWP

Navigate to this source folder and add a link to the local wordpress theme. The link name should `dist-local`.
`ln -s /<path of local WP>/wp-content/themes/sonia-plumb dist-local`

To serve the theme locally, switch to the correct node version with `nvm use`, install dependencies with `npm i` and run `npm start`. This will build assests and watch for changes. Any css/js/php changes will result copy templates to the dist folder and rebuild assets.

To build the theme: `npm run build`.
