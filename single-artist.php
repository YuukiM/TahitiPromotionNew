<?php
/*
    Template Name: Single-artist
*/
?>
<?php get_header(); ?>
<div id="main" class="page">
  <div class="container">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>

      <div class="lead-text">
          <span class="label label-warning"><?php artist_category(); ?></span>
          <h1><?php the_field('name'); ?>&ensp;<small><?php the_field('kana'); ?></small></h1>

      </div>
      <section class="main-content row">
          <div class="col-sm-12" id="left">
            <div>
                <div class="row">
                    <?php
                    $photo1 = get_field('photo1');
                    $photo2 = get_field('photo2');
                    $photo3 = get_field('photo3');
                    $photo4 = get_field('photo4');
                    $photo5 = get_field('photo5');
                    ?>
                    <?php if($photo1 || $photo2 || $photo3 || $photo4 || $photo5): ?>
                       <div class="col-md-5">
                           <div class="artist-photos">
                               <?php if($photo1){ echo "<img src=". $photo1. " />"; } ?>
                               <?php if($photo2){ echo "<img src=". $photo2. " />"; } ?>
                               <?php if($photo3){ echo "<img src=". $photo3. " />"; } ?>
                               <?php if($photo4){ echo "<img src=". $photo4. " />"; } ?>
                               <?php if($photo5){ echo "<img src=". $photo5. " />"; } ?>
                           </div>
                           <div class="artist-photos-nav">
                               <?php if($photo1){ echo "<img src=". $photo1. " />"; } ?>
                               <?php if($photo2){ echo "<img src=". $photo2. " />"; } ?>
                               <?php if($photo3){ echo "<img src=". $photo3. " />"; } ?>
                               <?php if($photo4){ echo "<img src=". $photo4. " />"; } ?>
                               <?php if($photo5){ echo "<img src=". $photo5. " />"; } ?>
                           </div>
                       </div>
                        <div class="col-md-7">
                            <h2>プロフィール</h2>
                            <?php the_field('profile'); ?>
                        </div>
                   <?php else: ?>
                       <div class="col-xs-12">
                           <h2>プロフィール</h2>
                           <?php the_field('profile'); ?>
                       </div>
                   <?php endif; ?>
                </div>
                <?php if (get_field('movie')): ?>
                    <h2>動画</h2>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_field('movie'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_field('media')): ?>
                    <h2>出演情報</h2>
                    <div class="row">
                        <div class="col-xs-12">
                           <?php the_field('media'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_field('linkText') && get_field('linkURL')): ?>
                    <h2>関連リンク</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <p><a href="<?php the_field('linkURL'); ?>" title="<?php the_field('linkText'); ?>"><?php the_field('linkText'); ?></a></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
          </div>
          <div class="col-xs-12 artist">
              <h2><?php artist_category(); ?>一覧</h2>
              <div class="row">
                  <?php
                      $artistID = get_the_ID();
                      $artistSingleCategory = get_post_meta($artistID, "category", true);
                      $artistPosts = get_posts("post_type=artist&orderby=menu_order&posts_per_page=999");
                      foreach($artistPosts as $artistPost){
                          $artistCategory = get_post_meta($artistPost->ID, "category", true);
                          if ($artistCategory == $artistSingleCategory){
                              $thumbnail = get_field("thumbnail", $artistPost->ID);
                              $url = get_permalink($artistPost->ID);
                              $name = get_field("name", $artistPost->ID);

                              echo "<div class=\"col-xs-6 col-sm-3 col-md-2 artist\"><div class=\"thumbnail\"><a href=\"".$url."\"><img src=\"" .$thumbnail. "\"/><div class=\"caption\"><p>".$name."</p></div></a></div></div>";
                          }
                      }
                  ?>
              </div>
          </div>
      </section>
    <?php endwhile; endif; ?>
  </div><!-- /.container -->
</div>
<?php get_footer(); ?>