<?php
/**
 * Title: Concierge Discretion
 * Slug: gedeon-sports/concierge-discretion
 * Categories: gedeon-sports-sections
 * Keywords: discretion, privacy
 * Description: "Discreet by design" — copy beside the night-time transporter photo.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Discretion', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Discreet by design')
    . gedeon_sports_block_p('gs-split__lead', 'Your cars, schedule and locations stay private. Only the people handling a job see its details, and every movement is logged and reported to you.')
)
    . gedeon_sports_block_group(
        'gs-split__aside gs-photo',
        gedeon_sports_block_image('gs-photo__image', gedeon_sports_img('concierge-discretion.webp'), 'A supercar being loaded into an enclosed transporter at night')
        . gedeon_sports_tag('Concept', 'concept', 'gs-photo__tag')
    );

echo gedeon_sports_block_section('gs-split gs-racing gs-discretion', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
