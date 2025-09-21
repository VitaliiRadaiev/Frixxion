<?php
if (!$data['section_utils']['section_hide']):

    wp_enqueue_script(
        'news-slider-script',
        get_template_directory_uri() . '/sections/news-slider/news-slider.js',
        array('main-script'),
        null,
        true
    );

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
                        <div data-aos="cascade-fade-in" class="text-content lg-max:text-center lg:max-w-[700px]">
                            <?= $data['section_head']['text'] ?>
                        </div>
                    <?php endif; ?>

                    <?php get_template_part(get_part_path('slider-nav-arrows'), null, ['classes' => 'text-color-dark lg-max:hidden']) ?>
                </div>

                <div class="mt-[30px] lg:mt-[50px] swiper">
                    <div data-aos="cascade-fade-in" class="swiper-wrapper">
                        <?php while ($query->have_posts()): $query->the_post(); ?>
                            <div class="swiper-slide lg-max:[&.swiper-slide]:w-[324px] !h-auto [&_.vacancy-card]:h-full">
                                <?php get_template_part(get_part_path('news-card')); ?>
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