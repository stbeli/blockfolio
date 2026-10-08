<?php
/**
 * Theme functions for Blockfolio.
 *
 * @package Blockfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets up theme defaults and registers editor styles.
 *
 * @return void
 */
function blockfolio_setup() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'blockfolio_setup' );

/**
 * Enqueues the theme stylesheet on the front end.
 *
 * @return void
 */
function blockfolio_enqueue_styles() {
	$stylesheet_path = get_stylesheet_directory() . '/style.css';

	wp_enqueue_style(
		'blockfolio-style',
		get_stylesheet_uri(),
		array(),
		file_exists( $stylesheet_path ) ? filemtime( $stylesheet_path ) : wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'blockfolio_enqueue_styles' );

/**
 * Adds a dedicated "Blockfolio" category so the custom blocks are easy to
 * find in the block inserter.
 *
 * @param array[] $categories Registered block categories.
 * @return array[]
 */
function blockfolio_block_categories( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'blockfolio',
				'title' => __( 'Blockfolio', 'blockfolio' ),
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'blockfolio_block_categories' );

/**
 * Adds a dedicated "Blockfolio" pattern category so the theme's own patterns
 * (e.g. the CV intro) are easy to find in the pattern inserter.
 *
 * @return void
 */
function blockfolio_register_pattern_categories() {
	register_block_pattern_category(
		'blockfolio',
		array( 'label' => __( 'Blockfolio', 'blockfolio' ) )
	);
}
add_action( 'init', 'blockfolio_register_pattern_categories' );

/**
 * Registers every custom block compiled by `npm run build` (via
 * @wordpress/scripts) into build/<block-name>/block.json. New blocks just
 * need their own src/<block-name> folder — no changes needed here. If a
 * block ships a src/<block-name>/block.php, it's loaded too, so a block's
 * PHP helpers/filters can live right next to its render.php instead of
 * cluttering this file.
 *
 * @return void
 */
function blockfolio_register_blocks() {
	$build_dir = get_theme_file_path( 'build' );

	if ( ! is_dir( $build_dir ) ) {
		return;
	}

	foreach ( glob( $build_dir . '/*/block.json' ) as $block_json ) {
		$block_name      = basename( dirname( $block_json ) );
		$block_functions = get_theme_file_path( "src/{$block_name}/block.php" );

		if ( file_exists( $block_functions ) ) {
			require_once $block_functions;
		}

		register_block_type( dirname( $block_json ) );
	}
}
add_action( 'init', 'blockfolio_register_blocks' );

add_filter( 'render_block_core/image', function( $block_content, $block ) {
    if ( str_contains( $block_content, 'wp-image-98' ) ) {
        $block_content = str_replace( 'loading="lazy"', 'loading="eager"', $block_content );
        if ( ! str_contains( $block_content, 'fetchpriority' ) ) {
            $block_content = preg_replace( '/<img /', '<img fetchpriority="high" ', $block_content, 1 );
        }
    }
    return $block_content;
}, 10, 2 );
