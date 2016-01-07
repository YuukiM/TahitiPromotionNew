<?php
/*
    Template Name: dancer
*/
?>

<?php get_header(); ?>
<div id="main">
  <div class="container">
     <?php
       $id = get_the_id();
       $mainVisual = get_field(mainVisual, $id);
       if($mainVisual){
        echo "<h1><img src=\"".$mainVisual."\" /></h1>";
       }else{
         $ancestors = get_ancestors($id, page);
         if($ancestors[0]){
          $mainVisual = get_field(mainVisual, $ancestors[0]);
          echo "<h1><img src=\"".$mainVisual."\" /></h1>";
         }
       }
      ?>
      
      
      

      <div class="row">
          <div class="col-lg-10" id="left">

            <div>
              <h2><?php the_title(); ?></h2>
              <div class="row">
                
              </div>
            </div>
          </div>
          <div class="col-lg-2 banner" id="right">
            <div class="row">
              <p class="col-xs-6 col-sm-3 col-md-2 col-lg-12"><a href="#"><img src="img/dummy-banner.png" /></a></p>
              <p class="col-xs-6 col-sm-3 col-md-2 col-lg-12"><a href="#"><img src="img/dummy-banner.png" /></a></p>
              <p class="col-xs-6 col-sm-3 col-md-2 col-lg-12"><a href="#"><img src="img/dummy-banner.png" /></a></p>
              <p class="col-xs-6 col-sm-3 col-md-2 col-lg-12"><a href="#"><img src="img/dummy-banner.png" /></a></p>
              <p class="col-xs-6 col-sm-3 col-md-2 col-lg-12"><a href="#"><img src="img/dummy-banner.png" /></a></p>
            </div>
          </div>
      </div>
  </div><!-- /.container -->
</div>
<?php get_footer(); ?>