<?php 
/**
 * Plugin Name: Add background-size to Customizer
 * Plugin URI: https://github.com/cborchert/wp_background_size
 * Description: Adds a background-size controller to the customizer and adds the css after wp_head
 * Version: 0.0.1
 * Author: Chris Borchert
 * Author URI: http://cborchert.com
 * License: GPL2
 */

//Add Background Image Size to the customizer
function customizer_add_bg_size( $wp_customize ) {
    //Don't need to add a section, we'll be using 'background_image'
    
    //Add Settings: size (from selector) and custom (input)
    $wp_customize->add_setting(
        'background_image_size',
        array(
            'default' => 'inherit',
        )
    );
    $wp_customize->add_setting(
        'background_image_size_custom',
        array(
            'default' => '',
        )
    );
    
    //Add controllers for settings
    $wp_customize->add_control(
        'background_image_size', 
        array(
            'label'      => 'Background Image Size',
            'section'    => 'background_image',
            'settings'   => 'background_image_size',
            'priority'   => 9001, //over 9000!!!! make it a low priority
            'type' => 'radio',
            'choices' => array(
                'cover' => 'Cover',
                'contain' => 'Contain',
                '100% auto' => '100% width',
                'auto 100%' => '100% height',
                'inherit' => 'Inherit', 
                'custom' => 'Custom (see next section)'
            )
        )
    );
    $wp_customize->add_control(
        'background_image_size_custom', 
        array(
            'label'      => 'CSS for background-size (if \'custom\' selected)',
            'section'    => 'background_image',
            'settings'   => 'background_image_size_custom',
            'priority'   => 9002, //over 9000!!!! make it an even lower priority
            'type' => 'text'
            )
        );
}
add_action( 'customize_register', 'customizer_add_bg_size' );

//Add CSS in a style tag, modifying the body.custom-background
function add_bg_size_to_head() {
    $bg_size = (get_theme_mod( 'background_image_size', '' ) == 'custom')?get_theme_mod( 'background_image_size_custom', 'inherit'):get_theme_mod( 'background_image_size', 'inherit' );
    echo '<style type="text/css">
                body.custom-background {
                    background-size:'.$bg_size.';
                    }
          </style>';
}
//Make it damn close to the last thing loaded, so that the rule takes precedence
add_action( 'wp_head', 'add_bg_size_to_head', 9001 );
           