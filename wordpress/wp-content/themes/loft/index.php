<?php get_header(); ?>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Последние новости и акции из мира туризма</h1>
                <div class="posts-list">
                   <?php while(have_posts()) : the_post(); ?>
                            <!-- post-mini-->
                            <div class="post-wrap">
                                <div class="post-thumbnail"><img src="<?php bloginfo('template_url'); ?>/img/post_thumb/thumb_1.jpg" alt="Image поста" class="post-thumbnail__image"></div>
                                <div class="post-content">
                                    <div class="post-content__post-info">
                                        <div class="post-date"><?php the_date()?></div>
                                    </div>
                                    <div class="post-content__post-text">
                                        <div class="post-title">
                                             <?php the_title()?>
                                        </div>
                                        <p>
                                            <?php the_excerpt()?>
                                        </p>
                                    </div>
                                    <div class="post-content__post-control"><a href="<?php the_permalink()?>" class="btn-read-post">Читать далее >></a></div>
                                </div>
                            </div>
                    <!-- post-mini_end-->
                   <?php endwhile; ?>
                </div>
            </div>>
            <?php get_sidebar()?>
        </div>
    </div>>


<?php get_footer(); ?>