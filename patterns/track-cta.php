<?php
/**
 * Title: Track & Events Plan Your Event
 * Slug: gedeon-sports/track-cta
 * Categories: gedeon-sports-sections
 * Keywords: cta, enquiry, event
 * Description: Closing CTA band — "Plan your event".
 *
 * @package Gedeon_Sports
 */

echo gedeon_sports_cta_band( // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
    'Plan your event',
    'Tell us the date, the guests and the kind of day you want.',
    array(
        array('Plan an event', gedeon_sports_url('contact')),
        array('Gedeon Exclusive', gedeon_sports_url('exclusive'), 'secondary'),
    )
);
