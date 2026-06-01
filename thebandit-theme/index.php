<?php
/**
 * Fallback template.
 *
 * The homepage renders via front-page.php. This handles any other
 * posts or pages, styled to match the brand.
 *
 * @package thebandit
 */

get_header();
?>

	<main style="padding:8rem 2rem 4rem;min-height:60vh;">
		<div class="container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class(); ?>>
						<div class="section-label">The Bandit</div>
						<h1 class="section-title"><?php the_title(); ?></h1>
						<div class="divider"></div>
						<div class="about-text">
							<?php the_content(); ?>
						</div>
					</article>
					<?php
				endwhile;
			else :
				?>
				<div class="section-label">404</div>
				<h1 class="section-title">Nothing Found</h1>
				<p class="about-text">The page you're looking for has vanished, like a coin behind the ear. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:var(--blue);">Return home</a>.</p>
				<?php
			endif;
			?>
		</div>
	</main>

<?php
get_footer();
