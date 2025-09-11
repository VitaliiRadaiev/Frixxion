<?php
if (!$data['section_utils']['section_hide']):
?>
    <section <?= get_section_id($data) ?> class="two-columns-text-and-image-left has-dark-bg section-space-top relative rounded-[20px] pt-[60px] pb-[16px] md:pb-[40px] lg:py-[100px] overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div class="container relative z-2">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-content-white',
                'head_data' => $data['section_head']
            ]) ?>

            <div class="mt-[30px] lg:mt-[50px] grid gap-[30px] lg:gap-[52px] lg:grid-cols-2">
                <div class="first-child-no-margin lg:py-[75px] self-center">
                    <?php if (check($data['text'])): ?>
                        <div class="text-content text-content-white text-md text-white/80 lg:max-w-[590px] 4xl:max-w-[690px]">
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
                <div class="relative overflow-hidden rounded-[10px] aspect-[1/0.7] sm:aspect-[1/0.54] lg:aspect-auto lg:min-h-[320px] bg-gradient-second">
                    <?php get_template_part(get_part_path('image'), null, [
                        'classes' => 'ibg',
                        'image_data' => $data['image']
                    ]) ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>