<?php
if (!$data['section_utils']['section_hide']):
    $table_head = $data['table_head'];
    $table_body = $data['table_body'];
    $table_footer = $data['table_footer'];
?>
    <script>
        console.log(<?= json_encode($data); ?>);
    </script>
    <section class="table-section has-dark-bg section-space-top relative rounded-[20px] py-[60px] lg:py-[100px] overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div class="container relative z-2">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-content-white',
                'head_data' => $data['section_head']
            ]) ?>
            <div class="mt-[30px] lg:mt-[50px]">
                <div class="swiper [&.swiper]:overflow-visible">
                    <div class="swiper-wrapper lg:grid lg:grid-cols-[33.5%_minmax(290px,1fr)_minmax(290px,1fr)_minmax(290px,1fr)] lg:gap-[10px]">
                        <?php
                        $columns = 4;
                        $color_map = ['#f0f0f0', '#fff8e6', '#fff2e9', '#ffeaea'];
                        $dots_color_map = ['#d7d7d7', '#fcb503', '#fb7d20', '#fa2527'];
                        for ($i = 1; $i <= $columns; $i++):
                            $col = 'col_' . $i;
                        ?>
                            <div style="--color: <?= $color_map[$i - 1] ?>; --dot-color: <?= $dots_color_map[$i - 1] ?>;" class="swiper-slide first-child-no-margin !h-auto !flex flex-col gap-[5px]">
                                <?php if (check($table_head[$col]['title'])): ?>
                                    <div class="flex items-center justify-between min-h-[60px] px-[30px] py-[10px] rounded-[10px] bg-[var(--color)]">
                                        <div class="h4 text-color-dark font-bold">
                                            <?= $table_head[$col]['title'] ?>
                                        </div>
                                        <?php if (check($table_head[$col]['icon'])): ?>
                                            <div class="flex-shrink-0 flex-grow-0">
                                                <?php get_image($table_head[$col]['icon'], 'h-[40px] w-[28px] object-contain') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="px-[30px] pt-[10px] pb-[20px] rounded-[10px] bg-[var(--color)] h-full">
                                    <ul>
                                        <?php foreach($table_body as $value):?>
                                            <li class="pt-[10px] pb-[9px] border-b border-[#191a1d33] text-md text-color-dark">
                                                <?= check($value[$col]) ? $value[$col] : '<span class="icon-dot text-[var(--dot-color)] text-[8px]"></span>' ?>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                    <?php if(check($table_footer[$col])):?>
                                        <div class="mt-[30px] lg:mt-[40px]">
                                            <?php get_template_part(get_part_path('button'), null, [
                                                'classes' => 'w-full',
                                                'button_data' => [
                                                    'button_type' => 'link',
                                                    'link' => $table_footer[$col],
                                                    'button_style' => 'accent-first',
                                                ]
                                            ])?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="mt-[30px] lg:hidden">
                    Navigations
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>