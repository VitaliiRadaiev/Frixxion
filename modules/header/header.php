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

$header_data = get_field('header', 'options');
?>

<header data-header class="header fixed top-0 left-0 w-full z-49" data-popup="add-right-padding">
    <div class="container relative z-2 flex items-center justify-between py-[16px]">
        <?php if (is_front_page()): ?>
            <div class="shrink-0 grow-0">
                <?php get_image($header_data['logo'], 'h-[51px] w-auto') ?>
            </div>
        <?php else: ?>
            <a href="<?= get_home_url() ?>" class="shrink-0 grow-0" aria-label="Main logo, link to home">
                <?php get_image($header_data['logo'], 'h-[51px] w-auto') ?>
            </a>
        <?php endif; ?>

        <nav class="hidden absolute top-[16px] left-1/2 -translate-x-1/2 lg:flex bg-color-light rounded-full px-[15px]">
            <?php
            foreach ($menu_items as $item) {
                echo render_menu_link($item, 'text-md text-color-dark flex items-center min-h-[46px] px-[15px] transition-colors hover:text-color-accent-first');
            }
            ?>
        </nav>

        <div class="">
            <?php if (check($header_data['link'])): ?>
                <a href="<?= $header_data['link']['url'] ?>" target="<?= $header_data['link'] ? '_blank' : '_self' ?>" class="lg-max:hidden btn btn--light btn--sm">
                    <?= $header_data['link']['title'] ?>
                </a>
            <?php endif; ?>
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

<div data-mobile-menu class="mobile-menu fixed z-48 top-0 left-0 w-full opacity-0 invisible translate-y-[50px] h-dvh pt-header-height bg-gradient-second flex flex-col overflow-hidden">
    <img class="absolute left-[35%] bottom-[-20px] z-1 h-auto w-[670px] max-w-none" src="<?= get_template_directory_uri() . '/assets/images/general/light-md.webp' ?>" alt="">
    <img class="absolute right-[45%] bottom-[-64px] z-1 h-auto w-[380px] max-w-none" src="<?= get_template_directory_uri() . '/assets/images/general/light-sm.webp' ?>" alt="">

    <div class="container relative z-3 pt-[20px] pb-[40px] h-full overflow-auto flex flex-col gap-[40px]">
        <nav class="my-auto first-child-no-margin">
            <?php
            foreach ($menu_items as $item) {
                echo render_menu_link($item, 'block mt-[30px] text-color-dark h3 font-medium');
            }
            ?>
        </nav>

        <div class="flex flex-col items-center gap-[30px]">
            <?php get_template_part(get_part_path('social'), null, ['classes' => 'social--dark']) ?>

            <?php if (check($header_data['link'])): ?>
                <a href="<?= $header_data['link']['url'] ?>" target="<?= $header_data['link'] ? '_blank' : '_self' ?>" class="btn btn--light btn--sm sm-max:w-full">
                    <?= $header_data['link']['title'] ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>