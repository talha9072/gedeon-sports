<?php
/**
 * Title: Our Athletes Profiles
 * Slug: gedeon-sports/athletes-profiles
 * Categories: gedeon-sports-sections
 * Keywords: profile, record, milestones
 * Description: Expandable athlete profile — background, objectives, programme focus, racing record, milestones and the partner media pack.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_label = static fn (string $text): string => gedeon_sports_block_p('gs-profile__label', $text);

$gedeon_sports_objectives = gedeon_sports_block_list(
    'gs-list gs-list--check',
    array(
        'Complete a full debut season in single-seaters in 2027',
        'Build race pace and consistency in a new class of car',
        'Grow his audience in Croatia and internationally through a season-long content series',
    )
);

$gedeon_sports_chips = '';
foreach (array('Coaching', 'Physical preparation', 'Simulator', 'Media training') as $gedeon_sports_chip) {
    $gedeon_sports_chips .= gedeon_sports_block_p('gs-chip', $gedeon_sports_chip);
}

$gedeon_sports_rows = '';
foreach (
    array(
        array('2026', 'CEZ karting championship', 'Champion'),
        array('2024', 'CEZ karting championship', 'Champion'),
        array('2024', 'Rotax Grand Finals', '6th'),
        array('2023', 'CEZ karting championship', 'Champion'),
        array('2023', 'Rotax Grand Finals', '6th'),
    ) as $gedeon_sports_row
) {
    $gedeon_sports_rows .= '<tr><td>' . $gedeon_sports_row[0] . '</td><td>' . $gedeon_sports_row[1] . '</td><td>' . $gedeon_sports_row[2] . '</td></tr>';
}
$gedeon_sports_table = '<!-- wp:table {"className":"gs-record"} -->' . "\n"
    . '<figure class="wp-block-table gs-record"><table class="has-fixed-layout"><thead><tr><th>Season</th><th>Championship</th><th>Result</th></tr></thead><tbody>' . $gedeon_sports_rows . '</tbody></table></figure>' . "\n"
    . '<!-- /wp:table -->';

$gedeon_sports_milestones = '';
foreach (
    array(
        array('Sep 2026', 'CEZ karting champion for the third time'),
        array('Oct 2026', 'Joins Gedeon Sports. Programme plan for 2027–2031 completed'),
        array('2027', 'Single-seater debut season'),
    ) as $gedeon_sports_milestone
) {
    $gedeon_sports_milestones .= gedeon_sports_block_group(
        'gs-milestone',
        gedeon_sports_block_p('gs-milestone__date', $gedeon_sports_milestone[0])
        . gedeon_sports_block_p('gs-milestone__text', $gedeon_sports_milestone[1])
    );
}

$gedeon_sports_body = gedeon_sports_block_group(
    'gs-profile__overview',
    gedeon_sports_block_group(
        'gs-profile__col',
        $gedeon_sports_label('Background and experience')
        . gedeon_sports_block_p('gs-profile__text', 'Vito began karting at the age of six and has raced in Croatia and across Central Europe since. He has won the CEZ karting championship three times, in 2023, 2024 and 2026, and has twice finished sixth at the Rotax Grand Finals.')
        . gedeon_sports_block_p('gs-profile__text', 'His programme now moves into single-seater racing, with a debut season in 2027. Vitocoza Ltd, the project company behind his career, holds his contracts, rights and programme budget.')
        . gedeon_sports_block_image('gs-profile__photo', gedeon_sports_img('vito-paddock.webp'), 'Vito Ćoza in the paddock before a race')
    )
    . gedeon_sports_block_group(
        'gs-profile__col',
        $gedeon_sports_label('Current objectives')
        . $gedeon_sports_objectives
        . $gedeon_sports_label('Programme focus')
        . gedeon_sports_block_group('gs-chips', $gedeon_sports_chips)
        . $gedeon_sports_label('Next stage gate')
        . gedeon_sports_block_p('gs-profile__gate', 'End of the 2027 season · <a href="' . esc_url(gedeon_sports_url('approach')) . '#stage-gates">Stage 2 gate criteria →</a>')
    )
)
    . gedeon_sports_block_group(
        'gs-profile__record',
        $gedeon_sports_label('Racing record')
        . $gedeon_sports_table
        . gedeon_sports_block_p('gs-profile__small', 'The 2026 title is confirmed by the Croatian Auto and Karting Federation (HAKS).')
    )
    . gedeon_sports_block_group(
        'gs-profile__overview gs-profile__lower',
        gedeon_sports_block_group(
            'gs-profile__col',
            $gedeon_sports_label('Recent milestones')
            . gedeon_sports_block_group('gs-milestones', $gedeon_sports_milestones)
        )
        . gedeon_sports_block_group(
            'gs-profile__col',
            $gedeon_sports_label('For partners')
            . gedeon_sports_block_p('gs-profile__partners', 'A media pack with audience data, available rights and the 2027 race calendar is available to prospective partners.')
            . gedeon_sports_buttons('gs-profile__button', array(array('Request the media pack', gedeon_sports_url('contact'), 'small')))
        )
    )
    . gedeon_sports_block_p('gs-profile__small gs-profile__note', 'Vito is under 18. His family is a shareholder in his project company and approves how his name and image are used, under our <a href="' . esc_url(gedeon_sports_url('safeguarding')) . '">safeguarding policy</a>. We publish his age,<br class="gs-br"> never his date of birth.');

$gedeon_sports_summary = '<img class="gs-profile__avatar" src="' . gedeon_sports_img('avatar-vito-coza.webp') . '" alt=""/>'
    . '<span class="gs-profile__id"><span class="gs-profile__name">Vito Ćoza</span><span class="gs-tag gs-tag--stage">Stage 2</span>'
    . '<span class="gs-profile__meta">Age 14 · Croatia · With Gedeon Sports since 2026</span></span>'
    . '<span class="gs-profile__toggle" aria-hidden="true"></span>';

$gedeon_sports_profile = '<!-- wp:details {"showContent":true,"className":"gs-profile","anchor":"vito-coza"} -->' . "\n"
    . '<details id="vito-coza" class="wp-block-details gs-profile" open><summary>' . $gedeon_sports_summary . '</summary>'
    . gedeon_sports_block_group('gs-profile__body', $gedeon_sports_body)
    . '</details>' . "\n" . '<!-- /wp:details -->';

$gedeon_sports_inner = gedeon_sports_section_heading('Profiles', 'Athlete profiles', 'Background, racing record, objectives for the season ahead and recent milestones.')
    . $gedeon_sports_profile;

echo gedeon_sports_block_section('gs-section--surface gs-profiles', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
