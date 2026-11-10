<?php
/**
 * Title: About Company Information
 * Slug: gedeon-sports/about-company
 * Categories: gedeon-sports-sections
 * Keywords: company, registration, details
 * Description: "Company information" — registered details (placeholders until the client supplies them).
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Company details', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Company information')
    . gedeon_sports_block_p('gs-split__text', 'Gedeon Sports is part of Gedeon Holding. Athlete projects are held in separate project companies.')
)
    . gedeon_sports_block_group(
        'gs-split__aside gs-details',
        gedeon_sports_facts(
            array(
                'Registered name'         => 'Gedeon Sports Ltd',
                'Company number'          => '00000000',
                'Registered address'      => '[Registered address]',
                'Parent company'          => 'Gedeon Holding',
                'Athlete project company' => 'Vitocoza Ltd',
                'VAT / tax ID'            => '[VAT number]',
                'Email'                   => 'hello@gedeonsports.example',
            )
        )
    );

echo gedeon_sports_block_section('gs-split gs-company-section', $gedeon_sports_inner, array('anchor' => 'company')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
