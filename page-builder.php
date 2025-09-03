<?php
// Template name: Page builder
get_header();

?>
<main>

    <?php
    include get_template_directory() . '/sections/full-screen-hero/full-screen-hero.php';
    
    include get_template_directory() . '/sections/grey-cards-three-columns/grey-cards-three-columns.php';
    
    include get_template_directory() . '/sections/grey-cards-four-columns/grey-cards-four-columns.php';
    
    include get_template_directory() . '/sections/grey-number-cards-three-columns/grey-number-cards-three-columns.php';
    
    include get_template_directory() . '/sections/grey-number-cards-four-columns/grey-number-cards-four-columns.php';

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

    ?>
    
</main>
<?php

get_footer();
