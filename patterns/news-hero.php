<?php
/**
 * Title: News Hero
 * Slug: gedeon-sports/news-hero
 * Categories: gedeon-sports-sections
 * Keywords: news, blog, hero
 * Description: Mark hero for the news page — "News and updates".
 * Inserter: no
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_mark( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'News',
    'News and updates',
    'Results, partnerships and announcements from Gedeon Sports and our athletes.',
    '',
    'gs-hero-mark--archive'
);
