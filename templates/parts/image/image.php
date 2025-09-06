<?php
$classes = $args['classes'] ?? '';
$attributes = $args['attributes'] ?? [];
$media_query = $args['media_query'] ?? '744px';

$image_data = $args['image_data'] ?? [];

$image_data = wp_parse_args($image_data, [
    'mob' => null,
    'desk' => null
]);
if ($image_data['mob'] || $image_data['desk']):
?>

    <?php if (check($image_data['mob']) && $image_data['desk']): ?>
        <picture>
            <source srcset="<?= wp_get_attachment_image_url($image_data['desk'], 'large'); ?>" media="(min-width: <?= $media_query ?>)" />
            <?php get_image($image_data['mob'], $classes, true, 'large', $attributes) ?>
        </picture>
    <?php else:
        get_image(
            check($image_data['mob']) ? $image_data['mob'] : $image_data['desk'],
            $classes,
            true,
            'large',
            $attributes
        );
    endif; ?>
<?php endif; ?>