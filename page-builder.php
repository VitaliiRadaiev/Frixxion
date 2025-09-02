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

    ?>
    
</main>
<?php

get_footer();
