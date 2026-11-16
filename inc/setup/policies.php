<?php
// Included by gedeon_sports_run_setup() (step=all|policies). Policy and company information pages: the Policy
// template plus placeholder content (CONTENT NEEDED from the client) that editors replace.

if (! isset($step) || ! in_array($step, array('all', 'policies'), true)) {
    return;
}

$p = static fn (string $html, string $class = ''): string => '<!-- wp:paragraph' . ($class ? ' {"className":"' . $class . '"}' : '') . " -->\n<p" . ($class ? ' class="' . $class . '"' : '') . ">{$html}</p>\n<!-- /wp:paragraph -->";
$h = static fn (string $html): string => "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">{$html}</h2>\n<!-- /wp:heading -->";

$notice = static fn (string $what): string => "<!-- wp:group {\"className\":\"gs-content-needed\",\"layout\":{\"type\":\"default\"}} -->\n<div class=\"wp-block-group gs-content-needed\">"
    . $p('<strong>Content needed from client.</strong> The text on this page is a placeholder that shows the layout. Gedeon Sports will supply the final ' . $what . '.')
    . "</div>\n<!-- /wp:group -->";

$placeholder = 'Placeholder text. The final wording of this section will be supplied by Gedeon Sports and reviewed before the page is published.';

$policies = array(
    'privacy-policy'               => array('privacy policy', array('Who we are', 'What we collect', 'How we use your data', 'How long we keep it', 'Your rights', 'Contact')),
    'safeguarding-policy'          => array('safeguarding policy', array('Our commitment', 'Scope', 'Guardian involvement and consent', 'Images and media', 'Reporting a concern', 'Board oversight')),
    'conflicts-of-interest-policy' => array('conflicts of interest policy', array('Purpose', 'When a conflict can arise', 'How we manage conflicts', 'Related-party fees', 'Reporting and review')),
);

foreach ($policies as $slug => $policy) {
    $blocks = array($notice($policy[0]));
    foreach ($policy[1] as $i => $title) {
        $blocks[] = $h(($i + 1) . '. ' . $title);
        $blocks[] = $p($placeholder);
    }
    $page = get_page_by_path($slug);
    if (! $page) {
        continue;
    }
    wp_update_post(wp_slash(array('ID' => $page->ID, 'post_content' => implode("\n\n", $blocks))));
    update_post_meta($page->ID, '_wp_page_template', 'page-policy');
    echo 'policy ', $page->ID, ' ', get_permalink($page), "\n";
}

$company = get_page_by_path('company-information');
if ($company) {
    $rows = '';
    foreach (
        array(
            'Registered name'         => 'Gedeon Sports Ltd',
            'Company number'          => '00000000',
            'Registered address'      => '[Registered address]',
            'Parent company'          => 'Gedeon Holding',
            'Athlete project company' => 'Vitocoza Ltd',
            'VAT / tax ID'            => '[VAT number]',
            'Email'                   => 'hello@gedeonsports.example',
        ) as $label => $value
    ) {
        $rows .= "<!-- wp:group {\"className\":\"gs-details__row\",\"layout\":{\"type\":\"default\"}} -->\n<div class=\"wp-block-group gs-details__row\">" . $p($label, 'gs-details__label') . "\n\n" . $p($value, 'gs-details__value') . "</div>\n<!-- /wp:group -->\n\n";
    }
    $content = $notice('company information') . "\n\n<!-- wp:group {\"className\":\"gs-details-list\",\"layout\":{\"type\":\"default\"}} -->\n<div class=\"wp-block-group gs-details-list\">" . $rows . "</div>\n<!-- /wp:group -->";
    wp_update_post(wp_slash(array('ID' => $company->ID, 'post_content' => $content)));
    update_post_meta($company->ID, '_wp_page_template', 'page-policy');
    update_post_meta($company->ID, '_gs_eyebrow', 'Company');
    echo 'company ', $company->ID, ' ', get_permalink($company), "\n";
}
