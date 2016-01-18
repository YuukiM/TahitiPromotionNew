</div>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-9">
                <div class="row">
                    <?php

                     $pages = get_pages(
                        array(
                            'sort_column'=>menu_order,
                            'hierarchical'=>1,
                            'parent'=>0,
                            'meta_key' => 'showOnFooter',
                            'meta_value' => "show"
                        )
                     );

                     $i = 0;
                     foreach ($pages as $page){
                         $pageID = $page -> ID;
                         $pageTitle = $page -> post_title;
                         echo "<div class='footer-menu col-xs-12 col-md-4'><div class='row'>";
                         echo "<div class='col-xs-12 parent'><a href='".get_permalink($pageID)."'>".$pageTitle."</a></div>";
                         $children = get_pages(
                            array(
                                'sort_column'=>menu_order,
                                'parent'=>$pageID,
                                'hierarchical'=>0,
                                'meta_key' => 'showOnFooter',
                                'meta_value' => "show"
                            )
                         );
                         if($children){
                             //echo "<div class='children col-xs-12'>\n";
                             foreach($children as $child){
                                $childID = $child -> ID;
                                $childTitle = $child -> post_title;
                                echo "<div class='child col-xs-6 col-md-12'><small><a href='".get_permalink($childID)."'>".$childTitle."</a></small></div>";
                             }
                             //echo "</div>\n";
                         }
                        echo "</div>\n";
                        echo "</div>\n";
                        $i++;
                        if(($i % 2) == 0){
                          echo "<div class='clearfix visible-xs-block'></div>\n";
                        }
                        if(($i % 3) == 0){
                          echo "<div class='clearfix visible-lg-block'></div>\n";
                        }
                     }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="logo"><a href="" title=""><img class="footer" src="<?php bloginfo(template_url); ?>/img/tahiti-promotion-logo-white.svg"></a></div>
                <dl class="footer-contact small">
                    <dt>電話:</dt><dd>045-321-0693</dd>
                    <dt>メール:</dt><dd><a href="http://tahiti.co.jp/contact/">お問合せフォーム</a></dd>
                    <dt>営業時間:</dt><dd>10:00 ～ 20:00</dd>
                    <dt>休業日:</dt><dd>土・日・祝日</dd>
                    <dt>住所:</dt><dd>〒221-0844<br />神奈川県横浜市神奈川区沢渡3-1 東興ビル2F<br /><a href="http://tahiti.co.jp/about-us/access">アクセスマップはこちら</a></dd>
                </dl>
            </div>

        </div>
    </div>
</div>
<div id="footer-bottom" class="small">
    <div class="container">
        <div class="extra-contents"><a href="site-map">サイトマップ</a> | <a href="../about-us/privacy-policy">個人情報保護方針</a></div>
        <div class="copy">&copy;Copyright <?php echo date("Y"); ?> Tahiti Promotion all rights reserved.</div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/jquery.easing.1.3.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/jquery.heightLine.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>

<?php if(is_home()): ?>
    <script type="text/javascript">
        $(window).load(function(){
            $('.slide').css('visibility' , 'visible');
            $('.visual-inner').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                cssEase: 'ease',
                dots: true,
                focusOnSelect: false,
                easing: 'easeOutCubic'
            });
        });
    </script>
<?php endif; ?>

<?php if(is_page("artist")): ?>
    <script>
        $("#dancerJP > div").heightLine();
        $("#dancerTA > div").heightLine();
        $("#group > div").heightLine();
        $("#musician > div").heightLine();
        $("#mc > div").heightLine();
    </script>

<?php endif; ?>

<?php if(is_singular("artist")): ?>
    <script type="text/javascript">
        $(window).load(function(){
            $('.artist-photos .slide').css('visibility' , 'visible');
            $('.artist-photos').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                cssEase: 'ease',
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.artist-photos-nav'
            });
            $('.artist-photos-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.artist-photos',
                //dots: true,
                centerMode: true,
                focusOnSelect: true
            });

            // Navigation fix comes here.

        });
    </script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
