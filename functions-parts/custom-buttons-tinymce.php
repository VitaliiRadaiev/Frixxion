<?php

$text_colors = [
    'accent-first',
    'accent-second',
    'accent-third',
    'gradient-first',
    'gradient-second',
    'dark',
    'light',
];

add_action('admin_init', function () {
    global $text_colors;

    add_filter('mce_external_plugins', function ($plugins) {
        $src = get_stylesheet_directory_uri() . '/functions-parts/custom-buttons-tinymce.js';
        if (is_ssl()) {
            $src = preg_replace('#^http://#', 'https://', $src);
        }
        $plugins['custom_buttons'] = $src;
        return $plugins;
    });

    add_filter('mce_buttons', function ($buttons) {
        global $text_colors;
        array_push($buttons, 'change_h_tag_to_div', 'style_link', ...$text_colors);
        return $buttons;
    }, 99);

    add_filter('mce_buttons_2', function ($buttons) {
        global $text_colors;
        array_push($buttons, 'change_h_tag_to_div', 'style_link', ...$text_colors);
        return $buttons;
    }, 99);
});
