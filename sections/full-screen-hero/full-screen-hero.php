<?php

if(!$data['section_utils']['section_hide']):
?>
<script>
    console.log( <?= json_encode($data); ?> );
</script>
<section <?= get_section_id($data) ?> class="full-scree-hero relative overflow-hidden bg-gradient-second rounded-b-[20px]">
    <img class="lg:hidden absolute left-[10%] bottom-[-110px] z-1 h-auto w-[740px] max-w-none" src="<?= get_template_directory_uri() . '/assets/images/general/light-md.webp' ?>" alt="">
    <img class="lg:hidden absolute right-[30%] bottom-[-100px] z-1 h-auto w-[400px] max-w-none" src="<?= get_template_directory_uri() . '/assets/images/general/light-sm.webp' ?>" alt="">

    <?php if(check($data['img_desk'])){
        get_image($data['img_desk'], 'lg-max:hidden absolute z-1 top-0 right-0 h-full w-auto max-w-none object-right-top object-cover');
    }?>

    <div class="relative z-2 container pt-header-height min-h-dvh flex flex-col lg:justify-center">
        <div class="mb-auto pt-[34px] lg:pt-[91px] lg:pb-[100px] first-child-no-margin lg:max-w-[522px] xl:max-w-[762px]">
            <div class="text-content text-lg text-color-dark-80 font-medium sm:text-center lg:text-start text-light-shadow">
                <?= $data['text_content'] ?>
            </div>
            <?php if(check($data['buttons'])):?>
                <div class="buttons-group">
                    <?php get_template_part(get_part_path('buttons-group'), null, [
                        'classes' => 'mt-[40px] lg:mt-[60px] sm:justify-center lg:justify-start',
                        'buttons' => $data['buttons']
                    ])?>
                </div>
            <?php endif;?>
        </div>
        <?php if(check($data['img_mob'])):?>
            <div class="lg:hidden mt-[40px] flex justify-center">
                <?php get_image($data['img_mob'], 'max-h-[350px] object-contain')?>
            </div> 
        <?php endif;?>
    </div>

    <?php if(check($data['partners'])):?>
        <div data-marquee class="absolute z-4 left-0 right-0 bottom-[20px] marquee flex overflow-hidden opacity-0 transition-opacity">
            <div data-marquee-container class="flex gap-[40px] md:gap-[50px] w-fit px-[20px] md:px-[]">
                <?php foreach($data['partners']  as $partner):?>
                    <a href="<?= $partner['url'] ?>" class="h-[40px] md:h-[50px] flex items-center">
                        <?php get_image($partner['logo'], 'max-h-full w-auto max-w-none')?>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    
        <div style="background: linear-gradient(180deg, rgba(81, 18, 18, 0) 0%, #511212 100%);" class=" sm-max:hidden absolute z-3 left-0 right-0 bottom-[-1px] h-[130px] opacity-30"></div>
    <?php endif;?>
</section>

<?php endif;?>