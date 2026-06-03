<?php
/**
 * Header template.
 *
 * @package thebandit
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.png' ) ); ?>" type="image/png" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.png' ) ); ?>" />
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.png' ) ); ?>" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.png' ) ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<!-- NAV -->
	<nav id="navbar">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>#hero" class="nav-logo">
			<img src="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.png' ) ); ?>" alt="The Bandit logo" />
			The <span>Bandit</span>
		</a>
		<ul class="nav-links">
			<li><a href="#about">About</a></li>
			<li><a href="#services">Services</a></li>
			<li><a href="#video">Watch</a></li>
			<li><a href="#testimonials">Reviews</a></li>
			<li><a href="#venues">Venues</a></li>
		</ul>
		<div class="nav-actions">
			<a href="tel:+27879439435" class="nav-phone">+27 87 943 9435</a>
			<a href="#contact" class="nav-cta">Book Now</a>
		</div>
		<div class="hamburger" id="hamburger" aria-label="Open menu">
			<span></span><span></span><span></span>
		</div>
	</nav>

	<!-- MOBILE MENU -->
	<div class="mobile-menu" id="mobileMenu">
		<button class="mobile-close" id="mobileClose" aria-label="Close menu">&#10005;</button>
		<a href="#about" class="mobile-link">About</a>
		<a href="#services" class="mobile-link">Services</a>
		<a href="#video" class="mobile-link">Watch</a>
		<a href="#testimonials" class="mobile-link">Reviews</a>
		<a href="#venues" class="mobile-link">Venues</a>
		<a href="#contact" class="mobile-link">Book Now</a>
	</div>
