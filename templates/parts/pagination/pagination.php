<?php

$pagination_links = $args['pagination_links'] ?? [];
$page = $args['page'] ?? 1;
$max_num_pages = $args['max_num_pages'] ?? 1;
$base_url = $args['base_url'] ?? '';

if (check($pagination_links)):
?>
    <nav aria-label="Posts pagination" class="pagination flex sm-max:flex-wrap items-center justify-center gap-x-[40px] gap-y-[20px] text-color-dark">
        <a href="<?= esc_url($base_url . (max(1, $page - 1) !== 1 ? 'page/' . max(1, $page - 1) . '/' : '')); ?>" class="prev <?= $page == 1 ? 'disabled' : ''; ?> [&.disabled]:opacity-20 icon-arrow-left-bold h-[44px] flex items-center justify-center text-dark-primary text-[20px] transition-colors hover:bg-dark-primary-60 hover:text-light-primary sm-max:order-1"></a>

        <div class="pagination-links flex justify-center gap-[10px] sm-max:w-full">
            <?php
            if ($pagination_links) {
                foreach ($pagination_links as $link) {
                    $cleand_link = preg_replace('/(href="[^"]+?)\?[^"]*"/', '$1"', $link);
                    $link = preg_replace('#(href="[^"]*?)/page/1(/(?=\?)|/")#', '$1$2', $cleand_link);
                    echo $link;
                }
            }
            ?>
        </div>

        <a href="<?= esc_url($base_url . 'page/' . min($max_num_pages, $page + 1) . '/'); ?>" class="next <?= $page == $max_num_pages ? 'disabled' : ''; ?> [&.disabled]:opacity-20 icon-arrow-right-bold h-[44px] flex items-center justify-center text-dark-primary text-[20px] transition-colors hover:bg-dark-primary-60 hover:text-light-primary sm-max:order-1"></a>
    </nav>
<?php
endif;
?>