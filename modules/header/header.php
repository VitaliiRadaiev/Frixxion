<?php

$locations = get_nav_menu_locations();
$menu_items = [];

if (isset($locations['Header menu'])) {
    $menu = wp_get_nav_menu_object($locations['Header menu']);
    $raw_items = wp_get_nav_menu_items($menu->term_id);

    $items_by_id = [];
    foreach ($raw_items as $item) {
        $items_by_id[$item->ID] = (array) $item;
        $items_by_id[$item->ID]['children'] = [];
    }

    foreach ($items_by_id as $id => $item) {
        if ($item['menu_item_parent']) {
            $items_by_id[$item['menu_item_parent']]['children'][] = &$items_by_id[$id];
        }
    }

    $menu_items = array_filter($items_by_id, fn($item) => $item['menu_item_parent'] == 0);
}

?>

<header data-header class="fixed top-0 left-0 w-full z-49" data-popup="add-right-padding">
    <div class="container relative z-2 flex items-center justify-between py-[16px]">
        <?php if (is_front_page()): ?>
            <div class="shrink-0 grow-0">
                <img class="h-[51px] w-auto" src="<?= get_template_directory_uri() . '/assets/images/temp/logo-dark-with-text.svg' ?>" alt="logo">
            </div>
        <?php else: ?>
            <a href="<?= get_home_url() ?>" class="shrink-0 grow-0" aria-label="Main logo, link to home">
                <img class="h-[51px] w-auto" src="<?= get_template_directory_uri() . '/assets/images/temp/logo-dark-with-text.svg' ?>" alt="logo">
            </a>
        <?php endif; ?>

        <nav class="hidden lg:flex">
            <a href="#" class=""></a>
        </nav>

        <div class="">
            <a href="#" class="">
                Contact Us
            </a>
            <button
                aria-label="open-mobile-menu" data-action="open-mobile-menu" class="h-[44px] w-[44px] relative lg:hidden">
                <span class="block absolute top-1/2 left-1/2 h-[3px] w-[29px] bg-black transition"></span>
                <span class="block absolute top-1/2 left-1/2 h-[3px] w-[29px] bg-black transition"></span>
                <span class="block absolute top-1/2 left-1/2 h-[3px] w-[29px] bg-black transition"></span>
                <span class="block absolute top-1/2 left-1/2 h-[3px] w-[29px] bg-black transition"></span>
            </button>
        </div>
    </div>
</header>