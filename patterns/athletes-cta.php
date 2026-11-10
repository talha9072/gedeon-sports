<?php
/**
 * Title: Our Athletes Partner CTA
 * Slug: gedeon-sports/athletes-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, partnership
 * Description: Closing CTA band — "Partner with our athletes".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Partner with our athletes',
    'Sponsorship, campaigns, content and appearances with Vito Ćoza for the 2027 season.',
    array(
        array('Partnership enquiry', gedeon_sports_url('contact')),
        array('See packages', gedeon_sports_url('partnerships'), 'secondary'),
    ),
    false
);
