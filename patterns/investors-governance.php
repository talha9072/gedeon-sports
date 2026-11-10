<?php
/**
 * Title: Investors Governance
 * Slug: gedeon-sports/investors-governance
 * Categories: gedeon-sports-sections
 * Keywords: governance, reporting, investors
 * Description: "What investors receive" beside a sample quarterly report.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_report = '<div class="gs-report">'
    . '<span class="gs-tag gs-tag--concept gs-report__tag">Report format</span>'
    . '<div class="gs-report__stats">'
    . '<div class="gs-report__stat"><strong>4 / 5</strong><span>objectives met</span></div>'
    . '<div class="gs-report__stat"><strong>3</strong><span>active partners</span></div>'
    . '<div class="gs-report__stat"><strong>+18%</strong><span>partner revenue vs last quarter</span></div>'
    . '<div class="gs-report__stat"><strong>96%</strong><span>spend vs budget</span></div>'
    . '</div>'
    . '<div class="gs-report__chart"><span>Partner revenue, trailing 4 quarters</span>'
    . '<svg viewBox="0 0 530 36" preserveAspectRatio="none" aria-hidden="true"><path d="M1 35C138.7 31 253.5 25 345.3 19C414.2 14 483.1 7 529 1" fill="none" stroke="#FF4A5E" stroke-width="2" stroke-linecap="round" vector-effect="non-scaling-stroke"/></svg></div>'
    . '<p class="gs-report__next">Next quarter: Gate 2 review, pre-season testing, two partner renewals</p>'
    . '</div>';

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Governance', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'What investors receive')
    . gedeon_sports_block_list(
        'gs-list gs-list--check gs-governance__list',
        array(
            '<strong>Quarterly report</strong>: progress, gate decisions, partner revenue, spend against budget',
            '<strong>Annual accounts</strong> for each project company',
            '<strong>Board</strong>: investor representation and reserved decisions under the shareholder agreement',
            '<strong>Protections</strong>: pre-emption, tag-along and drag-along rights, and approval of related-party transactions',
            '<strong>Policies</strong>: <a href="' . esc_url(gedeon_sports_url('safeguarding')) . '">safeguarding</a>, <a href="' . esc_url(gedeon_sports_url('conflicts')) . '">conflicts of interest →</a>',
        )
    )
)
    . gedeon_sports_block_group('gs-split__aside', gedeon_sports_block_html($gedeon_sports_report));

echo gedeon_sports_block_section('gs-split gs-governance', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
