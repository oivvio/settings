<?php partial('header'); $is_home = false; ?>

<?php while (have_posts()): the_post(); ?>
  <main role="main">
    <article>


   <?php
     $image = get_field('toppbild');
     if( $image ) {
         echo "<div class='imagecontainer'><img src='{$image["sizes"]["medium_large"]}' /></div>";
     }
   ?>
<div id="articleheader">
    <p class="title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></p>
    <p class="pubdate"> <?php the_time('F jS, Y') ?></p>
    <p class="school"><?php the_field('skola'); ?> </p>          
</div>
        <?php the_content(); ?>                  


    </article>
  </main>
<?php endwhile; ?>

<?php partial('mam/navigation'); ?>        
