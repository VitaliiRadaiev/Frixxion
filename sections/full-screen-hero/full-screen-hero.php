<?php
$image_desk_id = '';
$image_mob_id = '';
?>

<section class="full-scree-hero relative overflow-hidden bg-gradient-second rounded-b-[20px] relative">
    <img class="lg:hidden absolute left-[10%] bottom-[-110px] z-1 h-auto w-[740px] max-w-none" src="<?= get_template_directory_uri() . '/assets/images/general/light-md.webp' ?>" alt="">
    <img class="lg:hidden absolute right-[30%] bottom-[-100px] z-1 h-auto w-[400px] max-w-none" src="<?= get_template_directory_uri() . '/assets/images/general/light-sm.webp' ?>" alt="">

    <img class=" lg-max:hidden absolute z-1 top-0 right-0 h-full object-right-top object-cover" src="<?= get_template_directory_uri() . '/assets/images/temp/hero-img-1-desk.png' ?>" alt="">

    <div class="relative z-2 container pt-header-height min-h-dvh flex flex-col lg:justify-center">
        <div class="pt-[34px] lg:pt-[91px] lg:pb-[100px] first-child-no-margin lg:max-w-[522px] xl:max-w-[762px]">
            <div class="text-content text-lg text-color-dark-80 font-medium sm:text-center lg:text-start text-light-shadow">
                <h1>
                    <span class="text-gradient-first">Connect</span><br>
                    seamlessly worldwide
                </h1>
                <p>
                    Where networks meet, Frixxion leads the way!
                </p>
            </div>
            <div class="mt-[40px] lg:mt-[60px] buttons-group sm:justify-center lg:justify-start">
                <a href="#" class="btn btn--accent-first">
                    Get Started
                </a>
            </div>
        </div>
        <div class="lg:hidden mt-[40px] flex justify-center">
            <img class="max-h-[350px]" src="<?= get_template_directory_uri() . '/assets/images/temp/hero-img-1-mob.png' ?>" alt="">
        </div>
    </div>
    <div data-marquee class="absolute z-4 left-0 right-0 bottom-[20px] marquee flex overflow-hidden">
        <div data-marquee-container class="flex gap-[40px] md:gap-[50px]">
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-1.png' ?>" alt="">
            </a>
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-2.png' ?>" alt="">
            </a>
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-3.png' ?>" alt="">
            </a>
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-4.png' ?>" alt="">
            </a>
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-5.png' ?>" alt="">
            </a>
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-6.png' ?>" alt="">
            </a>
            <a href="#" class="h-[40px] md:h-[50px] flex items-center">
                <img class="max-h-full w-auto max-w-none" src="<?= get_template_directory_uri() . '/assets/images/temp/marquee-logo-7.png' ?>" alt="">
            </a>
        </div>
    </div>

    <div style="background: linear-gradient(180deg, rgba(81, 18, 18, 0) 0%, #511212 100%);" class=" sm-max:hidden absolute z-3 left-0 right-0 bottom-[-1px] h-[130px] opacity-30"></div>
</section>