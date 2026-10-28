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
	<link rel="shortcut icon" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo-icon.png' ) ); ?>" type="image/png" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo-icon.png' ) ); ?>" />
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo-icon.png' ) ); ?>" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( thebandit_asset( 'images/bandit-logo-icon.png' ) ); ?>" />
	<link rel="preload" as="image" href="<?php echo esc_url( thebandit_asset( 'images/hero-cards-880.webp' ) ); ?>" imagesrcset="<?php echo esc_url( thebandit_asset( 'images/hero-cards-440.webp' ) ); ?> 440w, <?php echo esc_url( thebandit_asset( 'images/hero-cards-880.webp' ) ); ?> 880w" imagesizes="(max-width: 480px) 220px, (max-width: 768px) 260px, 420px" fetchpriority="high" />
	<link rel="preload" as="font" type="font/woff2" href="<?php echo esc_url( thebandit_asset( 'fonts/inter-latin.woff2' ) ); ?>" crossorigin />
	<link rel="preload" as="font" type="font/woff2" href="<?php echo esc_url( thebandit_asset( 'fonts/cinzel-latin.woff2' ) ); ?>" crossorigin />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<!-- NAV -->
	<nav id="navbar">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>#hero" class="nav-logo">
			<img src="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.webp' ) ); ?>" alt="The Bandit logo" width="38" height="38" decoding="async" />
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
		<button type="button" class="hamburger" id="hamburger" aria-label="Open menu" aria-controls="mobileMenu" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>
	</nav>

	<!-- MOBILE MENU -->
	<div class="mobile-menu" id="mobileMenu">
		<a href="#about" class="mobile-link">About</a>
		<a href="#services" class="mobile-link">Services</a>
		<a href="#video" class="mobile-link">Watch</a>
		<a href="#testimonials" class="mobile-link">Reviews</a>
		<a href="#venues" class="mobile-link">Venues</a>
		<a href="#contact" class="mobile-link">Book Now</a>
	</div>
