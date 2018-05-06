<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo('description') ?>">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/css/fontawesome.css" rel="stylesheet">
<!-- Master Css -->
<!--<link href="<?php bloginfo('template_url'); ?>/css/master.css" rel="stylesheet">-->
<!-- Main Css -->
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type='text/css' media="all">
<?php wp_head(); ?>
</head>
	<body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                   <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a href="<?php bloginfo('url'); ?>" class="navbar-brand"><?php bloginfo('name'); ?></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php
                           wp_nav_menu( array(
                               'menu'              => 'primary',
                               'theme_location'    => 'primary',
                               'depth'             => 2,
                               'container'         => '',
                               'container_class'   => '',
                               'container_id'      => '',
                               'menu_class'        => 'nav navbar-nav',
                               'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                               'walker'            => new wp_bootstrap_navwalker())
                           );
                       ?>
				<form role="search" method="get" id="searchform" class="searchform form-inline navbar-left" action="<?php bloginfo('url') ?>">
                <div class="form-control-static">
                <input class="form-control" name="s" placeholder="Search...">
                </div>
                </form>
                
                      <ul class="nav navbar-nav navbar-right">
                      <?php if(is_user_logged_in()) : ?>
                        <li class="dropdown">
                        <?php global $current_user; get_currentuserinfo(); ?>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $current_user->display_name ?> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo admin_url(); ?>">Profile</a></li>
                            <li><a href="<?php echo get_edit_user_link(); ?>">Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Log out</a></li>
                          </ul>
                        </li>
                        <?php else : ?>
                        <li><a href="<?php echo wp_login_url(get_permalink()); ?>">Login</a></li>
                        <li><a href="<?php echo wp_registration_url(); ?>">Register</a></li>
                        <!--<li><a href="<?php echo wp_lostpassword_url(); ?>">Lost Password</a></li>-->
                      <?php endif; ?>
                      </ul>
                </div>
            </div>
        </nav>
    <div class="container">