<?php

function get_contact_form()
{
    if (empty($_POST['shortcode'])) {
        wp_send_json_error(array('message' => 'No shortcode provided'), 400);
    }

    $shortcode = wp_kses_post(wp_unslash($_POST['shortcode']));

    $form_html = do_shortcode($shortcode);

    wp_send_json_success(array(
        'html' => $form_html,
    ));
}
add_action('wp_ajax_get_contact_form', 'get_contact_form');
add_action('wp_ajax_nopriv_get_contact_form', 'get_contact_form');

function get_authors()
{
    $authors = get_users([
        'role'    => 'author',
        'orderby' => 'display_name',
        'order'   => 'ASC',
    ]);

    $posts = [];

    foreach ($authors as $author) {
        $posts[] = [
            'id' => $author->ID,
            'name' => $author->data->display_name,
            'img' => get_avatar_url($author->ID, [
                'size' => 96
            ])
        ];
    }

    wp_send_json_success(array(
        'authors' => $posts,
    ));
}
add_action('wp_ajax_get_authors', 'get_authors');
add_action('wp_ajax_nopriv_get_authors', 'get_authors');
