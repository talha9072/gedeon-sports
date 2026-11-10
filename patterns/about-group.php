<?php
/**
 * Title: About Part Of Gedeon Holding
 * Slug: gedeon-sports/about-group
 * Categories: gedeon-sports-sections
 * Keywords: gedeon holding, group, structure
 * Description: "Part of Gedeon Holding" — copy, key facts and the group structure diagram.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_diagram = '<div class="gs-tree" role="img" aria-label="Gedeon Holding owns Gedeon Group, Blue, Sports, Capital and Advisory. Gedeon Sports holds a 40% stake in Vitocoza Ltd, with athlete companies from 2029.">'
    . '<span class="gs-tree__parent">Gedeon Holding</span>'
    . '<span class="gs-tree__line"></span>'
    . '<span class="gs-tree__row"><span class="gs-tree__node">Group</span><span class="gs-tree__node">Blue</span><span class="gs-tree__node is-current">Sports</span><span class="gs-tree__node">Capital</span><span class="gs-tree__node">Advisory</span></span>'
    . '<span class="gs-tree__line"></span>'
    . '<span class="gs-tree__caption">Gedeon Sports holds stakes in:</span>'
    . '<span class="gs-tree__row gs-tree__row--stakes"><span class="gs-tree__stake">Vitocoza Ltd · 40%</span><span class="gs-tree__stake is-future">Athlete companies from 2029</span></span>'
    . '</div>';

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Gedeon Holding', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Part of Gedeon Holding')
    . gedeon_sports_block_p('gs-split__body', 'Gedeon Holding is built on luxury maritime relationships. Its network spans yacht owners, senior business leaders, private investors and family offices, and it builds businesses around worthwhile projects with clear commercial responsibilities and disciplined delivery.')
    . gedeon_sports_block_p('gs-split__body gs-split__body--next', 'The group has five companies: Gedeon Group (ship and yacht management, owner representation and operational support), Gedeon Blue (environmental and emissions projects), Gedeon Sports (commercial businesses around athletes), Gedeon Capital (investment in property, companies and projects) and Gedeon Advisory (strategy, commercial development and project support).')
    . gedeon_sports_block_group(
        'gs-about-facts',
        gedeon_sports_facts(
            array(
                'Ownership'  => 'Owned by Gedeon Holding',
                'Capital'    => 'Annual support for the first athlete project, 2027–2031',
                'Network'    => 'Sponsor conversations, business introductions and partnerships',
                'Governance' => 'Group oversight. Each company carries its own capital and contracts',
            )
        )
    )
)
    . gedeon_sports_block_group('gs-split__aside gs-tree-wrap', gedeon_sports_block_html($gedeon_sports_diagram));

echo gedeon_sports_block_section('gs-section--surface gs-split gs-impact gs-about-group', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
