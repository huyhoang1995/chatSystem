let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.setResourceRoot(process.env.APP_URL);
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.webpackConfig({
    resolve: {
        extensions: ['.vue', '.js'],
        alias: {
            '@component': __dirname + '/resources/js/components',
            '@libs': __dirname + '/resources/js/libs',
            '@node': __dirname + '/node_modules/js/libs',
        }
    },
    node: {
        fs: 'empty',
        uws: 'empty',

    }
});