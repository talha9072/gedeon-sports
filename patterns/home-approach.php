<?php
/**
 * Title: Home Our Approach
 * Slug: gedeon-sports/home-approach
 * Categories: gedeon-sports-sections
 * Keywords: approach, timeline, steps
 * Description: "Progress is earned at every gate" with the five-step timeline from capital to revenue.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = array(
    array('Capital', 'Investors, Gedeon Holding and sponsors'),
    array('Programme', 'Delivered with specialist sporting partners'),
    array('Progression', 'Reviewed at each stage gate'),
    array('Commercial value', 'Partners, audience and content'),
    array('Revenue', 'Sponsorship, licensing, fees and rights'),
);

$gedeon_sports_items = '';
foreach ($gedeon_sports_steps as $gedeon_sports_i => [$gedeon_sports_title, $gedeon_sports_text]) {
    $gedeon_sports_items .= gedeon_sports_block_group(
        'gs-step' . (count($gedeon_sports_steps) - 1 === $gedeon_sports_i ? ' is-final' : ''),
        gedeon_sports_block_p('gs-step__number', sprintf('%02d', $gedeon_sports_i + 1))
        . gedeon_sports_block_rule('gs-step__track')
        . gedeon_sports_block_h(3, 'gs-step__title', $gedeon_sports_title)
        . gedeon_sports_block_p('gs-step__text', $gedeon_sports_text)
    );
}

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Our approach',
    'Progress is earned<br class="gs-br-m"> at every gate',
    'Each season is reviewed against agreed evidence. The next step is committed when<br class="gs-br"> the athlete is ready and the budget is funded.'
)
    . gedeon_sports_block_group('gs-steps', $gedeon_sports_items)
    . gedeon_sports_block_p('gs-note', 'Partner income is reinvested in the athlete’s programme.')
    . gedeon_sports_buttons('gs-approach__link', array(array('How we work', gedeon_sports_url('approach'), 'link')));

echo gedeon_sports_block_section('gs-section--surface gs-approach', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
