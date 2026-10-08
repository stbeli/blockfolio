<?php
/**
 * Server-side render for the "Table of Contents" block: builds a list of
 * links to the current post's headings (populated by
 * blockfolio_get_post_headings() in this block's block.php), mirroring the
 * outline panel shown in a Google Doc. Renders nothing on the front end when
 * the post has no headings; shows a helpful placeholder while editing
 * instead.
 *
 * @package Blockfolio
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$label    = isset( $attributes['label'] ) && '' !== $attributes['label'] ? $attributes['label'] : __( 'Contents', 'blockfolio' );
$headings = ( is_singular() || is_front_page() ) ? blockfolio_get_post_headings() : array();

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'blockfolio-toc' ) );

if ( empty( $headings ) ) {
	// Only show the "how this works" placeholder while editing; render
	// nothing on the front end.
	if ( ! defined( 'REST_REQUEST' ) || ! REST_REQUEST ) {
		return;
	}
	?>
	<div>TOC Hardcode Placeholder</div>
	<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<p class="blockfolio-toc__label"><?php echo esc_html( $label ); ?></p>
		<p class="blockfolio-toc__placeholder"><?php esc_html_e( 'Headings added to this page will automatically appear here as a table of contents.', 'blockfolio' ); ?></p>
	</div>
	<?php
	return;
}

$items = '';

foreach ( $headings as $heading ) {
	$items .= sprintf(
		'<li class="blockfolio-toc__item" style="--blockfolio-toc-depth:%1$d"><a href="#%2$s">%3$s</a></li>',
		max( 0, $heading['level'] - 1 ),
		esc_attr( $heading['anchor'] ),
		esc_html( $heading['text'] )
	);
}
?>
<nav <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> aria-label="<?php esc_attr_e( 'Table of contents', 'blockfolio' ); ?>">
	<p class="blockfolio-toc__label"><?php echo esc_html( $label ); ?></p>
	<ul class="blockfolio-toc__list"><?php echo $items; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></ul>
</nav>
