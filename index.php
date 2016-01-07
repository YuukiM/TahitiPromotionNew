<?php get_header(); ?>
    <section id="visual">
        <div class="visual-inner container">
            <?php
                $mainVisuals = get_posts("orderby=meta_value_num&post_type=mainvisual&meta_key=order&order=ASC");
                if ($mainVisuals) {
                    foreach ($mainVisuals as $mainVisual) {
                        $ID = $mainVisual->ID;
                        $mainVisualText = get_field("textNew", $ID);
                        $mainVisualImage = get_field("image", $ID);
                        $mainVisualExtURL = get_field("url", $ID);
                        $mainVisualLink = get_field("link", $ID);
                        echo "<div class='slide'>\n";
                        echo "<div class='text-container'>\n";
                        echo "<div class='text'>\n";
                        echo $mainVisualText . "\n";
                        if($mainVisualExtURL) {
                            echo "<a href='" . $mainVisualExtURL . "'>\n";
                        }else {
                            echo "<a href='" . $mainVisualLink . "'>\n";
                        }
                        echo "<button class='btn btn-default btn-lg'>\n";

                        echo "詳しくはこちら&nbsp;<span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span>\n";

                        echo "</button>\n";
                        echo "</a>\n";
                        echo "</div>\n";
                        echo "</div>\n";
                        echo "<img src='" . $mainVisualImage . "' />\n";
                        echo "</div>\n";
                    }
                }
            ?>
        </div>
    </section>
    <section id="info" class="block info">
        <div class="container">
            <h1 class="text-uppercase">Information<br /><small>最新情報</small></h1>
            <div class="row">
                <?php
                $infoArgs = array(
                    'post_type' => 'info',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => '6'
                );
                $info = new WP_Query($infoArgs);
                if ($info->have_posts()) {
                    $i = 0;
                    while ($info->have_posts()) {
                        $info->the_post();
                        echo "<div class=\"info-block col-xs-12 col-md-4\">";
                        echo "<a href='" . get_permalink() . "' title='" . get_the_title() . "'>";
                        if(get_field("thumbnail")){
                            echo "<div class=\"info-inner\"><div class=\"image\"><div class=\"bg\" style=\"background: url(".get_field("thumbnail").") center center no-repeat;\"></div></div>";

                        }else{
                            echo "<div class=\"info-inner\"><div class=\"image\"><div class=\"bg\" style=\"background: url(".first_image().") center center no-repeat;\"></div></div>";

                        }
                        echo "<p class=\"date\">".get_the_date("n/j")."</p>";
                        //echo "<div class=\"caption\">";
                        echo "<h2>" . get_the_title() . "</h2>";
                        echo "<p class=\"excerpt\">" . get_the_excerpt() . " 詳しくはこちら<span class='glyphicon glyphicon-menu-right'></span></p>";
                        //echo "</div>";
                        echo "</div></a>";
                        echo "</div>";
                        $i++;
                        if (($i % 3) == 0) {
                            echo "<div class='clearfix visible-md-block visible-lg-block'></div>";
                        }
                    }
                } else {
                    echo "<div class=\"info-text\">";
                    echo "<div>更新情報はありません。</div>";
                    echo "</div>";
                }
                wp_reset_postdata();
                ?>
            </div>
           <div class="more"><a href="<?php bloginfo("url");?>/?page_id=167"><button class='btn btn-default btn-lg'>もっと見る<span class='glyphicon glyphicon-menu-right'></span></button></a></div>
        </div>
    </section>
    <section id="main" class="block contents">
        <div class="container">
            <h1 class="text-uppercase">Contents<br /><small>コンテンツ</small></h1>
            <div class="row">
                <div class="col-lg-10 cat" id="left">
                    <div class="row">
                        <?php
                            $categories = get_posts(
                                array(
                                    'post_type' => 'main-category',
                                    'meta_key' => 'order',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'ASC',
                                    'numberposts' => '0'
                                )
                            );
                            $i = 0;
                            foreach ($categories as $category) {
                                $categoryID = $category->ID;
                                $categoryURL = get_field("categoryLink", $categoryID);
                                $categoryManualURL = get_field("categoryManualURL", $categoryID);
                                $categoryImage = get_field("image", $categoryID);
                                $categoryTitle = get_the_title($categoryID);
                                $categoryText = get_field("categoryText", $categoryID);
                                if ($categoryManualURL) {
                                    echo "<div class=\"col-sm-6 col-xs-12\"><div class=\"thumbnail\"><a href=\"" . $categoryManualURL . "\"><img src=\"" . $categoryImage . "\" /><div class=\"caption\"><h2 class=\"text-uppercase\">" . $categoryTitle . "</h2><p class=\"\">" . $categoryText . "</p></div></a></div></div>";
                                } else {
                                    echo "<div class=\"col-sm-6 col-xs-12\"><div class=\"thumbnail\"><a href=\"" . $categoryURL . "\"><img src=\"" . $categoryImage . "\" /><div class=\"caption\"><h2 class=\"text-uppercase\">" . $categoryTitle . "</h2><p class=\"\">" . $categoryText . "</p></div></a></div></div>";
                                }
                                $i++;
                                if (($i % 2) == 0) {
                                    echo "<div class='clearfix visible-sm-block visible-md-block visible-lg-block'></div>\n";
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div><!-- /.container -->
    </section>
<?php get_footer(); ?>