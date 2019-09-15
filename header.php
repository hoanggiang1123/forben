<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147110797-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-147110797-2');
</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo BEN_THEME_URL.'/static/logo vuacasino.info.png';?>">
	<?php wp_head(); ?>
</head>
<body style="overflow-x: hidden;>
	<script>window.MBID="408";</script><script src="https://menu.metu.vn/static/js/sdk.js?container=body"></script>
    <?php if(!is_page_template('vuacasino.php') && !is_page_template('vuacasino1.php')):?>
    <header>
        <div class="container">
            <div class="header_wrap">
                <div class="site-branding">
                    <a href="<?php echo home_url('/');?>">
                        <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://vuacasino.info/wp-content/uploads/2019/09/logo-vuacasino.info_.png" alt="">
                    </a>
                </div>
                <div id="menu-toggle" class="header-btn">
                    <i class="fas fa-bars"></i>
                </div>
                
                <div class="site-nav">
                    <nav class="navigation">
                        <div class="main-menu-wrap">
                            <?php 
                                $args = array('theme_location'=>'primary-menu','container'=>false);
                                wp_nav_menu($args);
                            ?>
                        </div>
                    </nav>
                </div>
                <div class="icon__search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>

        <div class="main__search">
            <div class="container">
                <form action="<?php echo home_url('/');?>" method="GET">
                    <input type="text" placeholder="Tìm Kiếm..." value="<?php echo get_search_query() ?>" name="s" id="s">
                    <label for="submit">
                        <input type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </label>
                    <div class="btn__close"></div>
                </form>
            </div>
        </div>

    </header>
    <?php endif;?>