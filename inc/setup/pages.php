<?php
// Included by gedeon_sports_run_setup() (step=all|theme|pages): theme options, the pages built from
// theme patterns and the static front page. Safe to run again.

if (! isset($step)) {
    return;
}

if (in_array($step, array('all', 'theme'), true)) {
    switch_theme('gedeon-sports');
    update_option('permalink_structure', '/%postname%/');
    update_option('blogname', 'Gedeon Sports');
    update_option('blogdescription', 'The business behind racing talent.');
    flush_rewrite_rules();
    echo 'theme: ', get_stylesheet(), "\n";
}

// slug => array(title, comma-separated pattern slugs). Pages without patterns yet are empty.
$pages = array(
    'home'                         => array('Home', 'home-hero,home-group,home-what-we-do,home-athletes,home-approach,home-work-with-us,home-holding,home-cta'),
    'our-athletes'                 => array('Our Athletes', 'athletes-hero,athletes-portfolio,athletes-profiles,athletes-future,athletes-cta'),
    'our-approach'                 => array('Our Approach', 'approach-hero,approach-cycle,approach-responsibilities,approach-gates,approach-workstreams,approach-funding,approach-welfare,approach-cta'),
    'investors'                    => array('Investors', 'investors-hero,investors-ways,investors-value,investors-holdings,investors-portfolio,investors-backing,investors-team,investors-governance,investors-risks,investors-cta'),
    'investor-area'                => array('Investor Area', 'investor-area-hero,investor-area-access,investor-area-preview'),
    'partnerships'                 => array('Partnerships', 'partnerships-hero,partnerships-packages,partnerships-activities,partnerships-placements,partnerships-measurement,partnerships-impact,partnerships-process,partnerships-cta'),
    'exclusive'                    => array('Exclusive', 'exclusive-hero,exclusive-services,exclusive-how,exclusive-where,exclusive-racing,exclusive-cta'),
    'track-and-events'             => array('Track & Events', 'track-hero,track-formats,track-included,track-how,track-partners,track-cta'),
    'concierge'                    => array('Concierge', 'concierge-hero,concierge-services,concierge-how,concierge-discretion,concierge-cta'),
    'club'                         => array('Club', 'club-hero,club-membership,club-season,club-join,club-cta'),
    'about-contact'                => array('About & Contact', 'about-hero,about-leadership,about-group,about-accountability,about-policies,about-company,about-contact'),
    'thank-you'                    => array('Thank You', ''),
    'company-information'          => array('Company Information', ''),
    'privacy-policy'               => array('Privacy Policy', ''),
    'safeguarding-policy'          => array('Safeguarding Policy', ''),
    'conflicts-of-interest-policy' => array('Conflicts of Interest Policy', ''),
);

if (in_array($step, array('all', 'pages'), true)) {
    foreach ($pages as $slug => $page) {
        $content = $page[1] ? implode("\n\n", array_map(
            static fn ($p) => '<!-- wp:pattern {"slug":"gedeon-sports/' . $p . '"} /-->',
            explode(',', $page[1])
        )) : '';
        $existing = get_page_by_path($slug);
        $args     = array(
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_name'    => $slug,
            'post_title'   => $page[0],
            'post_content' => $content,
        );
        if ($existing) {
            $args['ID'] = $existing->ID;
            if (! $page[1]) {
                unset($args['post_content']); // Keep content added since.
            }
        }
        $id = wp_insert_post(wp_slash($args), true);
        echo is_wp_error($id) ? 'ERROR ' . $id->get_error_message() : 'page ' . $id . ' ' . get_permalink($id), "\n";
    }

    $home = get_page_by_path('home');
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home->ID);
    update_option('wp_page_for_privacy_policy', get_page_by_path('privacy-policy')->ID);

    foreach (array(get_page_by_path('sample-page'), get_page_by_path('hello-world', OBJECT, 'post')) as $default) {
        if ($default) {
            wp_trash_post($default->ID);
        }
    }
    echo "front page: {$home->ID}\n";
}
