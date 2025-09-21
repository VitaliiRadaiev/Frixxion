<?php
if (!$data['section_utils']['section_hide']):
    wp_enqueue_script(
        'team-slider-script',
        get_template_directory_uri() . '/sections/vacancies-grid/vacancies-grid.js',
        array('main-script'),
        null,
        true
    );
    $text_show_more = get_field('text_show_more', 'options');
    $is_desktop = isDesktop();
    $posts_per_page = $is_desktop ? 12 : 6;
    $args = array(
        'post_type' => 'vacancy',
        'posts_per_page' => $posts_per_page,
        'page' => 1,
        'post_status' => 'publish',
        'orderby' => array(
            'menu_order' => 'ASC',
            'date' => 'DESC',
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()):
?>
        <section <?= get_section_id($data) ?> data-vacancies-grid data-posts-per-page="<?= $posts_per_page ?>" class="vacancies-grid section-space-top">
            <div class="container first-child-no-margin">
                <?php get_template_part(get_part_path('section-head'), null, [
                    'classes' => 'text-color-dark-80',
                    'head_data' => $data['section_head']
                ]) ?>

                <div data-aos="cascade-fade-in" data-list class="mt-[30px] lg:mt-[50px] grid gap-[10px] md:gap-[20px] md:grid-cols-2 lg:grid-cols-4 md-and-lg-max:[&>*:last-child:nth-child(odd)]:col-span-2 relative">
                    <?php while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part(get_part_path('vacancy-card'), null, [
                            'card_data' => [
                                'title' => get_the_title(),
                                'excerpt' => get_the_excerpt(),
                                'permalink' => get_the_permalink()
                            ]
                        ]);
                    } ?>
                </div>
                <div data-aos="fade-in" data-aos-delay="1000" class="<?= $query->have_posts() && ($query->max_num_pages > 1) ? '' : 'hidden' ?> mt-[30px] lg:mt-[50px] buttons-group sm:justify-center">
                    <button data-action="load-more" class="btn btn--light">
                        <?= $text_show_more ?>
                    </button>
                </div>
            </div>
        </section>
<?php
        wp_reset_postdata();
    endif;
endif;
?>