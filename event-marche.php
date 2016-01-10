<?php
/*
    Template Name: Event Marche
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="lead-text">
                <?php
                    $leadText = get_field("leadText", $id);
                    if ($leadText) {
                        echo "<h1>" . $leadText . "</h1>";
                    }
                    else{
                        echo "<h1>" . get_the_title() . "</h1>";
                    }
                ?>
            </div>
            <section class="main-content row">
                <div class="col-md-9" id="left">
                    <?php
                    $root_page = ps_get_root_page( $post );
                    $rootPageID = $root_page->ID;
                    $parents = get_ancestors(get_the_ID(), "page");
                    if($rootPageID == 32 && get_the_ID() != 32) {
                        if ($parents[0] == 86) {  //Events
                            $event = "タヒチフェスタ東京";
                        } elseif ($parents[0] == 108) {  //Events
                            $event = "タヒチフェスタ横浜";
                        } elseif ($parents[0] == 110) {  //Events
                            $event = "タヒチフェスタ名古屋";
                        } elseif ($parents[0] == 112) {  //Events
                            $event = "タヒチフェスタ札幌";
                        } else {
                            $event = "none";
                        }
                        $args = array(
                            'post_type' => 'events',
                            'event' => $event,
                            'type' => "ショップ",
                            'meta_key' => 'order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'posts_per_page' => '999'
                        );
                        $eventItem = new WP_Query($args);
                        echo "<div class=\"eventItem\">";
                        echo the_content();

                        if ($eventItem->have_posts()) {
                            while ($eventItem->have_posts()) {
                                $eventItem->the_post();

                                $eventItemID = $eventItem->ID;
                                $eventItemImage = get_field("thumbnail", $eventItemID);
                                if (get_field("url", $eventItemID)) {
                                    $eventItemLinkURL = get_field("url", $eventItemID);
                                } elseif (get_field("link", $eventItemID)) {
                                    $eventItemLinkURL = get_field("link", $eventItemID);
                                } else {
                                    $eventItemLinkURL = "";
                                }

                                echo "<div class=\"row\">";
                                    echo "<div class='col-xs-12'>";
                                        echo "<h2>" . get_the_title($eventItemID) . "</h2>";
                                        echo "<div class=\"row\">";
                                            if($eventItemImage) {
                                                echo "<div class='col-xs-12 col-sm-4 col-md-5 col-lg-4'>";
                                                echo "<a href=\"" . $eventItemLinkURL . "\"><img src=\"" . $eventItemImage . "\" /></a>";
                                                echo "</div>";
                                                echo "<div class='col-xs-12 col-sm-8 col-md-7 col-lg-8'>";
                                            }else {
                                                echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";
                                            }
                                                    the_content();
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }
                        echo "</div>";
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </section>
        </div><!-- /.container -->
    </div><!-- /.main -->
<?php get_footer(); ?>