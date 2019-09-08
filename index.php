<?php get_header();?>
<div class="header-gradient">
    <div class="container">
        <h1>Chào Mừng Bạn Đến Với Vua Casino</h1>
    </div>
</div>
<div class="main__content">
    <div class="container">
        
        <div class="main__wrapper">
            <div class="main__brc">
                <!-- <ul>
                    <li> Bạn Đang Ở: </li>
                    <li><a href="javascript:;">Home</a></li>
                </ul> -->
                <?php
                    if(function_exists('yoast_breadcrumb')) { 
                        yoast_breadcrumb( '<p id="breadcrumbs"><span> Bạn Đang Ở: </span>','</p>' );
                    }
                ?>
            </div>
            <div class="main">
                <div class="main__left">
                    
                    <div class="posts">
                        <?php if(have_posts()) while(have_posts()) : the_post();
                            get_template_part('content','loop');
                        endwhile; wp_reset_postdata();?>
                        
                    </div>
                    <!-- <div class="paginate">
                        <ul>
                            <li class="current">
                                <a href="javvascript:;"> 1</a>
                            </li>
                            <li>
                                <a href="javvascript:;"> 2</a>
                            </li>
                            <li>
                                <a href="javvascript:;"> 3</a>
                            </li>
                            <li>
                                <a href="javvascript:;"> 4</a>
                            </li>
                            <li>
                                <a href="javvascript:;"> Trang Cuoi</a>
                            </li>
                        </ul>
                    </div> -->
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