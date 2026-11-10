<?php
/**
 * News (blog) helpers: the category filter pills used on the news and category archives.
 *
 * @package Gedeon_Sports
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Category filter pills: All plus every category that has posts (the default category is left out).
 * The current archive's pill is active.
 */
function gedeon_sports_post_filters_shortcode(): string
{
    $posts_page = (int) get_option('page_for_posts');
    $all_url    = $posts_page ? get_permalink($posts_page) : home_url('/');
    $current    = is_category() ? (int) get_queried_object_id() : 0;

    $terms = get_terms(
        array(
            'taxonomy'   => 'category',
            'hide_empty' => true,
            'exclude'    => array((int) get_option('default_category')),
            'orderby'    => 'term_id',
        )
    );

    $pill = static function (string $label, string $url, bool $active): string {
        return '<a class="gs-filter-pill' . ($active ? ' is-active' : '') . '" href="' . esc_url($url) . '"' . ($active ? ' aria-current="page"' : '') . '>' . esc_html($label) . '</a>';
    };

    $html = $pill(__('All', 'gedeon-sports'), $all_url, ! $current && ! is_search());
    if (! is_wp_error($terms)) {
        foreach ($terms as $term) {
            $html .= $pill($term->name, get_term_link($term), $current === (int) $term->term_id);
        }
    }

    return '<nav class="gs-filters gs-post-filters" aria-label="' . esc_attr__('News categories', 'gedeon-sports') . '">' . $html . '</nav>';
}
add_shortcode('gedeon_sports_post_filters', 'gedeon_sports_post_filters_shortcode');

/**
 * Shorter excerpts for the post cards.
 */
add_filter('excerpt_length', static fn () => 24, 20);
add_filter('excerpt_more', static fn () => '…');

/**
 * Pages carry a hand-written excerpt: their content is pattern references, so the excerpt is what
 * site search matches and shows.
 */
add_action('init', static fn () => add_post_type_support('page', 'excerpt'));

/**
 * Archive hero (Page Hero / Mark) for category and search archives: eyebrow, title and text come
 * from the current query.
 */
function gedeon_sports_archive_hero_shortcode(): string
{
    if (is_search()) {
        global $wp_query;
        $count   = (int) $wp_query->found_posts;
        $eyebrow = __('Search', 'gedeon-sports');
        $title   = __('Search results', 'gedeon-sports');
        /* translators: 1: number of results, 2: search term. */
        $text = sprintf(_n('%1$s result for “%2$s”', '%1$s results for “%2$s”', $count, 'gedeon-sports'), number_format_i18n($count), get_search_query());
    } elseif (is_category() || is_tag()) {
        $term    = get_queried_object();
        $eyebrow = is_category() ? __('Category', 'gedeon-sports') : __('Topic', 'gedeon-sports');
        $title   = $term->name;
        $text    = $term->description ?: __('Results, partnerships and announcements from Gedeon Sports and our athletes.', 'gedeon-sports');
    } else {
        $eyebrow = __('News', 'gedeon-sports');
        $title   = wp_strip_all_tags(get_the_archive_title());
        $text    = __('Results, partnerships and announcements from Gedeon Sports and our athletes.', 'gedeon-sports');
    }

    return '<section class="gs-hero-mark gs-hero-mark--archive alignfull"><div class="gs-container">'
        . '<div class="gs-hero-mark__copy"><p class="gs-eyebrow gs-eyebrow--red">' . esc_html($eyebrow) . '</p>'
        . '<h1 class="gs-hero-mark__title">' . esc_html($title) . '</h1>'
        . '<p class="gs-hero-mark__text">' . esc_html($text) . '</p></div>'
        . '<div class="gs-hero-mark__aside"><figure class="gs-hero-mark__logo"><img src="' . esc_url(gedeon_sports_img('gedeon-sports-mark-faded.svg')) . '" alt=""></figure></div>'
        . '</div></section>';
}
add_shortcode('gedeon_sports_archive_hero', 'gedeon_sports_archive_hero_shortcode');

/**
 * Search bar: field with the search icon, Search button and the result count.
 */
function gedeon_sports_search_bar_shortcode(): string
{
    global $wp_query;
    $count = is_search() ? (int) $wp_query->found_posts : 0;

    return '<div class="gs-search-bar"><form class="gs-search" role="search" method="get" action="' . esc_url(home_url('/')) . '">'
        . '<label class="screen-reader-text" for="gs-search-field">' . esc_html__('Search the site', 'gedeon-sports') . '</label>'
        . '<span class="gs-search__field"><input id="gs-search-field" type="search" name="s" value="' . esc_attr(get_search_query()) . '" placeholder="' . esc_attr__('Search', 'gedeon-sports') . '"></span>'
        . '<button type="submit" class="gs-search__button">' . esc_html__('Search', 'gedeon-sports') . '</button></form>'
        . (is_search() ? '<p class="gs-search-bar__count">' . esc_html(sprintf(_n('%s result', '%s results', $count, 'gedeon-sports'), number_format_i18n($count))) . '</p>' : '')
        . '</div>';
}
add_shortcode('gedeon_sports_search_bar', 'gedeon_sports_search_bar_shortcode');

/**
 * Search results list: type label, title, excerpt, path and a link, then the pagination.
 */
function gedeon_sports_search_results_shortcode(): string
{
    global $wp_query;
    if (! is_search() || ! have_posts()) {
        return '<p class="gs-posts__empty">' . esc_html__('Nothing matched your search. Try a different word, or browse the news.', 'gedeon-sports') . '</p>';
    }

    $items = '';
    foreach ($wp_query->posts as $post) {
        $is_post = 'post' === $post->post_type;
        $url     = get_permalink($post);
        $path    = untrailingslashit((string) wp_parse_url($url, PHP_URL_PATH));
        $items  .= '<article class="gs-result">'
            . '<p class="gs-result__type">' . esc_html($is_post ? __('News', 'gedeon-sports') : __('Page', 'gedeon-sports')) . '</p>'
            . '<h2 class="gs-result__title"><a href="' . esc_url($url) . '">' . esc_html(get_the_title($post)) . '</a></h2>'
            . '<p class="gs-result__text">' . esc_html(wp_strip_all_tags(get_the_excerpt($post))) . '</p>'
            . '<p class="gs-result__links"><span class="gs-result__path">' . esc_html($path ?: '/') . '</span>'
            . '<a class="gs-result__more" href="' . esc_url($url) . '">' . esc_html($is_post ? __('Read article', 'gedeon-sports') : __('View page', 'gedeon-sports')) . '</a></p>'
            . '</article>';
    }

    $pages = paginate_links(
        array(
            'total'     => (int) $wp_query->max_num_pages,
            'current'   => max(1, (int) get_query_var('paged')),
            'prev_text' => '<span aria-hidden="true">←</span><span class="screen-reader-text">' . esc_html__('Previous page', 'gedeon-sports') . '</span>',
            'next_text' => '<span aria-hidden="true">→</span><span class="screen-reader-text">' . esc_html__('Next page', 'gedeon-sports') . '</span>',
            'end_size'  => 1,
            'mid_size'  => 1,
        )
    );

    return '<div class="gs-results">' . $items . '</div>'
        . ($pages ? '<nav class="gs-pagination gs-pagination--links" aria-label="' . esc_attr__('Search results pages', 'gedeon-sports') . '">' . $pages . '</nav>' : '');
}
add_shortcode('gedeon_sports_search_results', 'gedeon_sports_search_results_shortcode');

/**
 * Post card markup (same as the post grid template part), used for related articles.
 */
function gedeon_sports_post_card(WP_Post $post): string
{
    $url   = get_permalink($post);
    $cats  = get_the_category($post->ID);
    $cat   = $cats ? '<a href="' . esc_url(get_category_link($cats[0])) . '">' . esc_html($cats[0]->name) . '</a>' : '';
    $thumb = get_the_post_thumbnail($post, 'large', array('style' => 'aspect-ratio:363/226;object-fit:cover'));

    return '<li><div class="gs-card gs-card--post">'
        . ($thumb ? '<figure class="gs-card__media"><a href="' . esc_url($url) . '">' . $thumb . '</a></figure>' : '')
        . '<div class="gs-card__body"><div class="gs-card__meta"><div class="gs-card__category">' . $cat . '</div>'
        . '<div class="gs-card__date"><time datetime="' . esc_attr(get_the_date('c', $post)) . '">' . esc_html(get_the_date('j M Y', $post)) . '</time></div></div>'
        . '<h3 class="gs-card__title"><a href="' . esc_url($url) . '">' . esc_html(get_the_title($post)) . '</a></h3>'
        . '<div class="gs-card__text"><p>' . esc_html(wp_strip_all_tags(get_the_excerpt($post))) . '</p></div>'
        . '<a class="gs-card__more" href="' . esc_url($url) . '">' . esc_html__('Read article', 'gedeon-sports') . '</a></div></div></li>';
}

/**
 * Single post hero: featured image on the right under the dark gradients; category, title, date and
 * reading time on the left.
 */
function gedeon_sports_post_hero_shortcode(): string
{
    $post = get_post();
    if (! $post) {
        return '';
    }
    $cats    = get_the_category($post->ID);
    $words   = str_word_count(wp_strip_all_tags((string) $post->post_content));
    $minutes = max(1, (int) ceil($words / 200));
    /* translators: %s: minutes. */
    $meta  = get_the_date('j F Y', $post) . ' · ' . sprintf(_n('%s min read', '%s min read', $minutes, 'gedeon-sports'), number_format_i18n($minutes));
    $thumb = get_the_post_thumbnail($post, 'full', array('loading' => 'eager', 'fetchpriority' => 'high'));

    return '<section class="gs-hero gs-hero--right gs-hero--post alignfull">'
        . ($thumb ? '<div class="gs-hero__media"><figure class="gs-hero__image">' . $thumb . '</figure></div>' : '')
        . '<div class="gs-container"><div class="gs-hero__copy">'
        . ($cats ? '<p class="gs-eyebrow gs-eyebrow--red">' . esc_html($cats[0]->name) . '</p>' : '')
        . '<h1 class="gs-hero__title">' . esc_html(get_the_title($post)) . '</h1>'
        . '<p class="gs-hero__text">' . esc_html($meta) . '</p>'
        . '</div></div></section>';
}
add_shortcode('gedeon_sports_post_hero', 'gedeon_sports_post_hero_shortcode');

/**
 * Article footer: topic chips (tags) and the back link to all news.
 */
function gedeon_sports_post_footer_shortcode(): string
{
    $tags  = get_the_tags();
    $chips = '';
    foreach ($tags ?: array() as $tag) {
        $chips .= '<a class="gs-chip" href="' . esc_url(get_tag_link($tag)) . '">' . esc_html($tag->name) . '</a>';
    }
    $posts_page = (int) get_option('page_for_posts');

    return '<div class="gs-article__footer"><div class="gs-article__topics">' . $chips . '</div>'
        . '<a class="gs-article__back" href="' . esc_url($posts_page ? get_permalink($posts_page) : home_url('/')) . '">← ' . esc_html__('All news', 'gedeon-sports') . '</a></div>';
}
add_shortcode('gedeon_sports_post_footer', 'gedeon_sports_post_footer_shortcode');

/**
 * Related articles: three other posts, same category first.
 */
function gedeon_sports_related_shortcode(): string
{
    $post = get_post();
    if (! $post) {
        return '';
    }
    $cats    = wp_get_post_categories($post->ID);
    $related = get_posts(array('numberposts' => 3, 'post__not_in' => array($post->ID), 'category__in' => $cats));
    if (count($related) < 3) {
        $related = array_merge(
            $related,
            get_posts(array('numberposts' => 3 - count($related), 'post__not_in' => array_merge(array($post->ID), wp_list_pluck($related, 'ID'))))
        );
    }
    if (! $related) {
        return '';
    }

    return '<section class="gs-section gs-section--surface gs-related-section alignfull"><div class="gs-container"><div class="gs-heading"><p class="gs-eyebrow gs-eyebrow--grey">' . esc_html__('More news', 'gedeon-sports') . '</p><h2 class="gs-title">' . esc_html__('Related articles', 'gedeon-sports') . '</h2></div>'
        . '<div class="gs-posts gs-posts--related"><ul class="gs-posts__grid">' . implode('', array_map('gedeon_sports_post_card', $related)) . '</ul></div></div></section>';
}
add_shortcode('gedeon_sports_related', 'gedeon_sports_related_shortcode');

/**
 * Policy page title: eyebrow (page meta _gs_eyebrow, default "Policies"), title and last updated date.
 */
function gedeon_sports_page_title_shortcode(): string
{
    $post = get_post();
    if (! $post) {
        return '';
    }
    $eyebrow = get_post_meta($post->ID, '_gs_eyebrow', true) ?: __('Policies', 'gedeon-sports');

    return '<section class="gs-page-title alignfull"><div class="gs-container">'
        . '<p class="gs-eyebrow gs-eyebrow--red">' . esc_html($eyebrow) . '</p>'
        . '<h1 class="gs-page-title__title">' . esc_html(get_the_title($post)) . '</h1>'
        /* translators: %s: date. */
        . '<p class="gs-page-title__meta">' . esc_html(sprintf(__('Last updated: %s', 'gedeon-sports'), get_the_modified_date('j F Y', $post))) . '</p>'
        . '</div></section>';
}
add_shortcode('gedeon_sports_page_title', 'gedeon_sports_page_title_shortcode');
