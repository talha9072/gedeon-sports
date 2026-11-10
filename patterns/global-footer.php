<?php
/**
 * Title: Global Footer
 * Slug: gedeon-sports/global-footer
 * Categories: gedeon-sports-sections
 * Block Types: core/template-part/footer
 * Inserter: no
 * Description: Logo and description, Pages / Gedeon Exclusive / Company & Policies links, investment disclaimer and copyright.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_columns = array(
    'Pages'              => array(
        'Home'            => 'home',
        'Our Athletes'    => 'athletes',
        'Our Approach'    => 'approach',
        'Investors'       => 'investors',
        'Partnerships'    => 'partnerships',
        'About &amp; Contact' => 'about',
    ),
    'Gedeon Exclusive'   => array(
        'Overview'          => 'exclusive',
        'Track &amp; Events' => 'track',
        'Concierge'         => 'concierge',
        'Gedeon Club'       => 'club',
    ),
    'Company &amp; Policies' => array(
        'Company information'          => 'company',
        'Privacy policy'               => 'privacy',
        'Safeguarding policy'          => 'safeguarding',
        'Conflicts of interest policy' => 'conflicts',
        'Investor area'                => 'investor',
        'Contact'                      => 'contact',
    ),
);

$gedeon_sports_cols = '';
foreach ($gedeon_sports_columns as $gedeon_sports_heading => $gedeon_sports_links) {
    $gedeon_sports_items = array();
    foreach ($gedeon_sports_links as $gedeon_sports_label => $gedeon_sports_page) {
        $gedeon_sports_items[] = '<a href="' . esc_url(gedeon_sports_url($gedeon_sports_page)) . '">' . $gedeon_sports_label . '</a>';
    }
    $gedeon_sports_cols .= gedeon_sports_block_group(
        'gs-footer__col',
        gedeon_sports_block_h(2, 'gs-footer__heading', $gedeon_sports_heading)
        . gedeon_sports_block_list('gs-footer__links', $gedeon_sports_items)
    );
}

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-footer__columns',
    gedeon_sports_block_group(
        'gs-footer__brand',
        gedeon_sports_block_image('gs-footer__logo', gedeon_sports_img('gedeon-sports-logo.svg'), 'Gedeon Sports')
        . gedeon_sports_block_p('gs-footer__about', 'Gedeon Sports builds the commercial business around athletes. A Gedeon Holding company, alongside Gedeon Group, Gedeon Blue, Gedeon Capital and Gedeon Advisory.')
    )
    . $gedeon_sports_cols
)
    . gedeon_sports_block_p('gs-footer__legal', 'Nothing on this website is an offer to sell, or a solicitation to buy, securities. Investment in a private company is high-risk and illiquid, and you could lose all the money you invest.')
    . gedeon_sports_block_group(
        'gs-footer__bottom',
        gedeon_sports_block_p('gs-footer__copy', '© ' . gmdate('Y') . ' Gedeon Sports. All rights reserved.')
        . gedeon_sports_block_p('gs-footer__company', 'A Gedeon Holding company')
    );

echo gedeon_sports_block_group('gs-footer', gedeon_sports_block_group('gs-container', $gedeon_sports_inner), 'div', array('align' => 'full')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
