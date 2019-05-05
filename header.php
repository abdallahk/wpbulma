<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php if(is_front_page() || is_home()){
      echo get_bloginfo('name');
    } else{
      echo wp_title('');
      echo " - ";
      get_bloginfo('name');
    }?>
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <?php wp_head(); ?>
</head>
<body>

  <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?=get_bloginfo('url');?>">

          <?php
          
          $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
          if( has_custom_logo() ) : echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . '">';
            else : echo '<h3 class="title">' . get_bloginfo( 'name' ) . '</h3>';
            endif;
            ?>

          </a>

          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>


        <div id="navbarBasicExample" class="navbar-menu">

         <?php create_topbar_menu( "topbar_menu" ) ?>

         <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <?php 

              $menuParameters = array(
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'menu'  => 'topbar_button_links',
                'add_li_class'    => 'button'
              );

              function add_additional_class_on_li($classes, $item, $args) {
                if($args->add_li_class) {
                  $classes[] = $args->add_li_class;
                }
                return $classes;
              }

              add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
              
              echo wp_nav_menu( $menuParameters );

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
