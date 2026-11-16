<?php
/**
 * Title: Exclusive Hero
 * Slug: gedeon-sports/exclusive-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, exclusive, motorsport
 * Description: Image hero — "Motorsport, privately arranged" over the concept supercar in the pit lane.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_image( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Gedeon Exclusive',
    'Motorsport,<br> privately arranged',
    'Gedeon Exclusive brings the Gedeon Sports team and its specialist partners to private clients and companies. We plan supercar days and events, look after your cars, and run a members’ club with its own season, across the UK, Croatia and Monaco.',
    array(
        array('Make an enquiry', gedeon_sports_url('contact')),
        array('Explore the services', '#services', 'secondary'),
    ),
    'exclusive-hero.webp',
    'Concept supercar outside the pit garages at dusk'
);
