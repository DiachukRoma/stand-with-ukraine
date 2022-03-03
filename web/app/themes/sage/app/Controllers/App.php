<?php

/**
 * App.php
 *
 * This Controller runs on every page
 * The methods & variables are globally available
 *
 **/

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * Class App
 * @package App\Controllers
 */
class App extends Controller
{

    /**
     * @var bool
     */
    protected $acf = false;

    /**
     * App constructor.
     */
    public function __construct()
    {
        if (function_exists('acf_get_valid_post_id')) {
            if (acf_get_valid_post_id(get_queried_object())) {
                $this->acf = true;
            }
        }
    }

    /**
     * $site_name
     * @return string
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * $title
     * @return string
     */
    public static function title(): string
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'rage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'rage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'rage');
        }

        return get_the_title();
    }

    /**
     * $site_logo
     * @return string
     */
    public function siteLogo(): string
    {
        return get_theme_mod('primary_logo_setting');
    }

    /**
     * $nav_arguments
     * @return object
     */
    public function navArguments(): object
    {
        return (object)array(
            'primary' => [
                'theme_location' => 'primary_navigation',
                'container' => false,
                'menu_class' => 'nav col-12 col-lg-auto mr-lg-auto ml-5 mb-2 justify-content-center mb-md-0',
                'menu_id' => 'main-menu',
            ],
        );
    }

    /**
     * $site_information
     * @return object
     */
    public function siteInformation(): object
    {
        return (object)array(
            'address' => get_theme_mod('address_setting'),
            'phone' => get_theme_mod('phone_setting'),
            'email' => get_theme_mod('email_setting'),
            'address_link' => get_theme_mod('google_maps_setting'),
            'latitude' => get_theme_mod('google_maps_latitude'),
            'longitude' => get_theme_mod('google_maps_longitude'),
        );
    }
}
