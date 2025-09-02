<?php
add_action( 'init', function() {
    add_filter( 'mce_external_plugins', function( $plugins ) {
        $plugins['custom_span'] = get_template_directory_uri() . '/functions-parts/custom-buttons-tinymce.js';
        return $plugins;
    });

    add_filter( 'mce_buttons', function( $buttons ) {
        array_push( $buttons, 'custom_span' );
        return $buttons;
    });
});
