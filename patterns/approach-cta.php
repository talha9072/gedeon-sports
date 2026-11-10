<?php
/**
 * Title: Our Approach Meet Our Athletes
 * Slug: gedeon-sports/approach-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, athletes
 * Description: Closing CTA band — "Meet our athletes".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Meet our athletes',
    'See where each athlete is in their programme.',
    array(
        array('Our athletes', gedeon_sports_url('athletes')),
        array('Athlete representation enquiry', gedeon_sports_url('contact'), 'secondary'),
    )
);
