<?php
/**
 * Title: About Hero
 * Slug: gedeon-sports/about-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, about, contact
 * Description: Mark hero — "We build the business athletes need" with a Get in touch button.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_mark( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'About &amp; Contact',
    'We build the business<br class="gs-br"> athletes need',
    'Talented athletes rarely fail for lack of ability. They stall when the funding, contracts and commercial support around them fall short. Gedeon Sports builds that business: a dedicated company for each athlete, sponsors and partners to fund it, and specialist sporting partners to deliver it, taking athletes from national competition to the international stage.',
    '',
    'gs-hero-mark--about',
    gedeon_sports_buttons('gs-hero-mark__buttons', array(array('Get in touch', '#contact')))
);
