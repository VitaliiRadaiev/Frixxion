<?php
function get_margin_classes($margin)
{
    $top = !empty($margin['top']) ? ($margin['top'] !== 'no' ? "mt-{$margin['top']}" : 'mt-0') : '';
    $right = !empty($margin['right']) ? ($margin['right'] !== 'no' ? " mr-{$margin['right']}" : ' mr-0') : '';
    $bottom = !empty($margin['bottom']) ? ($margin['bottom'] !== 'no' ? " mb-{$margin['bottom']}" : ' mb-0') : '';
    $left = !empty($margin['left']) ? ($margin['left'] !== 'no' ? " ml-{$margin['left']}" : ' ml-0') : '';

    return trim("$top$right$bottom$left");
}

function get_gap_classes($gap)
{
    $x = !empty($gap['x']) ? "gap-x-{$gap['x']}" : '';
    $y = !empty($gap['y']) ? "gap-y-{$gap['y']}" : '';

    return combine_classes($x, $y);
}

function get_sections_margin_classes($margin)
{
    $top = !empty($margin['top']) ? ($margin['top'] !== 'no' ? "section-mt-{$margin['top']}" : 'mt-0') : '';
    $right = !empty($margin['right']) ? ($margin['right'] !== 'no' ? " section-mr-{$margin['right']}" : ' mr-0') : '';
    $bottom = !empty($margin['bottom']) ? ($margin['bottom'] !== 'no' ? " section-mb-{$margin['bottom']}" : ' mb-0') : '';
    $left = !empty($margin['left']) ? ($margin['left'] !== 'no' ? " section-ml-{$margin['left']}" : ' ml-0') : '';

    return trim("$top$right$bottom$left");
}

function get_sections_padding_classes($padding)
{
    $top = !empty($padding['top']) ? ($padding['top'] !== 'no' ? "section-pt-{$padding['top']}" : 'pt-0') : '';
    $right = !empty($padding['right']) ? ($padding['right'] !== 'no' ? " section-pr-{$padding['right']}" : ' pr-0') : '';
    $bottom = !empty($padding['bottom']) ? ($padding['bottom'] !== 'no' ? " section-pb-{$padding['bottom']}" : ' pb-0') : '';
    $left = !empty($padding['left']) ? ($padding['left'] !== 'no' ? " section-pl-{$padding['left']}" : ' pl-0') : '';

    return trim("$top$right$bottom$left");
}

function get_heading_size_class($size)
{
    $sizesMap = [
        'sm' => 'h5',
        'md' => 'h4',
        'lg' => 'h3',
        'xl' => 'h2',
        '2xl' => 'h1'
    ];

    return isset($sizesMap[$size]) ? $sizesMap[$size] : '';
}

function combine_classes(...$classes)
{
    return implode(' ', array_filter($classes, fn($class) => !empty($class)));
}

function get_default_section_classes($attributes)
{
    return combine_classes(
        get_sections_margin_classes($attributes['margin']),
        get_sections_padding_classes($attributes['padding']),
        $attributes['background'],
        ($attributes['className'] ?? '')
    );
}

function get_container_classes($val)
{
    if (!check($val)) {
        return '';
    }

    return 'block-container-' . $val;
}


function combine_string(array $options, string $value): string
{
    $prefix = $options['prefix'] ?? '';
    $postfix = $options['postfix'] ?? '';

    if (!$value) {
        return '';
    }

    return $prefix . $value . $postfix;
}

function get_flex_justify_alignment_classes($key)
{
    if (!check($key)) {
        return '';
    }

    $classes_map = [
        'left' => 'justify-start',
        'right' => 'justify-end',
        'center' => 'justify-center',
        'space-between' => 'justify-between'
    ];

    return isset($classes_map[$key]) ? $classes_map[$key] : '';
}

function generate_html_data_attributes($data_attributes)
{
    $attributes = [];

    foreach ($data_attributes as $key => $value) {
        $attributes[] = $key . '="' . esc_attr($value) . '"';
    }

    return implode(' ', $attributes);
}
