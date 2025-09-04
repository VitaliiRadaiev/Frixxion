<?php
// Template name: Page builder
get_header();

?>
<main>

    <?php
    global $data;

    while (have_posts()): the_post();

        $sections = get_field('sections');
        foreach ($sections as $sec_key => $section) {
            $sec_name = $section['acf_fc_layout'];
            global $data;
            $data = $section;
            $data['section_key'] = $sec_key;

            include get_template_directory() . '/sections/' . $sec_name . '/' . $sec_name . '.php';
        }


    endwhile;

    include get_template_directory() . '/sections/two-columns-text-and-image-left/two-columns-text-and-image-left.php';

    include get_template_directory() . '/sections/grey-cards-three-columns/grey-cards-three-columns.php';

    include get_template_directory() . '/sections/grey-cards-four-columns/grey-cards-four-columns.php';

    include get_template_directory() . '/sections/grey-number-cards-three-columns/grey-number-cards-three-columns.php';

    include get_template_directory() . '/sections/two-columns-text-and-image-right/two-columns-text-and-image-right.php';
    
    include get_template_directory() . '/sections/cta-two-columns-image-right/cta-two-columns-image-right.php';
    
    include get_template_directory() . '/sections/cta-two-columns-image-left/cta-two-columns-image-left.php';


    ?>



</main>
<?php

get_footer();
