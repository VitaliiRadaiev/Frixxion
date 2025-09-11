<?php

if (!$data['section_utils']['section_hide']):
?>
    <section <?= get_section_id($data) ?> class="hero pt-header-height [&+.section-space-top]:mt-0">
        <div class="container pb-[30px] lg:pb-[50px]">
            <div class="breadcrumbs lg:pt-[14px] [&:has(a)]:block hidden">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>

            <?php get_template_part(get_part_path('section-head'), null, [
                'classes' => 'mt-[40px] lg:mt-[30px] text-color-dark-80',
                'head_data' => $data['section_head']
            ]) ?>
        </div>
    </section>
<?php endif; ?>