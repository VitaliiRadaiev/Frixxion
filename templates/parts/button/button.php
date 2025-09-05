<?php
$button_data = $args['button_data'] ?? [];
$classes = $args['classes'] ?? '';
$attributes = $args['attributes'] ?? '';

$button_data = wp_parse_args($button_data, [
    'button_type' => 'link',
    'link' => [
        'url' => '#',
        'title' => '',
        'target' => '_self'
    ],
    'button_text' => null,
    'button_style' => 'accent-first',
    'form' => null
])

?>

<?php if ($button_data['button_type'] === 'link' && check($button_data['link'])): ?>
    <a href="<?= $button_data['link']['url'] ?>" target="<?= $button_data['link']['target'] ?>" class="btn btn--<?= $button_data['button_style'] ?> <?= $classes ?>" <?= $attributes ?>>
        <?= $button_data['link']['title'] ?>
    </a>
<?php elseif ($button_data['button_type'] === 'form' && check($button_data['button_text']) && $button_data['form'] instanceof WP_Post && $button_data['form']->post_type === 'wpcf7_contact_form'):
    $schortcode = '[contact-form-7 id="' . $button_data['form']->ID . '"]';
?>
    <button data-action="open-popup-form" class="btn btn--<?= $button_data['button_style'] ?> <?= $classes ?>" data-action="open-popup-form" data-form='<?= $schortcode ?>' <?= $attributes ?>>
        <?= $button_data['button_text'] ?>
    </button>
<?php endif; ?>