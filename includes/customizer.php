<?php


//adding setting for copyright text
add_action('customize_register', 'navbar_settings');

function navbar_settings($wp_customize) {

  //adding section in wordpress customizer   
  $wp_customize->add_section('navbar_settings_section', array(
    'title'   => 'Navbar Settings',
    'priority'   => 30,
  ));

  $wp_customize->add_setting( 'navbar_size', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control( 'navbar_size', array(
    'label'     => 'Size',
    'section'   => 'navbar_settings_section',
    'settings'  => 'navbar_size',
    'type'      => 'radio',
    'choices'   => array( ''  => 'Small', ' is-spaced'  => 'Spaced')
  ));

  //adding setting for copyright text
  $wp_customize->add_setting('navbar_right_content', array(
    'default' => '<a href="" class="button is-light"><i class="fab fa-twitter"></i></a>

<a href="" class="button is-light"><i class="fab fa-facebook-f"></i></a>

<a href="" class="button is-light"><i class="fab fa-github"></i></a>

<a href="" class="button is-primary"><strong>Sign up</strong></a>

<a href="" class="button is-light">Log in</a>',
    'transport' => 'refresh',

  ));

  $wp_customize->add_control('navbar_right_content', array(
    'label'   => 'Right Content',
    'section' => 'navbar_settings_section',
    'type'    => 'textarea',
  ));

}




add_action( 'customize_register', 'titlebar_customizer' );
function titlebar_customizer( $wp_customize ) {

  $wp_customize->add_section( 'titlebar_settings', array(
    'title'      => 'Title Bar Settings',
    'priority'   => 31,
  ));

  $wp_customize->add_setting( 'titlebar_size', array(
    'default'   => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control( 'titlebar_size', array(
    'label'     => 'Select Titlebar Size',
    'section'   => 'titlebar_settings',
    'settings'  => 'titlebar_size',
    'type'      => 'radio',
    'choices'   => array(
      ''      => 'Default',
      'is-small'      => 'Small',
      'is-medium'      => 'Medium',
      'is-large'      => 'Large',
    ),
  ));

  $wp_customize->add_setting( 'titlebar_color', array(
    'default'   => 'is-primary',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control( 'titlebar_color', array(
    'label'     => 'Select Titlebar Background Color',
    'section'   => 'titlebar_settings',
    'settings'  => 'titlebar_color',
    'type'      => 'radio',
    'choices'   => array(
      'is-primary'      => 'Primary',
      'is-info'      => 'Info',
      'is-success'      => 'Success',
      'is-warning'      => 'Warning',
      'is-danger'      => 'Danger',
      'has-background-light'      => 'Light',
    ),
  ));

  $wp_customize->add_setting( 'titlebar_breadcrumb', array(
    'default'   => true,
    'transport' => 'refresh',
  ));

  $wp_customize->add_control( 'titlebar_breadcrumb', array(
    'label'     => 'Show Breadcrumb in Titlebar',
    'section'   => 'titlebar_settings',
    'settings'  => 'titlebar_breadcrumb',
    'type'      => 'radio',
    'choices'   => array(
      true      => 'True',
      false      => 'False',
    ),
  ));

}


//adding setting for copyright text
add_action('customize_register', 'theme_copyright_customizer');

function theme_copyright_customizer($wp_customize) {

  //adding section in wordpress customizer   
  $wp_customize->add_section('footer_copyright_section', array(
    'title'   => 'Footer Settings',
    'priority'   => 33,
  ));

  //adding setting for copyright text
  $wp_customize->add_setting('footer_copyright_text', array(
    'default' => '<p>
    <strong>Bulma</strong> by <a href="https://jgthms.com" class="customize-unpreviewable">Jeremy Thomas</a>. The source code is licensed
    <a href="http://opensource.org/licenses/mit-license.php" class="customize-unpreviewable">MIT</a>. The website content
    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" class="customize-unpreviewable">CC BY NC SA 4.0</a>.
    </p>',
    'transport' => 'refresh',

  ));

  $wp_customize->add_control('footer_copyright_text', array(
    'label'   => 'Copyright text',
    'section' => 'footer_copyright_section',
    'type'    => 'textarea',
  ));
}