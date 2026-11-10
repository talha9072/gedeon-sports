<?php
/**
 * Title: Club Apply For Membership
 * Slug: gedeon-sports/club-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, membership, apply
 * Description: Closing CTA band — "Apply for membership".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Apply for membership',
    'Tell us about yourself and how you like to drive.',
    array(
        array('Apply for membership', gedeon_sports_url('contact')),
        array('Gedeon Exclusive', gedeon_sports_url('exclusive'), 'secondary'),
    ),
    false
);
