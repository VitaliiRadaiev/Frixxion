<?php
if (!$data['section_utils']['section_hide']):
    $row_first = $data['row_first'];
    $row_second = $data['row_second'];
?>
    <section <?= get_section_id($data) ?> class="two-columns-two-rows has-dark-bg section-space-top relative rounded-[20px] py-[60px] lg:py-[100px] overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div class="container relative z-2">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-content-white',
                'head_data' => $data['section_head']
            ]) ?>

            <div class="mt-[30px] lg:mt-[50px] grid gap-[40px] lg:gap-[60px]">
                <div class="grid gap-[30px] lg:gap-[50px] lg:grid-cols-2">
                    <div class="lg:order-2 relative overflow-hidden rounded-[10px] aspect-[1/0.7] sm:aspect-[1/0.54] lg:aspect-auto lg:min-h-[320px] bg-gradient-second">
                        <?php get_template_part(get_part_path('image'), null, [
                            'classes' => 'ibg',
                            'image_data' => $row_first['image']
                        ]) ?>
                    </div>
                    <div class="lg:order-1 first-child-no-margin lg:py-[75px] self-center">
                        <?php if (check($row_first['text'])): ?>
                            <div class="text-content text-content-white text-md text-white/80 lg:max-w-[590px] 4xl:max-w-[690px]">
                                <?= $row_first['text'] ?>
                            </div>
                        <?php endif; ?>
                        <?php if (check($row_first['buttons'])) {
                            get_template_part(get_part_path('buttons-group'), null, [
                                'classes' => 'mt-[30px] lg:mt-[40px]',
                                'buttons' => $row_first['buttons']
                            ]);
                        } ?>
                    </div>
                </div>
                <div class="grid gap-[30px] lg:gap-[50px] lg:grid-cols-2 bg-color-light rounded-[10px] p-[10px] md:p-[30px] lg:p-[10px]">
                    <div class="relative overflow-hidden rounded-[10px] aspect-[1/0.75] sm:aspect-[1/0.54] lg:aspect-auto lg:min-h-[442px] bg-gradient-second">
                        <?php get_template_part(get_part_path('image'), null, [
                            'classes' => 'ibg',
                            'image_data' => $row_second['image']
                        ]) ?>
                    </div>
                    <div class="lg-max:px-[10px] lg-max:pb-[10px] lg:py-[80px] lg:pr-[35px] lg:self-center">
                        <?php if (check($row_second['text'])): ?>
                            <div class="text-content text-color-dark-80 lg:max-w-[590px] 4xl:max-w-[690px]">
                                <?= $row_second['text'] ?>
                            </div>
                        <?php endif; ?>
                        <?php if (check($row_second['buttons'])) {
                            get_template_part(get_part_path('buttons-group'), null, [
                                'classes' => 'mt-[30px] lg:mt-[40px]',
                                'buttons' => $row_second['buttons']
                            ]);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>