const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/app.js', 'public/js')
  .vue()
  .sass('resources/sass/tailwind.scss', 'public/css')
  .webpackConfig(require('./webpack.config'))
  .options({
    postCss: [tailwindcss('./tailwind.config.js')]
  })

mix.sass('resources/sass/app.scss', 'public/css')

if (mix.inProduction()) {
  mix.version()
}
