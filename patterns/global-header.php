<?php
/**
 * Title: Global Header
 * Slug: gedeon-sports/global-header
 * Categories: gedeon-sports-sections
 * Block Types: core/template-part/header
 * Inserter: no
 * Description: Logo, main navigation (Exclusive opens a submenu) and the Enquire button. Below 1200px the navigation moves into the Menu overlay.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_nav = array(
    array(__('Home', 'gedeon-sports'), gedeon_sports_url('home')),
    array(__('Our Athletes', 'gedeon-sports'), gedeon_sports_url('athletes')),
    array(__('Our Approach', 'gedeon-sports'), gedeon_sports_url('approach')),
    array(__('Investors', 'gedeon-sports'), gedeon_sports_url('investors')),
    array(__('Partnerships', 'gedeon-sports'), gedeon_sports_url('partnerships')),
);
$gedeon_sports_exclusive = array(
    array(__('Overview', 'gedeon-sports'), gedeon_sports_url('exclusive')),
    array(__('Track & Events', 'gedeon-sports'), gedeon_sports_url('track')),
    array(__('Concierge', 'gedeon-sports'), gedeon_sports_url('concierge')),
    array(__('Gedeon Club', 'gedeon-sports'), gedeon_sports_url('club')),
);
$gedeon_sports_link = static function (array $item): string {
    return '<!-- wp:navigation-link {"label":"' . esc_attr($item[0]) . '","url":"' . esc_url($item[1]) . '","kind":"custom"} /-->';
};
?>
<!-- wp:group {"align":"full","className":"gs-header","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull gs-header"><!-- wp:group {"className":"gs-container gs-header__inner","layout":{"type":"default"}} -->
<div class="wp-block-group gs-container gs-header__inner"><!-- wp:image {"sizeSlug":"full","linkDestination":"custom","className":"gs-header__logo"} -->
<figure class="wp-block-image size-full gs-header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo gedeon_sports_img('gedeon-sports-logo.svg'); ?>" alt="<?php esc_attr_e('Gedeon Sports home', 'gedeon-sports'); ?>"/></a></figure>
<!-- /wp:image -->

<!-- wp:navigation {"overlayBackgroundColor":"page","overlayTextColor":"primary","className":"gs-header__nav","layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
<?php
foreach ($gedeon_sports_nav as $gedeon_sports_item) {
    echo $gedeon_sports_link($gedeon_sports_item); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped when built.
}
?>
<!-- wp:navigation-submenu {"label":"<?php echo esc_attr__('Exclusive', 'gedeon-sports'); ?>","url":"<?php echo esc_url(gedeon_sports_url('exclusive')); ?>","kind":"custom"} -->
<?php
foreach ($gedeon_sports_exclusive as $gedeon_sports_item) {
    echo $gedeon_sports_link($gedeon_sports_item); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped when built.
}
?>
<!-- /wp:navigation-submenu -->
<?php echo $gedeon_sports_link(array(__('About & Contact', 'gedeon-sports'), gedeon_sports_url('about'))); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped when built. ?>
<!-- /wp:navigation -->

<!-- wp:buttons {"className":"gs-header__cta"} -->
<div class="wp-block-buttons gs-header__cta"><!-- wp:button {"className":"gs-btn--small"} -->
<div class="wp-block-button gs-btn--small"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url(gedeon_sports_url('contact')); ?>"><?php esc_html_e('Enquire', 'gedeon-sports'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
