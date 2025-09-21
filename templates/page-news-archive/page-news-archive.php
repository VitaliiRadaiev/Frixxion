<?php
wp_enqueue_script(
    'page-news-archiv-script',
    get_template_directory_uri() . '/templates/page-news-archive/page-news-archive.js',
    array('main-script'),
    null,
    true
);

$text_show_more = get_field('text_show_more', 'options');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = get_option('posts_per_page');
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'page' => $paged,
    'orderby' => array(
        'menu_order' => 'ASC',
        'date' => 'DESC',
    ),
);
$query = new WP_Query($args);

$big = 999999999;
$pagination_args = array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'current' => max(1, $paged),
    'total' => $query->max_num_pages,
    'show_all' => false,
    'prev_next' => false,
    'prev_text' => '',
    'next_text' => '',
    'type' => 'array',
    'end_size'  => 1,
    'mid_size'  => 1,
);

$pagination_links = paginate_links($pagination_args);

?>
<main data-news-archive data-paged="<?= $paged ?>">
    <section class="hero pt-header-height [&+.section-space-top]:mt-0">
        <div class="container pb-[30px] lg:pb-[50px]">
            <div class="breadcrumbs lg:pt-[14px] [&:has(a)]:block hidden">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>

            <h1 class="h1 mt-[40px] lg:mt-[30px] font-medium text-center">
                <?= the_title() ?>
            </h1>
        </div>
    </section>

    <section class="section-space-top">
        <div class="container">
            <div data-list class="grid gap-x-[20px] gap-y-[24px] md:gap-y-[40px] md:grid-cols-2 lg:grid-cols-3 relative">
                <?php while ($query->have_posts()): $query->the_post(); ?>
                    <div>
                        <?php get_template_part(get_part_path('news-card')); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="<?= $paged >= $query->max_num_pages ? 'hidden' : '' ?>  mt-[30px] lg:mt-[50px] buttons-group sm:justify-center">
                <button data-action="show-more" class="btn btn--light">
                    <?= $text_show_more ?>
                </button>
            </div>

            <div data-pagination-wrapper class="<?= $query->max_num_pages === 1 ? 'hidden' : '' ?> mt-[30px]">
                <?php
                get_template_part(
                    get_part_path('pagination'),
                    null,
                    [
                        'pagination_links' => $pagination_links,
                        'page'             => $paged,
                        'max_num_pages'    => $query->max_num_pages,
                        'base_url'         => get_pagenum_link(1)
                    ]
                ); ?>
            </div>

        </div>
    </section>
    <?php
    wp_reset_postdata();
    ?>
</main>