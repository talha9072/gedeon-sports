<?php
/**
 * Title: Track & Events Hero
 * Slug: gedeon-sports/track-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, track days, events, supercars
 * Description: Image hero — "Supercar days, planned to the last detail" over supercars on a wet circuit.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_image( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Gedeon Track &amp; Events',
    'Supercar days,<br> planned to<br> the last detail',
    'Corporate track days, client hospitality, launches and supercar tours. We find the venue, provide the cars and instructors, and run the day, so you and your guests only have to drive.',
    array(
        array('Plan an event', gedeon_sports_url('contact')),
        array('See formats', '#formats', 'secondary'),
    ),
    'track-hero.webp',
    'Supercars lined up on a wet circuit at sunset'
);
