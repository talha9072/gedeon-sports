<?php
/**
 * Title: Thank You Notice
 * Slug: gedeon-sports/notice-thank-you
 * Categories: gedeon-sports-sections
 * Keywords: thank you, enquiry received
 * Description: Full-screen "Thank you" message shown after a form is sent.
 * Inserter: no
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_notice( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Enquiry received',
    'Thank you',
    'A member of the Gedeon Sports team will review your message and contact you shortly.'
);
