<?php
/**
 * Site forms: the investor access request and the contact enquiry.
 *
 * Each form is a shortcode (so it sits in a core Shortcode block inside the patterns) and posts to
 * admin-post.php. Submissions are emailed to the site admin address and the visitor is sent to the
 * Thank You page. A honeypot field and a nonce keep out simple spam.
 *
 * @package Gedeon_Sports
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Form definitions: fields as name => array(label, type, options|placeholder, required, 'full', helper).
 * Types: text, email, tel, select, textarea, radio (option tiles, last option preselected) and consent
 * (a required checkbox whose label links to the privacy policy).
 */
function gedeon_sports_forms(): array
{
    return array(
        'access'  => array(
            'title'   => __('Request access', 'gedeon-sports'),
            'subject' => __('Investor access request', 'gedeon-sports'),
            'button'  => __('Continue', 'gedeon-sports'),
            'fields'  => array(
                'full_name' => array(__('Full name', 'gedeon-sports'), 'text', '', true),
                'email'     => array(__('Email', 'gedeon-sports'), 'email', '', true),
                'country'   => array(__('Country of residence', 'gedeon-sports'), 'select', array('Croatia', 'Austria', 'Germany', 'Italy', 'Slovenia', 'Switzerland', 'United Kingdom', 'Other'), true),
                'investing' => array(__('Investing as', 'gedeon-sports'), 'select', array('Individual', 'Company', 'Family office', 'Professional investor'), true),
                'interest'  => array(__('Interested in', 'gedeon-sports'), 'select', array('Athlete project: Vito Ćoza', 'Platform: Gedeon Sports', 'Both'), true, 'full'),
            ),
        ),
        'contact' => array(
            'title'   => '',
            'subject' => __('Website enquiry', 'gedeon-sports'),
            'button'  => __('Send enquiry', 'gedeon-sports'),
            'fields'  => array(
                'topic'     => array(__('Enquiry type', 'gedeon-sports'), 'radio', array('Investor access', 'Commercial partner', 'Athlete representation', 'Track & Events', 'Concierge', 'Club membership', 'General'), true, 'full', __('For media, general questions or anything else.', 'gedeon-sports')),
                'full_name' => array(__('Full name', 'gedeon-sports'), 'text', '', true),
                'company'   => array(__('Organisation', 'gedeon-sports'), 'text', '', false),
                'email'     => array(__('Email', 'gedeon-sports'), 'email', '', true),
                'phone'     => array(__('Phone', 'gedeon-sports'), 'tel', '', false),
                'message'   => array(__('Message', 'gedeon-sports'), 'textarea', '', true, 'full'),
                'consent'   => array(__('I agree to my details being used to respond to this enquiry, as described in the %s.', 'gedeon-sports'), 'consent', '', true, 'full'),
            ),
        ),
    );
}

/**
 * Render a form.
 *
 * @param array $atts Shortcode attributes: form (access|contact).
 */
function gedeon_sports_form_shortcode($atts = array()): string
{
    $atts  = shortcode_atts(array('form' => 'contact'), $atts, 'gedeon_sports_form');
    $forms = gedeon_sports_forms();
    $key   = isset($forms[$atts['form']]) ? $atts['form'] : 'contact';
    $form  = $forms[$key];

    $rows = '';
    foreach ($form['fields'] as $name => $field) {
        [$label, $type] = $field;
        $id       = 'gs-' . $key . '-' . $name;
        $required = ! empty($field[3]) ? ' required' : '';
        $class    = 'gs-field' . (! empty($field[4]) ? ' gs-field--full' : '') . ('select' === $type ? ' gs-field--select' : '');

        if ('radio' === $type) {
            $options = '';
            $last    = count($field[2]) - 1;
            foreach ($field[2] as $i => $option) {
                $options .= '<label class="gs-choice"><input type="radio" name="' . esc_attr($name) . '" value="' . esc_attr($option) . '"' . ($i === $last ? ' checked' : '') . $required . '><span>' . esc_html($option) . '</span></label>';
            }
            $help  = ! empty($field[5]) ? '<p class="gs-field__help">' . esc_html($field[5]) . '</p>' : '';
            $rows .= '<fieldset class="gs-field gs-field--full gs-field--choices"><legend>' . esc_html($label) . '</legend><div class="gs-choices">' . $options . '</div>' . $help . '</fieldset>';
            continue;
        }

        if ('consent' === $type) {
            $link  = '<a href="' . esc_url(gedeon_sports_url('privacy')) . '">' . esc_html__('privacy policy', 'gedeon-sports') . '</a>';
            $rows .= '<p class="gs-field gs-field--full gs-field--consent"><label><input type="checkbox" name="' . esc_attr($name) . '" value="yes"' . $required . '><span>' . sprintf(esc_html($label), $link) . '</span></label></p>';
            continue;
        }

        if ('select' === $type) {
            $options = '';
            foreach ($field[2] as $option) {
                $options .= '<option>' . esc_html($option) . '</option>';
            }
            $control = '<select id="' . esc_attr($id) . '" name="' . esc_attr($name) . '"' . $required . '>' . $options . '</select>';
        } elseif ('textarea' === $type) {
            $control = '<textarea id="' . esc_attr($id) . '" name="' . esc_attr($name) . '" rows="5"' . $required . '></textarea>';
        } else {
            $control = '<input id="' . esc_attr($id) . '" type="' . esc_attr($type) . '" name="' . esc_attr($name) . '"' . ('email' === $type ? ' autocomplete="email"' : ('tel' === $type ? ' autocomplete="tel"' : ('full_name' === $name ? ' autocomplete="name"' : ''))) . $required . '>';
        }

        $optional = $required ? '' : ' <span class="gs-field__optional">' . esc_html__('(optional)', 'gedeon-sports') . '</span>';
        $rows    .= '<p class="' . esc_attr($class) . '"><label for="' . esc_attr($id) . '">' . esc_html($label) . $optional . '</label>' . $control . '</p>';
    }

    return '<form class="gs-form gs-form--' . esc_attr($key) . '" method="post" action="' . esc_url(admin_url('admin-post.php')) . '">'
        . ($form['title'] ? '<h3 class="gs-form__title">' . esc_html($form['title']) . '</h3>' : '')
        . '<div class="gs-form__fields">' . $rows . '</div>'
        . '<p class="gs-form__trap" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></p>'
        . '<input type="hidden" name="action" value="gedeon_sports_form">'
        . '<input type="hidden" name="gs_form" value="' . esc_attr($key) . '">'
        . wp_nonce_field('gedeon_sports_form_' . $key, '_gs_nonce', true, false)
        . '<p class="gs-form__submit"><button type="submit" class="wp-element-button">' . esc_html($form['button']) . '</button></p>'
        . '</form>';
}
add_shortcode('gedeon_sports_form', 'gedeon_sports_form_shortcode');

/**
 * Handle a submission: validate, email the site admin, then go to the Thank You page.
 */
function gedeon_sports_handle_form(): void
{
    $forms = gedeon_sports_forms();
    $key   = sanitize_key(wp_unslash($_POST['gs_form'] ?? ''));

    if (! isset($forms[$key]) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_gs_nonce'] ?? '')), 'gedeon_sports_form_' . $key)) {
        wp_safe_redirect(home_url('/'));
        exit;
    }

    // Honeypot: bots fill every field; people never see this one.
    if (! empty($_POST['website'])) {
        wp_safe_redirect(home_url('/thank-you/'));
        exit;
    }

    $lines = array();
    foreach ($forms[$key]['fields'] as $name => $field) {
        $raw   = wp_unslash($_POST[$name] ?? '');
        $value = 'textarea' === $field[1] ? sanitize_textarea_field($raw) : sanitize_text_field($raw);
        if ('email' === $field[1]) {
            $value = sanitize_email($value);
        }
        if ('radio' === $field[1] && ! in_array($value, $field[2], true)) {
            $value = '';
        }
        if ('consent' === $field[1]) {
            $value = 'yes' === $value ? 'yes' : '';
        }
        if (! empty($field[3]) && '' === $value) {
            wp_safe_redirect(add_query_arg('form-error', $key, wp_get_referer() ?: home_url('/')));
            exit;
        }
        $lines[] = ('consent' === $field[1] ? __('Consent', 'gedeon-sports') : $field[0]) . ': ' . $value;
    }

    $reply = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    wp_mail(
        get_option('admin_email'),
        $forms[$key]['subject'] . ' — ' . get_bloginfo('name'),
        implode("\n", $lines),
        $reply ? array('Reply-To: ' . $reply) : array()
    );

    wp_safe_redirect(home_url('/thank-you/'));
    exit;
}
add_action('admin_post_gedeon_sports_form', 'gedeon_sports_handle_form');
add_action('admin_post_nopriv_gedeon_sports_form', 'gedeon_sports_handle_form');
