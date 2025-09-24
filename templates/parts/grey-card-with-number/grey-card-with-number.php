<?php
$classes = $args['classes'] ?? '';
$num = $args['num'] ?? null;
$card_data = $args['card_data'] ?? null;

$card_data = wp_parse_args($card_data, [
    'title' => '',
    'text' => '',
]);
?>

<div class="grey-card-with-number rounded-[10px] p-[16px] md:p-[20px] bg-color-dark-20 <?= $classes ?>">
    <div class="relative z-2 md-max:flex md-max:items-center gap-[20px]">
        <?php if (check($num)): ?>
            <div class="md:mb-[30px] min-w-[46px] text-gradient-first h2 font-medium inline-block">
                <?= $num ?>
            </div>
        <?php endif; ?>

        <?php if (check($card_data['title'])): ?>
            <div class="h4 text-color-dark font-bold self-center">
                <?= $card_data['title'] ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if (check($card_data['text'])): ?>
        <div class="relative z-2 mt-[10px] md:mt-[10px] text-md text-content text-color-dark-80 whitespace-pre-line"><?= $card_data['text'] ?></div>
    <?php endif; ?>
</div>