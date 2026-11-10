<?php
/**
 * Title: Investor Area Locked Preview
 * Slug: gedeon-sports/investor-area-preview
 * Categories: gedeon-sports-sections
 * Keywords: preview, locked, investor
 * Description: Blurred placeholder of the project summary that opens once access is approved (all figures are placeholders).
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_terms = '';
foreach (
    array(
        'Company'      => 'Vitocoza Ltd, the project company for Vito Ćoza',
        'Programme'    => '2027–2031, single-seaters',
        'Rounds'       => 'Four rounds, each opened on evidence',
        'Reporting'    => 'Quarterly reports',
        'Shareholders' => 'Gedeon Sports, the Ćoza family and external investors',
    ) as $gedeon_sports_label => $gedeon_sports_value
) {
    $gedeon_sports_terms .= '<div class="gs-locked__term"><span>' . esc_html($gedeon_sports_label) . '</span><span>' . esc_html($gedeon_sports_value) . '</span></div>';
}

$gedeon_sports_figures = '';
foreach (array('€0.0m' => 'Season budget, first year', '€0.0–0.0m' => 'Round size range', '00.0%' => 'Planned investor share after all rounds', '€0.0m ' => 'Contracted partner income, first season') as $gedeon_sports_value => $gedeon_sports_label) {
    $gedeon_sports_figures .= '<div class="gs-locked__figure"><strong>' . esc_html(trim($gedeon_sports_value)) . '</strong><span>' . esc_html($gedeon_sports_label) . '</span></div>';
}

$gedeon_sports_bars = '';
foreach (array('Start' => array(62, 38, 0), 'Round 1' => array(52, 28, 20), 'Round 2' => array(44, 26, 30), 'Round 3' => array(40, 24, 36), 'Round 4' => array(36, 22, 42)) as $gedeon_sports_label => $gedeon_sports_split) {
    $gedeon_sports_bars .= '<div class="gs-locked__row"><span>' . esc_html($gedeon_sports_label) . '</span><span class="gs-locked__bar">'
        . '<i style="width:' . $gedeon_sports_split[0] . '%"></i><i style="width:' . $gedeon_sports_split[1] . '%"></i><i style="width:' . $gedeon_sports_split[2] . '%"></i></span></div>';
}

$gedeon_sports_preview = '<div class="gs-locked" aria-hidden="true"><div class="gs-locked__content">'
    . '<p class="gs-eyebrow gs-eyebrow--red">Project summary</p>'
    . '<h2 class="gs-title">Vitocoza Ltd: the Formula project</h2>'
    . '<p class="gs-intro">Summary of the project company, its programme and the funding plan for each season, with the ownership structure and terms agreed with the family and Gedeon Sports. Visible once access is approved.</p>'
    . '<div class="gs-locked__summary"><div class="gs-locked__split"><p class="gs-eyebrow gs-eyebrow--red">Funding split by round</p><strong>40 / 20 / 40</strong><span>Investors · Gedeon Holding · Partners and sponsors</span></div>'
    . '<div class="gs-locked__terms">' . $gedeon_sports_terms . '</div></div>'
    . '<div class="gs-locked__figures">' . $gedeon_sports_figures . '</div>'
    . '<h3 class="gs-locked__title">Ownership at each round close</h3>' . $gedeon_sports_bars
    . '</div></div>';

echo gedeon_sports_block_section('gs-locked-section', gedeon_sports_block_html($gedeon_sports_preview)); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
