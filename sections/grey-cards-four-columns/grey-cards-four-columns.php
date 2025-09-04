<?php

$list = [
    [
        'icon_id' => 58,
        'title' => 'Promotional SMS',
        'text' => 'Use promotional SMS messages to engage with customers at every stage of their journey'
    ],
    [
        'icon_id' => 58,
        'title' => 'Promotional SMS',
        'text' => 'Use promotional SMS messages to engage with customers at every stage of their journey'
    ],
];
?>

<section class="grey-cards-four-columns section-space-top">
    <div class="container">
        <div class="section-head text-center text-content text-md text-color-dark-80 max-w-[762px] mx-auto w-full">
            <h2 class="h2">
                Features
            </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis rerum, exercitationem iure omnis corporis perferendis!</p>
        </div>

        <div class="mt-[30px] lg:mt-[50px] grid gap-[10px] md:gap-[20px] md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md-and-lg-max:[&>*:last-child:nth-child(odd)]:col-span-2">
            <?php
            foreach ($list as $item) {
                get_template_part(get_part_path('grey-card-with-icon'), null, $item);
            }
            ?>
        </div>
        <div class="mt-[30px] lg:mt-[50px] buttons-group sm:justify-center">
            <a href="#" class="btn btn--light">
                More details
            </a>
        </div>
    </div>
</section>