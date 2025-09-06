<?php
$classes = $args['classes'] ?? '';
$card_data = $args['card_data'] ?? null;

$card_data = wp_parse_args($card_data, [
    'icon' => null,
    'title' => '',
    'text' => '',
])
?>

<div class="grey-card-with-icon rounded-[10px] p-[16px] md:p-[20px] bg-color-dark-20 <?= $classes ?>">
    <div class="md-max:flex md-max:items-center gap-[20px]">
        <div class="md:mb-[30px] h-[50px] md:h-[60px] w-[50px] md:w-[60px] bg-color-light flex items-center justify-center rounded-full flex-grow-0 flex-shrink-0">
            <?php
            if (check($card_data['icon'])) {
                get_image($card_data['icon'], 'h-[28px] md:h-[34px] w-[28px] md:w-[34px] object-contain');
            }
            ?>
        </div>
        <?php if (check($card_data['title'])): ?>
            <div class="h4 text-color-dark font-bold self-center">
                <?= $card_data['title'] ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (check($card_data['text'])): ?>
        <div class="mt-[20px] md:mt-[10px] text-md text-content text-color-dark-80 whitespace-pre-line"><?= $card_data['text'] ?></div>
    <?php endif; ?>
    <div class=""></div>
</div>