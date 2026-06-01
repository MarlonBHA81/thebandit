<?php
/**
 * The Bandit theme functions.
 *
 * @package thebandit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

if ( ! defined( 'THEBANDIT_VERSION' ) ) {
	define( 'THEBANDIT_VERSION', '1.0.0' );
}

/**
 * Theme setup.
 */
function thebandit_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 1000,
			'width'       => 1000,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'thebandit' ),
		)
	);
}
add_action( 'after_setup_theme', 'thebandit_setup' );

/**
 * Enqueue styles and scripts.
 */
function thebandit_assets() {
	// Google Fonts: Cinzel + Inter.
	wp_enqueue_style(
		'thebandit-fonts',
		'https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Inter:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	// Main theme stylesheet (the style.css with all the design).
	wp_enqueue_style(
		'thebandit-style',
		get_stylesheet_uri(),
		array( 'thebandit-fonts' ),
		THEBANDIT_VERSION
	);

	// Front-end JavaScript (nav, mobile menu, scroll reveal, video, form).
	wp_enqueue_script(
		'thebandit-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		THEBANDIT_VERSION,
		true
	);

	// Pass the AJAX endpoint + nonce to the script for the contact form.
	wp_localize_script(
		'thebandit-main',
		'theBandit',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'thebandit_enquiry' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'thebandit_assets' );

/**
 * The address booking enquiries are delivered to.
 */
function thebandit_owner_email() {
	return apply_filters( 'thebandit_owner_email', 'info@thebandit.co.za' );
}

/**
 * Handle the booking enquiry form submission.
 *
 * Sends two emails through wp_mail(): a notification to the owner and a
 * branded auto-reply to the customer. With the Resend plugin active, both
 * are delivered via the Resend API automatically.
 */
function thebandit_handle_enquiry() {
	check_ajax_referer( 'thebandit_enquiry', 'nonce' );

	$name       = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email      = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$company    = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$event_date = isset( $_POST['date'] ) ? sanitize_text_field( wp_unslash( $_POST['date'] ) ) : '';
	$event_type = isset( $_POST['eventType'] ) ? sanitize_text_field( wp_unslash( $_POST['eventType'] ) ) : '';
	$message    = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || empty( $email ) || ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Please provide a valid name and email.' ), 400 );
	}

	$headers = array( 'Content-Type: text/html; charset=UTF-8' );

	// 1) Notification to the owner.
	$owner_subject = sprintf( 'New Booking Enquiry — %s%s', $name, $company ? " ({$company})" : '' );
	$owner_body    = thebandit_owner_email_html( compact( 'name', 'email', 'company', 'event_date', 'event_type', 'message' ) );
	$owner_headers = array_merge( $headers, array( 'Reply-To: ' . $name . ' <' . $email . '>' ) );
	wp_mail( thebandit_owner_email(), $owner_subject, $owner_body, $owner_headers );

	// 2) Branded auto-reply to the customer.
	$customer_subject = 'Thanks for reaching out — The Bandit';
	$customer_body    = thebandit_customer_email_html( compact( 'name', 'company', 'event_date', 'event_type' ) );
	$sent             = wp_mail( $email, $customer_subject, $customer_body, $headers );

	if ( ! $sent ) {
		wp_send_json_error( array( 'message' => 'Email could not be sent.' ), 500 );
	}

	wp_send_json_success( array( 'message' => 'Enquiry sent.' ) );
}
add_action( 'wp_ajax_thebandit_enquiry', 'thebandit_handle_enquiry' );
add_action( 'wp_ajax_nopriv_thebandit_enquiry', 'thebandit_handle_enquiry' );

/**
 * Build the owner notification email HTML.
 *
 * @param array $d Enquiry data.
 */
function thebandit_owner_email_html( $d ) {
	$rows  = '<tr><td style="padding:8px 0;font-weight:bold;width:140px;">Name</td><td>' . esc_html( $d['name'] ) . '</td></tr>';
	$rows .= '<tr><td style="padding:8px 0;font-weight:bold;">Email</td><td><a href="mailto:' . esc_attr( $d['email'] ) . '">' . esc_html( $d['email'] ) . '</a></td></tr>';
	if ( $d['company'] ) {
		$rows .= '<tr><td style="padding:8px 0;font-weight:bold;">Company</td><td>' . esc_html( $d['company'] ) . '</td></tr>';
	}
	if ( $d['event_date'] ) {
		$rows .= '<tr><td style="padding:8px 0;font-weight:bold;">Event Date</td><td>' . esc_html( $d['event_date'] ) . '</td></tr>';
	}
	if ( $d['event_type'] ) {
		$rows .= '<tr><td style="padding:8px 0;font-weight:bold;">Event Type</td><td>' . esc_html( $d['event_type'] ) . '</td></tr>';
	}
	if ( $d['message'] ) {
		$rows .= '<tr><td style="padding:8px 0;font-weight:bold;vertical-align:top;">Message</td><td style="white-space:pre-wrap;">' . esc_html( $d['message'] ) . '</td></tr>';
	}

	return '<div style="font-family:Arial,sans-serif;max-width:600px;margin:0 auto;color:#111;">'
		. '<h2 style="color:#05a0eb;">New Booking Enquiry</h2>'
		. '<table style="width:100%;border-collapse:collapse;">' . $rows . '</table>'
		. '</div>';
}

/**
 * Build the customer auto-reply email HTML (branded, dark theme).
 *
 * @param array $d Enquiry data.
 */
function thebandit_customer_email_html( $d ) {
	$summary = '';
	if ( $d['company'] ) {
		$summary .= '<p style="margin:4px 0;font-size:14px;color:#ccc;"><strong style="color:#fff;">Company:</strong> ' . esc_html( $d['company'] ) . '</p>';
	}
	if ( $d['event_date'] ) {
		$summary .= '<p style="margin:4px 0;font-size:14px;color:#ccc;"><strong style="color:#fff;">Event Date:</strong> ' . esc_html( $d['event_date'] ) . '</p>';
	}
	if ( $d['event_type'] ) {
		$summary .= '<p style="margin:4px 0;font-size:14px;color:#ccc;"><strong style="color:#fff;">Event Type:</strong> ' . esc_html( $d['event_type'] ) . '</p>';
	}

	$items    = array(
		'Close-Up Magic &amp; Pickpocket Entertainment',
		'Stage Shows &amp; Grand Illusions',
		'Comedy MC Services',
		'Fully customised to your event',
	);
	$item_html = '';
	foreach ( $items as $item ) {
		$item_html .= '<div style="margin:0 0 12px;"><span style="color:#05a0eb;">&#9670;</span> <span style="font-size:14px;color:#ccc;">' . $item . '</span></div>';
	}

	$name = esc_html( $d['name'] );

	return '<!DOCTYPE html><html><head><meta charset="UTF-8" /></head>'
		. '<body style="margin:0;padding:0;background:#0a0a0a;font-family:Arial,sans-serif;">'
		. '<div style="max-width:600px;margin:0 auto;background:#111;color:#fff;">'
		. '<div style="background:#000;padding:32px 40px;text-align:center;border-bottom:2px solid #05a0eb;">'
		. '<p style="font-size:11px;letter-spacing:0.3em;color:#05a0eb;text-transform:uppercase;margin:0 0 8px;">South Africa\'s Magic Outlaw</p>'
		. '<h1 style="font-family:Georgia,serif;font-size:36px;letter-spacing:0.12em;color:#fff;margin:0;">THE BANDIT</h1>'
		. '</div>'
		. '<div style="padding:40px 40px 32px;">'
		. '<p style="font-size:16px;color:#ccc;margin:0 0 24px;">Hi ' . $name . ',</p>'
		. '<p style="font-size:15px;line-height:1.7;color:#ccc;margin:0 0 24px;">Thank you for reaching out. Your enquiry has been received and The Bandit\'s team will be in touch shortly to discuss your event.</p>'
		. ( $summary ? '<div style="background:#1a1a1a;border-left:3px solid #05a0eb;padding:20px 24px;margin:0 0 32px;border-radius:0 4px 4px 0;"><p style="font-size:13px;letter-spacing:0.15em;text-transform:uppercase;color:#05a0eb;margin:0 0 12px;">Your Enquiry Summary</p>' . $summary . '</div>' : '' )
		. '<h2 style="font-family:Georgia,serif;font-size:20px;letter-spacing:0.08em;color:#fff;margin:0 0 16px;">What to Expect</h2>'
		. '<div style="margin:0 0 32px;">' . $item_html . '</div>'
		. '<div style="text-align:center;margin:32px 0;"><a href="https://www.thebandit.co.za" style="display:inline-block;background:#05a0eb;color:#fff;text-decoration:none;font-size:13px;letter-spacing:0.2em;text-transform:uppercase;padding:14px 36px;border-radius:2px;">Visit The Website</a></div>'
		. '</div>'
		. '<div style="background:#000;padding:24px 40px;text-align:center;border-top:1px solid #222;">'
		. '<p style="font-size:12px;color:#555;margin:0;">The Bandit &nbsp;|&nbsp; Johannesburg, South Africa &nbsp;|&nbsp; <a href="mailto:info@thebandit.co.za" style="color:#555;">info@thebandit.co.za</a></p>'
		. '</div></div></body></html>';
}


/**
 * Preconnect to Google Fonts for performance.
 */
function thebandit_resource_hints( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = 'https://fonts.googleapis.com';
		$hints[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'thebandit_resource_hints', 10, 2 );

/**
 * Helper: echo a theme asset URL.
 *
 * @param string $path Relative path inside /assets.
 */
function thebandit_asset( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}
