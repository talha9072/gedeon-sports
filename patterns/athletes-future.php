<?php
/**
 * Title: Our Athletes Future
 * Slug: gedeon-sports/athletes-future
 * Categories: gedeon-sports-sections
 * Keywords: future, criteria, selection
 * Description: "How the portfolio grows" beside the four "What we look for" criteria.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_criteria = gedeon_sports_card_text('Performance', 'Results at national or international level, and a clear route to the next one.')
    . gedeon_sports_card_text('Welfare', 'A family and schedule that put wellbeing and education first.')
    . gedeon_sports_card_text('Partner appeal', 'A profile and audience that brands want to work with.')
    . gedeon_sports_card_text('Fundable pathway', 'A programme with a realistic budget and funding plan.');

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Future athletes', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'How the<br class="gs-br"> portfolio grows')
    . gedeon_sports_block_p('gs-split__lead', 'From 2029 Gedeon Sports adds athletes beyond Formula racing: two in 2029, four in 2030 and six in 2031.')
    . gedeon_sports_block_p('gs-split__text', 'Each athlete has a separate company, rights agreement and budget. Expansion follows Vito’s progress and the capacity of the team, and is funded separately from his programme.')
)
    . gedeon_sports_block_group(
        'gs-split__aside',
        gedeon_sports_block_h(3, 'gs-split__title', 'What we look for')
        . gedeon_sports_block_group('gs-grid gs-grid--2 gs-criteria', $gedeon_sports_criteria)
        . gedeon_sports_buttons('gs-split__button', array(array('Athlete representation enquiry', gedeon_sports_url('contact'), 'secondary')))
    );

echo gedeon_sports_block_section('gs-split gs-future', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
