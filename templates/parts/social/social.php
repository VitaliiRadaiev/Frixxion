<?php
$social_list = get_field('global_social_list', 'options');
$classes = $args['classes'] ?? '';
if(check($social_list)):
?>

<div class="social flex flex-wrap gap-[20px] <?= $classes ?>">
    <?php foreach($social_list['social_list'] as $item):?>
        <a href="<?= $item['url'] ?>" class="flex items-center justify-center h-[44px] w-[44px] rounded-full">
            <img class="h-[22px] w-auto" src="<?= get_social_icon_by_url($item['url']) ?>" alt="">
        </a>
    <?php endforeach;?>
</div>
<?php endif;?>