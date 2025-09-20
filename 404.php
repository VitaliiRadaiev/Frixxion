<?php
get_header();
$data = get_field('page_404', 'options');
?>
<main class="[&~.footer]:mt-0 [&~.footer]:rounded-none">
    <section class="relative overflow-hidden">
        <?php get_template_part(get_part_path('dark-bg')) ?>

        <div class="container relative z-2 min-h-dvh flex flex-col justify-center py-[77px]">
            <div class="h-[145px] md:h-[221px]">
                <img class="h-full w-full object-contain" src="<?= get_template_directory_uri() . '/assets/images/general/404.png' ?>" alt="">
            </div>
            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'mt-[60px] text-content-white',
                'head_data' => $data['section_head']
            ]) ?>
            <?php if (check($data['buttons'])) {
                get_template_part(get_part_path('buttons-group'), null, [
                    'classes' => 'mt-[30px] lg:mt-[50px] sm:justify-center',
                    'buttons' => $data['buttons']
                ]);
            } ?>
        </div>

    </section>
</main>
<?php
get_footer();
