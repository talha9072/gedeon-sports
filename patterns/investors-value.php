<?php
/**
 * Title: Investors How Value Is Created
 * Slug: gedeon-sports/investors-value
 * Categories: gedeon-sports-sections
 * Keywords: value, timeline, revenue
 * Description: "From capital to revenue" — the five-step value timeline.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = array(
    array('Capital', 'Funds each athlete’s season budget'),
    array('Programme', 'Coaching, testing and racing with specialist partners'),
    array('Progression', 'Reviewed at <a href="' . esc_url(gedeon_sports_url('approach')) . '#stage-gates">stage gates →</a>'),
    array('Commercial value', 'A growing profile attracts <a href="' . esc_url(gedeon_sports_url('partnerships')) . '">partners →</a>'),
    array('Revenue', 'Earned under contracted rights'),
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

$gedeon_sports_inner = gedeon_sports_section_heading('How value is created', 'From capital to revenue')
    . gedeon_sports_block_group('gs-steps', $gedeon_sports_items)
    . gedeon_sports_block_p('gs-note', 'Racing builds the athlete’s profile. Commercial projects turn it into income, and that income funds the programme.');

echo gedeon_sports_block_section('gs-section--surface gs-approach gs-value', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
