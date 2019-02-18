<!DOCTYPE html> 
<html <?php language_attributes(); ?> class="no-js">
  <head> 
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="telephone=no" name="format-detection">
    <title>
      <?php 
        global $page, $paged; 
        wp_title( '|', true, 'right' );
        bloginfo( 'name' ); 
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
          echo " | $site_description";  
        if ( $paged >= 2 || $page >= 2 )
          echo ' | ' . sprintf( __( 'Page %s', 'striped' ), max( $paged, $page ) );  
        ?>
    </title>
    <meta property="og:title" content="<?php bloginfo('name'); ?><?php wp_title( '|', true, 'left' ); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>">
    <meta property="og:image" content="<?php echo THEMEROOT; ?>/img/og_logo.png">

    <?php wp_head(); ?>

    <link rel="shortcut icon" href="<?= THEMEROOT; ?>/favicon.png">
      
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->    
  </head>
  <body <?php body_class();?>>