<?php
/*
    Template Name: Info
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <section class="main-content row">
                <div class="col-lg-12" id="left">
                    <?php
                    $infoArgs = array(
                        'post_type' => 'info',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 15
                    );
                    $info = new WP_Query($infoArgs);
                    if ($info->have_posts()) {
                        echo "<div class=\"row\">";
                        $i = 0;
                        while ($info->have_posts()) {
                            $info->the_post();
                            echo "<div class=\"info-block col-lg-4\">";
                            echo "<a href='" . get_permalink() . "' title='" . get_the_title() . "'>";
                            if(get_field("thumbnail")){
                                //echo "<div class=\"info-inner\"><div class=\"image\"><div class=\"bg\" style=\"background: url(".get_field(thumbnail).") center center no-repeat;\"></div></div>";
                                echo "<div class=\"info-inner thumbnail tbdark\"><div class=\"image\"><div class=\"bg\" style=\"background: url(".get_field(thumbnail).") center center no-repeat;\"></div></div>";

                            }else{
                                //echo "<div class=\"info-inner\"><div class=\"image\"><div class=\"bg\" style=\"background: url(".first_image().") center center no-repeat;\"></div></div>";
                                echo "<div class=\"info-inner thumbnail tbdark\"><div class=\"image\"><div class=\"bg\" style=\"background: url(".first_image().") center center no-repeat;\"></div></div>";

                            }
                            if(get_field("date")) {
                                echo "<p class=\"date\">" . get_field("date") . "</p>";
                            }
                            echo "<div class=\"caption\">";
                            echo "<h2>" . get_the_title() . "</h2>";
                            echo "<p class=\"excerpt\">" . get_the_excerpt() . "</p>";
                            echo "<p class=\"update\">" . get_the_date("Y年n月j日") . "</p>";
                            echo "</div>";
                            echo "</div></a>";
                            echo "</div>";
                            $i ++;
                            if(($i % 3) == 0){
                                echo "<div class='clearfix'></div>\n";
                            }

                        }
                        echo "</div>";
                    } else {
                        echo "<div class=\"info-text\">";
                        echo "<div>更新情報はありません。</div>";
                        echo "</div>";
                    }
                    wp_reset_postdata();
                    ?>

                </div><!-- /#left -->
                <?php get_sidebar(); ?>
            </section>    <!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main -->
<?php get_footer(); ?>