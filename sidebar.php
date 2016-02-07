<?php if (is_singular('info')): ?>
    <div class="col-sm-3" id="right">
        <?php
            $infos = get_posts("post_type=info&posts_per_page=10&orderby=date&order=DESC");
            if($infos) {
                echo "<div class=\"list-group\">";
                foreach ($infos as $info) {
                    if($info->ID == get_the_ID()) {
                        echo "<a class='list-group-item active' href='" . get_permalink($info->ID) . "'>";
                    }else{
                        echo "<a class='list-group-item' href='" . get_permalink($info->ID) . "'>";
                    }
                    echo get_the_date("n/j", $info->ID).get_the_title($info->ID);
                    echo "</a>";
                }
                echo"</div>";
            }
            else{
                echo "お知らせはありません";
            }
        ?>
    </div>
<?php endif; ?>

<?php if (is_page()): ?>
    <?php if (is_page("34") || is_page("36")): ?>
        <?php if (is_page("34")): ?>
            <div class="col-lg-12 freepaper-thumbnail" id="right">
        <?php elseif (is_page("36")): ?>
            <div class="col-xs-12 col-md-2" id="right">
        <?php endif; ?>
            <div class="row">
                <?php
                if (is_page(34)) {
                    $items = get_posts("post_type=tahiti-japon&orderby=name&order=DESC&posts_per_page=999");
                    echo "<div class='col-xs-12'><h2>バックナンバー</h2></div>";
                }
                if (is_page(36)) {
                    $items = get_posts("post_type=goods&goods-cat=ピックアップ");
                }
                foreach($items as $item){
                    $freePaperPDF = get_field("pdf", $item->ID);
                    $linkURL = get_field("linkURL", $item->ID);
                    $thumbnailS = get_field("thumbnailS", $item->ID);
                    $itemName = get_the_title($item->ID);
                    if (is_page(34)) {
                        echo "<div class=\"col-xs-6 col-sm-4 col-md-3\"><div class=\"thumbnail\"><a href=\"".$freePaperPDF."\"><img src=\"" .$thumbnailS. "\"/><div class=\"caption\">".$itemName."</div></a></div></div>";
                    }
                    if (is_page(36)) {
                        echo "<div class=\"col-xs-6 col-sm-4 col-md-12\"><div class=\"thumbnail\"><a href=\"".$linkURL."\"><img src=\"" .$thumbnailS. "\"/><div class=\"caption\">".$itemName."</div></a></div></div>";
                    }
                }
                ?>
            </div>
        </div>
    <?php else: ?>
        <div class="col-xs-12 col-md-3" id="right">
            <?php
            //echo $ID;
                $root_page = ps_get_root_page( $post );
                $rootPageID = $root_page->ID;
                $parents = get_ancestors(get_the_ID(), "page");
            ?>
            <?php
                if ($parents[0]) { //親あり判定
                    echo "<div class=\"list-group\">";
                        echo "<a class=\"list-group-item list-group-item-info\" href=\"".get_permalink($rootPageID)."\"><span class=\"glyphicon glyphicon-chevron-left\"></span>&ensp;".get_the_title($rootPageID)."に戻る</a>";
                    echo "</div>";
                    if($parents[0] == $rootPageID) { //2層目
                        $children = get_pages("parent=" . get_the_ID() . "&sort_column=menu_order&sort_order=ASC&hierarchical=0");
                    }else{//3階層目以下
                        $children = get_pages("parent=" . $parents[0] . "&sort_column=menu_order&sort_order=ASC&hierarchical=0");
                    }
                    echo "<div class=\"list-group\">";
                        foreach ($children as $child) {
                            $childLink = get_permalink($child->ID);
                            $childTitle = $child->post_title;
                            if ($child->ID == get_the_ID()) {
                                echo "<a class='list-group-item active' href='" . $childLink . "' title ='" . $childTitle . "'> " . $childTitle . "</a>";
                            }else{
                                echo "<a class='list-group-item' href='" . $childLink . "' title ='" . $childTitle . "'> " . $childTitle . "</a>";
                            }
                        }
                    echo "</div>";
                    echo "<div class=\"list-group\">";
                        $children = get_pages("parent=".$rootPageID."&sort_column=menu_order&sort_order=ASC&hierarchical=0");
                        foreach ($children as $child) {
                            $childLink = get_permalink($child->ID);
                            $childTitle = $child->post_title;
                            if ($child->ID == get_the_ID()) {
                                echo "<a class='list-group-item active' href='" . $childLink . "' title ='" . $childTitle . "'> " . $childTitle . "</a>";
                            }else{
                                echo "<a class='list-group-item' href='" . $childLink . "' title ='" . $childTitle . "'> " . $childTitle . "</a>";
                            }
                        }
                    echo "</div>";
                }else{ //親なし1層目
                    $children = get_pages("parent=".$rootPageID."&sort_column=menu_order&sort_order=ASC&hierarchical=0");
                    echo "<div class=\"list-group\">";
                        foreach ($children as $child) {
                            $childLink = get_permalink($child->ID);
                            $childTitle = $child->post_title;
                            if ($child->ID == get_the_ID()) {
                                echo "<a class='list-group-item active' href='" . $childLink . "' title ='" . $childTitle . "'> " . $childTitle . "</a>";
                            }else{
                                echo "<a class='list-group-item' href='" . $childLink . "' title ='" . $childTitle . "'> " . $childTitle . "</a>";
                            }
                        }
                    echo "</div>";
                }
                if($rootPageID == 32 && get_the_ID() != 32) {
                    if ($parents[0] == 86 || get_the_ID() == 86) {  //Events
                        $event = "タヒチフェスタ東京";
                    }
                    elseif ($parents[0] == 108 || get_the_ID() == 108) {  //Events
                        $event = "タヒチフェスタ横浜";
                    }
                    elseif ($parents[0] == 110 || get_the_ID() == 110) {  //Events
                        $event = "タヒチフェスタ名古屋";
                    }
                    elseif ($parents[0] == 112 || get_the_ID() == 112) {  //Events
                        $event = "タヒチフェスタ札幌";
                    }
                    else{
                        $event = "none";
                    }
                    $args = array(
                        'post_type' => 'side-banner',
                        'event' => $event,
                        'meta_key' => 'bannerOrder',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'posts_per_page' => '999'
                    );
                    $sideBanners = get_posts($args);
                    echo "<div class=\"banner\">";
                        echo "<div class=\"row\">";
                            foreach ($sideBanners as $sideBanner) {
                                $bannerID = $sideBanner -> ID;
                                $bannerImageURL = get_field("side-banner", $bannerID);
                                $newWindow = get_field("new-window", $bannerID);
                                if(get_field("url", $bannerID)){
                                    $bannerURL = get_field("url", $bannerID);
                                }elseif(get_field("link", $bannerID)){
                                    $bannerURL = get_field("link", $bannerID);
                                }else{
                                    $bannerURL = "";
                                }
                                echo "<div class='col-xs-6 col-sm-3 col-md-12 col-lg-12'>";
                                if($newWindow == 1) {
                                    $targetBlank = "target='_blank'";
                                }
                                echo "<a href=\"" . $bannerURL . "\" ". $targetBlank ."><img src=\"" . $bannerImageURL . "\" /></a>";
                                echo "</div>";
                            }
                        echo "</div>";
                    echo "</div>";
                }


            ?>
    <?php endif; ?>
<?php endif; ?>

<?php if (is_front_page()): ?>
    <div class="col-lg-2" id="right">
        <div class="banner row">
            <?php
            $args = array(
                'post_type' => 'side-banner',
                'event' => 'なし',
                'meta_key' => 'bannerOrder',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'posts_per_page' => '999'
            );
            $sideBanners = get_posts($args);
            $i = 0;
            foreach ($sideBanners as $sideBanner) {
                $bannerID = $sideBanner -> ID;
                $bannerImageURL = get_field("side-banner", $bannerID);
                $newWindow = get_field("new-window", $bannerID);
                if(get_field("url", $bannerID)){
                    $bannerURL = get_field("url", $bannerID);
                }elseif(get_field("link", $bannerID)){
                    $bannerURL = get_field("link", $bannerID);
                }else{
                    $bannerURL = "";
                }
                echo "<div class='col-xs-6 col-sm-3 col-md-2 col-lg-12'>";
                if($newWindow == 1) {
                    $targetBlank = "target='_blank'";
                }
                echo "<a href=\"" . $bannerURL . "\" ". $targetBlank ."><img src=\"" . $bannerImageURL . "\" /></a>";
                echo "</div>";
                $i++;
                if (($i % 2) == 0) {
                    echo "<div class='clearfix visible-xs-block'></div>\n";
                }
                if (($i % 4) == 0) {
                    echo "<div class='clearfix visible-sm-block'></div>\n";
                }
                if (($i % 6) == 0) {
                    echo "<div class='clearfix visible-md-block'></div>\n";
                }
            }
            ?>
        </div>
    </div>
<?php endif; ?>
