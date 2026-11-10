<?php
/**
 * Title: Partnerships Measurement
 * Slug: gedeon-sports/partnerships-measurement
 * Categories: gedeon-sports-sections
 * Keywords: measurement, reporting, partners
 * Description: "What partners receive" beside a sample partner report.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_report = '<div class="gs-report">'
    . '<span class="gs-tag gs-tag--concept gs-report__tag">Report format</span>'
    . '<div class="gs-report__stats">'
    . '<div class="gs-report__stat"><strong>1.2M</strong><span>impressions</span></div>'
    . '<div class="gs-report__stat"><strong>6.8%</strong><span>engagement</span></div>'
    . '<div class="gs-report__stat"><strong>11 / 12</strong><span>deliverables</span></div>'
    . '<div class="gs-report__stat"><strong>3</strong><span>appearances</span></div>'
    . '</div>'
    . '<div class="gs-report__chart gs-report__chart--events"><span>Exposure by event</span>'
    . '<svg viewBox="0 0 530 32" preserveAspectRatio="none" aria-hidden="true"><polyline points="1,31 106,22 212,27 318,15 424,19 529,8" fill="none" stroke="#FF4A5E" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" vector-effect="non-scaling-stroke"/></svg></div>'
    . '<p class="gs-report__next">Top content: race-weekend diary, pre-season training film, home-town feature</p>'
    . '</div>';

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Measurement', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'What partners receive')
    . gedeon_sports_block_p('gs-split__body', 'Every partnership starts with agreed objectives and ends each period with a report against them.')
    . gedeon_sports_block_list(
        'gs-list gs-list--check gs-governance__list gs-measure__list',
        array(
            '<strong>Audience data</strong> for each athlete: reach, engagement and audience profile',
            '<strong>Delivery log</strong>: placements, content and appearances delivered',
            '<strong>Media value</strong>: exposure measured by an independent valuation provider',
            '<strong>Review meeting</strong> each quarter',
        )
    )
)
    . gedeon_sports_block_group('gs-split__aside', gedeon_sports_block_html($gedeon_sports_report));

echo gedeon_sports_block_section('gs-section--surface gs-split gs-measure', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
