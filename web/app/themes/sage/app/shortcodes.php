<?php

/**
 * shortcodes.php
 *
 * Shortcodes for the theme
 *
 **/

namespace App;

/**
 * Creates a shortcode for the built-in WP antispambot function
 * Usage: "mailto:[email_antispambot encode='email@email.com']"
 *
 * Remember that any content fields, for example WYSIWYG fields from ACF Pro must
 * be rendered using the_content filter:
 * apply_filters('the_content', $content)
 * in order for the shortcode to render correctly
 *
 * @param $atts
 * @return string
 */
function content_antispambot($atts)
{
    extract(shortcode_atts(array(
        'encode' => '',
    ), $atts));
    return antispambot($encode, 1);
}

add_shortcode('email_antispambot', __NAMESPACE__ . '\\content_antispambot');
