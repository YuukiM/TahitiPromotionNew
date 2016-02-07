<?php
/*
    Template Name: page
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <?php
                if (is_page(34)){ //34 freepaper
                    $leadText = get_field("leadText", $id);

                    if (is_page(34)){
                        $Args = array(
                            'post_type' => 'tahiti-japon',
                            'posts_per_page' => 1,
                            'orderby' => 'name',
                            'order' => 'DESC'
                        );
                    }

                    $item = new WP_Query($Args);
                    if ($item->have_posts()) :
                        if(is_page(34)) {
                            echo "<div class=\"col-xs-12\" id=\"left\">";
                        }

                        while ($item->have_posts()) {
                            if ($leadText) {
                                echo "<div class=\"lead-text\"><h1>" . $leadText . "</h1></div>";
                            }
                            else{
                                echo "<div class=\"lead-text\"><h1>" . get_the_title() . "</h1></div>";
                            }
                            $item->the_post();
                            $thumbnailL = get_field("thumbnailL", $item->ID);
                            $pdf = get_field("pdf", $item->ID);
                            $linkURL = get_field("linkURL", $item->ID);
                            $itemContent = get_the_content();
                            echo "<div class=\"row\">";
                            the_title("<div class=\"col-xs-12\"><h2>","</h2></div>");
                            echo "<section class=\"main-content col-xs-12\">";
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-xs-12 col-sm-3 col-md-4\">";
                                        if ($thumbnailL) {
                                            if(is_page(34)) {
                                                echo "<div class='free-paper'><a href=\"" . $pdf . "\"><img src=\"" . $thumbnailL . "\"/></a></div>";
                                            }
                                        } else {
                                            echo "No image.";
                                        }
                                    echo "</div>";
                                    echo "<article class=\"col-xs-12 col-sm-9 col-md-8\">";
                                        if ($itemContent) {
                                            the_content();
                                        }else{
                                            echo "Coming soon";
                                        }
                                    echo "</article>";
                                echo "</div>";
                            echo "</section>";
                            echo "</div>";
                        }
                    ?>
                    <?php endif;
                        echo "</div>";

                    wp_reset_postdata();
                } else {
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            $leadText = get_field("leadText", $id);
                            if ($leadText) {
                                echo "<div class=\"lead-text col-xs-12\"><h1>" . $leadText . "</h1></div>";
                            }
                            else{
                                echo "<div class=\"lead-text col-xs-12\"><h1>" . get_the_title() . "</h1></div>";
                            }
                            echo "<div class=\"col-xs-12 col-md-9\" id=\"left\">";
                            if (get_the_content()) {
                                echo "<section class='main-content'>";
                                    echo "<article>";
                                        the_content();
                                    echo "</article>";
                                echo "</section>";
                            }
                            echo "</div>";
                        }
                    } else {
                        echo "<p>" . _e('Sorry, no posts matched your criteria.') . "</p>";
                    }
                }
                get_sidebar();
                ?>
            </div>
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>