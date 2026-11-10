<?php
/**
 * Title: Investors Portfolio Approach
 * Slug: gedeon-sports/investors-portfolio
 * Categories: gedeon-sports-sections
 * Keywords: roadmap, portfolio, phases
 * Description: "Vito first, then a multi-athlete platform" — the 2027–2031 roadmap and three links.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_phases = '';
foreach (
    array(
        '2027–2028' => 'Vitocoza Ltd rights, first sponsors, campaigns and investor reporting.',
        '2029'      => 'The platform adds its first two athletes beyond Formula racing, each with their own company and budget.',
        '2030–2031' => 'Six athletes in the annual cohort, and international commercial expansion.',
    ) as $gedeon_sports_when => $gedeon_sports_text
) {
    $gedeon_sports_phases .= gedeon_sports_block_group(
        'gs-roadmap__phase',
        gedeon_sports_block_h(3, 'gs-roadmap__title', $gedeon_sports_when)
        . gedeon_sports_block_p('gs-roadmap__text', $gedeon_sports_text)
    );
}

$gedeon_sports_links = '';
foreach (
    array(
        array('Today', 'Vito Ćoza, three-time CEZ champion. <a href="' . esc_url(gedeon_sports_url('athletes')) . '#vito-coza">Profile →</a>'),
        array('Selection', 'Performance, welfare, partner appeal and a fundable pathway. <a href="' . esc_url(gedeon_sports_url('athletes')) . '">Criteria →</a>'),
        array('Stage gates', 'Clear criteria to continue, add resources or exit. <a href="' . esc_url(gedeon_sports_url('approach')) . '#stage-gates">Gates →</a>'),
    ) as $gedeon_sports_link
) {
    $gedeon_sports_links .= gedeon_sports_block_group(
        'gs-roadmap__link',
        gedeon_sports_block_h(3, 'gs-roadmap__title', $gedeon_sports_link[0])
        . gedeon_sports_block_p('gs-roadmap__text', $gedeon_sports_link[1])
    );
}

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Portfolio approach',
    'Vito first, then a multi-<br class="gs-br">athlete platform',
    'The model is built with one athlete, then repeated across a portfolio, with each athlete<br class="gs-br"> funded as a separate project.'
)
    . gedeon_sports_block_group('gs-roadmap', $gedeon_sports_phases)
    . gedeon_sports_block_group('gs-roadmap__links', $gedeon_sports_links);

echo gedeon_sports_block_section('gs-section--surface gs-portfolio-approach', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
