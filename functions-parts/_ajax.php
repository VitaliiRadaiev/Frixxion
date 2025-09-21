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

function get_vacancies()
{

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 12;

    $args = array(
        'post_type'      => 'vacancy',
        'posts_per_page' => $posts_per_page,
        'paged'          => $page,
        'post_status'    => 'publish',
        'orderby'        => array(
            'menu_order' => 'ASC',
            'date'       => 'DESC',
        ),
    );

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part(get_part_path('vacancy-card'), null, [
                'card_data' => [
                    'title'    => get_the_title(),
                    'excerpt'  => get_the_excerpt(),
                    'permalink' => get_the_permalink()
                ]
            ]);
        }
    }
    wp_reset_postdata();
    $html = ob_get_clean();

    wp_send_json([
        'html' => $html,
        'max_num_pages' => $query->max_num_pages,
        'found_posts' => $query->found_posts,
    ]);
}
add_action('wp_ajax_get_vacancies', 'get_vacancies');
add_action('wp_ajax_nopriv_get_vacancies', 'get_vacancies');

function get_news()
{

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'paged'          => $page,
        'post_status'    => 'publish',
        'orderby'        => array(
            'menu_order' => 'ASC',
            'date'       => 'DESC',
        ),
    );

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
?>
            <div>
                <?php get_template_part(get_part_path('news-card')); ?>
            </div>
<?php
        }
    }
    wp_reset_postdata();
    $html = ob_get_clean();

    $pagination_args = array(
        'base' => trailingslashit(home_url('/news')) . 'page/%#%/',
        'format'  => '',
        'current' => max(1, $page),
        'total' => $query->max_num_pages,
        'add_args' => false,
        'show_all' => false,
        'prev_next' => false,
        'prev_text' => '',
        'next_text' => '',
        'type' => 'array',
        'end_size'  => 1,
        'mid_size'  => 1,
    );

    $pagination_links = paginate_links($pagination_args);
    ob_start();
    get_template_part(
        get_part_path('pagination'),
        null,
        [
            'pagination_links' => $pagination_links,
            'page'             => $page,
            'max_num_pages'    => $query->max_num_pages,
            'base_url'         => trailingslashit(home_url('/news'))
        ]
    );
    $paginationHtml = ob_get_clean();

    wp_send_json([
        'html' => $html,
        'max_num_pages' => $query->max_num_pages,
        'found_posts' => $query->found_posts,
        'pagination' => $paginationHtml
    ]);
}
add_action('wp_ajax_get_news', 'get_news');
add_action('wp_ajax_nopriv_get_news', 'get_news');
