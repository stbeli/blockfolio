<?php
/**
 * Title: Header
 * Slug: blockfolio/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Slim site header styled like a document title bar.
 *
 * @package Blockfolio
 */

?>
<!-- wp:group {"tagName":"header","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|50","bottom":"var:preset|spacing|20","left":"var:preset|spacing|50"}},"border":{"bottom":{"color":"var:preset|color|border-gray","width":"1px"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
<header class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--border-gray);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:site-title {"level":0,"fontSize":"body","style":{"typography":{"fontWeight":"700"}}} /-->

	<!-- wp:navigation {"overlayBackgroundColor":"white","overlayTextColor":"black","fontSize":"small","layout":{"type":"flex","justifyContent":"right"}} /-->
</header>
<!-- /wp:group -->
