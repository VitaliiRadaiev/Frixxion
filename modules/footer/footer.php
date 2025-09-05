<footer class="footer section-space-top bg-color-dark rounded-t-[20px] pt-[60px] pb-[30px] text-color-light">
    <div class="container [&_a]:transition-colors hover:[&_a]:text-color-accent-first">
        <div class="lg:grid lg:grid-cols-[1fr_67.5%] lg:gap-[100px]">
            <div class="lg:flex lg:flex-col">
                <?php if (is_front_page()): ?>
                    <div class="xl:mb-auto">
                        <?php get_image(128, 'h-[51px] w-auto') ?>
                    </div>
                <?php else: ?>
                    <a href="<?= get_home_url() ?>" class="block xl:mb-auto" aria-label="Main logo, link to home">
                        <?php get_image(128, 'h-[51px] w-auto') ?>
                    </a>
                <?php endif; ?>
                <div class="mt-[35px] text-white/50 text-sm lg:max-w-[244px]">
                    We are a trusted SMS wholesale provider, offering high-quality global messaging through direct operator connections and 0-hop routes.
                </div>
            </div>
            <div class="mt-[40px] lg:mt-0 grid grid-cols-2 xl:grid-cols-4 gap-x-[20px] lg:gap-x-[50px] gap-y-[40px]">
                <div class="">
                    <div class="text-white/70 font-medium">
                        Services
                    </div>
                    <ul class="mt-[20px] grid gap-[16px] lg:gap-[10px]">
                        <li>
                            <a href="#" class="">
                                Promotional SMS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS 2FA
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                Transactional SMS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS reminders
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS notifications
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS marketing
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <div class="text-white/70 font-medium">
                        Services
                    </div>
                    <ul class="mt-[20px] grid gap-[16px] lg:gap-[10px]">
                        <li>
                            <a href="#" class="">
                                Promotional SMS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS 2FA
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                Transactional SMS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS reminders
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS notifications
                            </a>
                        </li>
                        <li>
                            <a href="#" class="">
                                SMS marketing
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <div class="text-white/70 font-medium">
                        Contact
                    </div>
                    <div class="mt-[20px]">
                        Frixxion bv<br>
                        BTW: BE 1007.660.843
                        <br>
                        <br>
                        Kattendansstraat 52<br>
                        3500 Hasselt<br>
                        Belgium
                    </div>

                    <ul class="mt-[20px] h4 font-medium grid gap-[8px]">
                        <li>
                            <a href="tel:32495590499">+32 495 590499</a>
                        </li>
                    </ul>
                </div>
                <div class="grid">
                    <?php get_template_part(get_part_path('social'), null, [
                        'classes' => 'social--light md-max:ml-auto md:mr-auto xl-max:mt-auto xl:ml-auto xl:mr-0'
                    ])?>
                </div>
            </div>
        </div>
        <div class="mt-[40px] lg:mt-[70px] text-xs text-white/40 flex items-center justify-between flex-wrap gap-x-[20px] gap-y-[10px]">
            <div class="">
                © 2025 frixxion
            </div>
            <ul class="flex items-center justify-between flex-wrap gap-x-[20px] gap-y-[10px]">
                <li>
                    <a href="#">Privacy Policy</a>
                </li>
                <li>
                    <a href="#">Terms of Service</a>
                </li>
            </ul>
        </div>
    </div>
</footer>