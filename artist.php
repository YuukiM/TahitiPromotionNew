<?php
/*
    Template Name: Artist
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="lead-text"><h1>アーティスト一覧</h1></div>
            <section class="main-content row">
                <div class="col-md-9 artist-container" id="left">
                    <?php
                        $dancerArgs = array(
                            'post_type'   => 'artist',
                            'meta_key' => 'order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                               array(
                                  'key' => 'category',
                                  'value' => 'dancerJP'
                               ),
                            ),
                        );
                        $dancer = new WP_Query( $dancerArgs );
                        if ( $dancer -> have_posts() ) {
                            echo "<div id='dancerJP' class=\"row artist-block\">";
                            echo "<div class='artist col-xs-6 col-sm-4 col-lg-3 cat-title'><div class='thumbnail'><h2>日本人ダンサー</h2></div></div>";
                            while ($dancer -> have_posts()) {
                                $dancer -> the_post();
                                echo "<div class='artist col-xs-6 col-sm-4 col-lg-3'><div class='thumbnail'><a href=\"".get_permalink($dancer->ID)."\"><img src=\"" .get_field("thumbnail", $dancer->ID). "\"/><div class=\"caption\"><p>". get_field("name", $dancer->ID) . "<br/>" . get_field("kana", $dancer->ID) . "</p></div></a></div></div>";
                            }
                            echo "</div>";
                        }
                        wp_reset_postdata();

                        $dancerTaArgs = array(
                            'post_type'   => 'artist',
                            'meta_key' => 'order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'category',
                                    'value' => 'dancerTA'
                                ),
                            ),
                        );
                        $dancerTa = new WP_Query( $dancerTaArgs );
                        if ( $dancerTa -> have_posts() ) {
                            echo "<div id='dancerTA' class=\"row artist-block\">";
                            echo "<div class='artist col-xs-6 col-sm-4 col-lg-3 cat-title'><div class='thumbnail'><h2>現地ダンサー</h2></div></div>";
                            while ($dancerTa -> have_posts()) {
                                $dancerTa -> the_post();
                                echo "<div class='artist col-xs-6 col-sm-4 col-lg-3'><div class='thumbnail'><a href=\"".get_permalink($dancerTa->ID)."\"><img src=\"" .get_field("thumbnail", $dancerTa->ID). "\"/><div class=\"caption\"><p>". get_field("name", $dancerTa->ID) . "<br/>" . get_field("kana", $dancerTa->ID) . "</p></div></a></div></div>";
                            }
                            echo "</div>";
                        }
                        wp_reset_postdata();

                        $musicianArgs = array(
                            'post_type'   => 'artist',
                            'meta_key' => 'order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'category',
                                    'value' => 'musician'
                                ),
                            ),
                        );
                        $musician = new WP_Query( $musicianArgs );
                        if ( $musician -> have_posts() ) {

                            echo "<div id='musician' class=\"row artist-block\">";
                            echo "<div class='artist col-xs-6 col-sm-4 col-lg-3 cat-title'><div class='thumbnail'><h2>ミュージシャン</h2></div></div>";
                            while ($musician -> have_posts()) {
                                $musician -> the_post();
                                echo "<div class='artist col-xs-6 col-sm-4 col-lg-3'><div class='thumbnail'><a href=\"".get_permalink($dancer->ID)."\"><img src=\"" . get_field("thumbnail", $musician->ID) . "\"/><div class=\"caption\"><p>" . get_field("name", $musician->ID) . "<br/>" . get_field("kana", $musician->ID) . "</p></div></a></div></div>";
                            }
                            echo "</div>";
                        }
                        wp_reset_postdata();

                        $teamArgs = array(
                            'post_type'   => 'artist',
                            'meta_key' => 'order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'category',
                                    'value' => 'group'
                                ),
                            ),
                        );
                        $team = new WP_Query( $teamArgs );
                        if ( $team -> have_posts() ) {

                            echo "<div id='group' class=\"row artist-block\">";
                            echo "<div class='artist col-xs-6 col-sm-4 col-lg-3 cat-title'><div class='thumbnail'><h2>グループ</h2></div></div>";
                            while ($team -> have_posts()) {
                                $team -> the_post();
                                echo "<div class='artist col-xs-6 col-sm-4 col-lg-3'><div class='thumbnail'><a href=\"".get_permalink($group->ID)."\" ><img src=\"" . get_field("thumbnail", $group->ID) . "\"/><div class=\"caption\"><p>" . get_field("name", $group->ID) . "<br/>" . get_field("kana", $group->ID) . "</p></div></a></div></div>";
                            }
                            echo "</div>";
                        }
                        wp_reset_postdata();

                        $teamArgs = array(
                            'post_type'   => 'artist',
                            'meta_key' => 'order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'category',
                                    'value' => 'mc'
                                ),
                            ),
                        );
                        $team = new WP_Query( $teamArgs );
                        if ( $team -> have_posts() ) {

                            echo "<div id='mc' class=\"row artist-block\">";
                            echo "<div class='artist col-xs-6 col-sm-4 col-lg-3 cat-title'><div class='thumbnail'><h2>MC</h2></div></div>";
                            while ($team -> have_posts()) {
                                $team -> the_post();
                                echo "<div class='artist col-xs-6 col-sm-4 col-lg-3'><div class='thumbnail'><a href=\"".get_permalink($mc->ID)."\" ><img src=\"" . get_field("thumbnail", $mc->ID) . "\"/><div class=\"caption\"><p>" . get_field("name", $mc->ID) . "<br/>" . get_field("kana", $mc->ID) . "</p></div></a></div></div>";
                            }
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