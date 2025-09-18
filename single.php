<?php
get_header();

$text_author = get_field('text_author', 'options');
$text_share = get_field('text_share', 'options');
$text_source = get_field('text_source', 'options');
$thumbnail_id = get_post_thumbnail_id();
$author_data = [
    'img' => get_avatar_url(get_the_author_meta('ID'), ['size' => 96]),
    'name' => get_the_author_meta('display_name') ?: get_the_author_meta('user_nicename') ?: 'Unknown Author'
];
$date = get_the_date('F j, Y');
$sources = get_field('source');
?>
<main>
    <section class="hero pt-header-height [&+.section-space-top]:mt-0">
        <div class="container pb-[30px] lg:pb-[50px]">
            <div class="breadcrumbs lg:pt-[14px] [&:has(a)]:block hidden">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>

            <h1 class="h2 mt-[40px] lg:mt-[30px] font-medium max-w-[930px]">
                <?= the_title() ?>
            </h1>
        </div>
    </section>

    <section class="section-space-top">
        <div class="container">
            <div class="md:flex md:items-center md:justify-between md:flex-wrap md:gap-[30px]">
                <div class="flex items-center gap-x-[20px]">
                    <div class="flex items-center gap-[10px] text-xs-lg-sm text-color-dark-80">
                        <img class="h-[24px] w-[24px] shrink-0 grow-0" src="<?= get_template_directory_uri() . '/assets/images/icons/date.svg' ?>" alt="">
                        <?= $date ?>
                    </div>
                    <div class="h-[24px] w-[1px] bg-black/10"></div>
                    <div class="flex items-center gap-[10px]">
                        <div class="flex-shrink-0 flex-grow-0 h-[44px] w-[44px] rounded-full overflow-hidden relative bg-color-dark-20">
                            <img class="ibg" src="<?= $author_data['img'] ?>" alt="">
                        </div>
                        <div class="text-xs-lg-sm text-color-dark">
                            <span class=" text-color-dark-80"><?= $text_author ?>:</span> <br class="md:hidden">
                            <?= $author_data['name'] ?>
                        </div>
                    </div>
                </div>
                <div class="mt-[20px] md:mt-0 flex items-center gap-[12px]">
                    <div class="text-md text-color-dark"><?= $text_share ?>:</div>
                    <div class="social social--dark flex flex-wrap gap-[12px]">
                        <a
                            class="flex items-center justify-center h-[44px] w-[44px] rounded-full"
                            href="<?= shareFacebook(get_the_permalink()) ?>"
                            target="_blank"
                            rel="nofollow"
                            aria-label="Show in social">

                            <?= file_get_contents(get_template_directory_uri() . '/assets/images/icons/facebook.svg', false) ?>
                        </a>
                        <a
                            class="flex items-center justify-center h-[44px] w-[44px] rounded-full"
                            href="<?= shareLinkedIn(get_the_permalink()) ?>"
                            target="_blank"
                            rel="nofollow"
                            aria-label="Show in social">
                            <?= file_get_contents(get_template_directory_uri() . '/assets/images/icons/linkedin.svg', false) ?>
                        </a>
                        <a
                            class="flex items-center justify-center h-[44px] w-[44px] rounded-full"
                            href="<?= shareTwitter(get_the_permalink()) ?>"
                            target="_blank"
                            rel="nofollow"
                            aria-label="Show in social">
                            <?= file_get_contents(get_template_directory_uri() . '/assets/images/icons/twitter.svg', false) ?>
                        </a>
                    </div>
                </div>
            </div>

            <?php if (check($thumbnail_id)): ?>
                <div class="mt-[30px] relative aspect-[1/0.816] md:aspect-[1/0.4411] overflow-hidden rounded-lg bg-color-light">
                    <?= get_image($thumbnail_id, 'ibg') ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="article mt-[40px] lg:mt-[80px]">
        <div class="container">
            <div class="max-w-[900px] mx-auto">
                <div class="article-content text-content text-md">
                    <?php the_content(); ?>
                </div>

                <div class="mt-[30px] md:flex md:items-center md:justify-between md:flex-wrap md:gap-[30px]">
                    <div class="text-xs-lg-sm text-color-dark-80"><?= $date ?></div>
                    <div class="mt-[20px] flex items-center gap-[12px]">
                        <div class="text-black"><?= $text_share ?>:</div>
                        <div class="social social--dark flex flex-wrap gap-[12px]">
                            <a
                                class="flex items-center justify-center h-[44px] w-[44px] rounded-full"
                                href="<?= shareFacebook(get_the_permalink()) ?>"
                                target="_blank"
                                rel="nofollow"
                                aria-label="Show in social">

                                <?= file_get_contents(get_template_directory_uri() . '/assets/images/icons/facebook.svg', false) ?>
                            </a>
                            <a
                                class="flex items-center justify-center h-[44px] w-[44px] rounded-full"
                                href="<?= shareLinkedIn(get_the_permalink()) ?>"
                                target="_blank"
                                rel="nofollow"
                                aria-label="Show in social">
                                <?= file_get_contents(get_template_directory_uri() . '/assets/images/icons/linkedin.svg', false) ?>
                            </a>
                            <a
                                class="flex items-center justify-center h-[44px] w-[44px] rounded-full"
                                href="<?= shareTwitter(get_the_permalink()) ?>"
                                target="_blank"
                                rel="nofollow"
                                aria-label="Show in social">
                                <?= file_get_contents(get_template_directory_uri() . '/assets/images/icons/twitter.svg', false) ?>
                            </a>
                        </div>
                    </div>
                </div>

                <?php if (check($sources)): ?>
                    <div style="--ul-dots: linear-gradient(105deg, #fb7d20 0%, #fa2527 100%); --h-weight: 600;" class="mt-[40px] lg:mt-[50px] text-content">
                        <?php if (check($text_source)): ?>
                            <h4><?= $text_source ?>:</h4>
                        <?php endif; ?>
                        <ul class="">
                            <?php foreach ($sources as $item): ?>
                                <li>
                                    <a href="<?= $item['link']['url'] ?>" target="_blank"><?= $item['link']['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
