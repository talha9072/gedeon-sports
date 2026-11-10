<?php
/**
 * Title: Investors Hero
 * Slug: gedeon-sports/investors-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, investors
 * Description: Page hero with the faded mark and the amber "Important" notice — "Invest in the business behind the talent".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_mark( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Investors',
    'Invest in the<br class="gs-br"> business behind<br class="gs-br"> the talent',
    'Gedeon Sports builds commercial value around athletes’ careers. Investors take part in one of two ways: in an individual athlete’s project company, starting with Vitocoza Ltd, or in Gedeon Sports as the platform grows.',
    gedeon_sports_warning('Important', 'This page describes our business. It is not an offer to sell, or a solicitation to buy, shares. Details of any investment opportunity are available only to qualifying investors through the investor area.', 'gs-hero-mark__notice'),
    'gs-hero-mark--investors',
    gedeon_sports_buttons(
        'gs-hero-mark__buttons',
        array(
            array('Request investor access', gedeon_sports_url('investor')),
            array('Two ways to invest', '#two-ways', 'secondary'),
        )
    )
);
