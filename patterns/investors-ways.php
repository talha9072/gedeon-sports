<?php
/**
 * Title: Investors Two Ways To Invest
 * Slug: gedeon-sports/investors-ways
 * Categories: gedeon-sports-sections
 * Keywords: investment, project, platform
 * Description: "One athlete's project, or the platform" — the athlete-project and platform panels.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_panel = static function (string $class, string $eyebrow, string $title, string $text, array $items, string $note, array $button): string {
    return gedeon_sports_block_group(
        'gs-panel ' . $class,
        gedeon_sports_block_group(
            'gs-panel__top',
            gedeon_sports_block_p('gs-eyebrow gs-eyebrow--grey gs-eyebrow--small', $eyebrow)
            . gedeon_sports_block_h(3, 'gs-panel__title', $title)
            . gedeon_sports_block_p('gs-panel__text', $text)
            . gedeon_sports_list($items, 'gs-list--caption')
            . gedeon_sports_block_p('gs-panel__note', $note)
        )
        . gedeon_sports_block_group('gs-panel__bottom', gedeon_sports_buttons('gs-panel__buttons', array($button)))
    );
};

$gedeon_sports_panels = $gedeon_sports_panel(
    'gs-panel--investors',
    'Athlete project investment',
    'Shares in one athlete’s<br class="gs-br"> project company',
    'Capital funds that athlete’s sporting programme. The project company holds the athlete’s contracts and licensed commercial rights.',
    array('First project: Vitocoza Ltd, 2027–2031', 'Shareholders: Gedeon Sports, the Ćoza family and external investors', 'Four funding rounds, each opened on agreed evidence'),
    'Owns no shares in Gedeon Sports, Gedeon Holding or other athletes’ companies.',
    array('Request access', gedeon_sports_url('investor'))
)
    . $gedeon_sports_panel(
        'gs-panel--platform',
        'Platform investment',
        'Shares in Gedeon Sports',
        'Capital builds the team and commercial capability for a multi-athlete platform. Gedeon Sports earns management fees and commissions, and holds stakes in athlete projects.',
        array('Exposure to fees and to the project stakes Gedeon Sports owns', 'Revenue from contracted fees and commissions', 'Opens with the platform expansion in 2029'),
        'New platform shares dilute existing shareholders, including Gedeon Holding.',
        array('Register interest', gedeon_sports_url('investor'), 'secondary')
    );

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Two ways to invest',
    'One athlete’s project,<br class="gs-br"> or the platform',
    'Each company keeps its own budget. An investment carries exposure only to the<br class="gs-br"> company it is made in.'
)
    . gedeon_sports_block_group('gs-grid gs-grid--2 gs-panels gs-ways', $gedeon_sports_panels);

echo gedeon_sports_block_section('gs-ways-section', $gedeon_sports_inner, array('anchor' => 'two-ways')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
