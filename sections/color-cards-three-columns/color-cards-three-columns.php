    <section class="color-cards-three-columns section-space-top">
        <div class="container first-child-no-margin">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-color-dark-80',
                'head_data' => $data['section_head']
            ]) ?>

            <?php if (check($data['list'])): ?>
                <div data-aos="cascade-fade-in" class="mt-[30px] lg:mt-[50px] grid gap-[10px] md:gap-[20px] md:grid-cols-2 lg:grid-cols-3 md-and-lg-max:[&>*:last-child:nth-child(odd)]:col-span-2">
                    <?php foreach ($data['list'] as $card): ?>
                        <div class="rounded-[10px] p-[16px] md:p-[30px] bg-color-dark overflow-hidden relative">
                            <img class="absolute z-1 left-full bottom-full w-[520px] lg:w-[570px] h-auto max-w-none -translate-x-[140px] lg:-translate-x-[180px] translate-y-[260px]" src="<?= get_template_directory_uri() . '/assets/images/general/light-md.webp' ?>" alt="">
                            <img class="absolute z-2 left-full bottom-full w-[280px] lg:w-[320px] h-auto max-w-none -translate-x-[210px] lg:-translate-x-[260px] translate-y-[185px] lg:translate-y-[220px]" src="<?= get_template_directory_uri() . '/assets/images/general/light-red-sm.png' ?>" alt="">
                            <div class="relative z-3 h-full flex flex-col gap-[30px] md:gap-[40px] justify-between md:min-h-[230px]">
                                <div class="h-[50px] md:h-[60px] w-[50px] md:w-[60px] bg-color-light flex items-center justify-center rounded-full flex-grow-0 flex-shrink-0">
                                    <?php
                                    if (check($card['icon'])) {
                                        get_image($card['icon'], 'h-[28px] md:h-[34px] w-[28px] md:w-[34px] object-contain');
                                    }
                                    ?>
                                </div>

                                <div class="">
                                    <?php if (check($card['label'])): ?>
                                        <div class="text-md text-white/80">
                                            <?= $card['label'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (check($card['text'])): ?>
                                        <div class="mt-[10px] text-md text-content text-content-white !text-white">
                                            <?= $card['text'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (check($data['buttons'])) {
                get_template_part(get_part_path('buttons-group'), null, [
                    'classes' => 'mt-[30px] lg:mt-[50px] sm:justify-center',
                    'buttons' => $data['buttons']
                ]);
            } ?>
        </div>
    </section>