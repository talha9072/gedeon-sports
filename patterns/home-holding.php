<?php
/**
 * Title: Home Part of Gedeon Holding
 * Slug: gedeon-sports/home-holding
 * Categories: gedeon-sports-sections
 * Keywords: holding, network, group
 * Description: "Luxury maritime relationships" copy beside the list of Gedeon Holding companies.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_companies = array(
    array('Gedeon Group', 'Maritime and owner services'),
    array('Gedeon Blue', 'Environmental projects'),
    array('Gedeon<br class="gs-br-m"> Sports', 'Commercial businesses around athletes', true),
    array('Gedeon Capital', 'Investment'),
    array('Gedeon<br class="gs-br-m"> Advisory', 'Business and project advice'),
);

$gedeon_sports_rows = '';
foreach ($gedeon_sports_companies as $gedeon_sports_row) {
    $gedeon_sports_rows .= gedeon_sports_block_group(
        'gs-companies__row' . (! empty($gedeon_sports_row[2]) ? ' is-current' : ''),
        gedeon_sports_block_p('gs-companies__name', $gedeon_sports_row[0])
        . gedeon_sports_block_p('gs-companies__text', $gedeon_sports_row[1])
    );
}

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-holding__copy',
    gedeon_sports_eyebrow('Part of Gedeon Holding', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Luxury maritime<br> relationships. A wider<br> business vision.')
    . gedeon_sports_block_p('gs-holding__text', 'Gedeon Holding’s network spans yacht owners, senior business leaders, private investors and family offices. Gedeon Sports brings that network to sport, opening sponsor conversations, business introductions and partnerships for our athletes.')
    . gedeon_sports_buttons('gs-holding__link', array(array('About the group', gedeon_sports_url('about'), 'link')))
)
    . gedeon_sports_block_group('gs-companies', $gedeon_sports_rows);

echo gedeon_sports_block_section('gs-section--surface gs-holding', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
