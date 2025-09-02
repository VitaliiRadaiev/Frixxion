<?php
add_filter('rank_math/frontend/breadcrumb/items', function ($crumbs) {

    return $crumbs;
}, 10, 2);
