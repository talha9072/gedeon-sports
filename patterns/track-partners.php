<?php
/**
 * Title: Track & Events For Partners
 * Slug: gedeon-sports/track-partners
 * Categories: gedeon-sports-sections
 * Keywords: partners, partnership, hospitality
 * Description: "Add a track day to your partnership" — photo beside copy with a Partnerships link.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__aside gs-photo',
    gedeon_sports_block_image('gs-photo__image', gedeon_sports_img('track-partners.webp'), 'Guests at a trackside dinner overlooking the circuit at dusk')
    . gedeon_sports_tag('Concept', 'concept', 'gs-photo__tag')
)
    . gedeon_sports_block_group(
        'gs-split__copy',
        gedeon_sports_eyebrow('For partners', 'red')
        . gedeon_sports_block_h(2, 'gs-title', 'Add a track day to<br class="gs-br"> your partnership')
        . gedeon_sports_block_p('gs-split__lead', 'Partners of our athletes can add a track day or a hospitality weekend to their package, for clients, staff or competition winners.')
        . gedeon_sports_buttons('gs-impact__link', array(array('Partnerships', gedeon_sports_url('partnerships'), 'link')))
    );

echo gedeon_sports_block_section('gs-section--surface gs-split gs-impact gs-racing gs-split--media-left', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
