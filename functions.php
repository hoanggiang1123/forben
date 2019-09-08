<?php

// THEME PATH AND URL
define('BEN_THEME_URL', get_template_directory_uri());
define('BEN_THEME_PATH',get_template_directory());


add_action('after_setup_theme', 'ben_after_setup_theme' );
function ben_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary-menu' => __( 'Primary', 'bentheme' ),
        'footer-menu' => __( 'Footer', 'bentheme' ),
        'mobile' => __( 'Mobile', 'bentheme' )
    ) );
}



add_action( 'widgets_init', 'ben_register_sidebars' );
function ben_register_sidebars() {
    
    // Default sidebar
    register_sidebar( array(
        'name' => __('sidebar', 'bentheme'),
        'description'   => __( 'Default sidebar.', 'bentheme' ),
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
	register_sidebar( array(
        'name' => __('Sidebar1', 'bentheme'),
        'description'   => __( 'Default sidebar.', 'bentheme' ),
        'id' => 'sidebar1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action('wp_enqueue_scripts','ben_add_css',999);
function ben_add_css() {
    wp_enqueue_style('ben_style',get_stylesheet_uri());

    if(!is_page_template('vuacasino.php') && !is_page_template('vuacasino1.php')):
        wp_enqueue_style('google-font','//fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap');
        wp_enqueue_style('font-awsome','//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css');
        wp_enqueue_style('swiper','//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css');
        wp_enqueue_style('main_css',BEN_THEME_URL.'/css/main.css');
    else:
        // Vua Casino Css
        if(is_page_template('vuacasino.php')):
            wp_enqueue_style('google-font',BEN_THEME_URL.'/css/indexCss.css');
        else:
            wp_enqueue_style('google-font',BEN_THEME_URL.'/css/indexCss1.css');
        endif;
        
        wp_enqueue_style('bootstrap-css','//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_style('slick-css',BEN_THEME_URL.'/css/slick.css');
        wp_enqueue_style('slick-theme',BEN_THEME_URL.'/css/slick-theme.css');
    endif;

}


add_action('wp_enqueue_scripts','ben_add_scripts');
function ben_add_scripts() {
    if(!is_page_template('vuacasino.php') && !is_page_template('vuacasino1.php')):
        wp_enqueue_script('swiper','//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js',[],'1.0.0', false);
        if (is_singular() && comments_open() && get_option('thread_comments')):
            wp_enqueue_script( 'comment-reply' );
        endif;
    else:
        // Vua Casino Js
        wp_enqueue_script('jquery');
        wp_enqueue_script('popper','//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',[],'1.0.0', false);
        wp_enqueue_script('bootstrap','//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',[],'1.0.0', false);
        wp_enqueue_script('slick','//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js',[],'1.0.0', false);
        wp_enqueue_script('slickslick',BEN_THEME_URL.'/js/slick.js',[],'1.0.0', false);

    endif;
}


require_once BEN_THEME_PATH.'/inc/support.php';
global $Support;
$Support = new Ben_Theme_Support;

require_once BEN_THEME_PATH.'/inc/metabox.php';
new Ben_Related_Post_And_Slider_Opt;

require_once BEN_THEME_PATH.'/inc/tax-meta.php';
new Category_Meta;

function ben_getImg($postID, $postcontent, $width, $height, $suffixes){
    global $Support;
    $feature_img = wp_get_attachment_url(get_post_thumbnail_id($postID));

    if($feature_img == false){
        $imgUrl1 = $Support->get_img_url($postcontent);

        if($imgUrl1 == false){
            return false;
        } else {
           $imgUrl = $Support->get_new_img_url($imgUrl1,$width,$height,$suffixes);
        }

    } else {
        $imgUrl = $Support->get_new_img_url($feature_img,$width,$height,$suffixes);
    }

    return $imgUrl;
}

function getPostDate() {
    return get_the_date('d').' '.'<span>'.get_the_date('M').'</span>';
}

function ben_pagination($pages = '', $range = 3) {
       
    the_posts_pagination( array(
        'mid_size' => 3,
        'prev_text' => __( 'Trang Trước', 'bentheme' ),
        'next_text' => __( 'Trang Cuối', 'bentheme' ),
    ) );

}

function archiveTitle() {

    if(is_category()){  
        $title = '<h1 class="postsby">'.single_cat_title('',false).'</h1>';
    }
    if(is_tag()){
         $title = '<h1 class="postsby">'.single_tag_title('',false).'</h1>';
    }
    if(is_search()){
        $title = '<h1 class="postsby">'.get_search_query('',false).'</h1>';
    }
    if(is_date()){
        $title = '<h1 class="postsby">'.single_month_title('',false).'</h1>';
    }
    return $title;
}

function getRelatedPost() {
    $post_id = get_the_ID();
    $categories = get_the_category($post_id);

    if(!empty($categories)) {
        $category_ids = [];
        foreach($categories as $cat) {
            $category_ids[] = $cat->term_id;
        }

        $args = ['posts_per_page'=> 6,'post_type'=>'post','post_status'=>'publish','post__not_in'=>array($post_id), 'category__in' => $category_ids,'category__in' => $category_ids,'ignore_sticky_posts' => 1,'orderby' => 'rand'];
        $related = new wp_query($args);
        ob_start();
        if($related ->have_posts()):?>
            <div class="related__post">
                <div class="related__header">
                    <h4>Bài Viết Liên Quan</h4>
                </div>
                <div class="realted__post-wrap">
                    <?php while($related->have_posts()) : $related->the_post();
                         $img = ben_getImg($related->post->ID, $related->post->post_content,300,186,'-ben-realted-thumb-');
                    ?>
                    <div class="related__item">
                        <div class="related__img">
                            <a href="<?php the_permalink();?>"><img src="<?php echo $img;?>" alt="<?php the_title();?>"></a>
                        </div>
                        <div class="related__title">
                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            </div>
        <?php endif;
        return ob_get_clean();
    }
}


function mts_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <?php
        switch( $comment->comment_type ) :
            case 'pingback':
            case 'trackback': ?>
                <div id="comment-<?php comment_ID(); ?>">
                    <div class="comment-author vcard">
                        Pingback: <?php comment_author_link(); ?>
                        
                            <span class="ago"><?php comment_date( get_option( 'date_format' ) ); ?></span>
                        
                        <span class="comment-meta">
                            <?php edit_comment_link( __( '( Sửa )', 'bentheme' ), '  ', '' ) ?>
                        </span>
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Bình luận của bạn đang chờ phê duyệt.', 'bentheme' ) ?></em>
                        <br />
                    <?php endif; ?>
                </div>
            <?php
                break;

            default: ?>
                <div id="comment-<?php comment_ID(); ?>" class="comment__flex" itemscope itemtype="http://schema.org/UserComments">
                    <div class="comment-author vcard">
                        <?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
                        
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Bình luận của bạn đang chờ phê duyệt.', 'bentheme' ) ?></em>
                        <br />
                    <?php endif; ?>
                    <div class="commentmetadata">
                        <div class="comment_aname">
                            <?php printf( '<span class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person"><span itemprop="name">%s</span></span>', get_comment_author_link() ) ?>
                                
                            <div class="comment_audate">
                                <span class="ago"><?php comment_date( get_option( 'date_format' ) ); ?></span>
                                
                                <span class="comment-meta">
                                    <?php edit_comment_link( __( '( Sửa )', 'bentheme' ), '  ', '' ) ?>
                                </span>
                            </div>
                        </div>
                        <div class="commenttext" itemprop="commentText">
                            <?php comment_text() ?>
                        </div>
                        <div class="reply">
                            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ) ?>
                        </div>
                    </div>
                </div>
            <?php
                break;
            endswitch; ?>
    <!-- WP adds </li> -->
<?php }

function showSlider($id,$type="post") {
    if($type == 'post') {
        $shortcode = get_post_meta($id,'slider_shortcode_fields',true); 
    } else {
        $shortcode = get_term_meta($id,'category_slider_shortcode',true);
    }
    if($shortcode != '') {
        return '<div class="slider">'.do_shortcode($shortcode).'</div>';
    }
}


function getKhuyenMai($atts) {
    $cat = isset($atts['cat'])? $atts['cat']: 10;
    $number = isset($atts['number'])? $atts['number']: 0;

    $args = array('posts_per_page' => $number, 'post_type'=>'post','post_status'=>'publish','category__in'=>array($cat));
    $km = new wp_query($args);
    ob_start();
    if($km->have_posts()) while($km->have_posts()) : $km->the_post();
    $img = ben_getImg($km->post->ID, $km->post->post_content,254,146,'-ben-km-thumb-'); 
    ?>
        <div class="row post" data-aos="fade-up">
            <img class="col-12 col-sm-12 col-md-4 col-xl-4 col-lg-4" src="<?php echo $img;?>" alt="<?php the_title();?>">
            <div class="col-12 col-sm-12 col-md-8 col-xl-8 col-lg-8">
                <h5><?php the_title();?></h5>
                <p> <?php echo mb_substr(get_the_excerpt(),0,200).'...';?><a href="<?php the_permalink();?>"> XEM THÊM</a></p>
            </div>
        </div>
    <?php endwhile; wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('khuyen-mai','getKhuyenMai');

function getLastestNew($atts) {
    $number = isset($atts['number'])? $atts['number']:3;
    $args = array('posts_per_page' => $number, 'post_type'=>'post','post_status'=>'publish','orderby'=>'ID','order'=>'DESC');

    $km = new wp_query($args);
    ob_start();
    if($km->have_posts()) while($km->have_posts()) : $km->the_post();
    $img = ben_getImg($km->post->ID, $km->post->post_content,254,146,'-ben-km-thumb-'); 
    ?>
        <div class=" post">
			<div class="rows">
				<div class="imgPost" data-aos="fade-right">
					<img src="<?php echo $img;?>" alt="<?php the_title();?>">
				</div>
				<div class="content" data-aos="fade-left">
					<h5><?php the_title();?></h5>
                    <p> <?php echo mb_substr(get_the_excerpt(),0,200).'...';?><a href="<?php the_permalink();?>"> XEM THÊM</a></p>
				</div>
			</div>
        </div>
    <?php endwhile; wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('lastest-new','getLastestNew');