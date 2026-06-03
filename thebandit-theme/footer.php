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
			<img src="<?php echo esc_url( thebandit_asset( 'images/bandit-logo.png' ) ); ?>" alt="The Bandit logo" style="width:32px;height:32px;object-fit:contain;border-radius:50%;" />
			The <span>Bandit</span>
		</div>
		<p class="footer-copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> The Bandit. All rights reserved | Designed by <a href="https://storyadvantage.agency" target="_blank" rel="noopener">Story Advantage Marketing Agency</a></p>
		<a href="https://www.tiktok.com/@kevinkeuvelaar" target="_blank" rel="noopener" aria-label="TikTok" class="footer-social">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V9.05a8.16 8.16 0 004.78 1.52V7.11a4.85 4.85 0 01-1.01-.42z"/></svg>
		</a>
	</footer>

	<script async src="https://www.tiktok.com/embed.js"></script>
	<?php wp_footer(); ?>
</body>
</html>
