<?php
if (!$data['section_utils']['section_hide']):
?>
    <section <?= get_section_id($data) ?> class="grey-number-cards-three-columns section-space-top">
        <div class="container first-child-no-margin">
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'text-color-dark-80',
                'head_data' => $data['section_head']
            ]) ?>

            <?php if (check($data['list'])): ?>
                <div class="cards-list mt-[30px] lg:mt-[50px] grid gap-[10px] md:gap-[20px] md:grid-cols-2 lg:grid-cols-3 md-and-lg-max:[&>*:last-child:nth-child(odd)]:col-span-2">
                    <?php
                    foreach ($data['list'] as $key => $item) {
                        get_template_part(get_part_path('grey-card-with-number'), null, [
                            'num' => sprintf("%02d", $key + 1),
                            'card_data' => $item
                        ]);
                    }
                    ?>
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
<?php endif; ?>