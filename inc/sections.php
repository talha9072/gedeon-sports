<?php
/**
 * Shared Gedeon Sports sections and components, built from the core-block helpers in blocks.php.
 * Names follow the Figma components (02 Components page).
 *
 * @package Gedeon_Sports
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Eyebrow: short red line + uppercase label. Grey for section headings, red for heroes.
 *
 * @param string $text Label.
 * @param string $tone 'grey' or 'red'.
 */
function gedeon_sports_eyebrow(string $text, string $tone = 'grey'): string
{
    return gedeon_sports_block_p('gs-eyebrow gs-eyebrow--' . $tone, $text);
}

/**
 * Section heading: eyebrow, H2 and an optional intro (780 wide on desktop).
 *
 * @param string $eyebrow Eyebrow text.
 * @param string $title   Title HTML (may hold <br class="gs-br">).
 * @param string $intro   Intro HTML.
 * @param string $class   Extra wrapper class.
 */
function gedeon_sports_section_heading(string $eyebrow, string $title, string $intro = '', string $class = ''): string
{
    return gedeon_sports_block_group(
        trim('gs-heading ' . $class),
        gedeon_sports_eyebrow($eyebrow)
        . gedeon_sports_block_h(2, 'gs-title', $title)
        . ($intro ? gedeon_sports_block_p('gs-intro', $intro) : '')
    );
}

/**
 * Pill buttons. Each: array(label, url, type) with type primary (default), secondary or link.
 *
 * @param string $class   Wrapper class.
 * @param array  $buttons Buttons.
 */
function gedeon_sports_buttons(string $class, array $buttons): string
{
    $types = array(
        'primary'   => '',
        'secondary' => 'gs-btn--secondary',
        'link'      => 'gs-btn--link',
        'small'     => 'gs-btn--small',
        'secondary-small' => 'gs-btn--secondary gs-btn--small-outline',
        'filter'    => 'gs-btn--filter',
        'filter-active' => 'gs-btn--filter is-active',
    );
    $items = array();
    foreach ($buttons as $button) {
        $items[] = array($button[0], $button[1], $types[$button[2] ?? 'primary'] ?? '');
    }

    return gedeon_sports_block_buttons(trim('gs-buttons ' . $class), $items);
}

/**
 * Tag pill: 'stage' (red outline pill) or 'concept' (dark label on images).
 */
function gedeon_sports_tag(string $text, string $type = 'stage', string $class = ''): string
{
    return gedeon_sports_block_p(trim('gs-tag gs-tag--' . $type . ' ' . $class), $text);
}

/**
 * Bullet list with small red dots.
 *
 * @param array  $items Item HTML.
 * @param string $class Extra class.
 */
function gedeon_sports_list(array $items, string $class = ''): string
{
    return gedeon_sports_block_list(trim('gs-list ' . $class), $items);
}

/**
 * Card / Feature: number, title and text, with the short red accent line.
 */
function gedeon_sports_card_feature(string $number, string $title, string $text, string $class = ''): string
{
    return gedeon_sports_block_group(
        trim('gs-card gs-card--feature ' . $class),
        gedeon_sports_block_p('gs-card__number', $number)
        . gedeon_sports_block_h(3, 'gs-card__title', $title)
        . gedeon_sports_block_p('gs-card__text', $text)
    );
}

/**
 * CTA Band: closing call to action with the Gedeon Sports wordmark.
 *
 * @param string $title   Title.
 * @param string $text    Text.
 * @param array  $buttons Buttons, as for gedeon_sports_buttons().
 */
function gedeon_sports_cta_band(string $title, string $text, array $buttons, bool $border = true): string
{
    $band = gedeon_sports_block_group(
        'gs-cta',
        gedeon_sports_block_group(
            'gs-cta__copy',
            gedeon_sports_block_h(2, 'gs-cta__title', $title)
            . gedeon_sports_block_p('gs-cta__text', $text)
            . gedeon_sports_buttons('gs-cta__buttons', $buttons)
        )
        . gedeon_sports_block_image('gs-cta__logo', gedeon_sports_img('gedeon-sports-wordmark.svg'), 'Gedeon Sports')
    );

    return gedeon_sports_block_section('gs-cta-section' . ($border ? '' : ' gs-section--flush'), $band);
}

/**
 * Page Hero / Mark: eyebrow, H1 and intro beside the faded Gedeon Sports mark on a red glow.
 * Used by Our Athletes, Investors, Investor Area and About & Contact.
 *
 * @param string $eyebrow Eyebrow text.
 * @param string $title   Title HTML.
 * @param string $text    Intro text.
 * @param string $aside   Extra blocks under the mark (e.g. a notice).
 * @param string $class   Extra class.
 * @param string $extra   Extra blocks under the intro (e.g. buttons).
 */
function gedeon_sports_hero_mark(string $eyebrow, string $title, string $text, string $aside = '', string $class = '', string $extra = ''): string
{
    $inner = gedeon_sports_block_group(
        'gs-hero-mark__copy',
        gedeon_sports_eyebrow($eyebrow, 'red')
        . gedeon_sports_block_h(1, 'gs-hero-mark__title', $title)
        . gedeon_sports_block_p('gs-hero-mark__text', $text)
        . $extra
    )
        . gedeon_sports_block_group(
            'gs-hero-mark__aside',
            gedeon_sports_block_image('gs-hero-mark__logo', gedeon_sports_img('gedeon-sports-mark-faded.svg'))
            . $aside
        );

    return gedeon_sports_block_group(
        trim('gs-hero-mark ' . $class),
        gedeon_sports_block_group('gs-container', $inner),
        'section',
        array('align' => 'full')
    );
}

/**
 * Page Hero / Split: copy on the left, a 426 × 320 photo on the right (Our Approach, Partnerships).
 *
 * @param string $eyebrow Eyebrow text.
 * @param string $title   Title HTML.
 * @param string $text    Intro text.
 * @param string $image   Image file in assets/img.
 * @param string $alt     Image alt text.
 */
function gedeon_sports_hero_split(string $eyebrow, string $title, string $text, string $image, string $alt, string $extra = '', string $class = ''): string
{
    $inner = gedeon_sports_block_group(
        'gs-hero-split__copy',
        gedeon_sports_eyebrow($eyebrow, 'red')
        . gedeon_sports_block_h(1, 'gs-hero-mark__title', $title)
        . gedeon_sports_block_p('gs-hero-mark__text', $text)
        . $extra
    )
        . gedeon_sports_block_image('gs-hero-split__media', gedeon_sports_img($image), $alt);

    return gedeon_sports_block_group(trim('gs-hero-mark gs-hero-split ' . $class), gedeon_sports_block_group('gs-container', $inner), 'section', array('align' => 'full'));
}

/**
 * Card / Feature (small): number, title and text without the accent line (steps).
 */
function gedeon_sports_card_step(string $number, string $title, string $text, string $class = ''): string
{
    return gedeon_sports_block_group(
        trim('gs-card gs-card--step ' . $class),
        gedeon_sports_block_p('gs-card__number', $number)
        . gedeon_sports_block_h(3, 'gs-card__title', $title)
        . gedeon_sports_block_p('gs-card__text', $text)
    );
}

/**
 * Card with number, title and a check list (e.g. "Who does what").
 *
 * @param array $items List items.
 */
function gedeon_sports_card_list(string $number, string $title, array $items, string $class = ''): string
{
    return gedeon_sports_block_group(
        trim('gs-card gs-card--feature gs-card--list ' . $class),
        gedeon_sports_block_p('gs-card__number', $number)
        . gedeon_sports_block_h(3, 'gs-card__title', $title)
        . gedeon_sports_block_list('gs-list gs-list--check gs-list--small', $items)
    );
}

/**
 * Notice / Callout: key statement with a red left edge.
 */
function gedeon_sports_callout(string $html, string $class = ''): string
{
    return gedeon_sports_block_p(trim('gs-callout ' . $class), $html);
}

/**
 * Raw HTML block (charts and diagrams that are drawn with CSS).
 */
function gedeon_sports_block_html(string $html): string
{
    return "<!-- wp:html -->\n" . $html . "\n<!-- /wp:html -->";
}

/**
 * Card / Athlete (vertical): photo on top, stage tag, name, meta, text and a small button.
 */
function gedeon_sports_card_athlete_vertical(): string
{
    return gedeon_sports_block_group(
        'gs-card gs-card--athlete-v gs-stage-2',
        gedeon_sports_block_image('gs-card__photo', gedeon_sports_img('athlete-vito-coza.webp'), 'Vito Ćoza in his karting race suit')
        . gedeon_sports_block_group(
            'gs-card__body',
            gedeon_sports_tag('Stage 2')
            . gedeon_sports_block_h(3, 'gs-card__name', 'Vito Ćoza')
            . gedeon_sports_block_p('gs-card__meta', 'Age 14 · Croatia')
            . gedeon_sports_block_p('gs-card__text', 'Three-time CEZ karting champion.<br class="gs-br"> Moves from karting to single-seaters<br class="gs-br"> in 2027.')
            . gedeon_sports_buttons('gs-card__button', array(array('View profile', '#vito-coza', 'secondary-small')))
        )
    );
}

/**
 * Small text card: title and text (e.g. "What we look for" criteria).
 */
function gedeon_sports_card_text(string $title, string $text, string $class = ''): string
{
    return gedeon_sports_block_group(
        trim('gs-card gs-card--text ' . $class),
        gedeon_sports_block_h(3, 'gs-card__title', $title)
        . gedeon_sports_block_p('gs-card__text', $text)
    );
}

/**
 * Athlete fact rows (label / value).
 *
 * @param array $facts label => value.
 */
function gedeon_sports_facts(array $facts): string
{
    $rows = '';
    foreach ($facts as $label => $value) {
        $rows .= gedeon_sports_block_group(
            'gs-facts__row',
            gedeon_sports_block_p('gs-facts__label', $label)
            . gedeon_sports_block_p('gs-facts__value', $value)
        );
    }

    return gedeon_sports_block_group('gs-facts', $rows);
}

/**
 * Card / Athlete (Vito Ćoza): photo beside the profile, stacked on tablet and mobile.
 */
function gedeon_sports_card_athlete(): string
{
    return gedeon_sports_block_group(
        'gs-card gs-card--athlete',
        gedeon_sports_block_image('gs-card__photo', gedeon_sports_img('athlete-vito-coza.webp'), 'Vito Ćoza in his karting race suit')
        . gedeon_sports_block_group(
            'gs-card__body',
            gedeon_sports_block_group(
                'gs-card__top',
                gedeon_sports_tag('Stage 2')
                . gedeon_sports_block_h(3, 'gs-card__name', 'Vito Ćoza')
                . gedeon_sports_block_p('gs-card__meta', 'Age 14 · Croatia')
                . gedeon_sports_block_p('gs-card__text', 'Three-time CEZ karting champion. Moves from karting to single-seaters in 2027.')
                . gedeon_sports_facts(
                    array(
                        'Titles'       => 'CEZ karting champion 2023, 2024, 2026',
                        'Racing since' => 'Age 6',
                        'Next step'    => 'Single-seater debut, 2027',
                    )
                )
            )
            . gedeon_sports_buttons('gs-card__link', array(array('View profile', gedeon_sports_url('athletes'), 'link')))
        )
    );
}

/**
 * Card / Future Athlete: SAMPLE placeholder for the athletes joining from 2029.
 */
function gedeon_sports_card_future(): string
{
    return gedeon_sports_block_group(
        'gs-card gs-card--future',
        gedeon_sports_block_group(
            'gs-card__panel',
            gedeon_sports_block_image('gs-card__wordmark', gedeon_sports_img('gedeon-sports-wordmark.svg'), 'Gedeon Sports')
        )
        . gedeon_sports_block_group(
            'gs-card__body',
            gedeon_sports_block_group(
                'gs-card__top',
                gedeon_sports_tag('From 2029')
                . gedeon_sports_block_h(3, 'gs-card__name', 'Future athletes')
                . gedeon_sports_block_p('gs-card__text', 'From 2029 the platform adds athletes beyond Formula racing, starting with two and growing to six by 2031. Each has a dedicated company, rights agreement and budget.')
            )
            . gedeon_sports_buttons('gs-card__link', array(array('How we select athletes', gedeon_sports_url('approach'), 'link')))
        )
    );
}

/**
 * Notice / Warning: amber risk notice with a bold first line.
 */
function gedeon_sports_warning(string $title, string $text, string $class = ''): string
{
    return gedeon_sports_block_group(
        trim('gs-warning ' . $class),
        gedeon_sports_block_p('gs-warning__title', $title)
        . gedeon_sports_block_p('gs-warning__text', $text)
    );
}

/**
 * Card / Team: placeholder silhouette (SAMPLE) until real photos arrive, name, role and bio.
 */
function gedeon_sports_card_team(string $name, string $role, string $bio): string
{
    return gedeon_sports_block_group(
        'gs-card gs-card--team',
        gedeon_sports_block_group('gs-card__portrait', gedeon_sports_tag('Sample', 'sample'))
        . gedeon_sports_block_group(
            'gs-card__body',
            gedeon_sports_block_h(3, 'gs-card__name', $name)
            . gedeon_sports_block_p('gs-card__role', $role)
            . gedeon_sports_block_p('gs-card__text', $bio)
        )
    );
}

/**
 * Card / Image: photo (with optional CONCEPT tag) or a dark placeholder with a label, then title and text.
 *
 * @param string $image File in assets/img, or '' for the placeholder.
 * @param string $label Placeholder label, or the image alt text.
 */
function gedeon_sports_card_image(string $image, string $label, string $title, string $text, bool $concept = false, array $link = array()): string
{
    $media = $image
        ? gedeon_sports_block_image('gs-card__media', gedeon_sports_img($image), $label) . ($concept ? gedeon_sports_tag('Concept', 'concept', 'gs-card__tag') : '')
        : gedeon_sports_block_group('gs-card__placeholder', gedeon_sports_block_p('gs-card__placeholder-label', $label));

    return gedeon_sports_block_group(
        'gs-card gs-card--image',
        $media
        . gedeon_sports_block_group(
            'gs-card__body',
            gedeon_sports_block_h(3, 'gs-card__title', $title)
            . gedeon_sports_block_p('gs-card__text', $text)
            . ($link ? gedeon_sports_buttons('gs-card__link', array(array($link[0], $link[1], 'link'))) : '')
        )
    );
}

/**
 * Page Hero / Image (right photo): 3:2 photo anchored right under the dark gradients, copy left
 * (Exclusive, Track & Events, Concierge, Club).
 *
 * @param array $buttons Buttons, as for gedeon_sports_buttons().
 */
function gedeon_sports_hero_image(string $eyebrow, string $title, string $text, array $buttons, string $image, string $alt, string $class = ''): string
{
    $media = gedeon_sports_block_group(
        'gs-hero__media',
        gedeon_sports_block_image('gs-hero__image', gedeon_sports_img($image), $alt)
        . gedeon_sports_tag('Concept', 'concept', 'gs-hero__tag')
    );

    $copy = gedeon_sports_block_group(
        'gs-hero__copy',
        gedeon_sports_eyebrow($eyebrow, 'red')
        . gedeon_sports_block_h(1, 'gs-hero__title', $title)
        . gedeon_sports_block_p('gs-hero__text', $text)
        . ($buttons ? gedeon_sports_buttons('gs-hero__buttons', $buttons) : '')
    );

    return gedeon_sports_block_group(trim('gs-hero gs-hero--right ' . $class), $media . gedeon_sports_block_group('gs-container', $copy), 'section', array('align' => 'full'));
}

/**
 * Full-screen notice (Thank You, 404): the home hero photo under a 78% page-colour overlay, with a
 * centred message and a Back to home button.
 *
 * @param string $kicker Eyebrow text, or the error code when $code is true.
 * @param bool   $code   Show $kicker as a large red code (404) instead of an eyebrow.
 */
function gedeon_sports_notice(string $kicker, string $title, string $text, bool $code = false): string
{
    $top = $code
        ? gedeon_sports_block_p('gs-notice__code', $kicker)
        : gedeon_sports_block_p('gs-eyebrow gs-eyebrow--red gs-notice__eyebrow', $kicker);

    $message = gedeon_sports_block_group(
        'gs-notice__message',
        $top
        . gedeon_sports_block_h(1, 'gs-notice__title', $title)
        . gedeon_sports_block_p('gs-notice__text', $text)
        . gedeon_sports_buttons('gs-notice__buttons', array(array('Back to home', gedeon_sports_url('home'))))
    );

    return gedeon_sports_block_group(
        'gs-notice' . ($code ? ' gs-notice--code' : ''),
        gedeon_sports_block_image('gs-notice__image', gedeon_sports_img('home-hero.webp'))
        . $message,
        'section',
        array('align' => 'full')
    );
}
