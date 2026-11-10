<?php
/**
 * Title: Exclusive Closer To The Racing
 * Slug: gedeon-sports/exclusive-racing
 * Categories: gedeon-sports-sections
 * Keywords: athletes, paddock, hospitality
 * Description: "Closer to the racing" copy beside the paddock photo.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Our athletes', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Closer to the racing')
    . gedeon_sports_block_p('gs-split__lead', 'Exclusive clients follow our athletes’ seasons, with paddock visits at selected race weekends. Partners can add a track day or a hospitality weekend to their partnership.')
    . gedeon_sports_buttons('gs-impact__link', array(array('Partnerships', gedeon_sports_url('partnerships'), 'link')))
)
    . gedeon_sports_block_group(
        'gs-split__aside gs-photo',
        gedeon_sports_block_image('gs-photo__image', gedeon_sports_img('closer-racing.webp'), 'Guests watching a race car in the pit garage at sunset')
        . gedeon_sports_tag('Concept', 'concept', 'gs-photo__tag')
    );

echo gedeon_sports_block_section('gs-section--surface gs-split gs-impact gs-racing', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
