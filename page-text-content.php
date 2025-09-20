<?php
// Template name: Page Text content
get_header();
?>
<main>
    <section class="hero pt-header-height [&+.section-space-top]:mt-0">
        <div class="container pb-[30px] lg:pb-[50px]">
            <div class="breadcrumbs lg:pt-[14px] [&:has(a)]:block hidden">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>

            <h1 class="h2 mt-[40px] lg:mt-[30px] font-medium text-center">
                <?= the_title() ?>
            </h1>
        </div>
    </section>

    <section class="section-space-top">
        <div class="container">
            <div class="max-w-[900px] mx-auto">
                <div class="article-content text-content text-md">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
