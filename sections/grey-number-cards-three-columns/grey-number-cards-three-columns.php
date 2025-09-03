<?php

$list = [
    [
        'title' => 'Choose Your Channel',
        'text' => 'Select SMS, Email, or WhatsApp — or combine them. Frixxion supports multichannel messaging right from the start'
    ],
    [
        'title' => 'Connect with API or No-Code Tools',
        'text' => 'Use our developer-friendly API or launch messaging with no-code dashboards. Full SDKs available for any stack'
    ],
    [
        'title' => 'Choose Your Channel',
        'text' => 'Select SMS, Email, or WhatsApp — or combine them. Frixxion supports multichannel messaging right from the start'
    ],
    [
        'title' => 'Connect with API or No-Code Tools',
        'text' => 'Use our developer-friendly API or launch messaging with no-code dashboards. Full SDKs available for any stack'
    ],
    [
        'title' => 'Choose Your Channel',
        'text' => 'Select SMS, Email, or WhatsApp — or combine them. Frixxion supports multichannel messaging right from the start'
    ],
    [
        'title' => 'Connect with API or No-Code Tools',
        'text' => 'Use our developer-friendly API or launch messaging with no-code dashboards. Full SDKs available for any stack'
    ],
    [
        'title' => 'Choose Your Channel',
        'text' => 'Select SMS, Email, or WhatsApp — or combine them. Frixxion supports multichannel messaging right from the start'
    ],
    [
        'title' => 'Connect with API or No-Code Tools',
        'text' => 'Use our developer-friendly API or launch messaging with no-code dashboards. Full SDKs available for any stack'
    ],
    [
        'title' => 'Choose Your Channel',
        'text' => 'Select SMS, Email, or WhatsApp — or combine them. Frixxion supports multichannel messaging right from the start'
    ],
    [
        'title' => 'Connect with API or No-Code Tools',
        'text' => 'Use our developer-friendly API or launch messaging with no-code dashboards. Full SDKs available for any stack'
    ],
];
?>

<section class="grey-number-cards-three-columns section-space-top">
    <div class="container">
        <div class="section-head text-center text-content text-md text-color-dark-80 max-w-[762px] mx-auto w-full">
            <h2 class="h2">
                Our <span class="text-gradient-first">services</span>
            </h2>
        </div>

        <div class="cards-list mt-[30px] lg:mt-[50px] grid gap-[10px] md:gap-[20px] md:grid-cols-2 lg:grid-cols-3">
            <?php
            foreach ($list as $key => $item) {
                get_template_part(get_part_path('grey-card-with-number'), null, [
                    'num' => '0'.($key + 1),
                    'title' => $item['title'],
                    'text' => $item['text'],
                ]);
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