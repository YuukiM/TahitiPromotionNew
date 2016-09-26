<?php
/*
    Template Name: 404
*/
?>

<?php get_header(); ?>
    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center" id="left">
                    <br><br>
                    お探しのコンテンツは見つかりません。別なURLをお試しください。<br><br>
                    <a class="btn btn-default" href="<?php bloginfo("url"); ?>" title="タヒチプロモーション">タヒチプロモーション　ホームへ</a>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>