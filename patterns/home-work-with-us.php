<?php
/**
 * Title: Home Work With Us
 * Slug: gedeon-sports/home-work-with-us
 * Categories: gedeon-sports-sections
 * Keywords: investors, brands, partnership
 * Description: "For investors and for brands" — the investor and brand panels side by side.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_investors = gedeon_sports_block_group(
    'gs-panel gs-panel--investors',
    gedeon_sports_block_group(
        'gs-panel__top',
        gedeon_sports_eyebrow('For investors')
        . gedeon_sports_block_h(3, 'gs-panel__title', 'Invest in an athlete<br> project or in the platform')
        . gedeon_sports_block_p('gs-panel__text', 'Hold shares in an individual athlete’s project company, starting with Vitocoza Ltd, or in Gedeon Sports as the platform grows. Full details are available to qualifying investors.')
        . gedeon_sports_list(array('Funding in four rounds, 2027 to 2030', 'Evidence required before each round opens', 'Quarterly investor reporting'))
    )
    . gedeon_sports_block_group(
        'gs-panel__bottom',
        gedeon_sports_buttons(
            'gs-panel__buttons',
            array(
                array('Investor overview', gedeon_sports_url('investors')),
                array('Request access', gedeon_sports_url('investor'), 'secondary'),
            )
        )
        . gedeon_sports_block_p('gs-panel__risk', 'Investment in a private company is high-risk and illiquid. Your capital is at risk.')
    )
);

$gedeon_sports_brands = gedeon_sports_block_group(
    'gs-panel gs-panel--brands',
    gedeon_sports_block_group(
        'gs-panel__top',
        gedeon_sports_eyebrow('For brands')
        . gedeon_sports_block_h(3, 'gs-panel__title', 'Partner with our athletes')
        . gedeon_sports_block_p('gs-panel__text', 'Sponsorship, brand campaigns, content series, licensed products, hospitality experiences and appearances, built around clear objectives.')
        . gedeon_sports_list(array('Principal, major, official and business club packages', 'Audience data and season reporting', 'Rights and deliverables agreed in writing'))
    )
    . gedeon_sports_block_group(
        'gs-panel__bottom',
        gedeon_sports_buttons('gs-panel__buttons', array(array('Partnership opportunities', gedeon_sports_url('partnerships'))))
    )
);

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Work with us',
    'For investors<br class="gs-br-m"> and for brands',
    'Investment and commercial partnership are handled as separate routes, each with its own team and terms.'
)
    . gedeon_sports_block_group('gs-grid gs-grid--2 gs-panels', $gedeon_sports_investors . $gedeon_sports_brands);

echo gedeon_sports_block_section('gs-work', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
