<?php
/**
 * Title: Home Speak To Us
 * Slug: gedeon-sports/home-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, contact, enquiry
 * Description: Closing CTA band — "Speak to us" with the Make an enquiry button.
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Speak to us',
    'Partnerships, athlete representation and general enquiries. Investors can request access to the investor area.',
    array(array('Make an enquiry', gedeon_sports_url('contact')))
);
