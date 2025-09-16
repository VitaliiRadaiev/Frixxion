<?php
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
                <div class="2xl:relative z-2 mt-[40px] lg:m-0 contacn-form-wrapper flex-shrink-0 flex-grow-0 lg:w-[500px] 2xl:w-[556px]">
                    <?php if(check($data['form'])){
                        echo do_shortcode('[contact-form-7 id="' . $data['form'] . '"]');
                    }?>
                </div>
                <div class="mt-[40px] 2xl:mt-0 relative aspect-[1/0.78] md:aspect-auto md:h-[410px] lg:col-span-2 2xl:w-[410px] 2xl:absolute 2xl:top-[115px] 2xl:right-[600px]">
                    <?php get_template_part(get_part_path('image'), null, [
                        'classes' => 'ibg [&.ibg]:object-contain',
                        'image_data' => $data['image']
                    ]) ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>