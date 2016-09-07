<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Didi
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function didi_jetpack_setup() {
	add_theme_support( 'jetpack-responsive-videos' );

} // end function didi_jetpack_setup
add_action( 'after_setup_theme', 'didi_jetpack_setup' );