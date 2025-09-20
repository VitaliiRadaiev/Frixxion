<?php

wp_enqueue_script(
    'single-vacancy-script',
    get_template_directory_uri() . '/templates/single-vacancy/single-vacancy.js',
    array('main-script'),
    null,
    true
);

get_header();
$options = get_fields('options');
$list = get_field('list');
?>
<main>
    <section class="hero pt-header-height [&+.section-space-top]:mt-0">
        <div class="container pb-[30px] lg:pb-[50px]">
            <div class="breadcrumbs lg:pt-[14px] [&:has(a)]:block hidden">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>

            <h1 class="h2 mt-[40px] lg:mt-[30px] font-medium">
                <?= the_title() ?>
            </h1>
        </div>
    </section>

    <?php if (check($list)): ?>
        <section class="section-space-top">
            <div class="container">
                <?php
                foreach ($list as $row):
                    if (check($row['gray_row'])):
                ?>
                        <div class="mt-[10px] lg:mt-[20px] first:mt-0 rounded-[10px] bg-color-dark-20 text-color-dark-80 p-[16px] md:p-[40px] lg:grid lg:gap-[20px] lg:grid-cols-[166px_1fr] 4xl:grid-cols-[180px_1fr]">
                            <?php foreach ($row['gray_row'] as $item): ?>
                                <div class="text-md text-color-dark font-bold mt-[16px] lg:mt-0 first:mt-0">
                                    <?= $item['row_item']['label'] ?>
                                </div>
                                <div style="--ul-dots: linear-gradient(105deg, #fb7d20 0%, #fa2527 100%);" class="mt-[5px] lg:mt-0 text-md text-content lg:max-w-[600px] 4xl-max:max-w-[800px]">
                                    <?= $item['row_item']['text'] ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $data = $options['vacancy_form'];
    if (!$data['section_utils']['section_hide']):
    ?>
        <section <?= get_section_id($data) ?> class="form section-space-top">
            <div class="container">
                <div class="px-[16px] py-[24px] md:p-[50px] bg-color-accent-first rounded-[10px] lg:min-h-[575px] lg:grid lg:grid-cols-[1fr_auto] lg:gap-[40px] lg:flex-wrap relative">
                    <div class="2xl:relative z-2 flex flex-col gap-[30px] justify-between flex-shrink flex-grow lg:max-w-[420px]">
                        <div class="first-child-no-margin">
                            <?php if (check($data['text'])): ?>
                                <div class="text-content text-content-white text-white/80">
                                    <?= $data['text'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (check($data['buttons'])) {
                                get_template_part(get_part_path('buttons-group'), null, [
                                    'classes' => 'mt-[30px] lg:mt-[40px]',
                                    'buttons' => $data['buttons']
                                ]);
                            } ?>
                        </div>

                        <?php get_template_part(get_part_path('social'), null, [
                            'classes' => 'social--white'
                        ]) ?>
                    </div>
                    <div data-vacancy-form class="2xl:relative z-2 mt-[40px] lg:m-0 flex-shrink-0 flex-grow-0 lg:w-[500px] 2xl:w-[556px]">
                        <?php if (check($data['form'])) {
                            echo do_shortcode('[contact-form-7 id="5794ef5" title="Vacancy form"]');
                        } ?>
                    </div>
                    <div class="mt-[40px] 2xl:mt-0 relative aspect-[1/0.78] md:aspect-auto md:h-[410px] lg:col-span-2 2xl:w-[410px] 2xl:absolute 2xl:bottom-[45px] 2xl:right-[600px]">
                        <?php get_template_part(get_part_path('image'), null, [
                            'classes' => 'ibg [&.ibg]:object-contain',
                            'image_data' => $data['image']
                        ]) ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php

get_footer();
