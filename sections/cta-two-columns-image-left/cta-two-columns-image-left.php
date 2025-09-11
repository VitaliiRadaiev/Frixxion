<?php
if (!$data['section_utils']['section_hide']):
?>
    <section <?= get_section_id($data) ?> class="cta-two-columns-image-left section-space-top">
        <div class="container">
            <div class="grid gap-[40px] lg:gap-[50px] lg:grid-cols-2 bg-color-accent-first rounded-[10px] p-[10px] md:p-[30px] lg:p-[10px]">
                <div class="lg:order-2 md-max:pt-[30px] lg-max:px-[10px] lg:py-[80px] lg:pr-[35px] lg:self-center first-child-no-margin">
                    <?php if (check($data['text'])): ?>
                        <div style="--h-color: var(--color-dark); --strong-color: var(--color-light);" class="text-content text-white lg:max-w-[590px] 4xl:max-w-[690px]">
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
                <div class="lg:order-1 relative overflow-hidden rounded-[10px] aspect-[1/0.75] sm:aspect-[1/0.54] lg:aspect-auto lg:min-h-[442px] bg-gradient-second">
                    <?php get_template_part(get_part_path('image'), null, [
                        'classes' => 'ibg',
                        'image_data' => $data['image']
                    ])?>    
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>