<?php
$footer_data = get_field('footer', 'options');
?>
<footer class="footer section-space-top bg-color-dark rounded-t-[20px] pt-[60px] pb-[30px] text-color-light">
    <div class="container [&_a]:transition-colors hover:[&_a]:text-color-accent-first">
        <div class="lg:grid lg:grid-cols-[1fr_67.5%] lg:gap-[100px]">
            <div data-aos="cascade-fade-in" class="lg:flex lg:flex-col">
                <?php if (is_front_page()): ?>
                    <div class="xl:mb-auto">
                        <?php get_image($footer_data['logo'], 'h-[51px] w-auto') ?>
                    </div>
                <?php else: ?>
                    <a href="<?= get_home_url() ?>" class="block xl:mb-auto" aria-label="Main logo, link to home">
                        <?php get_image($footer_data['logo'], 'h-[51px] w-auto') ?>
                    </a>
                <?php endif; ?>

                <?php if (check($footer_data['text'])): ?>
                    <div class="mt-[35px] text-white/50 text-sm lg:max-w-[244px]">
                        <?= $footer_data['text'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-[40px] lg:mt-0 grid grid-cols-2 xl:grid-cols-4 gap-x-[20px] lg:gap-x-[50px] gap-y-[40px]">
                <div data-aos="cascade-fade-in" class="first-child-nomargin">
                    <?php
                    $col_1 = $footer_data['col_nav_1'];
                    ?>

                    <?php if (check($col_1['title'])): ?>
                        <div class="text-white/70 font-medium">
                            <?= $col_1['title'] ?>
                        </div>
                    <?php endif; ?>

                    <?php if (check($col_1['list'])): ?>
                        <ul data-aos="cascade-fade-in" class="mt-[20px] grid gap-[16px] lg:gap-[10px]">
                            <?php
                            foreach ($col_1['list'] as $item):
                                if (check($item['link'])):
                            ?>
                                    <li>
                                        <a href="<?= $item['link']['url'] ?>" target="<?= $item['link']['target'] ?>">
                                            <?= $item['link']['title'] ?>
                                        </a>
                                    </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div data-aos="cascade-fade-in" class="first-child-nomargin">
                    <?php
                    $col_2 = $footer_data['col_nav_2'];
                    ?>

                    <?php if (check($col_2['title'])): ?>
                        <div class="text-white/70 font-medium">
                            <?= $col_2['title'] ?>
                        </div>
                    <?php endif; ?>

                    <?php if (check($col_2['list'])): ?>
                        <ul data-aos="cascade-fade-in" class="mt-[20px] grid gap-[16px] lg:gap-[10px]">
                            <?php
                            foreach ($col_2['list'] as $item):
                                if (check($item['link'])):
                            ?>
                                    <li>
                                        <a href="<?= $item['link']['url'] ?>" target="<?= $item['link']['target'] ?>">
                                            <?= $item['link']['title'] ?>
                                        </a>
                                    </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div data-aos="cascade-fade-in" class="first-child-nomargin">
                    <?php
                    $col_3 = $footer_data['col_nav_3'];
                    ?>

                    <?php if (check($col_3['title'])): ?>
                        <div  class="text-white/70 font-medium">
                            <?= $col_3['title'] ?>
                        </div>
                    <?php endif; ?>

                    <?php if (check($col_3['contact_info'])): ?>
                        <div class="mt-[20px] whitespace-pre-line"><?= $col_3['contact_info'] ?></div>
                    <?php endif; ?>

                    <?php if (check($col_3['phones'])): ?>
                        <ul class="mt-[20px] h4 font-medium grid gap-[8px]">
                            <?php
                            foreach ($col_3['phones'] as $item):
                                if (check($item['link'])):
                            ?>
                                    <li>
                                        <a href="<?= $item['link']['url'] ?>" target="<?= $item['link']['target'] ?>">
                                            <?= $item['link']['title'] ?>
                                        </a>
                                    </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="grid">
                    <?php get_template_part(get_part_path('social'), null, [
                        'classes' => 'social--light md-max:ml-auto md:mr-auto xl-max:mt-auto xl:ml-auto xl:mr-0'
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="mt-[40px] lg:mt-[70px] text-xs text-white/40 flex items-center justify-between flex-wrap gap-x-[20px] gap-y-[10px]">
            <div class="">
                <?= $footer_data['copyright'] ?>
            </div>
            <?php if (check($footer_data['sub_navigation'])): ?>
                <ul class="flex items-center justify-between flex-wrap gap-x-[20px] gap-y-[10px]">
                    <?php
                    foreach ($footer_data['sub_navigation'] as $item):
                        if (check($item['link'])):
                    ?>
                            <li>
                                <a href="<?= $item['link']['url'] ?>" target="<?= $item['link']['target'] ?>">
                                    <?= $item['link']['title'] ?>
                                </a>
                            </li>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</footer>