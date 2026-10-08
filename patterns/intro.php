<?php
/**
 * Title: Intro
 * Slug: blockfolio/intro
 * Categories: blockfolio
 * Description: CV intro with the person's name and contact details (phone, email, location).
 *
 * @package Blockfolio
 */

?>
<!-- wp:group {"metadata":{"name":"Intro"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"tagName":"header","metadata":{"name":"First and Last Name"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">First And Last Name</h1>
<!-- /wp:heading -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}}} -->
<h2 class="wp-block-heading" style="text-transform:uppercase">Senior Developer</h2>
<!-- /wp:heading --></header>
<!-- /wp:group -->

<!-- wp:group {"tagName":"header","metadata":{"name":"Contacts"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<header class="wp-block-group"><!-- wp:group {"metadata":{"name":"Phone"},"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:blockfolio/icon {"icon":"phone","ariaLabel":"Phone"} /-->

<!-- wp:paragraph -->
<p>+1 (000) 123-4567</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Email"},"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:blockfolio/icon {"icon":"email","ariaLabel":"Email"} /-->

<!-- wp:paragraph -->
<p>developer@agency.net</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Location"},"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:blockfolio/icon {"icon":"location","metadata":{"name":"Icon Pin"},"ariaLabel":"Location"} /-->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"metadata":{"name":"City, Country"}} -->
<p>fr</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"metadata":{"name":"Remote Type"}} -->
<p>frrffrfrfrfrf</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-default"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-default"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Image and Links"},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/circle-user-solid.svg' ) ); ?>" alt="User Icon"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"metadata":{"name":"Links"},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">https://</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">linkedin.com/in/user_name</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">github.com/user</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">01.01.0000.</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->