<?php
$text_read_more = get_field('text_read_more', 'options');
?>

<a href="<?= the_permalink() ?>" class="news-card hover-link flex flex-col h-full gap-[20px] [&_.card-img]:hover:scale-105 [&_.h4]:hover:text-color-accent-second">
    <div class="">
        <div class="mb-[20px] relative bg-color-dark-80 overflow-hidden rounded-[10px] aspect-[1/0.583] lg:aspect-[1/0.59]">
            <?php get_image(get_post_thumbnail_id(), 'card-img ibg transition-transform duration-1000') ?>
        </div>
        <div class="text-xs-lg-sm text-color-dark opacity-40">
            <?= get_the_date('F j, Y'); ?>
        </div>
        <div class="mt-[10px] h4 text-color-dark font-medium transition-colors">
            <?= the_title() ?>
        </div>
    </div>
    <span class="mt-auto link text-color-accent-first self-start">
        <?= $text_read_more ?>
    </span>
</a>