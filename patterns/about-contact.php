<?php
/**
 * Title: About Contact
 * Slug: gedeon-sports/about-contact
 * Categories: gedeon-sports-sections
 * Keywords: contact, enquiry, form
 * Description: "Get in touch" — copy and logo panel beside the enquiry form.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_inner = gedeon_sports_block_group(
    'gs-split__copy',
    gedeon_sports_eyebrow('Contact', 'red')
    . gedeon_sports_block_h(2, 'gs-title', 'Get in touch')
    . gedeon_sports_block_p('gs-split__lead', 'Choose the type of enquiry so it reaches the<br class="gs-br"> right person.')
    . gedeon_sports_block_p('gs-contact__note', 'We reply within three working days.')
    . gedeon_sports_block_group('gs-contact__panel', gedeon_sports_block_image('gs-contact__logo', gedeon_sports_img('gedeon-sports-logo-large.svg'), 'Gedeon Sports'))
)
    . gedeon_sports_block_group(
        'gs-split__aside gs-contact__form',
        "<!-- wp:shortcode -->\n[gedeon_sports_form form=\"contact\"]\n<!-- /wp:shortcode -->"
    );

echo gedeon_sports_block_section('gs-section--surface gs-split gs-contact-section', $gedeon_sports_inner, array('anchor' => 'contact')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
