<?php 
$classes = $args['classes'] ?? '';
?>
<div data-aos="fade-in" data-aos-delay="1000" class="<?= $classes ?> inline-flex items-center gap-[20px] [&:has(.swiper-pagination-lock)]:hidden">
    <button type="button" class="swiper-button-disabled nav-btn prev h-[53px] w-[53px] border border-color-accent-first rounded-full text-[21px] bg-color-accent-first flex items-center justify-center cursor-pointer transition-colors hover:bg-color-accent-second hover:border-color-accent-second [&:not(.swiper-button-disabled)]:text-white [&.swiper-button-disabled]:bg-transparent [&.swiper-button-disabled]:pointer-events-none">
        <span class="icon-arrow-left-bold"></span>
    </button>
    <button type="button" class="nav-btn next h-[53px] w-[53px] border border-color-accent-first rounded-full text-[21px] bg-color-accent-first flex items-center justify-center cursor-pointer transition-colors hover:bg-color-accent-second hover:border-color-accent-second [&:not(.swiper-button-disabled)]:text-white [&.swiper-button-disabled]:bg-transparent [&.swiper-button-disabled]:pointer-events-none">
        <span class="icon-arrow-right-bold"></span>
    </button>
</div>