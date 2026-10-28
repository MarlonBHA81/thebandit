<?php
/**
 * Footer template.
 *
 * @package thebandit
 */

?>
	<!-- FOOTER -->
	<footer>
		<div class="footer-logo" style="display:flex;align-items:center;gap:0.6rem;">
			<img src="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.webp' ) ); ?>" alt="The Bandit logo" width="32" height="32" loading="lazy" decoding="async" style="width:32px;height:32px;object-fit:contain;border-radius:50%;" />
			The <span>Bandit</span>
		</div>
		<p class="footer-copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> The Bandit. All rights reserved | Designed by <a href="https://storyadvantage.agency/project/the-bandit/" target="_blank" rel="noopener">Story Advantage Marketing Agency</a></p>
		<a href="https://www.tiktok.com/@kevinkeuvelaar" target="_blank" rel="noopener" aria-label="TikTok" class="footer-social">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V9.05a8.16 8.16 0 004.78 1.52V7.11a4.85 4.85 0 01-1.01-.42z"/></svg>
		</a>
	</footer>

	<script>
	/* Lazy-load the TikTok embed script only when the section nears the viewport,
	   keeping its heavy external modules out of the initial page load. */
	(function () {
		var section = document.getElementById( 'tiktok' );
		if ( ! section ) { return; }
		var loaded = false;
		function loadTikTok() {
			if ( loaded ) { return; }
			loaded = true;
			var s = document.createElement( 'script' );
			s.async = true;
			s.src = 'https://www.tiktok.com/embed.js';
			document.body.appendChild( s );
		}
		if ( 'IntersectionObserver' in window ) {
			var io = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) { loadTikTok(); io.disconnect(); }
				} );
			}, { rootMargin: '400px' } );
			io.observe( section );
		} else {
			loadTikTok();
		}
	})();
	</script>
	<?php wp_footer(); ?>
</body>
</html>
