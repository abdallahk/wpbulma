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
<!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css"> -->
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <?php wp_head(); ?>
</head>
<body>

  <nav class="navbar has-shadow <?=get_theme_mod( 'navbar_size' )?>" role="navigation" aria-label="main navigation">
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

              <?php echo get_theme_mod( 'navbar_right_content' ); ?>


            </div>
          </div>
        </div>


      </div>
    </div>
  </nav>
