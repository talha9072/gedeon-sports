<?php
/**
 * Title: Partnerships Start A Conversation
 * Slug: gedeon-sports/partnerships-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, partnership
 * Description: Closing CTA band — "Start a partnership conversation".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Start a partnership<br> conversation',
    'Tell us about your brand and what you want to achieve.',
    array(
        array('Partnership enquiry', gedeon_sports_url('contact')),
        array('Meet our athletes', gedeon_sports_url('athletes'), 'secondary'),
    )
);
