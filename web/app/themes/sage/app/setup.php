<?php

/**
 * setup.php
 *
 * Overall theme setup
 *
 **/

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('rage/main.css', mix('styles/main.css'), false, null);
    wp_enqueue_script('rage/main.js', mix('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_localize_script(
        'rage/main.js',
        'appMeta',
        [
            'siteName' => get_bloginfo('name'),
            'homeUrl' => get_bloginfo('url'),
            'themeUrl' => get_bloginfo('template_directory'),
            'ajaxUrl' => admin_url('admin-ajax.php'),
        ]
    );
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated (4.0.4)
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'disable-asset-versioning',
        'disable-trackbacks',
        'js-to-footer',
        'nice-search',
        'relative-urls'
    ]);

    /**
     * Enable features from Resource Config_WP when plugin is activated
     * @link https://github.com/ecruhling/config_wp/
     */
    add_theme_support('resource-change-howdy');
    add_theme_support('resource-change-footer');
    add_theme_support('resource-seo-framework');
    add_theme_support('resource-custom-login');
    add_theme_support('resource-change-author');
    add_theme_support('resource-change-menu-order');
    add_theme_support('resource-simplify-images');
    add_theme_support('resource-disable-comments');
    add_theme_support('resource-remove-posts');
    add_theme_support('resource-remove-menu-items');
    add_theme_support('resource-remove-widgets');
    add_theme_support('resource-clean-customizer');
    add_theme_support('resource-clean-dashboard');
    add_theme_support('resource-posts-to-news');
    add_theme_support('resource-gravity-forms');
    add_theme_support('resource-svg');
    add_theme_support('resource-advanced-custom-fields');
    add_theme_support('resource-nav-walker');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'rage')
    ]);

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Add Whoops error
 */
function registerWhoops()
{
    $whoops = new Run();
    $whoops->pushHandler(new PrettyPageHandler());
    $whoops->register();
}

if ((WP_DEBUG) && !(is_admin())) {
    registerWhoops();
}
