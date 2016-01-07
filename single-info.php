<?php
/*
    Template Name: Single-artist
*/
?>
<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <div class="lead-text col-xs-12">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="col-sm-9" id="left">
                        <section class="main-content">
                            <article>
                                <?php the_content(); ?>
                            </article>
                        </section>
                    </div>
                    <?php get_sidebar(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>



