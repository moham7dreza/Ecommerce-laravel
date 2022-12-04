// const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    // corePlugins: {
    //     preflight: false,
    // },
    content: [
        // './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        // './vendor/laravel/jetstream/**/*.blade.php',
        // './storage/framework/views/*.php',
        // "./resources/views/it-city/**/*.blade.php",
        // "./resources/views/components/tailwind/**/*.blade.php",
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
        './resources/views/test.blade.php'
    ],
    theme: {
        extend: {
            // fontFamily: {
            //     sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            // },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio')
    ],
};
