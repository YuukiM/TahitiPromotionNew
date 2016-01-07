<?php
/*
    Template Name: dancer
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <?php
                if (is_page(34) || is_page(36)) { //34 freepaper, 36 goods
                    $leadText = get_field("leadText", $id);

                    if (is_page(34)){
                        $Args = array(
                            'post_type' => 'tahiti-japon',
                            'posts_per_page' => 1,
                            'orderby' => 'name',
                            'order' => 'DESC'
                        );
                    }
                    if (is_page(36)){
                        $Args = array(
                            'post_type' => 'goods',
                            'posts_per_page' => 2,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                    }
                    $item = new WP_Query($Args);
                    if ($item->have_posts()) :
                        if(is_page(34)) {
                            echo "<div class=\"col-xs-12\" id=\"left\">";
                        }
                        if(is_page(36)) {
                            echo "<div class=\"col-xs-12 col-md-10\" id=\"left\">";
                            /*echo "<div class='lead-text'><h1>".get_field('leadText', get_the_ID())."</h1></div>";*/
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
                                            if(is_page(36)) {
                                                echo "<div class='free-paper'><a href=\"" . $linkURL . "\"><img src=\"" . $thumbnailL . "\"/></a></div>";
                                            }
                                        } else {
                                            echo "No image.";
                                        }
                                    echo "</div>";
                                    echo "<article class=\"col-xs-12 col-sm-9 col-md-8\">";
                                        if(is_page(36)){
                                            //the_title("<h1>","</h1>");
                                            if ($itemContent) {
                                                the_content();
                                                echo "<a href='".$linkURL."'>この商品の詳しい情報はこちら</a>";
                                            }else{
                                                echo "Coming soon";
                                            }
                                        }else{
                                            if ($itemContent) {
                                                the_content();
                                            }else{
                                                echo "Coming soon";
                                            }
                                        }
                                    echo "</article>";
                                echo "</div>";
                            echo "</section>";
                            echo "</div>";
                        }
                    ?>
                        <?php if(is_page(36)): ?>
                        <div class="row">
                            <div class="lead-text col-xs-12"><h1>その他の商品カテゴリー</h1></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E3%83%A2%E3%83%8E%E3%82%A4%E3%82%AA%E3%82%A4%E3%83%AB" title="モノイオイル" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-monoi.jpg" />
                                        <div class="caption">
                                            モノイオイル
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=MICO%E3%82%AD%E3%83%A3%E3%83%9F%E3%82%BD%E3%83%BC%E3%83%AB" title="MICOキャミソール" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-cami.jpg" />
                                        <div class="caption">
                                            MICOキャミソール
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=MICO%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%BC%E3%83%88%E3%83%91%E3%83%AC%E3%82%AA" title="MICOデザインショートパレオ" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-short-pareo.jpg" />
                                        <div class="caption">
                                            MICOデザインショートパレオ
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class='clearfix visible-md-block'></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=MICO%E3%83%87%E3%82%B6%E3%82%A4%E3%83%B3%E3%83%AD%E3%83%B3%E3%82%B0%E3%83%91%E3%83%AC%E3%82%AA" title="MICOデザインロングパレオ" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-long-pareo.jpg" />
                                        <div class="caption">
                                            MICOデザインロングパレオ
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class='clearfix visible-lg-block'></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=MICO%E3%82%AB%E3%83%A9%E3%83%BC%E3%83%AD%E3%83%B3%E3%82%B0%E3%83%91%E3%83%AC%E3%82%AA" title="MICOカラーロングパレオ" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-colour-long-pareo.jpg" />
                                        <div class="caption">
                                            MICOカラーロングパレオ
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E3%82%AB%E3%83%A9%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%BC%E3%83%88%E3%83%91%E3%83%AC%E3%82%AA" title="カラーショートパレオ" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-colour-short-pareo.jpg" />
                                        <div class="caption">
                                            カラーショートパレオ
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class='clearfix visible-md-block'></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=CD%E3%83%BBDVD%E3%83%BB%E6%9B%B8%E7%B1%8D" title="CD・DVD・書籍" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-media.jpg" />
                                        <div class="caption">
                                            CD・DVD・書籍
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E3%82%BF%E3%83%92%E3%83%81%E9%9B%91%E8%B2%A8%E3%83%BB%E8%A1%A3%E8%A3%85" title="タヒチ雑貨・衣装" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-tahiti-zakka.jpg" />
                                        <div class="caption">
                                            タヒチ雑貨・衣装
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class='clearfix visible-lg-block'></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E3%83%A2%E3%83%8E%E3%82%A4%E3%82%AA%E3%82%A4%E3%83%AB" title="タヒチアンアーティスト栗山義勝" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-kuriyama.jpg" />
                                        <div class="caption">
                                            タヒチアンアーティスト栗山義勝
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class='clearfix visible-md-block'></div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E3%82%BF%E3%83%92%E3%83%81%E3%82%A2%E3%83%B3%E3%83%80%E3%83%B3%E3%82%B9%E3%80%80%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AA%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%BC" title="タヒチアンダンス　ストーリーショー" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-story-show.jpg" />
                                        <div class="caption">
                                            タヒチアンダンス　ストーリーショー
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E3%82%A4%E3%83%99%E3%83%B3%E3%83%88%E3%83%81%E3%82%B1%E3%83%83%E3%83%88" title="イベントチケット" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-event.jpg" />
                                        <div class="caption">
                                            イベントチケット
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="thumbnail">
                                    <a href="http://tahitianshop.net/?category=%E6%A5%BD%E5%99%A8%E3%83%BB%E6%89%93%E6%A5%BD%E5%99%A8%20%E3%80%90%E3%82%BF%E3%83%92%E3%83%81%E4%BC%9D%E7%B5%B1%E6%A5%BD%E5%99%A8%E3%80%91" title="楽器・打楽器 【タヒチ伝統楽器】" target="_blank">
                                        <img src="<?php bloginfo("template_url"); ?>/img/patitifa-tahiti-instrument.jpg" />
                                        <div class="caption">
                                            楽器・打楽器 【タヒチ伝統楽器】
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                        endif;
                        echo "</div>";
                    endif;
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