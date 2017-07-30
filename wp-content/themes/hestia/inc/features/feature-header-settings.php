<?php
/**
 * Customizer functionality for the Header settings.
 *
 * @package Hestia
 * @since 1.1.40
 */

/**
 * Hook controls for Header to Customizer.
 *
 * @since 1.1.40
 */
function hestia_header_customize_register( $wp_customize ) {

	$wp_customize->add_panel(
		'hestia_header_options', array(
			'priority' => 45,
			'title' => esc_html__( 'Header Options', 'hestia' ),
		)
	);

	/**
	 * Header image section.
	 */
	// Move Header Image section to Header Options panel
	$header_image_section = $wp_customize->get_section( 'header_image' );
	if ( ! empty( $header_image_section ) ) {
		$header_image_section->panel = 'hestia_header_options';
		$header_image_section->priority = 20;
	}

	/**
	 * Top bar section.
	 */
	$wp_customize->add_section(
		'hestia_top_bar', array(
			'title'    => esc_html__( 'Top Bar', 'hestia' ),
			'panel'    => 'hestia_header_options',
			'priority' => 10,
		)
	);

	$wp_customize->add_setting(
		'hestia_top_bar_hide', array(
			'sanitize_callback' => 'hestia_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'hestia_top_bar_hide', array(
			'type' => 'checkbox',
			'label' => esc_html__( 'Disable section','hestia' ),
			'section' => 'hestia_top_bar',
			'priority' => 1,
		)
	);

	/**
	 * Navigation section.
	 */
	$wp_customize->add_section(
		'hestia_navigation', array(
			'title'    => esc_html__( 'Navigation', 'hestia' ),
			'panel'    => 'hestia_header_options',
			'priority' => 15,
		)
	);

	if ( class_exists( 'Hestia_Customize_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'hestia_header_alignment', array(
				'default' => 'left',
				'sanitize_callback' => 'hestia_sanitize_alignment_options',
			)
		);

		$wp_customize->add_control(
			new Hestia_Customize_Control_Radio_Image(
				$wp_customize, 'hestia_header_alignment', array(
					'priority' => 25,
					'section' => 'hestia_navigation',
					'choices' => array(
						'left' => array(
							'url' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer-radio-image/img/default-header.png',
						),
						'center' => array(
							'url' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer-radio-image/img/center-header.png',
						),
						'right' => array(
							'url' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer-radio-image/img/widget-header.png',
						),
					),
				)
			)
		);
	}

}
add_action( 'customize_register', 'hestia_header_customize_register' );


/**
 * Add selective refresh for header section controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @since 1.1.40
 * @access public
 */
function hestia_register_header_partials( $wp_customize ) {
	$wp_customize->selective_refresh->add_partial(
		'hestia_top_bar_alignment', array(
			'selector' => '.hestia-top-bar',
			'settings' => 'hestia_top_bar_alignment',
			'render_callback' => 'hestia_top_bar_callback',
		)
	);
}
add_action( 'customize_register', 'hestia_register_header_partials' );

/**
 * Callback function for top bar alignment.
 *
 * @since 1.1.40
 */
function hestia_top_bar_callback() {
	hestia_the_header_top_bar( true );
}

/**
 * Adds advanced inline style from customizer.
 *
 * @since 1.1.40
 */
function hestia_top_bar_inline_style() {
	$custom_css = '';

	$hestia_top_bar_background = get_theme_mod( 'hestia_top_bar_background_color', '#363537' );
	if ( ! empty( $hestia_top_bar_background ) ) {
		$custom_css .= '.hestia-top-bar, .hestia-top-bar .widget.widget_shopping_cart .cart_list {
            background-color: ' . $hestia_top_bar_background . '
        }
        .hestia-top-bar .widget .label-floating input[type=search]:-webkit-autofill {
            -webkit-box-shadow: inset 0 0 0px 9999px ' . $hestia_top_bar_background . '
        }';
	}

	$hestia_top_bar_text_color = get_theme_mod( 'hestia_top_bar_text_color', '#ffffff' );
	if ( ! empty( $hestia_top_bar_background ) ) {
		$custom_css .= '.hestia-top-bar, .hestia-top-bar .widget .label-floating input[type=search], .hestia-top-bar .widget.widget_search form.form-group:before, .hestia-top-bar .widget.widget_product_search form.form-group:before, .hestia-top-bar .widget.widget_shopping_cart:before {
            color: ' . $hestia_top_bar_text_color . '
        } 
        .hestia-top-bar .widget .label-floating input[type=search]{
            -webkit-text-fill-color:' . $hestia_top_bar_text_color . ' !important 
        }';
	}

	$hestia_top_bar_link_color = get_theme_mod( 'hestia_top_bar_link_color', '#ffffff' );
	if ( ! empty( $hestia_top_bar_link_color ) ) {
		$custom_css .= '.hestia-top-bar a, .hestia-top-bar .top-bar-nav li a {
            color: ' . $hestia_top_bar_link_color . '
        }';
	}

	$hestia_top_bar_link_color_hover = get_theme_mod( 'hestia_top_bar_link_color_hover', '#eeeeee' );
	if ( ! empty( $hestia_top_bar_link_color_hover ) ) {
		$custom_css .= '.hestia-top-bar a:hover, .hestia-top-bar .top-bar-nav li a:hover {
            color: ' . $hestia_top_bar_link_color_hover . '
        }';
	}
	wp_add_inline_style( 'hestia_style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'hestia_top_bar_inline_style' );
