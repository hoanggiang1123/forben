<?php get_header();?>
<?php echo showSlider(get_queried_object_id(),'category');?>
<div class="header-gradient">
    <div class="container">
        <?php
            echo archiveTitle();
        ?>
    </div>
</div>
<div class="main__content main__content-single">
    <div class="container float">
        
        <div class="main__wrapper">
            <div class="main__brc">
                <?php
                    if(function_exists('yoast_breadcrumb')) { 
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }
                ?>
            </div>
            <div class="main">
                <div class="main__left">
                   
                    <div class="main__des">
                       <?php echo the_archive_description();?>
                    </div>
                    <div class="posts">
                        <?php if(have_posts()) while(have_posts()) : the_post();
                            get_template_part('content','loop');
                        endwhile; wp_reset_postdata();?>
                        
                    </div>
                    <div class="paginate">
                        <?php echo ben_pagination();?>
                    </div>
                </div>
                <div class="main__right">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>