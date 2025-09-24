<?php
if (!$data['section_utils']['section_hide']):
?>
    <section <?= get_section_id($data) ?> class="two-columns-text-and-image-left has-dark-bg section-space-top relative rounded-[20px] py-[60px] lg:py-[100px] overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div class="container relative z-2 first-child-no-margin">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-content-white',
                'head_data' => $data['section_head']
            ]) ?>

            <div class="mt-[30px] lg:mt-[50px] grid gap-[30px] lg:gap-[52px] lg:grid-cols-2 lg:items-center">
                <div data-aos="fade-in" data-aos-delay="1000" class="overflow-hidden rounded-[10px] bg-gradient-second">
                    <?php get_template_part(get_part_path('image'), null, [
                        'image_data' => $data['image']
                    ]) ?>
                </div>
                <div class="first-child-no-margin lg:py-[75px] self-center">
                    <?php if (check($data['text'])): ?>
                        <div data-aos="cascade-fade-in" class="text-content text-content-white text-md text-white/80 lg:max-w-[590px] 4xl:max-w-[690px]">
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
            </div>
        </div>
    </section>
<?php endif; ?>