<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="msvalidate.01" content="B98429B99C37B3D3F4C97397601F73F1" />
    <?php if(is_home()): ?>
        <title><?php bloginfo("name")?> - <?php bloginfo("description"); ?></title>
        <meta name="description" content="タヒチプロモーションでは本場のタヒチにこだわり、迫力あるショーやバラエティー出演にいたるまで、枠にとらわれることなく、素晴らしいタヒチアンダンスを披露するダンサーを揃えています。" />
    <?php else: ?>
        <title><?php  echo get_the_title(); ?></title>
    <?php endif; ?>
    <meta name="keywords" content="tahiti promotion、タヒチプロモーション,タヒチ,タヒチアンダンス,テ ラ キョウコ,TAHITI,TAHITIAN,TAHITIAN DANCE,タウルミ,taurumi,tahaki,タハキ,タヒチ プロモーション,DANCE" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo("template_url"); ?>/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/<?php bloginfo("template_url"); ?>/faviconsfavicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo("template_url"); ?>/favicons/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo("template_url"); ?>/favicons/safari-pinned-tab.svg" color="#171f55">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php bloginfo("template_url"); ?>/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap -->
    <link href="<?php bloginfo("template_url")?>/style.css" rel="stylesheet">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body>
<div id="headerNavWrap">
    <div class="header">
        <div class="header-top">
            <div class="container contact-social">
                <div class="socials hidden-xs hidden-sm">
                    <a href="http://www.facebook.com/tahitipromotion" class="icon-facebook2 pull-left" title="Facebook"></a>
                    <a href="http://twitter.com/#!/tahitipromotion" class="icon-twitter2 pull-left" title="Twitter"></a>
                    <a href="http://picasaweb.google.com/tpmss2011/" class="icon-picassa2 pull-left" title="Picasa"></a>
                    <a href="http://www.youtube.com/user/tahitipromotion" class="icon-youtube3 pull-left" title="youtube"></a>
                </div>
                <ul class="contact-link">
                    <li class="pull-left"><a href="about-us">会社概要</a></li>
                    <li class="pull-left"><a href="http://tahiti.co.jp/contact/">お問合せ</a></li>
                </ul>
            </div>
        </div>
        <div class="container logo-tel">
            <div class="logo"><a href="<?php bloginfo("url"); ?>" title="<?php bloginfo("name"); ?>"><img src="<?php bloginfo("template_url"); ?>/img/tahiti-promotion-logo.svg"></a></div>
            <div class="tel"><span class="glyphicon glyphicon-earphone" aria-hidden="true">&ensp;</span>045-321-0693</div>
        </div>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="navbar-header col-xs-12">
                    <div class="socials visible-xs-block visible-sm-block">
                      <a href="http://www.facebook.com/tahitipromotion" class="icon-facebook2 pull-left" title="Facebook"></a>
                      <a href="http://twitter.com/#!/tahitipromotion" class="icon-twitter2 pull-left" title="Twitter"></a>
                      <a href="http://picasaweb.google.com/tpmss2011/" class="icon-picassa2 pull-left" title="Picasa"></a>
                      <a href="http://www.youtube.com/user/tahitipromotion" class="icon-youtube3 pull-left" title="youtube"></a>
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php wp_nav_menu( array(
              'theme_location'=>'mainmenu',
              'container'     =>'',
              'menu_class'    =>'',
              'items_wrap'    =>'<ul class="nav navbar-nav">%3$s</ul>'));
            ?>
        </div><!--/.nav-collapse -->
    </nav>
</div>

<?php
    if(is_home()) {
        echo "<div id=\"home\">";
    }elseif(is_404()) {
        echo "<div id=\"not-found\">";
    }else{
        echo "<div id=\"page\" >";
}
?>

<?php //title
if(!is_home()) {
    echo "<section class=\"page-title\">";
    echo "<div class=\"row\">";
        if (is_page(34)) {
            echo "<div class=\"container\">";
                main_visual();
            echo "</div>";
        }elseif(is_singular("info")) {
            $pages = get_pages();
            foreach ($pages as $page) {
                if (get_page_template_slug($page->ID) == "info.php") {
                    $mainVisual = get_field("mainVisual", $page->ID);
                    echo "<div class=\"container\">";
                    echo "<h1 class=\"titleWithBG\">";
                    echo "<img src='".$mainVisual."'>";
                    echo"</h1>";
                    echo "</div>";
                }
            }
        }elseif(is_singular("artist")) {
            $pages = get_pages();
            foreach ($pages as $page){
                if ( get_page_template_slug( $page -> ID ) == "artist.php"){
                    echo "<div class=\"container\">";
                    $mainVisual = get_field("mainVisual", $page -> ID);
                    echo "<h1 class=\"titleWithBG\">";
                    echo "<img src='".$mainVisual."'>";
                    echo"</h1>";
                    echo "</div>";
                }
            }
        }elseif (is_page()) {
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo "<div class=\"container\">";
                        main_visual();
                    echo "</div>";
                }
            }
        }
    echo "</div>";
    echo "</section>";
}
?>
<?php
    if(!is_404()) {
        echo "<section id=\"breadcrumb\" class=\"container\">";
            if (function_exists('bread_crumb')) {
                bread_crumb("elm_class=breadcrumb");
            }
        echo "</section >";
    }
?>