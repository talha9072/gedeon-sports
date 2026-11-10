<?php
/**
 * Title: Investor Area Hero
 * Slug: gedeon-sports/investor-area-hero
 * Categories: gedeon-sports-sections
 * Keywords: hero, investor area, access
 * Description: "Investor access" page hero with the faded mark, followed by the locked status bar.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_hero_mark( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Investor area',
    'Investor access',
    'The full funding plan for Vitocoza Ltd and the Gedeon Sports platform is available to qualifying investors once access is approved.',
    '',
    'gs-hero-mark--area'
);

echo gedeon_sports_block_group( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'gs-status-bar',
    gedeon_sports_block_group('gs-container', gedeon_sports_block_p('gs-status', 'Status: <strong>Locked until access is approved</strong>')),
    'div',
    array('align' => 'full')
);
