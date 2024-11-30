<?php
/**
 * Storefront Ecommerce Theme Customizer
 * @package Storefront Ecommerce
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function storefront_ecommerce_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'storefront_ecommerce_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','storefront-ecommerce' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('storefront_ecommerce_logo_padding',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_logo_padding',array(
		'label' => esc_html__( 'Logo Padding (px)','storefront-ecommerce' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_logo_margin',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new storefront_ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_logo_margin',array(
		'label' => esc_html__( 'Logo Margin  (px)','storefront-ecommerce' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_site_title_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_site_title_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Site Title','storefront-ecommerce'),
		'section' => 'title_tagline'
	));

 	$wp_customize->add_setting('storefront_ecommerce_site_title_font_size',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','storefront-ecommerce' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	// site title color
   $wp_customize->add_setting('storefront_ecommerce_site_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_site_title_color', array(
		'label'    => __('Site Title Color', 'storefront-ecommerce'),
		'section'  => 'title_tagline',
		'settings' => 'storefront_ecommerce_site_title_color',
	)));

   $wp_customize->add_setting('storefront_ecommerce_site_tagline_enable',array(
      'default' => false,
      'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
   ));
   $wp_customize->add_control('storefront_ecommerce_site_tagline_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable Site Tagline','storefront-ecommerce'),
      'section' => 'title_tagline'
   ));

   $wp_customize->add_setting('storefront_ecommerce_site_tagline_font_size',array(
		'default'=> 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','storefront-ecommerce' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site tagline color
	$wp_customize->add_setting('storefront_ecommerce_site_tagline_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_site_tagline_color', array(
		'label'    => __('Site Tagline Color', 'storefront-ecommerce'),
		'section'  => 'title_tagline',
		'settings' => 'storefront_ecommerce_site_tagline_color',
	)));

   $wp_customize->add_setting('storefront_ecommerce_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
   $wp_customize->add_control('storefront_ecommerce_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','storefront-ecommerce'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('storefront_ecommerce_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','storefront-ecommerce'),
        'description' => __('Here you can add the background skin along with the background image.','storefront-ecommerce'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','storefront-ecommerce'),
            'Without Background' => __('Without Background Skin','storefront-ecommerce'),
        ),
	) );

	//Important Links
	$wp_customize->add_section( 'storefront_ecommerce_important_links' , array(
    	'title' => esc_html__( 'Important Links', 'storefront-ecommerce' ),
    	'priority' => 10,
	) );

	$wp_customize->add_setting('storefront_ecommerce_doc_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_doc_link',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_FREE_DOC) ." '>". esc_html('Documentation','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_important_links'
	));

	$wp_customize->add_setting('storefront_ecommerce_demo_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_demo_links',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_LIVE_DEMO) ." '>". esc_html('Demo','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_important_links'
	));

	$wp_customize->add_setting('storefront_ecommerce_forum_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_forum_links',array(
		'type'=> 'hidden',
		'section'=> 'storefront_ecommerce_important_links',
		'description' => "<a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_FREE_SUPPORT) ." '>". esc_html('Support Forum','storefront-ecommerce') ."</a>",
	));

	$wp_customize->add_setting('storefront_ecommerce_review_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_review_links',array(
		'type'=> 'hidden',
		'section'=> 'storefront_ecommerce_important_links',
		'description' => "<a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_REVIEW) ." '>". esc_html('Review','storefront-ecommerce') ."</a>",
	));


	//add home page setting pannel
	$wp_customize->add_panel( 'storefront_ecommerce_panel_id', array(
	    'priority' => 11,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'storefront-ecommerce' ),
	    'description' => __( 'Description of what this panel does.', 'storefront-ecommerce' ),
	) );

	$storefront_ecommerce_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('storefront_ecommerce_typography', array(
		'title'    => __('Typography', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_typography_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_typography_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_typography'
	));

	//This is body FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_body_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_body_color', array(
		'label'    => __('Body Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_body_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control(	'storefront_ecommerce_body_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('Body Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	$wp_customize->add_setting('storefront_ecommerce_body_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_body_font_size', array(
		'label'   => __('Body Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_body_font_size',
		'type'    => 'text',
	));

	$wp_customize->add_setting('storefront_ecommerce_body_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_body_font_weight',array(
		'type' => 'select',
		'label' => __('Body Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );		

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_paragraph_color', array(
		'label'    => __('Paragraph Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control(	'storefront_ecommerce_paragraph_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('Paragraph Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	$wp_customize->add_setting('storefront_ecommerce_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_paragraph_font_size',
		'type'    => 'text',
	));

	$wp_customize->add_setting('storefront_ecommerce_paragraph_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_paragraph_font_weight',array(
		'type' => 'select',
		'label' => __('Paragraph Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );			

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_atag_color', array(
		'label'    => __('"a" Tag Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control(	'storefront_ecommerce_atag_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('"a" Tag Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_li_color', array(
		'label'    => __('"li" Tag Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control(	'storefront_ecommerce_li_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('"li" Tag Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_h1_color', array(
		'label'    => __('H1 Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_h1_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('H1 Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('storefront_ecommerce_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_h1_font_size', array(
		'label'   => __('H1 Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_h1_font_size',
		'type'    => 'text',
	));

	//This is H1 FontWeight setting	
	$wp_customize->add_setting('storefront_ecommerce_h1_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_h1_font_weight',array(
		'type' => 'select',
		'label' => __('H1 Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );		

	// This is H2 Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_h2_color', array(
		'label'    => __('H2 Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control(
	'storefront_ecommerce_h2_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('H2 Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('storefront_ecommerce_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_h2_font_size', array(
		'label'   => __('H2 Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_h2_font_size',
		'type'    => 'text',
	));

	//This is H2 FontWeight setting	
	$wp_customize->add_setting('storefront_ecommerce_h2_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_h2_font_weight',array(
		'type' => 'select',
		'label' => __('H2 Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );				

	// This is H3 Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_h3_color', array(
		'label'    => __('H3 Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control(
	'storefront_ecommerce_h3_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('H3 Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('storefront_ecommerce_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_h3_font_size', array(
		'label'   => __('H3 Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_h3_font_size',
		'type'    => 'text',
	));

	//This is H3 FontWeight setting	
	$wp_customize->add_setting('storefront_ecommerce_h3_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_h3_font_weight',array(
		'type' => 'select',
		'label' => __('H3 Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );			

	// This is H4 Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_h4_color', array(
		'label'    => __('H4 Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_h4_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('H4 Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('storefront_ecommerce_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_h4_font_size', array(
		'label'   => __('H4 Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_h4_font_size',
		'type'    => 'text',
	));

	//This is H4 FontWeight setting	
	$wp_customize->add_setting('storefront_ecommerce_h4_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_h4_font_weight',array(
		'type' => 'select',
		'label' => __('H4 Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );		

	// This is H5 Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_h5_color', array(
		'label'    => __('H5 Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_h5_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('H5 Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('storefront_ecommerce_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_h5_font_size', array(
		'label'   => __('H5 Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_h5_font_size',
		'type'    => 'text',
	));

	//This is H5 FontWeight setting	
	$wp_customize->add_setting('storefront_ecommerce_h5_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_h5_font_weight',array(
		'type' => 'select',
		'label' => __('H5 Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );				

	// This is H6 Color picker setting
	$wp_customize->add_setting('storefront_ecommerce_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_h6_color', array(
		'label'    => __('H6 Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_typography',
		'settings' => 'storefront_ecommerce_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('storefront_ecommerce_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_h6_font_family', array(
		'section' => 'storefront_ecommerce_typography',
		'label'   => __('H6 Fonts', 'storefront-ecommerce'),
		'type'    => 'select',
		'choices' => $storefront_ecommerce_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('storefront_ecommerce_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_h6_font_size', array(
		'label'   => __('H6 Font Size', 'storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'setting' => 'storefront_ecommerce_h6_font_size',
		'type'    => 'text',
	));

	//This is H6 FontWeight setting	
	$wp_customize->add_setting('storefront_ecommerce_h6_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_h6_font_weight',array(
		'type' => 'select',
		'label' => __('H6 Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_typography',
		'choices' => array(
		   '100' => __('100','storefront-ecommerce'),
         '200' => __('200','storefront-ecommerce'),
         '300' => __('300','storefront-ecommerce'),
         '400' => __('400','storefront-ecommerce'),
         '500' => __('500','storefront-ecommerce'),
         '600' => __('600','storefront-ecommerce'),
         '700' => __('700','storefront-ecommerce'),
         '800' => __('800','storefront-ecommerce'),
         '900' => __('900','storefront-ecommerce'),
		),
	) );			

	//Header Section
	$wp_customize->add_section('storefront_ecommerce_header',array(
		'title'	=> __('Header','storefront-ecommerce'),
		'description'	=> __('Add header content here','storefront-ecommerce'),
		'priority'	=> null,
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_header_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_header_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_header'
	));

	$wp_customize->add_setting('storefront_ecommerce_display_search',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Search','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_header'
    ));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'storefront_ecommerce_show_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ) );
    $wp_customize->add_control('storefront_ecommerce_show_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Top Header','storefront-ecommerce' ),
        'section' => 'storefront_ecommerce_header'
    ));

    $wp_customize->add_setting( 'storefront_ecommerce_topbar_padding_settings', array(
		'default'=> 10,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'storefront_ecommerce_topbar_padding_settings', array(
		'label'       => esc_html__( 'Top Header Padding','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ) );
    $wp_customize->add_control('storefront_ecommerce_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Sticky Header','storefront-ecommerce' ),
        'section' => 'storefront_ecommerce_header'
    ));

	$wp_customize->add_setting('storefront_ecommerce_topbar_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('storefront_ecommerce_topbar_text',array(
		'type' => 'text',
		'label' => __('Add Topbar Text','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_header',
	) );

	$wp_customize->add_setting('storefront_ecommerce_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_phone_number'
 	));
 	$wp_customize->add_control('storefront_ecommerce_phone_number',array(
		'type' => 'text',
		'label' => __('Add Phone Number','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_header',
	) );

	$wp_customize->add_setting('storefront_ecommerce_location_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('storefront_ecommerce_location_text',array(
		'type' => 'text',
		'label' => __('Add Location Text','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_header',
	) );

	$wp_customize->add_setting('storefront_ecommerce_location_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
 	));
 	$wp_customize->add_control('storefront_ecommerce_location_url',array(
		'type' => 'text',
		'label' => __('Add Location URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_header',
	) );

	//Menu Settings
	$wp_customize->add_section('storefront_ecommerce_menu_setting',array(
		'title'	=> __('Menu Settings','storefront-ecommerce'),
		'priority'	=> null,
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_menus_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_menus_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_menu_setting'
	));

	$wp_customize->add_setting('storefront_ecommerce_menu_font_size_option',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,'storefront_ecommerce_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_menu_setting',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('storefront_ecommerce_menu_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,'storefront_ecommerce_menu_top_bottom_padding',array(
		'label'	=> __('Menu Top-Bottom Padding','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_menu_setting',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_menu_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,'storefront_ecommerce_menu_left_right_padding',array(
		'label'	=> __('Menu Left-Right Padding','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_menu_setting',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_menu_setting',
		'choices' => array(
		   'Uppercase' => __('Uppercase','storefront-ecommerce'),
		   'Lowercase' => __('Lowercase','storefront-ecommerce'),
		   'Capitalize' => __('Capitalize','storefront-ecommerce'),
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_font_weight_option_menu',array(
		'default' => '600',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_menu_setting',
		'choices' => array(
			'100' => __('100','storefront-ecommerce'),
			'200' => __('200','storefront-ecommerce'),
			'300' => __('300','storefront-ecommerce'),
			'400' => __('400','storefront-ecommerce'),
			'500' => __('500','storefront-ecommerce'),
			'600' => __('600','storefront-ecommerce'),
			'700' => __('700','storefront-ecommerce'),
			'800' => __('800','storefront-ecommerce'),
			'900' => __('900','storefront-ecommerce'),
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_menu_color', array(
		'default'           => '#031424',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_menu_color', array(
		'label'    => __('Menu Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_menu_setting',
		'settings' => 'storefront_ecommerce_menu_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_sub_menu_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_sub_menu_color', array(
		'label'    => __('Submenu Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_menu_setting',
		'settings' => 'storefront_ecommerce_sub_menu_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_menu_hover_color', array(
		'default'           => '#031424',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_menu_setting',
		'settings' => 'storefront_ecommerce_menu_hover_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_sub_menu_hover_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_sub_menu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_menu_setting',
		'settings' => 'storefront_ecommerce_sub_menu_hover_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_sub_menu_bg_color', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_sub_menu_bg_color', array(
		'label'    => __('Submenu Background Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_menu_setting',
		'settings' => 'storefront_ecommerce_sub_menu_bg_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_sub_menu_bg_hover_color', array(
		'default'           => '#031424',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_sub_menu_bg_hover_color', array(
		'label'    => __('Submenu Background Hover Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_menu_setting',
		'settings' => 'storefront_ecommerce_sub_menu_bg_hover_color',
	)));

	//Header Section
	$wp_customize->add_section('storefront_ecommerce_social_icons',array(
		'title'	=> __('Social Icons','storefront-ecommerce'),
		'priority'	=> null,
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_social_icons_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_social_icons_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_social_icons'
	));

	$wp_customize->add_setting( 'storefront_ecommerce_social_links',array(
		'default' => false,
      	'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ) );
    $wp_customize->add_control('storefront_ecommerce_social_links',array(
    	'type' => 'checkbox',
        'label' => __( 'Show/Hide Social Links','storefront-ecommerce' ),
        'section' => 'storefront_ecommerce_social_icons'
    ));

	$wp_customize->add_setting('storefront_ecommerce_facebook_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_facebook_url',array(
		'type' => 'url',
		'label' => __('Add Facebook URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_social_icons',
	));

	$wp_customize->add_setting('storefront_ecommerce_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_facebook_icon',array(
		'label'	=> __('Facebook Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_social_icons',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting('storefront_ecommerce_twitter_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_twitter_url',array(
		'type' => 'url',
		'label' => __('Add Twitter URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_social_icons',
	));
	$wp_customize->add_setting('storefront_ecommerce_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_twitter_icon',array(
		'label'	=> __('Twitter Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_social_icons',
		'type'		=> 'icon'
	)));			

	$wp_customize->add_setting('storefront_ecommerce_instagram_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_instagram_url',array(
		'type' => 'url',
		'label' => __('Add Instagram URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_social_icons',
	));
	$wp_customize->add_setting('storefront_ecommerce_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_instagram_icon',array(
		'label'	=> __('Instagram Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_social_icons',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('storefront_ecommerce_pinterest_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_pinterest_url',array(
		'type' => 'url',
		'label' => __('Add Pinterest URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_social_icons',
	));
	$wp_customize->add_setting('storefront_ecommerce_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_social_icons',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('storefront_ecommerce_social_icons_size',array(
		'default'=> 15,
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('storefront_ecommerce_social_icons_size',array(
		'label'	=> __('Social Icons Size ','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_social_icons',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->add_setting('storefront_ecommerce_social_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_social_icon_color', array(
		'label'    => __('Social Icon Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_social_icons',
		'settings' => 'storefront_ecommerce_social_icon_color',
	)));	

	//Slider Section
	$wp_customize->add_section( 'storefront_ecommerce_slider_section' , array(
    	'title'      => __( 'Slider Section', 'storefront-ecommerce' ),
		'priority'   => null,
		'panel' => 'storefront_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('storefront_ecommerce_slider_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('You can change how many slides there are.','storefront-ecommerce') ."</li><li>". esc_html('You can change the font family and the colours of headings and subheadings.','storefront-ecommerce') ."</li><li>". esc_html('And so on...','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_slider_section'
	));

	$wp_customize->add_setting('storefront_ecommerce_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'storefront_ecommerce_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'storefront_ecommerce_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'storefront_ecommerce_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'storefront-ecommerce' ),
			'description' => __('Slider image size (850 x 450)','storefront-ecommerce'),
			'section'  => 'storefront_ecommerce_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'storefront_ecommerce_slider_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_slider_small_title', array(
		'label'    => __( 'Add Slider Small Text', 'storefront-ecommerce' ),
		'section'  => 'storefront_ecommerce_slider_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting('storefront_ecommerce_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_slider_section'
	));

	$wp_customize->add_setting('storefront_ecommerce_slider_heading_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_slider_heading_color', array(
		'label'    => __('Slider Heading Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_slider_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_slider_section'
	));

	$wp_customize->add_setting('storefront_ecommerce_slider_text_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_slider_text_color', array(
		'label'    => __('Slider Text Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_slider_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_show_slider_button',array(
	 'default' => true,
	 'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_show_slider_button',array(
	 'type' => 'checkbox',
	 'label' => __('Show / Hide Slider Button','storefront-ecommerce'),
	 'section' => 'storefront_ecommerce_slider_section'
	));

	$wp_customize->add_setting('storefront_ecommerce_slider_button_text',array(
		'default'	=> __('Read More','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_button_text',array(
		'label'	=> __('Slider Button Text','storefront-ecommerce'),
		'section'	=> 'storefront_ecommerce_slider_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_slider_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_button_link',array(
		'label'	=> esc_html__('Add Button Link','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_slider_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('storefront_ecommerce_slider_btn_text_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_slider_btn_text_color', array(
		'label'    => __('Slider Button Text Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_slider_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_slider_btn_bg_color', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_slider_btn_bg_color', array(
		'label'    => __('Slider Button Background Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_slider_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_enable_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_enable_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Image Overlay','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_slider_section'
    ));

    $wp_customize->add_setting('storefront_ecommerce_slider_overlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_slider_section',
		'settings' => 'storefront_ecommerce_slider_overlay_color',
	)));

	//Opacity
	$wp_customize->add_setting('storefront_ecommerce_slider_opacity',array(
		'default'           => 0.7,
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control( 'storefront_ecommerce_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_slider_section',
		'type'        => 'select',
		'settings'    => 'storefront_ecommerce_slider_opacity',
		'choices' => array(
			'0' =>  esc_attr('0','storefront-ecommerce'),
			'0.1' =>  esc_attr('0.1','storefront-ecommerce'),
			'0.2' =>  esc_attr('0.2','storefront-ecommerce'),
			'0.3' =>  esc_attr('0.3','storefront-ecommerce'),
			'0.4' =>  esc_attr('0.4','storefront-ecommerce'),
			'0.5' =>  esc_attr('0.5','storefront-ecommerce'),
			'0.6' =>  esc_attr('0.6','storefront-ecommerce'),
			'0.7' =>  esc_attr('0.7','storefront-ecommerce'),
			'0.8' =>  esc_attr('0.8','storefront-ecommerce'),
			'0.9' =>  esc_attr('0.9','storefront-ecommerce')
		),
	));

	//content layout
    $wp_customize->add_setting('storefront_ecommerce_slider_content_layout',array(
    	'default' => 'Left',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_slider_section',
		'choices' => array(
		   'Center' => __('Center','storefront-ecommerce'),
		   'Left' => __('Left','storefront-ecommerce'),
		   'Right' => __('Right','storefront-ecommerce'),
		),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'storefront_ecommerce_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_slider_section',
		'type'        => 'number',
		'settings'    => 'storefront_ecommerce_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('storefront_ecommerce_product_section',array(
		'title' => __('Products Section','storefront-ecommerce'),
		'description' => '',
		'priority'  => null,
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_product_sec_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_product_sec_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Includes settings to set section title.','storefront-ecommerce') ."</li><li>". esc_html('Contains settings for the background colour.','storefront-ecommerce') ."</li><li>". esc_html('Contains options for background images.','storefront-ecommerce') ."</li><li>". esc_html('You can change the font family and colours of heading.','storefront-ecommerce') ."</li><li>". esc_html('And so on...','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_product_section'
	));

	$wp_customize->add_setting('storefront_ecommerce_product_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Products Section','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_product_section'
	));

	$wp_customize->add_setting( 'storefront_ecommerce_product_page', array(
		'default'           => '',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_product_page', array(
		'label'   => __( 'Select Product Page', 'storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_product_section',
		'type'    => 'dropdown-pages'
	) );

	//layout setting
	$wp_customize->add_section( 'storefront_ecommerce_option', array(
    	'title'      => __( 'Layout Settings', 'storefront-ecommerce' ),
    	'panel'    => 'storefront_ecommerce_panel_id',
	) );

	$wp_customize->add_setting('storefront_ecommerce_layout_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_layout_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_option'
	));

	$wp_customize->add_setting( 'storefront_ecommerce_single_page_breadcrumb',array(
			'default' => true,
	     'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	    ) );
	 $wp_customize->add_control('storefront_ecommerce_single_page_breadcrumb',array(
	    'type' => 'checkbox',
	     'label' => __( 'Show / Hide Single Page Breadcrumb','storefront-ecommerce' ),
	     'section' => 'storefront_ecommerce_option'
	  ));

	$wp_customize->add_setting('storefront_ecommerce_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_option'
    ));

   $wp_customize->add_setting('storefront_ecommerce_preloader_type',array(
     	'default' => 'First Preloader Type',
     	'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_preloader_type',array(
      'type' => 'radio',
      'label' => __('Preloader Types','storefront-ecommerce'),
      'section' => 'storefront_ecommerce_option',
      'choices' => array(
         'First Preloader Type' => __('First Preloader Type','storefront-ecommerce'),
         'Second Preloader Type' => __('Second Preloader Type','storefront-ecommerce'),
      ),
	) );

	$wp_customize->add_setting('storefront_ecommerce_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'storefront_ecommerce_preloader_bg_image',array(
        'label' => __('Preloader Background Image','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_option'
	)));

	$wp_customize->add_setting('storefront_ecommerce_preloader_bg_color_option', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_option',
	)));

	$wp_customize->add_setting('storefront_ecommerce_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_option',
	)));

	$wp_customize->add_setting('storefront_ecommerce_width_layout_options',array(
		'default' => 'Default',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_width_layout_options',array(
		'type' => 'radio',
		'label' => __('Container Box','storefront-ecommerce'),
		'description' => __('Here you can change the Width layout. ','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_option',
		'choices' => array(
		   'Default' => __('Default','storefront-ecommerce'),
		   'Container Layout' => __('Container Layout','storefront-ecommerce'),
		   'Box Layout' => __('Box Layout','storefront-ecommerce'),
		),
	) );

	// Add Page Sidebar Layout
	$wp_customize->add_setting('storefront_ecommerce_page_sidebar_options',array(
        'default' => 'One Column',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	) );
	$wp_customize->add_control('storefront_ecommerce_page_sidebar_options', array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_option',
        'choices' => array(
            'One Column' => __('One Column','storefront-ecommerce'),
            'Left Sidebar' => __('Left Sidebar','storefront-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','storefront-ecommerce')
        ),
	)   );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('storefront_ecommerce_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	) );
	$wp_customize->add_control('storefront_ecommerce_layout_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_option',
        'choices' => array(
            'One Column' => __('One Column','storefront-ecommerce'),
            'Three Columns' => __('Three Columns','storefront-ecommerce'),
            'Four Columns' => __('Four Columns','storefront-ecommerce'),
            'Grid Layout' => __('Grid Layout','storefront-ecommerce'),
            'Left Sidebar' => __('Left Sidebar','storefront-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','storefront-ecommerce')
        ),
	)   );

	$wp_customize->add_setting('storefront_ecommerce_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','storefront-ecommerce'),
            'Sidebar 1/4' => __('Sidebar 1/4','storefront-ecommerce'),
        ),
	) );

	//Global Color
	$wp_customize->add_section('storefront_ecommerce_global_color', array(
		'title'    => __('Theme Color Option', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_global_color_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_global_color_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_global_color'
	));

	$wp_customize->add_setting('storefront_ecommerce_first_color', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_first_color', array(
		'label'    => __('Highlight Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_global_color',
		'settings' => 'storefront_ecommerce_first_color',
	)));

	//Blog Post Settings
	$wp_customize->add_section('storefront_ecommerce_post_settings', array(
		'title'    => __('Post General Settings', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_blog_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_blog_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_post_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_post_layouts',array(
     'default' => 'Layout 2',
     'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_post_layouts', array(
		'type' => 'select',
		'label' => __('Post Layouts','storefront-ecommerce'),
		'description' => __('Here you can change the 3 different layouts of post','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_post_settings',
		'choices' => array(
		   'Layout 1' => __('Layouts 1','storefront-ecommerce'),
		   'Layout 2' => __('Layouts 2','storefront-ecommerce'),
		   'Layout 3' => __('Layouts 3','storefront-ecommerce'),
	)));

	$wp_customize->add_setting('storefront_ecommerce_metafields_date',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_post_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_post_date_icon',array(
		'label'	=> __('Post Date Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('storefront_ecommerce_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_post_author_icon',array(
		'label'	=> __('Post Author Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('storefront_ecommerce_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('storefront_ecommerce_metafields_time',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_post_time_icon',array(
		'label'	=> __('Post Time Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_post_settings',
        'choices' => array(
            'By Block' => __('By Block','storefront-ecommerce'),
            'By Without Block' => __('By Without Block','storefront-ecommerce'),
        ),
	) );

	$wp_customize->add_setting('storefront_ecommerce_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control('storefront_ecommerce_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','storefront-ecommerce'),
       'choices' => array(
            'Image' => __('Image','storefront-ecommerce'),
            'Color' => __('Color','storefront-ecommerce'),
            'None' => __('None','storefront-ecommerce'),
        ),
      	'section'	=> 'storefront_ecommerce_post_settings',
    ));

    $wp_customize->add_setting( 'storefront_ecommerce_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,  'storefront_ecommerce_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'storefront_ecommerce_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,  'storefront_ecommerce_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

    $wp_customize->add_setting('storefront_ecommerce_post_featured_color', array(
		'default'           => '#5c727d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_post_featured_color', array(
		'label'    => __('Post Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_post_settings',
		'settings' => 'storefront_ecommerce_post_featured_color',
		'active_callback' => 'storefront_ecommerce_post_color_enabled'
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'storefront_ecommerce_show_post_color'
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'storefront_ecommerce_show_post_color'
	)));

	$wp_customize->add_setting('storefront_ecommerce_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control('storefront_ecommerce_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','storefront-ecommerce'),
       'choices' => array(
            'Default' => __('Default','storefront-ecommerce'),
            'Custom' => __('Custom','storefront-ecommerce'),
        ),
      	'section'	=> 'storefront_ecommerce_post_settings',
      	'active_callback' => 'storefront_ecommerce_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'storefront_ecommerce_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'storefront_ecommerce_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'storefront_ecommerce_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting('storefront_ecommerce_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'storefront_ecommerce_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'storefront_ecommerce_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'storefront-ecommerce'),
		'type' => 'checkbox',
		'section' => 'storefront_ecommerce_post_settings',
	));

    //Post excerpt
	$wp_customize->add_setting( 'storefront_ecommerce_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'storefront_ecommerce_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_post_settings',
		'type'        => 'number',
		'settings'    => 'storefront_ecommerce_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','storefront-ecommerce'),
            'Content' => __('Content','storefront-ecommerce'),
        ),
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_post_discription_suffix', array(
		'default'   => __('[...]','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_post_settings',
		'type'        => 'text',
		'settings'    => 'storefront_ecommerce_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_blog_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box Separator','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_post_settings',
		'description' => __('Here you can add the separator for meta box. e.g. "|",  ",", "/", etc. ','storefront-ecommerce'),
		'type'        => 'text',
		'settings'    => 'storefront_ecommerce_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('storefront_ecommerce_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_post_settings'
    ));

    $wp_customize->add_setting( 'storefront_ecommerce_post_pagination_position', array(
        'default'			=>  'Bottom',
        'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'storefront_ecommerce_post_pagination_position', array(
        'section' => 'storefront_ecommerce_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'storefront-ecommerce' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'storefront-ecommerce' ),
            'Bottom' => __( 'Bottom', 'storefront-ecommerce' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'storefront-ecommerce' ),
    )));

	$wp_customize->add_setting( 'storefront_ecommerce_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control( 'storefront_ecommerce_pagination_settings', array(
        'section' => 'storefront_ecommerce_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'storefront-ecommerce' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'storefront-ecommerce' ),
            'next-prev' => __( 'Next / Previous', 'storefront-ecommerce' ),
    )));

	//Button Settings
	$wp_customize->add_section('storefront_ecommerce_button_settings', array(
		'title'    => __('Button Settings', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_button_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_button_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_button_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_button_text',array(
		'default'=> __('View More','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_button_text',array(
		'label'	=> __('Add Button Text','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_btn_font_size_option',array(
		'default'=> 16,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,'storefront_ecommerce_btn_font_size_option',array(
		'label'	=> __('Button Font Size','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_button_settings',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('storefront_ecommerce_transform_button_text',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_transform_button_text',array(
		'type' => 'select',
		'label' => __('Button Text Transform','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_button_settings',
		'choices' => array(
		   'Uppercase' => __('Uppercase','storefront-ecommerce'),
		   'Lowercase' => __('Lowercase','storefront-ecommerce'),
		   'Capitalize' => __('Capitalize','storefront-ecommerce'),
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_button_font_weight',array(
		'default' => '500',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_button_font_weight',array(
		'type' => 'select',
		'label' => __('Button Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_button_settings',
		'choices' => array(
			'100' => __('100','storefront-ecommerce'),
			'200' => __('200','storefront-ecommerce'),
			'300' => __('300','storefront-ecommerce'),
			'400' => __('400','storefront-ecommerce'),
			'500' => __('500','storefront-ecommerce'),
			'600' => __('600','storefront-ecommerce'),
			'700' => __('700','storefront-ecommerce'),
			'800' => __('800','storefront-ecommerce'),
			'900' => __('900','storefront-ecommerce'),
		),
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_post_button_padding_top',array(
		'default' => 8,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_button_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_post_button_padding_right',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_button_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_post_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_button_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	// button letter spacing
	$wp_customize->add_setting( 'storefront_ecommerce_button_letter_spacing',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new  storefront_ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_button_letter_spacing', array(
		'label'  =>  esc_html__('Button Letter Spacing (px)','storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_button_settings',
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		   'step' => 1,
		)
 	)));	

    //Single Post Settings
	$wp_customize->add_section('storefront_ecommerce_single_post_settings', array(
		'title'    => __('Single Post Settings', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_single_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_single_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_single_post_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_single_post_bradcrumb',array(
			'default' => false,
			'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
		));
	$wp_customize->add_control('storefront_ecommerce_single_post_bradcrumb',array(
			'type' => 'checkbox',
			'label' => __('Enable / Disable Breadcrumb','storefront-ecommerce'),
			'section' => 'storefront_ecommerce_single_post_settings',
	));

	$wp_customize->add_setting('storefront_ecommerce_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

   $wp_customize->add_setting('storefront_ecommerce_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
      $wp_customize,'storefront_ecommerce_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_single_post_settings'
	));

 	$wp_customize->add_setting('storefront_ecommerce_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer( $wp_customize, 'storefront_ecommerce_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('storefront_ecommerce_single_post_time',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings',
    ));

    $wp_customize->add_setting('storefront_ecommerce_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings',
    ));

	  $wp_customize->add_setting('storefront_ecommerce_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings',
    ));

    $wp_customize->add_setting( 'storefront_ecommerce_single_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,  'storefront_ecommerce_single_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_single_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'storefront_ecommerce_single_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,  'storefront_ecommerce_single_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	$wp_customize->add_setting('storefront_ecommerce_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

	$wp_customize->add_setting('storefront_ecommerce_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Single Post Categories','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_category_color', array(
		'label'    => __('Category Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_single_post_settings',
		'settings' => 'storefront_ecommerce_category_color',
	)));

    $wp_customize->add_setting('storefront_ecommerce_category_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_category_hover_color', array(
		'label'    => __('Category Hover Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_single_post_settings',
		'settings' => 'storefront_ecommerce_category_hover_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	) );
	$wp_customize->add_control('storefront_ecommerce_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','storefront-ecommerce'),
            'Left Sidebar' => __('Left Sidebar','storefront-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','storefront-ecommerce')
        ),
	)   );

	$wp_customize->add_setting( 'storefront_ecommerce_single_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','storefront-ecommerce'),
		'type'        => 'text',
		'settings'    => 'storefront_ecommerce_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_comment_form_width',array(
		'default' => 100,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('storefront_ecommerce_title_comment_form',array(
       'default' => __('Leave a Reply','storefront-ecommerce'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('storefront_ecommerce_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_comment_form_button_content',array(
       'default' => __('Post Comment','storefront-ecommerce'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('storefront_ecommerce_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

	$wp_customize->add_setting('storefront_ecommerce_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_prev_text',array(
       'default' => 'Previous page',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('storefront_ecommerce_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_next_text',array(
       'default' => 'Next page',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('storefront_ecommerce_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_single_post_settings'
    ));

	//Grid Post Settings
	$wp_customize->add_section('storefront_ecommerce_grid_settings', array(
		'title'    => __('Grid Post Settings', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_date',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_grid_post_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_grid_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_grid_post_date_icon',array(
		'label'	=> __('Post Date Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_author',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_grid_post_author',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Author','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_grid_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_grid_post_author_icon',array(
		'label'	=> __('Post Author Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_grid_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comment','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_grid_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_grid_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_time',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_grid_post_time',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Time','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_grid_settings'
	));

	$wp_customize->add_setting('storefront_ecommerce_grid_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_grid_post_time_icon',array(
		'label'	=> __('Post Time Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_grid_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_grid_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box Separator','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_grid_settings',
		'description' => __('Here you can add the separator for meta box. e.g. "|",  ",", "/", etc. ','storefront-ecommerce'),
		'type'        => 'text',
		'settings'    => 'storefront_ecommerce_grid_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_grid_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'storefront_ecommerce_grid_post_excerpt_number', array(
		'label'       => esc_html__( 'Grid Post Content Limit','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_grid_settings',
		'type'        => 'number',
		'settings'    => 'storefront_ecommerce_grid_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Related Post Settings
	$wp_customize->add_section('storefront_ecommerce_related_settings', array(
		'title'    => __('Related Post Settings', 'storefront-ecommerce'),
		'panel'    => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_related_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_related_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_related_settings'
	));

	$wp_customize->add_setting( 'storefront_ecommerce_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ) );
    $wp_customize->add_control('storefront_ecommerce_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','storefront-ecommerce' ),
        'section' => 'storefront_ecommerce_related_settings'
    ));

    $wp_customize->add_setting('storefront_ecommerce_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_related_title',array(
		'label'	=> __('Add Section Title','storefront-ecommerce'),
		'section'	=> 'storefront_ecommerce_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'storefront_ecommerce_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'storefront_ecommerce_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','storefront-ecommerce' ),
		'section'     => 'storefront_ecommerce_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_related_settings',
        'choices' => array(
            'categories' => __('Categories','storefront-ecommerce'),
            'tags' => __('Tags','storefront-ecommerce'),
        ),
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Responsive Media Settings
	$wp_customize->add_section('storefront_ecommerce_responsive_media',array(
		'title'	=> __('Responsive Media','storefront-ecommerce'),
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_responsive_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_responsive_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_responsive_media'
	));

	$wp_customize->add_setting('storefront_ecommerce_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_open_menu_label',array(
       'default' => __('','storefront-ecommerce'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('storefront_ecommerce_open_menu_label',array(
       'type' => 'text',
       'label' => __('Open Menu Label','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

	$wp_customize->add_setting('storefront_ecommerce_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_close_menu_label',array(
       'default' => __('','storefront-ecommerce'),
       'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('storefront_ecommerce_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

	// site toggle button color
	$wp_customize->add_setting('storefront_ecommerce_toggle_button_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_toggle_button_color', array(
		'label'    => __('Toggle Button Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_responsive_media',
		'settings' => 'storefront_ecommerce_toggle_button_color',
	)));

	$wp_customize->add_setting('storefront_ecommerce_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

    $wp_customize->add_setting('storefront_ecommerce_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

    $wp_customize->add_setting('storefront_ecommerce_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

    $wp_customize->add_setting('storefront_ecommerce_display_slider',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

	$wp_customize->add_setting('storefront_ecommerce_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

    $wp_customize->add_setting('storefront_ecommerce_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

    $wp_customize->add_setting('storefront_ecommerce_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('storefront_ecommerce_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','storefront-ecommerce'),
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_page_not_found_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_page_not_found_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_page_not_found'
	));

	$wp_customize->add_setting('storefront_ecommerce_page_not_found_heading',array(
		'default'=> __('404 Not Found','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_page_not_found_heading',array(
		'label'	=> __('404 Heading','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_page_not_found_text',array(
		'label'	=> __('404 Content','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_page_not_found_button',array(
		'default'=>  __('Back to Home Page','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_page_not_found_button',array(
		'label'	=> __('404 Button','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_no_search_result_heading',array(
		'default'=> __('Nothing Found','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','storefront-ecommerce'),
		'description'=>__('The search page heading display when no results are found.','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','storefront-ecommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_no_search_result_text',array(
		'label'	=> __('No Search Results Text','storefront-ecommerce'),
		'description'=>__('The search page text display when no results are found.','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'storefront_ecommerce_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'storefront-ecommerce' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','storefront-ecommerce'),
		'priority'   => null,
		'panel' => 'storefront_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('storefront_ecommerce_woocommerce_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_woocommerce_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_woocommerce_section'
	));

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'storefront_ecommerce_per_columns' , array(
		'default'           => 4,
		'transport'         => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'storefront_ecommerce_per_columns', array(
		'label'    => __( 'Product per columns', 'storefront-ecommerce' ),
		'section'  => 'storefront_ecommerce_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('storefront_ecommerce_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_product_per_page',array(
		'label'	=> __('Product per page','storefront-ecommerce'),
		'section'	=> 'storefront_ecommerce_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('storefront_ecommerce_shop_sidebar_enable',array(
       'default' => false,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_woocommerce_section',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('storefront_ecommerce_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'storefront-ecommerce'),
		'section'        => 'storefront_ecommerce_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'storefront-ecommerce'),
			'Right Sidebar' => __('Right Sidebar', 'storefront-ecommerce'),
		),
	));

    $wp_customize->add_setting('storefront_ecommerce_product_page_sidebar_enable',array(
       'default' => false,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable single product page sidebar','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_woocommerce_section',
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('storefront_ecommerce_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'storefront-ecommerce'),
		'section'        => 'storefront_ecommerce_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'storefront-ecommerce'),
			'Right Sidebar' => __('Right Sidebar', 'storefront-ecommerce'),
		),
	));

    $wp_customize->add_setting('storefront_ecommerce_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ));
    $wp_customize->add_control('storefront_ecommerce_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','storefront-ecommerce'),
       'section' => 'storefront_ecommerce_woocommerce_section',
    ));

    $wp_customize->add_setting( 'storefront_ecommerce_woo_product_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','storefront-ecommerce'),
        'section'  => 'storefront_ecommerce_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('storefront_ecommerce_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','storefront-ecommerce'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'storefront_ecommerce_woocommerce_section',
	)));

    $wp_customize->add_setting('storefront_ecommerce_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','storefront-ecommerce'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'storefront_ecommerce_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('storefront_ecommerce_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','storefront-ecommerce'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'storefront_ecommerce_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('storefront_ecommerce_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','storefront-ecommerce'),
            'Left' => __('Left','storefront-ecommerce'),
        ),
	));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_button_border_radius',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

   $wp_customize->add_setting('storefront_ecommerce_woocommerce_product_border_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
   ));
   $wp_customize->add_control('storefront_ecommerce_woocommerce_product_border_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable product border','storefront-ecommerce'),
      'section' => 'storefront_ecommerce_woocommerce_section',
   ));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_product_padding_top',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_product_padding_right',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_product_border_radius',array(
		'default' => 3,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_woocommerce_product_box_shadow',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('storefront_ecommerce_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
    ));
    $wp_customize->add_control('storefront_ecommerce_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','storefront-ecommerce'),
       'choices' => array(
            'Yes' => __('Yes','storefront-ecommerce'),
            'No' => __('No','storefront-ecommerce'),
        ),
       'section' => 'storefront_ecommerce_woocommerce_section',
    ));

	//footer text
	$wp_customize->add_section('storefront_ecommerce_footer_section',array(
		'title'	=> __('Footer Text','storefront-ecommerce'),
		'panel' => 'storefront_ecommerce_panel_id'
	));

	$wp_customize->add_setting('storefront_ecommerce_footer_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_footer_section'
	));

	$wp_customize->add_setting('storefront_ecommerce_show_hide_footer',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_show_hide_footer',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Footer','storefront-ecommerce'),
      	'section' => 'storefront_ecommerce_footer_section',
	));

  	$wp_customize->add_setting('storefront_ecommerce_footer_template',array(
      'default'	=> esc_html('storefront_ecommerce-footer-one'),
      'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_template',array(
		'label'	=> esc_html__('Footer style','storefront-ecommerce'),
		'section'	=> 'storefront_ecommerce_footer_section',
		'setting'	=> 'storefront_ecommerce_footer_template',
		'type' => 'select',
		'choices' => array(
          'storefront_ecommerce-footer-one' => esc_html__('Style 1', 'storefront-ecommerce'),
          'storefront_ecommerce-footer-two' => esc_html__('Style 2', 'storefront-ecommerce'),
          'storefront_ecommerce-footer-three' => esc_html__('Style 3', 'storefront-ecommerce'),
          'storefront_ecommerce-footer-four' => esc_html__('Style 4', 'storefront-ecommerce'),
          'storefront_ecommerce-footer-five' => esc_html__('Style 5', 'storefront-ecommerce'),
          )
	));		

	$wp_customize->add_setting('storefront_ecommerce_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'storefront_ecommerce_footer_bg_image',array(
		'label' => __('Footer Background Image','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_section'
	)));
	
	$wp_customize->add_setting('storefront_ecommerce_footer_attatchment',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_attatchment',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','storefront-ecommerce'),
		'choices' => array(
            'fixed' => __('fixed','storefront-ecommerce'),
            'scroll' => __('scroll','storefront-ecommerce'),
        ),
		'section'=> 'storefront_ecommerce_footer_section',
	));

	$wp_customize->add_setting('storefront_ecommerce_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	  ));
	  $wp_customize->add_control('storefront_ecommerce_footer_img_position',array(
		  'type' => 'select',
		  'label' => __('Footer Image Position','storefront-ecommerce'),
		  'section' => 'storefront_ecommerce_footer_section',
		  'choices' 	=> array(
			  'left top' 		=> esc_html__( 'Top Left', 'storefront-ecommerce' ),
			  'center top'   => esc_html__( 'Top', 'storefront-ecommerce' ),
			  'right top'   => esc_html__( 'Top Right', 'storefront-ecommerce' ),
			  'left center'   => esc_html__( 'Left', 'storefront-ecommerce' ),
			  'center center'   => esc_html__( 'Center', 'storefront-ecommerce' ),
			  'right center'   => esc_html__( 'Right', 'storefront-ecommerce' ),
			  'left bottom'   => esc_html__( 'Bottom Left', 'storefront-ecommerce' ),
			  'center bottom'   => esc_html__( 'Bottom', 'storefront-ecommerce' ),
			  'right bottom'   => esc_html__( 'Bottom Right', 'storefront-ecommerce' ),
		  ),
	  ));	

	$wp_customize->add_setting('storefront_ecommerce_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices',
	));
	$wp_customize->add_control('storefront_ecommerce_footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'storefront-ecommerce'),
		'section'     => 'storefront_ecommerce_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'storefront-ecommerce'),
		'choices' => array(
		   '1'     => __('One', 'storefront-ecommerce'),
		   '2'     => __('Two', 'storefront-ecommerce'),
		   '3'     => __('Three', 'storefront-ecommerce'),
		   '4'     => __('Four', 'storefront-ecommerce')
		),
	));

	$wp_customize->add_setting('storefront_ecommerce_footer_heading',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_heading',array(
	    'type' => 'select',
	    'label' => __('Footer Heading Alignment','storefront-ecommerce'),
	    'section' => 'storefront_ecommerce_footer_section',
	    'choices' => array(
	    	'Left' => __('Left','storefront-ecommerce'),
	        'Center' => __('Center','storefront-ecommerce'),
	        'Right' => __('Right','storefront-ecommerce')
	    ),
	) );

	$wp_customize->add_setting('storefront_ecommerce_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_heading_letter_spacing',array(
		'label'	=> __('Footer Heading Letter Spacing','storefront-ecommerce'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'storefront_ecommerce_footer_section',
	));		

	$wp_customize->add_setting('storefront_ecommerce_footer_content',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_content',array(
	    'type' => 'select',
	    'label' => __('Footer Content Alignment','storefront-ecommerce'),
	    'section' => 'storefront_ecommerce_footer_section',
	    'choices' => array(
	    	'Left' => __('Left','storefront-ecommerce'),
	        'Center' => __('Center','storefront-ecommerce'),
	        'Right' => __('Right','storefront-ecommerce')
	    ),
	) );

	$wp_customize->add_setting('storefront_ecommerce_footer_heading_font_size',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_footer_heading_font_size',array(
		'label' => esc_html__( 'Footer Heading Font Size','storefront-ecommerce' ),
		'section'=> 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_footer_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_footer_text_tranform',array(
		'type' => 'select',
		'label' => __('Footer Heading Text Transform','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','storefront-ecommerce'),
		   'Lowercase' => __('Lowercase','storefront-ecommerce'),
		   'Capitalize' => __('Capitalize','storefront-ecommerce'),
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_footer_heading_font_weight',array(
		'default' => '500',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('storefront_ecommerce_footer_heading_font_weight',array(
		'type' => 'select',
		'label' => __('Footer Heading Font Weight','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_section',
		'choices' => array(
			'100' => __('100','storefront-ecommerce'),
			'200' => __('200','storefront-ecommerce'),
			'300' => __('300','storefront-ecommerce'),
			'400' => __('400','storefront-ecommerce'),
			'500' => __('500','storefront-ecommerce'),
			'600' => __('600','storefront-ecommerce'),
			'700' => __('700','storefront-ecommerce'),
			'800' => __('800','storefront-ecommerce'),
			'900' => __('900','storefront-ecommerce'),
		),
	) );

	$wp_customize->add_setting('storefront_ecommerce_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize,'storefront_ecommerce_footer_padding',array(
		'label'	=> __('Footer Widget Padding','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 100,
      ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','storefront-ecommerce'),
      	'section' => 'storefront_ecommerce_footer_section',
	));

	$wp_customize->add_setting('storefront_ecommerce_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('storefront_ecommerce_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','storefront-ecommerce'),
		'section'=> 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('storefront_ecommerce_scroll_icon_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_scroll_icon_color', array(
		'label'    => __('Back to Top Icon Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_scroll_icon_hover_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_scroll_icon_hover_color', array(
		'label'    => __('Back to Top Icon Hover Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_scroll_icon_background', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_scroll_icon_background', array(
		'label'    => __('Back to Top Background Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_scroll_icon_bg_hover', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_scroll_icon_bg_hover', array(
		'label'    => __('Back to Top Background Hover Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','storefront-ecommerce'),
            'Right align' => __('Right Align','storefront-ecommerce'),
            'Center align' => __('Center Align','storefront-ecommerce'),
        ),
	) );

	$wp_customize->add_setting( 'storefront_ecommerce_top_bottom_scroll_padding',array(
		'default' => 7,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('storefront_ecommerce_show_hide_copyright',array(
		'default' => true,
		'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
	));
	$wp_customize->add_control('storefront_ecommerce_show_hide_copyright',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Copyright','storefront-ecommerce'),
      	'section' => 'storefront_ecommerce_footer_section',
	));

	$wp_customize->add_setting('storefront_ecommerce_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_copy',array(
		'label'	=> __('Copyright Text','storefront-ecommerce'),
		'section'	=> 'storefront_ecommerce_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','storefront-ecommerce'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('storefront_ecommerce_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_footer_section',
        'choices' => array(
            'left' => __('Left Align','storefront-ecommerce'),
            'right' => __('Right Align','storefront-ecommerce'),
            'center' => __('Center Align','storefront-ecommerce'),
        ),
	) );

	$wp_customize->add_setting('storefront_ecommerce_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','storefront-ecommerce' ),
		'section'=> 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'storefront_ecommerce_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'storefront_ecommerce_sanitize_integer'
	));
	$wp_customize->add_control( new Storefront_Ecommerce_Custom_Control( $wp_customize, 'storefront_ecommerce_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','storefront-ecommerce' ),
		'section' => 'storefront_ecommerce_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('storefront_ecommerce_copyright_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_copyright_text_color', array(
		'label'    => __('Copyright Text Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	$wp_customize->add_setting('storefront_ecommerce_copyright_text_background', array(
		'default'           => '#FFBD27',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'storefront_ecommerce_copyright_text_background', array(
		'label'    => __('Copyright Background Color', 'storefront-ecommerce'),
		'section'  => 'storefront_ecommerce_footer_section',
	)));

	//Footer Social Icons
	$wp_customize->add_section('storefront_ecommerce_footer_social_icons',array(
		'title'	=> __('Footer Social Media','storefront-ecommerce'),
		'priority'	=> null,
		'panel' => 'storefront_ecommerce_panel_id',
	));

	$wp_customize->add_setting('storefront_ecommerce_footer_social_icons_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_social_icons_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','storefront-ecommerce'),
		'description' => "<ul><li>". esc_html('Please explore our premium theme for additional settings and features.','storefront-ecommerce') ."</li></ul><a target='_blank' href='". esc_url(STOREFRONT_ECOMMERCE_BUY_PRO) ." '>". esc_html('Upgrade to Pro','storefront-ecommerce') ."</a>",
		'section'=> 'storefront_ecommerce_footer_social_icons'
	));

	$wp_customize->add_setting( 'storefront_ecommerce_footer_social_links',array(
		'default' => false,
      	'sanitize_callback'	=> 'storefront_ecommerce_sanitize_checkbox'
    ) );
    $wp_customize->add_control('storefront_ecommerce_footer_social_links',array(
    	'type' => 'checkbox',
        'label' => __( 'Show/Hide Footer Links','storefront-ecommerce' ),
        'section' => 'storefront_ecommerce_footer_social_icons'
    ));

	$wp_customize->add_setting('storefront_ecommerce_footer_facebook_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_facebook_url',array(
		'type' => 'url',
		'label' => __('Add Facebook URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_social_icons',
	));
	$wp_customize->add_setting('storefront_ecommerce_footer_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_footer_facebook_icon',array(
		'label'	=> __('Facebook Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_footer_social_icons',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('storefront_ecommerce_footer_twitter_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_twitter_url',array(
		'type' => 'url',
		'label' => __('Add Twitter URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_social_icons',
	));
	$wp_customize->add_setting('storefront_ecommerce_footer_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_footer_twitter_icon',array(
		'label'	=> __('Twitter Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_footer_social_icons',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('storefront_ecommerce_footer_instagram_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_instagram_url',array(
		'type' => 'url',
		'label' => __('Add Instagram URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_social_icons',
	));
	$wp_customize->add_setting('storefront_ecommerce_footer_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_footer_instagram_icon',array(
		'label'	=> __('Instagram Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_footer_social_icons',
		'type'		=> 'icon'
	)));		


	$wp_customize->add_setting('storefront_ecommerce_footer_pinterest_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_pinterest_url',array(
		'type' => 'url',
		'label' => __('Add Pinterest URL','storefront-ecommerce'),
		'section' => 'storefront_ecommerce_footer_social_icons',
	));	
	$wp_customize->add_setting('storefront_ecommerce_footer_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Storefront_Ecommerce_Icon_Changer(
        $wp_customize,'storefront_ecommerce_footer_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','storefront-ecommerce'),
		'transport' => 'refresh',
		'section'	=> 'storefront_ecommerce_footer_social_icons',
		'type'		=> 'icon'
	)));	
	
	$wp_customize->add_setting('storefront_ecommerce_footer_icon_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'storefront_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control('storefront_ecommerce_footer_icon_alignment',array(
        'type' => 'radio',
        'label' => __('Icon Alignment ','storefront-ecommerce'),
        'section' => 'storefront_ecommerce_footer_social_icons',
        'choices' => array(
            'left' => __('Left Align','storefront-ecommerce'),
            'right' => __('Right Align','storefront-ecommerce'),
            'center' => __('Center Align','storefront-ecommerce'),
        ),
	) );	

}
add_action( 'customize_register', 'storefront_ecommerce_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Storefront_Ecommerce_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Storefront_Ecommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Storefront_Ecommerce_Customize_Section_Pro(
				$manager,
				'storefront_ecommerce_example_1',
				array(
					'title'   =>  esc_html__( 'Storefront Ecommerce Pro', 'storefront-ecommerce' ),
					'pro_text' => esc_html__( 'Go Pro', 'storefront-ecommerce' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/products/storefront-ecommerce-wordpress-theme' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'storefront-ecommerce-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'storefront-ecommerce-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function storefront_ecommerce_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'storefront-ecommerce'),
	        '2'     => __('Two', 'storefront-ecommerce'),
	        '3'     => __('Three', 'storefront-ecommerce'),
	        '4'     => __('Four', 'storefront-ecommerce')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Storefront_Ecommerce_Customize::get_instance();
