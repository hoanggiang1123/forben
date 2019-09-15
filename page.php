<?php get_header();?>
<?php echo showSlider(get_the_ID(),'post');?>
<?php if(have_posts()) while(have_posts()): the_post();?>
<div class="header-gradient">
    <div class="container">
        <h1><?php the_title();?></h1>
    </div>
</div>
<div class="main__content main__content-single">
    <div class="container float">
        
        <div class="main__wrapper">
            
            <div class="main__blog">
                <div class="blog__wrap">
                    <div class="meta"></div>
                    <div class="blog__post">
                        <div class="blog__author">
                            <div class="author_pic" style="background-image: url(<?php echo get_avatar_url( get_the_author_meta( 'ID' ), 32 ); ?>);">
                                
                            </div>
                            <div class="author__infor">
                               
                                <h3><?php echo get_the_author_meta( 'display_name'); ?></h3>
                                <span>
                                    <?php echo nl2br(get_the_author_meta('description')); ?>  
                                </span>
                            </div>
                        </div>
                        <div class="blog__content">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
                <?php comments_template( '', true ); ?>
            </div>
            
        </div>
    </div>
</div>
<?php endwhile; wp_reset_postdata();?>
<?php get_footer();?>