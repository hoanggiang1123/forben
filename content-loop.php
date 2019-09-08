
<div class="post__item">
    <div class="post__img">
        <?php $img = ben_getImg($post->ID, $post->post_content,372,194,'-ben-feature-thumb-');?>
        <a href="<?php the_permalink();?>"><img src="<?php echo $img;?>" alt="<?php the_title();?>"></a>
    </div>
    <div class="post__title">
        <div class="post__title-wrp">
            <div class="post__left">
                <div class="post__date">
                    <?php echo getPostDate();?>
                </div>
                <div class="post__cm">
                    <i class="fas fa-comment-dots"></i>	&nbsp; <?php echo get_comments_number(get_the_ID());?>
                </div>
            </div>
            <div class="post__right">
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            </div>
        </div>
    </div>
</div>