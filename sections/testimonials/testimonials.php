<?php
if (!$data['section_utils']['section_hide']):

    wp_enqueue_script(
        'testimonials-slider-script',
        get_template_directory_uri() . '/sections/testimonials/testimonials.js',
        array('main-script'),
        null,
        true
    );

    add_action('include_testimonial_popup', function() {
        include_once get_template_directory() . '/sections/testimonials/testimonials_popup.php';
    });

    $text_more = get_field('text_more', 'options');

?>
    <section <?= get_section_id($data) ?> class="testimonials section-space-top relative rounded-[20px] py-[60px] lg:py-[100px] overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div data-slider="testimonials-slider" class="container relative z-2 first-child-no-margin">
            <div class="flex items-end justify-between gap-[40px]">
                <?php if (check($data['section_head']['text'])): ?>
                    <div class="text-content text-content-white text-white/80 lg:max-w-[700px]">
                        <?= $data['section_head']['text'] ?>
                    </div>
                <?php endif; ?>

                <?php get_template_part(get_part_path('slider-nav-arrows'), null, ['classes' => 'text-color-light lg-max:hidden']) ?>
            </div>
            <div class="mt-[30px] lg:mt-[50px] swiper !overflow-visible md-max:!px-[10px]">
                <div class="swiper-wrapper">
                    <?php foreach ($data['list'] as $item): ?>
                        <div class="swiper-slide !h-auto md:w-[670px] 4xl:w-[788px] [&:not(.swiper-slide-active)]:opacity-60 !transition-opacity duration-500">
                            <div data-review-card class="py-[24px] px-[16px] md:p-[30px] rounded-[10px] bg-color-light h-full flex flex-col gap-y-[30px] md:gap-y-[66px]">
                                <div class="mb-auto">
                                    <span class="icon-qoute text-[24px] text-color-accent-first"></span>
                                    <div class="mt-[10px] text-color-dark text-md relative">
                                        <div data-text-container class="max-h-[210px] md:max-h-[125px] overflow-hidden [&.can-open+.b-shadow]:!block text-content whitespace-pre-line"><?= $item['text'] ?></div>
                                        <div class="b-shadow hidden lg-max:hidden absolute left-1/2 -translate-x-1/2 bottom-0 w-full z-2 pointer-events-none h-[100px]" style="background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #ffffff 100%);"></div>
                                    </div>
                                    <button data-action="show-all" class="mt-[20px] hidden link text-color-accent-first">
                                        <?= $text_more ?>
                                    </button>
                                </div>

                                <div class="mt-auto flex items-end justify-between gap-[30px]">
                                    <div class="max-w-[282px]">
                                        <?php if(check($item['author']['name'])):?>
                                            <div class="h4 text-color-dark font-medium">
                                                <?= $item['author']['name'] ?>
                                            </div>
                                        <?php endif;?>
                                        <?php if(check($item['author']['position'])):?>
                                            <div class="mt-[5px] text-color-dark-80 ">
                                            <?= $item['author']['position'] ?>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                    <?php if(check($item['logo'])){
                                        get_image($item['logo'], 'shrink-0 grow-0 max-w-[95px] md:max-w-[150px] max-h-[90px] object-contain');
                                    }?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php get_template_part(get_part_path('slider-nav-bullets-with-arrows'), null, [
                'classes' => 'mt-[30px] text-color-light lg:[&_.nav-btn]:hidden'
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