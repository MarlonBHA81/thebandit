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
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
