<?php
/**
 * Title: Investor Area Request Access
 * Slug: gedeon-sports/investor-area-access
 * Categories: gedeon-sports-sections
 * Keywords: form, investor, access, steps
 * Description: Four-step progress bar (step 1 active) above the Request access form.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_steps = '';
foreach (array('Request access', 'Investor type', 'Confidentiality &amp; risk', 'Access') as $gedeon_sports_i => $gedeon_sports_label) {
    $gedeon_sports_steps .= gedeon_sports_block_p(
        'gs-stepper__step' . (0 === $gedeon_sports_i ? ' is-current' : ''),
        '<strong>' . ($gedeon_sports_i + 1) . '.</strong> ' . $gedeon_sports_label
    );
}

$gedeon_sports_inner = gedeon_sports_block_group('gs-stepper', $gedeon_sports_steps)
    . gedeon_sports_block_group('gs-form-card', "<!-- wp:shortcode -->\n[gedeon_sports_form form=\"access\"]\n<!-- /wp:shortcode -->");

echo gedeon_sports_block_section('gs-access', $gedeon_sports_inner, array('anchor' => 'request-access')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
