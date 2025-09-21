<?php
$social_list = get_field('global_social_list', 'options');
$classes = $args['classes'] ?? '';
if(check($social_list)):
?>

<div data-aos="fade-in" data-aos-delay="1000" class="social flex flex-wrap gap-[20px] <?= $classes ?>">
    <?php foreach($social_list['social_list'] as $item):?>
        <a href="<?= $item['url'] ?>" class="flex items-center justify-center h-[44px] w-[44px] rounded-full">
            <?= file_get_contents(get_social_icon_by_url($item['url']), false) ?>
        </a>
    <?php endforeach;?>
</div>
<?php endif;?>