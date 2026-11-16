<?php
/**
 * Title: Investors What The Companies Hold
 * Slug: gedeon-sports/investors-holdings
 * Categories: gedeon-sports-sections
 * Keywords: agreements, rights, revenue sources
 * Description: "Agreements are the asset" beside the three revenue sources.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_sources = gedeon_sports_card_text('Management fees', 'A contracted fee for managing each athlete programme, set as a share of funded spend and paid from the project budget.', 'gs-card--source')
    . gedeon_sports_card_text('Commercial commissions', 'Commission on sponsorship, endorsements and other commercial services.', 'gs-card--source')
    . gedeon_sports_card_text('Commercial rights', 'Project income from licensed products, brand content and approved experiences.', 'gs-card--source')
    . gedeon_sports_callout('Revenue is earned under each agreement and counted once. Sporting progress builds value only when it is converted into contracted commercial income.');

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('What the companies hold', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Agreements<br> are the asset')
    . gedeon_sports_block_p('gs-split__body', 'An <strong>athlete project company</strong> holds the athlete’s rights agreement. It covers:')
    . gedeon_sports_block_list(
        'gs-list gs-list--check gs-holdings__list',
        array(
            'the name and image licence, its duration and approvals',
            'the commercial income in scope: sponsorship, content, licensed products and experiences',
            'welfare protections and family representation',
            'termination, exit and buy-out terms',
        )
    )
    . gedeon_sports_block_p('gs-split__body gs-holdings__more', '<strong>Gedeon Sports</strong> holds management agreements with each project, plus its stakes in them.')
    . gedeon_sports_block_p('gs-funding__note gs-holdings__note', 'Agreement summaries are in the investor area.')
)
    . gedeon_sports_block_group(
        'gs-split__aside',
        gedeon_sports_block_h(3, 'gs-split__title', 'Revenue sources')
        . gedeon_sports_block_group('gs-sources', $gedeon_sports_sources)
    );

echo gedeon_sports_block_section('gs-split gs-holdings', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
