<?php
/*
    Template Name: Event Artist
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <?php
                    $args = array(
                        "post_type" => "events",
                        "meta_key" => "order",
                        "orderby" => "meta_value_num",
                        "order" => "ASC",
                        "numberposts" => "0"
                    );
                    get_posts($args);
                    

                ?>
            </div>
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>