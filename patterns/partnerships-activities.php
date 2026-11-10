<?php
/**
 * Title: Partnerships Activities
 * Slug: gedeon-sports/partnerships-activities
 * Categories: gedeon-sports-sections
 * Keywords: activities, sponsorship, campaigns, content
 * Description: "Partnership activities" — seven activity cards and the "Sectors that fit" card.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_image('vito-paddock.webp', 'Vito Ćoza in the paddock', 'Sponsorship', 'Season or programme sponsorship of an athlete or the portfolio.')
    . gedeon_sports_card_image('', 'Campaigns', 'Brand campaigns', 'Endorsements and ambassador campaigns featuring our athletes.')
    . gedeon_sports_card_image('', 'Events', 'Appearances &amp; events', 'Athlete appearances at brand, client and staff events.')
    . gedeon_sports_card_image('', 'Content', 'Content collaborations', 'Social, video and editorial content, including a season-long series following Vito.')
    . gedeon_sports_card_image('licensed-products.webp', 'Concept Gedeon Sports cap, jacket and model car', 'Licensed products', 'Apparel and products, beginning with a youth apparel range.', true)
    . gedeon_sports_card_image('approach-vito-flag.webp', 'Vito Ćoza with the Croatian flag', 'Croatia campaigns', 'Tourism and place-based campaigns built around a Croatian athlete competing internationally.')
    . gedeon_sports_card_image('', 'Experiences', 'Experiences', 'Fan, client and hospitality experiences at race weekends.')
    . gedeon_sports_block_group(
        'gs-card gs-card--sectors',
        gedeon_sports_block_h(3, 'gs-card__title', 'Sectors that fit')
        . gedeon_sports_block_p('gs-card__text', 'Lifestyle, drinks, delivery, tourism and youth apparel. We announce partners together, once agreements are signed.')
    );

$gedeon_sports_inner = gedeon_sports_section_heading('Ways to work together', 'Partnership activities', 'Commercial value well beyond the race suit.')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-activities', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-section--surface gs-activities-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
