<?php
/**
 * Title: Concierge Services
 * Slug: gedeon-sports/concierge-services
 * Categories: gedeon-sports-sections
 * Keywords: services, servicing, storage, transport
 * Description: "One contact for every car you own" — eight service cards.
 *
 * @package Gedeon_Sports
 */

$gedeon_sports_cards = gedeon_sports_card_image('concierge-collection.webp', 'An enclosed car transporter on a road at sunset', 'Collection<br class="gs-br"> and delivery', 'Enclosed transport to and from every appointment.', true)
    . gedeon_sports_card_image('concierge-servicing.webp', 'A technician working on a supercar brake', 'Scheduled servicing', 'To the manufacturer’s schedule, at approved specialist workshops.', true)
    . gedeon_sports_card_image('concierge-storage.webp', 'Covered supercars in a climate-controlled store', 'Storage', 'Secure, climate-controlled storage with battery care.', true)
    . gedeon_sports_card_image('concierge-trackprep.webp', 'A technician fitting a wheel in the pit lane', 'Track preparation', 'Set-up, checks and support for track days.', true)
    . gedeon_sports_card_image('concierge-detailing.webp', 'Hands polishing the bodywork of a supercar', 'Detailing and<br class="gs-br"> paint protection', 'Detailing, ceramic coating and protective film.', true)
    . gedeon_sports_card_image('concierge-transport.webp', 'A car transporter on a mountain road at sunset', 'Transport to events', 'To circuits, tours and events across Europe.', true)
    . gedeon_sports_card_image('concierge-inspection.webp', 'The underside of a supercar on a lift', 'Pre-purchase<br class="gs-br"> inspection', 'Independent checks before you buy.', true)
    . gedeon_sports_card_image('concierge-seasonal.webp', 'A covered supercar in a garage in winter', 'Seasonal care', 'Winter lay-up and spring recommissioning.', true);

$gedeon_sports_inner = gedeon_sports_section_heading('Services', 'One contact for every car you own')
    . gedeon_sports_block_group('gs-grid gs-grid--4 gs-formats gs-care', $gedeon_sports_cards);

echo gedeon_sports_block_section('gs-care-section', $gedeon_sports_inner, array('anchor' => 'services')); // phpcs:ignore WordPress.Security.EscapeOutput -- block markup.
