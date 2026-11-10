<?php
/**
 * Title: Exclusive Tell Us What You Have In Mind
 * Slug: gedeon-sports/exclusive-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, enquiry
 * Description: Closing CTA band — "Tell us what you have in mind".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Tell us what you<br class="gs-br"> have in mind',
    'Events, cars or club membership: one conversation covers all three.',
    array(
        array('Make an enquiry', gedeon_sports_url('contact')),
        array('Meet our athletes', gedeon_sports_url('athletes'), 'secondary'),
    )
);
