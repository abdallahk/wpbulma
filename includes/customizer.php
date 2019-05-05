<?php
//adding setting for copyright text
add_action('customize_register', 'theme_copyright_customizer');

function theme_copyright_customizer($wp_customize) {
    //adding section in wordpress customizer   
  $wp_customize->add_section('copyright_extras_section', array(
    'title'   => 'Copyright Text Section'
  ));

    //adding setting for copyright text
  $wp_customize->add_setting('text_setting', array(
    'default' => 'Default Text For copyright Section',
  ));

  $wp_customize->add_control('text_setting', array(
    'label'   => 'Copyright text',
    'section' => 'copyright_extras_section',
    'type'    => 'text',
  ));
}




add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {

  $wp_customize->add_section( 'cd_colors', array(
    'title'      => 'Colors',
    'priority'   => 30,
  ) );

  $wp_customize->add_setting( 'background_color', array(
    'default'     => '#43C6E4',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
    'label'       => 'Background Color',
    'section'     => 'cd_colors',
    'settings'    => 'background_color',
  ) ) );

}



add_action( 'customize_register', 'cd_customizer_settings_new' );
function cd_customizer_settings_new( $wp_customize ) {


  $wp_customize->add_section( 'titlebar_settings', array(
    'title'      => 'Title Bar Settings',
    'priority'   => 20,
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
    'label'     => 'Select Titlebar Color',
    'section'   => 'titlebar_settings',
    'settings'  => 'titlebar_color',
    'type'      => 'radio',
    'choices'   => array(
      'is-primary'      => 'Primary',
      'is-info'      => 'Info',
      'is-success'      => 'Success',
      'is-warning'      => 'Warning',
      'is-danger'      => 'Danger',
    ),
  ));


}
