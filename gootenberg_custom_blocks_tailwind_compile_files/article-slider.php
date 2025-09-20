   <div data-slider="article-slider text-center text-end text-start" class="article-slider">
      <div class="swiper rounded-[10px] [&_img]:rounded-[10px] [&_img]:w-full [&_img]:aspect-[1/0.758] md:[&_img]:aspect-[1/0.4677]">
         <div class="swiper-wrapper">
            <div class="swiper-slide !h-auto">
               <img class="object-cover" src="<?= get_template_directory_uri() . '/assets/images/temp/image 11.jpg' ?>" alt="">
            </div>
         </div>
      </div>
      <div class="mt-[20px] md:mt-[30px] flex items-center justify-center [&:has(.swiper-pagination-lock)]:hidden text-color-dark">
         <div class="flex items-center gap-[40px]">
            <button type="button" class="swiper-button-disabled nav-btn prev h-[53px] w-[53px] border border-color-accent-first rounded-full text-[21px] bg-color-accent-first flex items-center justify-center cursor-pointer transition-colors hover:bg-color-accent-second hover:border-color-accent-second [&:not(.swiper-button-disabled)]:text-white [&.swiper-button-disabled]:bg-transparent [&.swiper-button-disabled]:pointer-events-none">
               <span class="icon-arrow-left-bold"></span>
            </button>
            <div class="slider-bullets-dots"></div>
            <button type="button" class="nav-btn next h-[53px] w-[53px] border border-color-accent-first rounded-full text-[21px] bg-color-accent-first flex items-center justify-center cursor-pointer transition-colors hover:bg-color-accent-second hover:border-color-accent-second [&:not(.swiper-button-disabled)]:text-white [&.swiper-button-disabled]:bg-transparent [&.swiper-button-disabled]:pointer-events-none">
               <span class="icon-arrow-right-bold"></span>
            </button>
         </div>
      </div>
   </div>