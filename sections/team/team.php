<?php
if (!$data['section_utils']['section_hide']):

    wp_enqueue_script(
        'team-slider-script',
        get_template_directory_uri() . '/sections/team/team.js',
        array('main-script'),
        null,
        true
    );
?>
        <section <?= get_section_id($data) ?> class="team section-space-top overflow-hidden">
            <div data-slider="team-slider" class="container first-child-no-margin">
                <div class="flex items-end justify-between gap-[40px]">
                    <?php if (check($data['section_head']['text'])): ?>
                        <div data-aos="cascade-fade-in" class="text-content lg-max:text-center lg:max-w-[700px]">
                            <?= $data['section_head']['text'] ?>
                        </div>
                    <?php endif; ?>

                    <?php get_template_part(get_part_path('slider-nav-arrows'), null, ['classes' => 'text-color-dark lg-max:hidden']) ?>
                </div>

                <div class="mt-[30px] lg:mt-[50px] swiper lg-max:[&.swiper]:overflow-visible md-max:!px-[10px]">
                    <div data-aos="cascade-fade-in" class="swiper-wrapper">
                        <?php foreach ($data['list'] as $item): ?>
                            <div class="swiper-slide lg-max:[&.swiper-slide]:w-[324px] !h-auto">
                                <div class="flex flex-col h-full">
                                    <div class="bg-color-dark-40 rounded-[10px] relative aspect-[1/1.08]">
                                        <?php if (check($item['image'])) {
                                            get_image($item['image'], 'ibg [&.ibg]:object-contain object-center-bottom');
                                        } ?>
                                    </div>
                                    <div class="mt-[5px] shrink grow rounded-[10px] bg-color-dark-20 p-[20px]">
                                        <?php if (check($item['text']['name'])): ?>
                                            <div class="h4 text-color-dark font-bold">
                                                <?= $item['text']['name'] ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (check($item['text']['position'])): ?>
                                            <div class="mt-[10px] text-color-dark-80 text-md">
                                                <?= $item['text']['position'] ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
<?php endif; ?>