<?php
/**
 * Title: Investors Request Access
 * Slug: gedeon-sports/investors-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, investor access
 * Description: Closing CTA band — "Request investor access".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Request investor<br class="gs-br-m"> access',
    'Qualifying investors receive the full funding plan, ownership structure, roadmap, scenarios and documents.',
    array(array('Request access', gedeon_sports_url('investor')))
);
