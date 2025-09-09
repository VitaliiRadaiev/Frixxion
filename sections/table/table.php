<?php


if (!$data['section_utils']['section_hide']):
    $table_head = $data['table_head'];
    $table_body = $data['table_body'];
    $table_footer = $data['table_footer'];

    wp_enqueue_script(
        'table-section-script',
        get_template_directory_uri() . '/sections/table/table.js',
        array('main-script'),
        null,
        true
    );
?>
    <section class="table-section has-dark-bg section-space-top relative rounded-[20px] py-[60px] lg:py-[100px] overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div class="container relative z-2">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-content-white',
                'head_data' => $data['section_head']
            ]) ?>
            <div data-slider="table" class="mt-[30px] lg:mt-[50px]">
                <div class="swiper [&.swiper]:overflow-visible">
                    <div class="swiper-wrapper lg:grid lg:grid-cols-[33.5%_minmax(290px,1fr)_minmax(290px,1fr)_minmax(290px,1fr)]">
                        <?php
                        $columns = 4;
                        $color_map = ['#f0f0f0', '#fff8e6', '#fff2e9', '#ffeaea'];
                        $dots_color_map = ['#d7d7d7', '#fcb503', '#fb7d20', '#fa2527'];
                        for ($i = 1; $i <= $columns; $i++):
                            $col = 'col_' . $i;
                            $first_column_classes = $i == 1 ? 'hidden lg:!flex' : '!flex';
                        ?>

                            <div style="--color: <?= $color_map[$i - 1] ?>; --dot-color: <?= $dots_color_map[$i - 1] ?>;" class="<?= $first_column_classes ?> swiper-slide first-child-no-margin !h-auto flex-col gap-[5px] lg-max:[&.swiper-slide]:w-[323px] lg:pr-[10px] lg:last:pr-0">
                                <?php if (check($table_head[$col]['title'])): ?>
                                    <div data-row="head" class="flex items-center gap-[10px] justify-between min-h-[42px] md:min-h-[60px] px-[16px] md:px-[30px] py-[6px] md:py-[10px] rounded-[10px] bg-[var(--color)]">
                                        <div class="h4 text-color-dark font-bold">
                                            <?= $table_head[$col]['title'] ?>
                                        </div>
                                        <?php if (check($table_head[$col]['icon'])): ?>
                                            <div class="flex-shrink-0 flex-grow-0">
                                                <?php get_image($table_head[$col]['icon'], 'h-[30px] md:h-[40px] w-[21px] md:w-[28px] object-contain') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="px-[16px] md:px-[30px] pt-[12px] md:pt-[10px] pb-[20px] rounded-[10px] bg-[var(--color)] h-full">
                                    <ul>
                                        <?php foreach ($table_body as $key => $value): ?>
                                            <li data-row="<?= $key + 1 ?>" class="pt-[8px] md:pt-[10px] pb-[7px] md:pb-[9px] border-b border-[#191a1d33] text-md text-color-dark">
                                                <?php if (check($value['col_1'])): ?>
                                                    <div class="mb-[8px] lg:hidden font-bold">
                                                        <?= $value['col_1'] ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="">
                                                    <?= check($value[$col]) ? $value[$col] : '<div class="bg-[var(--dot-color)] h-[8px] w-[8px] md:my-[8px] rounded-full"></div>' ?>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if (check($table_footer[$col])): ?>
                                        <div class="mt-[30px] lg:mt-[40px]">
                                            <?php get_template_part(get_part_path('button'), null, [
                                                'classes' => 'w-full',
                                                'button_data' => [
                                                    'button_type' => 'link',
                                                    'link' => $table_footer[$col],
                                                    'button_style' => 'accent-first',
                                                ]
                                            ]) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php get_template_part(get_part_path('slider-nav-bullets-with-arrows'), null, [
                    'classes' => 'mt-[30px] 2xl:hidden text-white'
                ]) ?>
            </div>
        </div>
    </section>
<?php endif; ?>