<?php
// Included by gedeon_sports_run_setup(). Sample news posts (SAMPLE content until real posts exist) with
// categories, tags and featured images copied from the theme into the media library, plus the
// News page as the posts page. Safe to run again (posts are matched by slug, images by source).

if (! isset($step) || ! in_array($step, array('all', 'posts'), true)) {
    return;
}

require_once ABSPATH . 'wp-admin/includes/image.php';

$gs_attach = static function (string $file, string $alt): int {
    $found = get_posts(array('post_type' => 'attachment', 'post_status' => 'inherit', 'meta_key' => '_gs_source', 'meta_value' => $file, 'numberposts' => 1, 'fields' => 'ids'));
    if ($found) {
        return (int) $found[0];
    }
    $upload = wp_upload_bits($file, null, (string) file_get_contents(get_theme_file_path('assets/img/' . $file)));
    if (! empty($upload['error'])) {
        echo 'upload error ', $upload['error'], "\n";
        return 0;
    }
    $id = wp_insert_attachment(array('post_mime_type' => 'image/webp', 'post_title' => $alt, 'post_status' => 'inherit'), $upload['file']);
    wp_update_attachment_metadata($id, wp_generate_attachment_metadata($id, $upload['file']));
    update_post_meta($id, '_wp_attachment_image_alt', $alt);
    update_post_meta($id, '_gs_source', $file);
    return (int) $id;
};

$cat_descriptions = array(
    'Athletes'     => 'Results, programmes and career steps for the athletes on our platform.',
    'Partnerships' => 'News about partnership packages, activities and the brands that work with our athletes.',
    'Investors'    => 'Funding rounds, reporting and governance for investors in our athlete projects.',
    'Exclusive'    => 'Track days, concierge and Gedeon Club news from Gedeon Exclusive.',
);
$cats = array();
foreach ($cat_descriptions as $name => $description) {
    $term        = term_exists($name, 'category') ?: wp_insert_term($name, 'category');
    $cats[$name] = (int) $term['term_id'];
    wp_update_term($cats[$name], 'category', array('description' => $description));
}

// Page excerpts: what site search matches and shows for pattern-built pages.
$page_excerpts = array(
    'home'                         => 'Gedeon Sports builds the commercial business around athletes: a company for each athlete, partners to fund it and specialists to deliver it.',
    'our-athletes'                 => 'Proven talent with a business behind it. Every athlete has an individual plan for their sport, career and commercial profile, starting with karting champion Vito Ćoza.',
    'our-approach'                 => 'How each athlete project is run: stage gates, workstreams, funding rounds and welfare, from karting to the international stage.',
    'investors'                    => 'Two ways to invest in athlete projects and the platform, with governance, reporting and the risks set out clearly.',
    'investor-area'                => 'Request access to the investor area for documents, reporting and project updates.',
    'partnerships'                 => 'Partnership packages, activities and branding placements with our athletes, measured and reported to partners.',
    'exclusive'                    => 'Gedeon Exclusive: supercar track days and events, car concierge and a private members’ club across the UK, Croatia and Monaco.',
    'track-and-events'             => 'Corporate track days, client hospitality, launches and supercar tours, planned and run from the first call to the final lap.',
    'concierge'                    => 'One point of contact for your cars: collection, servicing, storage, track preparation and seasonal care.',
    'club'                         => 'Gedeon Club, a private members’ club with its own season of track days, club races, coaching and weekends away.',
    'about-contact'                => 'About Gedeon Sports, the team and the group, with company information, policies and the enquiry form.',
    'company-information'          => 'Registered company details for Gedeon Sports and its athlete project companies.',
    'privacy-policy'               => 'How we use personal data from enquiries and the investor area.',
    'safeguarding-policy'          => 'How we protect athletes under 18: guardian involvement, consent for images and board oversight.',
    'conflicts-of-interest-policy' => 'How we act fairly when several athletes are considered for the same opportunity, and how related-party fees are approved.',
);
foreach ($page_excerpts as $slug => $excerpt) {
    $page = get_page_by_path($slug);
    if ($page) {
        wp_update_post(array('ID' => $page->ID, 'post_excerpt' => $excerpt));
    }
}

$p = static function (string $html, string $class = ''): string {
    $attrs = $class ? ' {"className":"' . $class . '"}' : '';
    return "<!-- wp:paragraph{$attrs} -->\n<p" . ($class ? ' class="' . $class . '"' : '') . ">{$html}</p>\n<!-- /wp:paragraph -->";
};
$h3 = static fn (string $html): string => "<!-- wp:heading {\"level\":3} -->\n<h3 class=\"wp-block-heading\">{$html}</h3>\n<!-- /wp:heading -->";

$figure_id  = $gs_attach('vito-paddock.webp', 'Vito Ćoza in the paddock');
$figure_src = esc_url((string) wp_get_attachment_image_url($figure_id, 'full'));
$items      = array('A full debut season in single-seaters', 'Pre-season testing with the race team', 'A season-long content series for partners');
$list       = implode("\n\n", array_map(static fn ($i) => "<!-- wp:list-item -->\n<li>{$i}</li>\n<!-- /wp:list-item -->", $items));

$article = implode("\n\n", array(
    $p('Vito Ćoza has won the CEZ karting championship for the third time, after titles in 2023 and 2024. The result closes his karting career before the move into single-seaters in 2027.', 'gs-lead'),
    $p('The 2026 season was decided over consistent finishes rather than single results. Vito led the standings from the second round and scored points at every event, with the title confirmed by the Croatian Auto and Karting Federation (HAKS).'),
    $h3('A season built on consistency'),
    $p('His programme combined testing, physical preparation and simulator work, planned with his driver manager and race team. Each block of the season was reviewed against agreed objectives before the next was committed.'),
    "<!-- wp:image {\"id\":{$figure_id},\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"align\":\"wide\",\"className\":\"gs-article__figure\"} -->\n<figure class=\"wp-block-image alignwide size-full gs-article__figure\"><img src=\"{$figure_src}\" alt=\"Vito Ćoza in the paddock\" class=\"wp-image-{$figure_id}\"/><figcaption class=\"wp-element-caption\">Vito in the paddock before the final round of the 2026 season.</figcaption></figure>\n<!-- /wp:image -->",
    $h3('What comes next'),
    $p('In 2027 Vito moves into single-seater racing. The plan for the season covers:'),
    "<!-- wp:list {\"className\":\"gs-list gs-list--check\"} -->\n<ul class=\"wp-block-list gs-list gs-list--check\">{$list}</ul>\n<!-- /wp:list -->",
    "<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><!-- wp:paragraph -->\n<p>“Three titles in karting is the foundation. Now the work is to build the same consistency in a new class of car.”</p>\n<!-- /wp:paragraph --><cite>Ivan Babić, Managing Director</cite></blockquote>\n<!-- /wp:quote -->",
    $p('Partners can join the 2027 programme at principal, major or official level, with objectives, rights and reporting agreed at the outset.'),
));

$short = static fn (string $lead, string $body): string => $p($lead, 'gs-lead') . "\n\n" . $p($body);

// slug => title, category, date, excerpt, image, image alt, tags, content.
$posts = array(
    'vito-coza-wins-a-third-cez-karting-title' => array('Vito Ćoza wins a third CEZ karting title', 'Athletes', '2026-09-12 10:00:00', 'A season of consistent results ends with the championship, ahead of the step into single-seaters in 2027.', 'partnerships-vito-rmc.webp', 'Vito Ćoza with the Croatian flag at the RMC Grand Finals', array('Vito Ćoza', 'Karting', 'Results'), $article),
    'partnership-packages-for-the-2027-season' => array('Partnership packages for the 2027 season', 'Partnerships', '2026-10-30 10:00:00', 'Principal, major and official partner places are now open, along with the Business Club.', 'car-placements.webp', 'A single-seater showing partner branding positions', array('Partnerships', '2027'), $short('Principal, major and official partner places for the 2027 season are now open, along with the Business Club.', 'Each package sets out objectives, rights and reporting at the outset, so partners know what they receive and how it is measured.')),
    'how-each-athlete-project-is-funded'       => array('How each athlete project is funded', 'Investors', '2026-10-15 10:00:00', 'Four funding rounds, each opened on agreed evidence, with quarterly reporting for investors.', 'vito-paddock.webp', 'Vito Ćoza in the paddock', array('Funding', 'Investors'), $short('Each athlete project is funded in four rounds, and each round opens only on agreed evidence.', 'Investors receive quarterly reporting on budgets, results and commercial income through the investor area.')),
    'track-days-and-supercar-tours-for-2027'   => array('Track days and supercar tours for 2027', 'Exclusive', '2026-10-02 10:00:00', 'Corporate track days, client hospitality and road tours across the UK, Croatia and Monaco.', 'track-format-track.webp', 'Supercars on a circuit at dusk', array('Track & Events', '2027'), $short('The 2027 calendar of corporate track days, client hospitality and road tours is now open for enquiries.', 'Events run across the UK, Croatia and Monaco, planned and delivered by one event manager from the first call to the final lap.')),
    'from-karting-to-single-seaters'           => array('From karting to single-seaters', 'Athletes', '2026-08-20 10:00:00', 'What changes for Vito in 2027, from testing and engineering to a new race calendar.', 'approach-vito-flag.webp', 'Vito Ćoza with the Croatian flag', array('Vito Ćoza', 'Single-seaters'), $short('The step from karting to single-seaters changes almost everything: the car, the testing programme and the race calendar.', 'Vito’s 2027 programme is planned with his driver manager and race team, with each stage reviewed before the next is committed.')),
    'introducing-gedeon-club'                  => array('Introducing Gedeon Club', 'Exclusive', '2026-08-05 10:00:00', 'A private members’ club with its own season of track days, club races and weekends away.', 'club-calendar.webp', 'Supercars lined up on a circuit at sunset', array('Gedeon Club', 'Membership'), $short('Gedeon Club is a private members’ club with its own season of track days, club races and weekends away.', 'Membership is by application, with coaching, arrive-and-drive cars and paddock access at our athletes’ race weekends.')),
);

foreach ($posts as $slug => $post) {
    $existing = get_page_by_path($slug, OBJECT, 'post');
    $args     = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'post_name'     => $slug,
        'post_title'    => $post[0],
        'post_date'     => $post[2],
        'post_excerpt'  => $post[3],
        'post_content'  => $post[7],
        'post_category' => array($cats[$post[1]]),
        'tags_input'    => $post[6],
    );
    if ($existing) {
        $args['ID'] = $existing->ID;
    }
    $id = wp_insert_post(wp_slash($args), true);
    if (is_wp_error($id)) {
        echo 'ERROR ', $id->get_error_message(), "\n";
        continue;
    }
    set_post_thumbnail($id, $gs_attach($post[4], $post[5]));
    echo 'post ', $id, ' ', get_permalink($id), "\n";
}

$news    = get_page_by_path('news');
$news_id = $news ? $news->ID : wp_insert_post(array('post_type' => 'page', 'post_status' => 'publish', 'post_name' => 'news', 'post_title' => 'News'));
update_option('page_for_posts', $news_id);
update_option('posts_per_page', 6);
echo 'posts page: ', get_permalink($news_id), "\n";
