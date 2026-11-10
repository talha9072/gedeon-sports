<?php
/**
 * Title: Concierge Hero
 * Slug: gedeon-sports/concierge-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, concierge, car care
 * Description: Image hero — "Your cars, looked after" over a covered supercar in a private garage.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_image( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Gedeon Concierge',
    'Your cars, looked after',
    'Gedeon Concierge manages everything around owning a supercar, through one point of contact and a network of approved specialists. You drive; we handle the rest.',
    array(
        array('Arrange a consultation', gedeon_sports_url('contact')),
        array('See services', '#services', 'secondary'),
    ),
    'concierge-hero.webp',
    'A covered supercar in a private garage at night',
    'gs-hero--short'
);
