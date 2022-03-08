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
    add_theme_support('post-thumbnails');

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

/**
 * Movements taxonomy and post type
 */
add_action('init', function () {
    register_post_type('movements', [
        'labels' => [
            'name' => __('Movements', 'sage'),
            'singular_name' => __('Movement', 'sage'),
            'add_new' => __('Add movement', 'sage'),
            'add_new_item' => __('Add new movement', 'sage'),
            'edit_item' => __('Edit movement', 'sage'),
            'new_item' => __('New movement', 'sage'),
            'view_item' => __('Show movements', 'sage'),
            'search_items' => __('Find movement', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in thash', 'sage'),
            'menu_name' => __('Movements', 'sage'),
        ],
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-groups',
        'taxonomies' => array('post_tag'),
        'supports' => ['title', 'thumbnail'],
        'rewrite' => array('slug' => 'movements'),
        'query_var' => true,
    ]);
});

/**
 * Sanctions taxonomy and post type
 */
add_action('init', function () {
    register_taxonomy('sanctions_taxonomy', 'sanctions', [
        'label' => 'Sanctions category',
        'hierarchical' => true,
        'query_var' => true,
    ]);
    register_post_type('sanctions', [
        'labels' => [
            'name' => __('Sanctions', 'sage'),
            'singular_name' => __('Sanction', 'sage'),
            'add_new' => __('Add sanction', 'sage'),
            'add_new_item' => __('Add new sanction', 'sage'),
            'edit_item' => __('Edit sanction', 'sage'),
            'new_item' => __('New sanction', 'sage'),
            'view_item' => __('Show sanctions', 'sage'),
            'search_items' => __('Find sanction', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in thash', 'sage'),
            'menu_name' => __('Sanctions', 'sage'),
        ],
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-admin-site',
        'taxonomies' => array('sanctions_taxonomy'),
        'supports' => ['title', 'thumbnail', 'excerpt'],
        'rewrite' => array('slug' => 'sanctions'),
        'query_var' => true,
    ]);
});

/**
 * Petitions taxonomy and post type
 */
add_action('init', function () {
    register_taxonomy('petitions_taxonomy', 'petitions', [
        'label' => 'Petitions category',
        'hierarchical' => true,
        'query_var' => true,
    ]);
    register_post_type('petitions', [
        'labels' => [
            'name' => __('Petitions', 'sage'),
            'singular_name' => __('Petition', 'sage'),
            'add_new' => __('Add petition', 'sage'),
            'add_new_item' => __('Add new petition', 'sage'),
            'edit_item' => __('Edit petition', 'sage'),
            'new_item' => __('New petition', 'sage'),
            'view_item' => __('Show petitions', 'sage'),
            'search_items' => __('Find petition', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in thash', 'sage'),
            'menu_name' => __('Petitions', 'sage'),
        ],
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-media-text',
        'taxonomies' => array('petitions_taxonomy'),
        'supports' => ['title', 'thumbnail', 'excerpt'],
        'rewrite' => array('slug' => 'petitions'),
        'query_var' => true,
    ]);
});

/**
 * Donation taxonomy and post type
 */
add_action('init', function () {
    register_post_type('donations', [
        'labels' => [
            'name' => __('Donations', 'sage'),
            'singular_name' => __('Donation', 'sage'),
            'add_new' => __('Add donation', 'sage'),
            'add_new_item' => __('Add new donation', 'sage'),
            'edit_item' => __('Edit donation', 'sage'),
            'new_item' => __('New donation', 'sage'),
            'view_item' => __('Show donation', 'sage'),
            'search_items' => __('Find donation', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in thash', 'sage'),
            'menu_name' => __('Donation', 'sage'),
        ],
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-money-alt',
        'supports' => ['title', 'thumbnail', 'excerpt'],
        'rewrite' => array('slug' => 'donation'),
        'query_var' => true,
    ]);
});