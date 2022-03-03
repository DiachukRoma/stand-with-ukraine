<?php

/**
 * helpers.php
 *
 * Helper methods for the theme
 *
 **/

namespace App;

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param null $abstract
 * @param array $parameters
 * @param Container|null $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template(string $file, $data = []): string
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = []): string
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset): string
{
    return sage('assets')->getUri($asset);
}

/**
 * Gets the path to a versioned Mix file in a theme.
 *
 * Use this function if you want to load theme dependencies. This function will cache the contents
 * of the manifest file for you. This also means that you can’t work with different mix locations.
 * For that, you’d need to use `mix_any()`.
 *
 * Inspired by <https://www.sitepoint.com/use-laravel-mix-non-laravel-projects/>.
 *
 * @param string $path The relative path to the file.
 * @param string $manifest_directory Optional. Custom path to manifest directory. Default 'build'.
 *
 * @return string The versioned file URL.
 * @since 1.0.0
 *
 */
function mix($path, $manifest_directory = 'dist')
{
    static $manifest;
    static $manifest_path;

    if (!$manifest_path) {
        $manifest_path = get_theme_file_path() . '/' . $manifest_directory . '/mix-manifest.json';
    }

    // Bailout if manifest can't be found
    if (!file_exists($manifest_path)) {
        return asset_path($path);
    }

    if (!$manifest) {
        // @codingStandardsIgnoreLine
        $manifest = json_decode(file_get_contents($manifest_path), true);
    }

    // Remove manifest directory 'dist' from path
    $path = str_replace($manifest_directory, '', $path);
    // Make sure there’s a leading slash
    $path = '/' . ltrim($path, '/');

    // Bailout with default theme path if file could not be found in manifest
    if (!array_key_exists($path, $manifest)) {
        return asset_path($path);
    }

    // Get file URL from manifest file
    $path = $manifest[$path];
    // Make sure there’s no leading slash
    $path = ltrim($path, '/');
    return asset_path($path);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates): array
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates): string
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar(): bool
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}
