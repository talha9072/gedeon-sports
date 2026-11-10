<?php
/**
 * Title: Our Athletes Hero
 * Slug: gedeon-sports/athletes-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, athletes
 * Description: Page hero with the faded Gedeon Sports mark — "Proven talent, with a business behind it".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_mark( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Our athletes',
    'Proven talent, with<br> a business behind it',
    'Every athlete on the platform has an individual plan for their sport, their career and their commercial profile. Vito Ćoza, three-time CEZ karting champion, is the first. From 2029 the portfolio grows into further sports.'
);
