<?php
/**
 * Title: Concierge Arrange A Consultation
 * Slug: gedeon-sports/concierge-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, consultation
 * Description: Closing CTA band — "Arrange a consultation".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Arrange a consultation',
    'Tell us about your cars and how you use them.',
    array(
        array('Arrange a consultation', gedeon_sports_url('contact')),
        array('Gedeon Exclusive', gedeon_sports_url('exclusive'), 'secondary'),
    ),
    false
);
