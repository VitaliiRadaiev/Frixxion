<section class="two-columns-two-rows has-dark-bg section-space-top relative rounded-[20px] py-[60px] lg:py-[100px] overflow-hidden">
    <?php get_template_part(get_part_path('dark-bg')) ?>

    <div class="container relative z-2">
        <div class="section-head text-center text-content text-md text-color-dark-80 max-w-[762px] mx-auto w-full text-content-white">
            <h2 class="h2">
                Features
            </h2>
        </div>

        <div class="mt-[30px] lg:mt-[50px] grid gap-[40px] lg:gap-[60px]">
            <div class="grid gap-[30px] lg:gap-[50px] lg:grid-cols-2">
                <div class="lg:order-2 relative overflow-hidden rounded-[10px] aspect-[1/0.7] sm:aspect-[1/0.54] lg:aspect-auto lg:min-h-[320px] bg-gradient-second">
                    <img class="ibg" src="<?= get_template_directory_uri() . '/assets/images/temp/image-1.jpg' ?>" alt="">
                </div>
                <div class="lg:order-1 first-child-no-margin lg:py-[75px] self-center">
                    <div class="text-content text-content-white text-md text-white/80 lg:max-w-[590px] 4xl:max-w-[690px]">
                        <h3>Reach Your Users. Instantly. Anywhere.</h3>
                        <p>
                            <strong>
                                Send OTP codes, marketing campaigns, and real-time notifications with higher delivery rates — no app required.
                            </strong>
                        </p>
                        <p>
                            Via our trusted global network and simple REST API, you can connect directly from your platform and deliver SMS to any phone — no matter where it is, with no downloads, no delays — just reliable, communication your users will actually see.
                        </p>
                        <p>
                            <a href="#" class="link">
                                Learn more
                            </a>
                        </p>
                    </div>
                    <div class="mt-[30px] lg:mt-[40px] buttons-group">
                        <a href="#" class="btn btn--accent-first">
                            Try for free
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid gap-[30px] lg:gap-[50px] lg:grid-cols-2 bg-color-light rounded-[10px] p-[10px] md:p-[30px] lg:p-[10px]">
                <div class="relative overflow-hidden rounded-[10px] aspect-[1/0.75] sm:aspect-[1/0.54] lg:aspect-auto lg:min-h-[320px] bg-gradient-second">
                    <img class="ibg" src="<?= get_template_directory_uri() . '/assets/images/temp/image-1.jpg' ?>" alt="">
                </div>
                <div class="lg-max:px-[10px] lg-max:pb-[10px] lg:py-[80px] lg:pr-[35px] lg:self-center">
                    <div class="text-content text-color-dark-80 lg:max-w-[590px] 4xl:max-w-[690px]">
                        <h2>
                            Ready to start messaging smarter?
                        </h2>
                        <p>
                            <strong>
                                Frixxion helps you deliver SMS, Email, and WhatsApp messages globally — fast, reliably, and at scale.
                            </strong>
                        </p>
                        <p>
                            Get started in minutes with full API access and clear documentation.
                        </p>
                    </div>
                    <div class="mt-[30px] lg:mt-[40px] buttons-group">
                        <a href="#" class="btn btn--dark">
                            Try for free
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>