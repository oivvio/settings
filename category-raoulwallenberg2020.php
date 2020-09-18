<head>
   <link rel="stylesheet" href="<?php asset_url('src/styles/mam.css?v1'); ?>">
   <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet">                  </head>


<div id="content">
   <div id="preamble">

      <?php partial('mam/hero'); ?>          
     <h1>Vardagshandlingar som förändrar världen</h1>

<p>Här är Kubprogrammets kampanj “Vardagshandlingar som förändrar världen”, ett samarbete
mellan SETTINGS och Raoul Wallenberg Academy. Här är Kubprogrammets kampanj “Vard-
agshandlingar som förändrar världen”, ett samarbete mellan SETTINGS och Raoul Wallenberg
Academy. INGS och Raoul Wallenberg Academy. Här är Kubprogrammets kampanj “Vardag-
shandlingar som.</p>
               
<p>För att se vilken skola som bidragit till en ännu bättre värld - klicka på bilderna nedan!</p>

</div> <!-- end preamble -->

<div id="posts">  
                                                                                          
<?php while (have_posts()) : the_post(); ?>
                                                                                           
<div class="post">

   <a  href="<?php the_permalink() ?>" rel="bookmark">
   <?php
     $image = get_field('toppbild');
     if( $image ) {
         echo "<div class='imagecontainer'><img src='{$image["sizes"]["medium_large"]}' /></div>";
     }
   ?>                     
    <p class="school"><?php the_field('skola'); ?> </p>          
    <p class="title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></p>
    <p class="pubdate"> <?php the_time('F jS, Y') ?></p>
    <p class="excerpt"><?php the_field('utdrag'); ?> </p>
    <p class="fakelink">läs vidare</p>

   </a>
</div>
<?php endwhile; ?>
</div> <!-- end of posts -->

</div> <!-- end of content -->


<?php partial('mam/navigation'); ?>              
