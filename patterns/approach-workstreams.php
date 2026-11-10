<?php
/**
 * Title: Our Approach Workstreams
 * Slug: gedeon-sports/approach-workstreams
 * Categories: gedeon-sports-sections
 * Keywords: workstreams, timeline, chart
 * Description: "Four workstreams, running in parallel" — overlapping timeline bars from the start of a stage to the gate review.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_chart = '<div class="gs-streams" role="img" aria-label="Assessment, preparation, progression and commercial growth overlap through a stage, each starting later than the one before.">'
    . '<span class="gs-streams__bar gs-streams__bar--1">Assessment</span>'
    . '<span class="gs-streams__bar gs-streams__bar--2">Preparation</span>'
    . '<span class="gs-streams__bar gs-streams__bar--3">Progression</span>'
    . '<span class="gs-streams__bar gs-streams__bar--4">Commercial growth</span>'
    . '</div>'
    . '<div class="gs-streams__axis"><span>Start of stage</span><span>Time →</span><span>Gate review</span></div>';

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Inside each stage',
    'Four workstreams,<br class="gs-br"> running in parallel',
    'Assessment, preparation, progression and commercial growth run side by side<br class="gs-br"> throughout a stage. Their weight shifts as the gate review approaches.'
)
    . gedeon_sports_block_html($gedeon_sports_chart);

echo gedeon_sports_block_section('gs-section--surface gs-workstreams', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
