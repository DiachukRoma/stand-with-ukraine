const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');
require('laravel-mix-copy-watched');
const Notifications = require('pretty-mix-notifications');
// require('laravel-mix-purgecss');
// const path = require('path');

// Pretty Mix Notifications
// https://github.com/ntavelis/pretty-mix-notifications
mix.extend('prettyNotifications', new Notifications);

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix
  .setPublicPath('./dist')
  .browserSync('http://sw-ukraine.loc');

mix
  .sass('resources/assets/styles/main.scss', 'styles')
  // .sass('resources/assets/styles/editor.scss', 'styles');
// .purgeCss({
//   extend: { content: [path.join(__dirname, 'index.php')] },
//   whitelist: require('purgecss-with-wordpress').whitelist,
//   whitelistPatterns: require('purgecss-with-wordpress').whitelistPatterns,
// });

mix
  .js('resources/assets/scripts/main.js', 'scripts')
  // .js('resources/assets/scripts/customizer.js', 'scripts')
  // .blocks('resources/assets/scripts/editor.js', 'scripts')
  // .extract(); // extracts vendor JS into a separate file

mix
  .copyWatched('resources/assets/images/**', 'dist/images')
  .copyWatched('resources/assets/fonts/**', 'dist/fonts');

mix
  .autoload({ jquery: ['$', 'window.jQuery'] })
  .options({ processCssUrls: false })
  .sourceMaps(false, 'source-map')
  .version()
  .prettyNotifications({
    title: 'Testing Site',
    successSound: false,
  });

