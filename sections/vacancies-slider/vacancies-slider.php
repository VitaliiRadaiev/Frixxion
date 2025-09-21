<?php
if (!$data['section_utils']['section_hide']):

    wp_enqueue_script(
        'vacancies-slider-script',
        get_template_directory_uri() . '/sections/vacancies-slider/vacancies-slider.js',
        array('main-script'),
        null,
        true
    );

    $args = array(
        'post_type' => 'vacancy',
        'posts_per_page' => 30,
        'post_status' => 'publish',
        'orderby' => array(
            'menu_order' => 'ASC',
            'date' => 'DESC',
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()):
?>
        <section <?= get_section_id($data) ?> class="vacancies-slider section-space-top overflow-hidden">
            <div data-slider="vacancies-slider" class="container first-child-no-margin">
                <div class="lg:flex items-end justify-between gap-[40px]">
                    <?php if (check($data['section_head']['text'])): ?>
                        <div data-aos="cascade-fade-in" class="text-content lg-max:text-center lg:max-w-[700px]">
                            <?= $data['section_head']['text'] ?>
                        </div>
                    <?php endif; ?>

                    <?php get_template_part(get_part_path('slider-nav-arrows'), null, ['classes' => 'text-color-dark lg-max:hidden']) ?>
                </div>

                <div class="mt-[30px] lg:mt-[50px] swiper lg-max:[&.swiper]:overflow-visible md-max:!px-[10px]">
                    <div data-aos="cascade-fade-in" class="swiper-wrapper">
                        <?php while ($query->have_posts()): $query->the_post(); ?>
                           <div class="swiper-slide lg-max:[&.swiper-slide]:w-[324px] !h-auto [&_.vacancy-card]:h-full">
                            <?php get_template_part(get_part_path('vacancy-card'), null, [
                                'card_data' => [
                                        'title' => get_the_title(),
                                        'excerpt' => get_the_excerpt(),
                                        'permalink' => get_the_permalink()
                                ]
                            ])?>
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