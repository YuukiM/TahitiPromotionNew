<?php
/*
    Template Name: Goods
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <?php
                    $leadText = get_field("leadText", $id);
                    $Args = array(
                        'post_type' => 'goods',
                        'posts_per_page' => 2,
                        'orderby' => 'date',
                        'goods-cat' => 'ピックアップ',
                        'order' => 'DESC'
                    );
                    $item = new WP_Query($Args);
                    if ($item->have_posts()) :

                        echo get_the_terms($post->ID, 'goods-cat');

                            echo "<div class=\"col-xs-12 col-md-10\" id=\"left\">";
                            if ($leadText) {
                                echo "<div class=\"lead-text\"><h1>" . $leadText . "</h1></div>";
                            } else {
                                echo "<div class=\"lead-text\"><h1>" . get_the_title() . "</h1></div>";
                            }
                            while ($item->have_posts()) {
                                $item->the_post();
                                $thumbnailL = get_field("thumbnailL", $item->ID);
                                $pdf = get_field("pdf", $item->ID);
                                $linkURL = get_field("linkURL", $item->ID);
                                $itemContent = get_the_content();
                                echo "<div class=\"row\">";
                                the_title("<div class=\"col-xs-12\"><h2>", "</h2></div>");
                                echo "<section class=\"main-content col-xs-12\">";
                                echo "<div class=\"row\">";
                                echo "<div class=\"col-xs-12 col-sm-3 col-md-4\">";
                                if ($thumbnailL) {
                                    echo "<div class='free-paper'><a href=\"" . $linkURL . "\"><img src=\"" . $thumbnailL . "\"/></a></div>";
                                } else {
                                    echo "No image.";
                                }
                                echo "</div>";
                                echo "<article class=\"col-xs-12 col-sm-9 col-md-8\">";
                                if ($itemContent) {
                                    the_content();
                                    echo "<a href='" . $linkURL . "'>この商品の詳しい情報はこちら</a>";
                                } else {
                                    echo "Coming soon";
                                }
                                echo "</article>";
                                echo "</div>";
                                echo "</section>";
                                echo "</div>";
                            }
                    endif;
                    wp_reset_postdata();
                ?>



                <?php
                $leadText = get_field("leadText", $id);
                $Args = array(
                    'post_type' => 'goods',
                    'posts_per_page' => 0,
                    'goods-cat' => 'その他のカテゴリー',
                    'meta_key' => 'order',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                );
                $item = new WP_Query($Args);
                if ($item->have_posts()) :
                    echo "<div class=\"lead-text col-xs-12\"><h1>その他の商品カテゴリー</h1></div>";
                    $i = 0;
                    while ($item->have_posts()) {
                        $item->the_post();
                        $thumbnailL = get_field("thumbnailL", $item->ID);
                        $pdf = get_field("pdf", $item->ID);
                        $linkURL = get_field("linkURL", $item->ID);
                        $itemContent = get_the_content();

                        echo "<div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-3\">";
                            echo "<div class=\"thumbnail\">";
                                echo "<a href=\"".$linkURL."\" title=\"".get_the_title()."\" target=\"_blank\">";
                                    echo "<img src=\"".$thumbnailL."\" />";
                                    echo "<div class=\"caption\">";
                                    echo get_the_title();
                                    echo "</div>";
                                echo "</a>";
                            echo "</div>";
                        echo "</div>";
                        $i++;
                        if(($i % 3) == 0){
                            echo "<div class='clearfix visible-md-block'></div>\n";
                        }
                        if(($i % 4) == 0){
                            echo "<div class='clearfix visible-lg-block'></div>\n";
                        }
                    }
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>