<?php
$title_data = $args['title_data'] ?? [];
$classes = $args['classes'] ?? '';
$attributes = $args['attributes'] ?? '';

$title_data = wp_parse_args($title_data, ['tag' => 'H2', 'text' => '']);
if (check($title_data['text'])):
?>
    <<?= strtolower($title_data['tag']) ?> class="<?= strtolower($title_data['tag']) ?> <?= $classes ?>" <?= $attributes ?>>
        <?= html_entity_decode($title_data['text']) ?>
    </<?= strtolower($title_data['tag']) ?>>
<?php endif ?>