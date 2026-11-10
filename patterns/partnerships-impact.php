<?php
/**
 * Title: Partnerships Impact
 * Slug: gedeon-sports/partnerships-impact
 * Categories: gedeon-sports-sections
 * Keywords: impact, funding, receipts
 * Description: "Your partnership funds an athlete's programme" beside the 2031 receipts bar.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_chart = '<div class="gs-mix gs-mix--single">'
    . '<div class="gs-mix__rows"><div class="gs-mix__row"><span class="gs-mix__year">2031</span><span class="gs-mix__bar">'
    . '<span class="gs-mix__seg gs-mix__seg--sponsors" style="width:25%">Sponsors</span>'
    . '<span class="gs-mix__seg gs-mix__seg--commercial" style="width:62.5%">Commercial</span>'
    . '<span class="gs-mix__seg gs-mix__seg--holding" style="width:12.5%"></span>'
    . '</span></div></div>'
    . '<div class="gs-mix__legend"><span class="gs-mix__key gs-mix__key--sponsors">Private sponsors</span><span class="gs-mix__key gs-mix__key--commercial">Commercial income</span><span class="gs-mix__key gs-mix__key--holding">Gedeon Holding</span></div>'
    . '<p class="gs-mix__note">Share of planned 2031 receipts</p>'
    . '</div>';

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Impact', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Your partnership<br class="gs-br"> funds an athlete’s<br class="gs-br"> programme')
    . gedeon_sports_block_p('gs-split__lead', 'Partner income goes directly into the athlete’s programme. By 2031, sponsorship and commercial income are planned to fund most of Vito’s season.')
    . gedeon_sports_buttons('gs-impact__link', array(array('How programmes are funded', gedeon_sports_url('approach'), 'link')))
)
    . gedeon_sports_block_group('gs-split__aside', gedeon_sports_block_html($gedeon_sports_chart));

echo gedeon_sports_block_section('gs-split gs-impact', $gedeon_sports_inner); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
