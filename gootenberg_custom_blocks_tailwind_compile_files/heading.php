<?php
$t = 'gap-x-[10px]';
if (!($attributes['isHide'])):
    $aligment_container_classes = [
        'left' => 'mr-auto',
        'center' => 'mx-auto',
        'right' => '!ml-auto'
    ];

    $classes = combine_classes(
        get_margin_classes($attributes['margin']),
        get_heading_size_class($attributes['fontSize']),
        $attributes['classes'],
        ($attributes['className'] ?? ''),
        combine_string(['prefix' => 'text-'], $attributes['aligment']),
        get_container_classes($attributes['container']),
        ($aligment_container_classes[$attributes['aligment']] ?? ''),
        ($attributes['isHasNumber'] ? 'relative pl-[1.5em]' : ''),
        ($attributes['isHyphens'] ? 'hyphens' : ''),
    );

    $text = '';

    if ($attributes['acfField'] ?? null) {
        $text = get_field($attributes['acfField'], 'options');

        if ($attributes['acfField'] === 'text_block_map_title') {
            $schools_count = get_schools_count();
            $text = $text . '<br /><span class="text-accent-second">' . $schools_count . ' ' . get_inflected_word_school($schools_count) . '</span>';
        }
    }

    if (check($attributes['text'])) { 
        $text = $attributes['text'];
    }
?>
    <?php if (check($text)): ?>
        <<?= $attributes['htmlTeg'] ?> class="<?= $classes ?>">
            <?php if ($attributes['isHasNumber']): ?>
                <div class="bg-color-accent-first h-[1.0625em] min-w-[1.0625em] rounded-full flex items-center justify-center absolute top-0 left-0 px-[0.2em]">
                    <span class="text-[0.5em] font-medium text-white leading-none">
                        <?= $attributes['number'] ?>
                    </span>   
                </div>
            <?php endif; ?>
            <?= $text ?>
        </<?= $attributes['htmlTeg'] ?>>
    <?php endif; ?>
<?php endif; ?>