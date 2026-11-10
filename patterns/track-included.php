<?php
/**
 * Title: Track & Events What's Included
 * Slug: gedeon-sports/track-included
 * Categories: gedeon-sports-sections
 * Keywords: included, venue, instructors, hospitality
 * Description: "Everything arranged" — two-column check list beside the garage photo.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('What’s included', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Everything arranged')
    . gedeon_sports_block_p('gs-split__lead', 'One event manager plans and runs the day with you, from the first call to the final lap.')
    . gedeon_sports_list(
        array(
            'Circuit or venue hire',
            'Supercars, or bring your<br class="gs-br"> own',
            'Professional instructors and driver briefings',
            'Safety, marshals, medical cover and insurance',
            'Hospitality and catering',
            'Photography and film',
            'Transport and accommodation for guests',
        ),
        'gs-list--check gs-included'
    )
)
    . gedeon_sports_block_group(
        'gs-split__aside gs-photo',
        gedeon_sports_block_image('gs-photo__image', gedeon_sports_img('track-arranged.webp'), 'Event team and guests in a pit garage beside a supercar at sunset')
        . gedeon_sports_tag('Concept', 'concept', 'gs-photo__tag')
    );

echo gedeon_sports_block_section('gs-section--surface gs-split gs-impact gs-included-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
