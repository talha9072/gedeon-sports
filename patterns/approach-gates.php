<?php
/**
 * Title: Our Approach Stage Gates
 * Slug: gedeon-sports/approach-gates
 * Categories: gedeon-sports-sections
 * Keywords: stage gates, criteria, ladder
 * Description: "Clear criteria at every stage" — the stage ladder with the criteria and outcomes of each gate.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_ladder = array(
    array('Stage 1 · Foundation', 'National competition', 'Gate 1', 'Performance benchmarks, fitness, commitment and coachability.', array('Continue', 'Add resources', 'Exit programme')),
    array('Stage 2 · Development', 'International junior competition', 'Gate 2', 'Results against objectives, partner renewals, audience growth and an independent readiness assessment.', array('Continue', 'Add resources', 'Exit programme')),
    array('Stage 3 · Progression', 'Senior international competition', 'Gate 3', 'Readiness for a professional seat, commercial backing in place and the next step fully funded.', array('Professional', 'Extend', 'Exit programme')),
    array('Professional', 'Paid competition and a commercial career, managed under agreed terms'),
);

$gedeon_sports_items = '';
foreach ($gedeon_sports_ladder as $gedeon_sports_i => $gedeon_sports_step) {
    $gedeon_sports_items .= gedeon_sports_block_group(
        'gs-ladder__stage gs-ladder__stage--' . ($gedeon_sports_i + 1),
        gedeon_sports_block_h(3, 'gs-ladder__name', $gedeon_sports_step[0])
        . gedeon_sports_block_p('gs-ladder__level', $gedeon_sports_step[1])
    );
    if (isset($gedeon_sports_step[2])) {
        $gedeon_sports_chips = '';
        foreach ($gedeon_sports_step[4] as $gedeon_sports_chip) {
            $gedeon_sports_chips .= gedeon_sports_block_p('gs-chip gs-chip--outline', $gedeon_sports_chip);
        }
        $gedeon_sports_items .= gedeon_sports_block_group(
            'gs-ladder__gate',
            gedeon_sports_block_p('gs-ladder__label', $gedeon_sports_step[2])
            . gedeon_sports_block_group(
                'gs-ladder__criteria',
                gedeon_sports_block_p('gs-ladder__text', $gedeon_sports_step[3])
                . gedeon_sports_block_group('gs-chips', $gedeon_sports_chips)
            )
        );
    }
}

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Stage gates',
    'Clear criteria at every stage',
    'At each gate, together with the athlete and their family, we decide whether to continue,<br class="gs-br"> add resources or end the programme. Stages describe development level and apply<br class="gs-br"> across sports.'
)
    . gedeon_sports_block_group('gs-ladder', $gedeon_sports_items)
    . gedeon_sports_callout('<strong>No step is committed before it is ready and funded.</strong> An athlete moves up when their performance, welfare, licences and budget all allow it. Gate reviews take place twice a season and are reported to the board. When a programme ends, the athlete receives support through the transition.', 'gs-gates__callout');

echo gedeon_sports_block_section('gs-gates', $gedeon_sports_inner, array('anchor' => 'stage-gates')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
