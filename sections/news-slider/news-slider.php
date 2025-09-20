<?php
if (!$data['section_utils']['section_hide']):

    wp_enqueue_script(
        'news-slider-script',
        get_template_directory_uri() . '/sections/news-slider/news-slider.js',
        array('main-script'),
        null,
        true
    );

    $text_read_more = get_field('text_read_more', 'options');

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 30,
        'post_status' => 'publish',
        'orderby' => array(
            'menu_order' => 'ASC',
            'date' => 'DESC',
        ),
    );

    if (is_singular('post')) {
        $args = array_merge($args, [
            'post__not_in' => [get_the_ID()]
        ]);
    }

    $query = new WP_Query($args);
    if ($query->have_posts()):
?>
        <section <?= get_section_id($data) ?> class="news-slider section-space-top">
            <div data-slider="news-slider" class="container first-child-no-margin">
                <div class="lg:flex items-end justify-between gap-[40px]">
                    <?php if (check($data['section_head']['text'])): ?>
                        <div class="text-content lg-max:text-center lg:max-w-[700px]">
                            <?= $data['section_head']['text'] ?>
                        </div>
                    <?php endif; ?>

                    <?php get_template_part(get_part_path('slider-nav-arrows'), null, ['classes' => 'text-color-dark lg-max:hidden']) ?>
                </div>

                <div class="mt-[30px] lg:mt-[50px] swiper">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()): $query->the_post(); ?>
                            <div class="swiper-slide lg-max:[&.swiper-slide]:w-[324px] !h-auto [&_.vacancy-card]:h-full">
                                <a href="<?= the_permalink() ?>" class="news-card hover-link flex flex-col h-full gap-[20px] [&_.card-img]:hover:scale-105 [&_.h4]:hover:text-color-accent-first">
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
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <?php get_template_part(get_part_path('slider-nav-bullets-with-arrows'), null, [
                    'classes' => 'mt-[30px] text-color-dark lg:[&_.nav-btn]:hidden'
                ]) ?>

                <?php if (check($data['buttons'])) {
                    get_template_part(get_part_path('buttons-group'), null, [
                        'classes' => 'mt-[30px] lg:mt-[50px] sm:justify-center',
                        'buttons' => $data['buttons']
                    ]);
                } ?>
            </div>
        </section>
<?php
        wp_reset_postdata();
    endif;
endif;
?>