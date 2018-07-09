<?php get_header(); ?>
    <div class="main-content">
        <div class="content-wrapper">

            <?php while(have_posts()) : the_post(); ?>

            <div class="content">
                <div class="article-title title-page">
                    <?php the_title(); ?>
                </div>
                <div class="article-image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image поста"></div>
                <div class="article-info">
<!--                    <div class="post-date">29.07.2016</div>-->
                </div>
                <div class="article-text">
                    <?php the_content(); ?>
                </div>

            </div>

            <?php endwhile; ?>
            <?php get_sidebar(); ?>

        </div>



    </div>

<?php get_footer(); ?>