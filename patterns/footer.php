<?php
/**
 * Title: Footer
 * Slug: blockfolio/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Minimal footer with a small credit line.
 *
 * @package Blockfolio
 */

?>
<!-- wp:group {"tagName":"footer","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:paragraph {"align":"center","fontSize":"small","textColor":"muted-gray"} -->
	<p class="has-text-align-center has-muted-gray-color has-text-color has-small-font-size"><?php
		printf(
			/* translators: 1: Copyright year, 2: Site title. */
			esc_html__( '© %1$s %2$s', 'blockfolio' ),
			esc_html( gmdate( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	?></p>
	<!-- /wp:paragraph -->
</footer>
<!-- /wp:group -->
