<?php
/**
 * Title: Our Approach Hero
 * Slug: gedeon-sports/approach-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, approach
 * Description: Split page hero — "Every step funded, reviewed and earned" beside Vito with the Croatian flag.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_split( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Our approach',
    'Every step<br class="gs-br"> funded, reviewed<br class="gs-br"> and earned',
    'We run each athlete’s career as a business. A dedicated project company holds the contracts and the budget, specialist partners deliver the sport, and every season is reviewed against agreed evidence before the next is committed.',
    'approach-vito-flag.webp',
    'Vito Ćoza holding the Croatian flag at the track'
);
