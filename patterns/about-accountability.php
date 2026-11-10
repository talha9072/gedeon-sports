<?php
/**
 * Title: About Accountability
 * Slug: gedeon-sports/about-accountability
 * Categories: gedeon-sports-sections
 * Keywords: responsibilities, governance, table
 * Description: "Who is responsible for what" — area, responsibility and lead table.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_rows = '';
foreach (
    array(
        array('Athlete projects', 'Project companies, budgets, stage gates, governance', 'Gedeon Sports, Managing Director'),
        array('Commercial', 'Sponsorship sales, licensed products, content, appearances, partner<br class="gs-br"> reporting', 'Gedeon Sports, Commercial Director'),
        array('Investor relations', 'Funding rounds, quarterly reporting, investor area', 'Gedeon Sports, Finance &amp; Investor<br class="gs-br"> Relations'),
        array('Career and<br class="gs-br"> performance', 'Career planning, coaching, readiness for each step', 'Driver manager (sporting partner)'),
        array('Race delivery', 'Testing, engineering, race weekends, season quotes', 'Race team (sporting partner)'),
        array('Welfare', 'Consent, education and wellbeing of athletes under 18', 'The family, with the Gedeon Sports board'),
        array('Group oversight', 'Capital support and governance', 'Gedeon Holding'),
    ) as $gedeon_sports_row
) {
    $gedeon_sports_rows .= '<tr><th scope="row">' . $gedeon_sports_row[0] . '</th><td>' . $gedeon_sports_row[1] . '</td><td>' . $gedeon_sports_row[2] . '</td></tr>';
}

$gedeon_sports_table = '<div class="gs-duties"><table><thead><tr><th scope="col">Area</th><th scope="col">Responsibility</th><th scope="col">Led by</th></tr></thead><tbody>' . $gedeon_sports_rows . '</tbody></table></div>';

$gedeon_sports_inner = gedeon_sports_section_heading('Accountability', 'Who is responsible for what')
    . gedeon_sports_block_html($gedeon_sports_table);

echo gedeon_sports_block_section('gs-duties-section', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
