<?php 
$classes = $args['classes'] ?? '';
$icon_id = $args['icon_id'] ?? null;
$title = $args['title'] ?? '';
$text = $args['text'] ?? '';
?>

<div class="grey-card-with-icon rounded-[10px] p-[16px] md:p-[20px] bg-color-dark-20 <?= $classes ?>">
    <div class="md-max:flex md-max:items-center gap-[20px]">
        <div class="md:mb-[30px] h-[50px] md:h-[60px] w-[50px] md:w-[60px] bg-color-light flex items-center justify-center rounded-full flex-grow-0 flex-shrink-0">
            <?php 
                if(check($icon_id)) {
                    get_image($icon_id, 'h-[28px] md:h-[34px] w-[28px] md:w-[34px] object-contain');
                }
            ?>
        </div>
        <?php if(check($title)):?>
            <div class="h4 text-color-dark font-bold self-center">
                <?= $title ?>
            </div>     
        <?php endif;?>
    </div>
    <?php if(check($text)):?>
        <div class="mt-[20px] md:mt-[10px] text-md text-content text-color-dark-80">
            <?= $text ?>
        </div>
    <?php endif;?>
    <div class=""></div>
</div>