<?php
add_filter('rank_math/frontend/breadcrumb/items', function ($crumbs) {
    if(is_singular('vacancy')) {
        $careersPage = get_page_by_path('careers');
        array_splice($crumbs, 1, 0, [[get_the_title($careersPage->ID), get_the_permalink($careersPage->ID), 'hide_in_schema' => false]]);
    }

    if(is_singular('post')) {
        $page = get_tpl_page('page-news.php');
        array_splice($crumbs, 1, 1, [[get_the_title($page->ID), get_the_permalink($page->ID), 'hide_in_schema' => false]]);
    }

    return $crumbs;
}, 10, 2);
