<?php
/**
 * Title: Our Approach Programme Funding
 * Slug: gedeon-sports/approach-funding
 * Categories: gedeon-sports-sections
 * Keywords: funding, budget, chart
 * Description: "How each programme is funded" with the season-budget list beside the planned funding-mix chart.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_years = array(
    '2027' => array(array('investors', 37.6, 'Investors'), array('holding', 31, 'Holding'), array('public', 31.4, 'Public')),
    '2029' => array(array('investors', 48, 'Investors'), array('holding', 17), array('public', 18), array('sponsors', 17)),
    '2031' => array(array('holding', 12.5), array('sponsors', 25, 'Sponsors'), array('commercial', 62.5, 'Commercial')),
);

$gedeon_sports_rows = '';
foreach ($gedeon_sports_years as $gedeon_sports_year => $gedeon_sports_segments) {
    $gedeon_sports_bar = '';
    foreach ($gedeon_sports_segments as $gedeon_sports_segment) {
        $gedeon_sports_bar .= '<span class="gs-mix__seg gs-mix__seg--' . $gedeon_sports_segment[0] . '" style="width:' . $gedeon_sports_segment[1] . '%">' . ($gedeon_sports_segment[2] ?? '') . '</span>';
    }
    $gedeon_sports_rows .= '<div class="gs-mix__row"><span class="gs-mix__year">' . $gedeon_sports_year . '</span><span class="gs-mix__bar">' . $gedeon_sports_bar . '</span></div>';
}

$gedeon_sports_legend = '';
foreach (array('investors' => 'Project investors', 'holding' => 'Gedeon Holding', 'public' => 'Croatian public sponsorship', 'sponsors' => 'Private sponsors', 'commercial' => 'Commercial income') as $gedeon_sports_key => $gedeon_sports_label) {
    $gedeon_sports_legend .= '<span class="gs-mix__key gs-mix__key--' . $gedeon_sports_key . '">' . $gedeon_sports_label . '</span>';
}

$gedeon_sports_chart = '<div class="gs-mix">'
    . '<h3 class="gs-mix__title">Planned funding mix, Vito Ćoza programme</h3>'
    . '<div class="gs-mix__rows">' . $gedeon_sports_rows . '</div>'
    . '<div class="gs-mix__legend">' . $gedeon_sports_legend . '</div>'
    . '<p class="gs-mix__note">Share of planned annual receipts in the 2027–2031 programme plan.</p>'
    . '</div>';

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Programme funding', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'How each<br class="gs-br"> programme is funded')
    . gedeon_sports_block_p('gs-split__body', 'Programmes draw on five sources: project investors, Gedeon Holding, Croatian public sponsorship, private sponsors and commercial income from licensed products, content and experiences. As the athlete progresses, commercial income takes a growing share.')
    . gedeon_sports_block_p('gs-split__text gs-split__text--tight', 'Each project company keeps its own budget and accounts. Money raised for one athlete funds that athlete’s programme only.')
    . gedeon_sports_block_h(3, 'gs-split__title gs-funding__title', 'What a season budget covers')
    . gedeon_sports_block_list('gs-list gs-list--check', array('Team, entries and testing', 'Development and step-up tests', 'Travel, welfare, education and management', 'Damage and contingency'))
    . gedeon_sports_block_p('gs-funding__note', 'Every season budget is built from itemised team and supplier quotes before it is approved.')
)
    . gedeon_sports_block_group('gs-split__aside', gedeon_sports_block_html($gedeon_sports_chart));

echo gedeon_sports_block_section('gs-split gs-funding', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
