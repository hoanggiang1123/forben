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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="container">
            <div class="header_wrap">
                <div class="site-branding">
                    <a href="javascript:;">
                        <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://www.gotchseo.com/wp-content/uploads/2018/02/logo.png" alt="">
                    </a>
                </div>
                <div id="menu-toggle" class="header-btn">
                    <i class="fas fa-bars"></i>
                </div>
                
                <div class="site-nav">
                    <nav class="navigation">
                        <div class="main-menu-wrap">
                            <ul>
                                <li><a href="javascript:;">About</a></li>
                                <li><a href="javascript:;">Blog</a></li>
                                <li><a href="javascript:;">Traning</a></li>
                                <li><a href="javascript:;">Contact</a></li>
                            </ul>
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
                <form action="/" method="GET">
                    <input type="text" placeholder="Tìm Kiếm..." value="" name="s">
                    <label for="submit">
                        <input type="submit" name="submit">
                        <i class="fas fa-search"></i>
                    </label>
                    <div class="btn__close"></div>
                </form>
            </div>
        </div>

    </header>