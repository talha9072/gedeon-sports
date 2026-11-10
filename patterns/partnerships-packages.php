<?php
/**
 * Title: Partnerships Packages
 * Slug: gedeon-sports/partnerships-packages
 * Categories: gedeon-sports-sections
 * Keywords: packages, tiers, sponsorship
 * Description: "Four levels of partnership" — principal, major, official and Business Club tiers.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_tiers = array(
    array('Principal partner', 'One lead partner per season', array('Lead branding inventory', 'A dedicated brand campaign', 'Athlete appearances', 'Season report and review'), 'Discuss', true),
    array('Major partner', 'Strong visibility on and off track', array('Car, racewear or helmet placement', 'Content collaborations', 'Partner events', 'Season report'), 'Discuss'),
    array('Official partner', 'A defined category role', array('Specific branding', 'Digital content', 'Agreed access to the athlete and team', 'Season report'), 'Discuss'),
    array('Business Club', 'For companies and business owners', array('Business introductions across the Gedeon network', 'Approved race-weekend and hospitality experiences', 'Club events'), 'Join'),
);

$gedeon_sports_cards = '';
foreach ($gedeon_sports_tiers as $gedeon_sports_tier) {
    $gedeon_sports_featured = ! empty($gedeon_sports_tier[4]);
    $gedeon_sports_cards   .= gedeon_sports_block_group(
        'gs-tier' . ($gedeon_sports_featured ? ' is-featured' : ''),
        gedeon_sports_block_group(
            'gs-tier__top',
            gedeon_sports_block_h(3, 'gs-tier__name', $gedeon_sports_tier[0])
            . gedeon_sports_block_p('gs-tier__lede', $gedeon_sports_tier[1])
            . gedeon_sports_block_p('gs-tier__price', 'Price on request')
            . gedeon_sports_block_list('gs-list gs-list--check gs-list--small', $gedeon_sports_tier[2])
        )
        . gedeon_sports_buttons('gs-tier__button', array(array($gedeon_sports_tier[3], gedeon_sports_url('contact'), $gedeon_sports_featured ? 'small' : 'secondary-small')))
    );
}

$gedeon_sports_inner = gedeon_sports_section_heading(
    'Packages',
    'Four levels of partnership',
    'Every package is tailored to your objectives, and to the rights approved by the athlete,<br class="gs-br"> family, team and series.'
)
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-tiers', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-packages', $gedeon_sports_inner, array('anchor' => 'packages')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
