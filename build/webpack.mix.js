let mix = require('laravel-mix');

mix.webpackConfig({
    externals: {
        jquery: "jQuery",
        bootstrap: true
    }
});

mix.setResourceRoot('./');
mix.setPublicPath('../');

mix
    .sass('assets/blocks/horizontal_scroll_gallery/scss/view.scss', 'blocks/gallery/templates/horizontal_scroll_gallery/view.css')
    .js('assets/blocks/horizontal_scroll_gallery/js/view.js', 'blocks/gallery/templates/horizontal_scroll_gallery/view.js')
