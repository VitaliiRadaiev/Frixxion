<?php
$text_read_more = get_field('text_read_more', 'options');
$text_position = get_field('text_position', 'options');
$classes = $args['classes'] ?? '';
$card_data = $args['card_data'] ?? [];

$card_data = wp_parse_args($card_data, [
    'title' => '',
    'excerpt' => '',
    'permalink' => '#'
]);
?>
<a href="<?= $card_data['permalink'] ?>" class="vacancy-card flex flex-col gap-[30px] hover-link rounded-[10px] bg-color-dark-20 p-[16px] lg:p-[20px] [&_.h4]:hover:text-color-accent-second">
    <div class="">
        <div class="bg-color-light rounded-full inline-block py-[3px] px-[10px] text-xs text-color-dark-80">
            <?= $text_position ?>
        </div>
        <div class="mt-[12px] lg:mt-[16px] h4 text-black font-medium transition-colors">
            <?= $card_data['title'] ?>
        </div>
        <?php if(check($card_data['excerpt'])):?>
            <div style="--lines: 4" class="mt-[10px] text-color-dark-80 text-md truncate-text">
                <?= $card_data['excerpt'] ?>
            </div>
        <?php endif;?>
    </div>

    <span class="mt-auto link text-color-accent-first self-start">
        <?= $text_read_more ?>
    </span>
</a>
