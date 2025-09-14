<?php
$popup_succsess = get_field('popup_succsess', 'options');
$popup_unsuccsess = get_field('popup_unsuccsess', 'options');
?>
<div class="popup" id="popup-form">
    <div class="popup__body [&>.loader]:inset-0">
        <div class="popup__content w-full max-w-[483px] relative">
            <button data-action="close-popup" class="absolute z-4 top-[20px] right-[20px] text-[24px] text-black cursor-pointer hover:text-black/70">
                <span class="icon-x-mark"></span>
            </button>
            <div data-popup-form-container class="rounded-[10px] bg-color-dark-20 pt-[40px] px-[16px] lg:p-[40px] first-child-no-margin [&_.form-title]:text-center [&_.wpcf7-not-valid-tip]:text-color-error">
                 <?php echo do_shortcode('[contact-form-7 id="1622eb5" title="Leave a request"]'); ?> 
            </div>
        </div>
    </div>
</div>

<div class="popup " id="popup-success">
    <div class="popup__body">
        <div class="popup__content w-full max-w-[365px] relative">
            <button data-action="close-popup" class="absolute z-4 top-[20px] right-[20px] text-[24px] text-black cursor-pointer hover:text-black/70">
                <span class="icon-x-mark"></span>
            </button>
            <div class="rounded-[10px] bg-color-dark-20 pt-[40px] px-[20px] lg:px-[40px] pb-[40px] text-center first-child-no-margin">
                <?php if (check($popup_succsess['icon'])) {
                    get_image($popup_succsess['icon'], 'h-[80px] w-auto object-contain inline-block');
                } ?>

                <div class="mt-[40px] first-no-margin">
                    <?php if (check($popup_succsess['title'])): ?>
                        <div class="h3 text-black !font-bold text-gradient-first">
                            <?= $popup_succsess['title'] ?>
                        </div>
                    <?php endif; ?>
                    <?php if (check($popup_succsess['text'])): ?>
                        <div class="mt-[10px] text-md first-no-margin text-color-dark-80">
                            <?= $popup_succsess['text'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-unsuccess">
    <div class="popup__body">
        <div class="popup__content w-full max-w-[365px] relative">
            <button data-action="close-popup" class="absolute z-4 top-[20px] right-[20px] text-[24px] text-black cursor-pointer hover:text-black/70">
                <span class="icon-x-mark"></span>
            </button>
            <div class="rounded-[10px] bg-color-dark-20 pt-[40px] px-[20px] lg:px-[40px] pb-[40px] text-center first-child-no-margin">
                <?php if (check($popup_unsuccsess['icon'])) {
                    get_image($popup_unsuccsess['icon'], 'h-[80px] w-auto object-contain inline-block');
                } ?>

                <div class="mt-[40px] first-no-margin">
                    <?php if (check($popup_unsuccsess['title'])): ?>
                        <div class="h3 text-black !font-bold text-gradient-first">
                            <?= $popup_unsuccsess['title'] ?>
                        </div>
                    <?php endif; ?>
                    <?php if (check($popup_unsuccsess['text'])): ?>
                        <div class="mt-[10px] text-md first-no-margin text-color-dark-80">
                            <?= $popup_unsuccsess['text'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>