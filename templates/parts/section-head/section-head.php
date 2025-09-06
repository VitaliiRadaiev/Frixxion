<?php
$classes = $args['classes'] ?? '';
$attributes = $args['attributes'] ?? '';
$head_data = $args['head_data'] ?? [];

$head_data = wp_parse_args($head_data, [
    'text' => '',
]);

if (check($head_data['text'])):
?>
    <div <?= $attributes ?> class="<?= $classes ?> section-head text-center text-content text-md max-w-[762px] mx-auto w-full">
        <?= $head_data['text'] ?>
    </div>
<?php endif; ?>