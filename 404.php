<?php
/*
    Template Name: 404
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="left">
                    お探しのコンテンツは見つかりません。別なURLをお試しください。<br>
                    <a href="<?php bloginfo("url"); ?>" title="タヒチプロモーション">タヒチプロモーション　ホームはこちら</a>
                    <br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>