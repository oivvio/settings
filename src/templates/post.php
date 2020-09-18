<?php partial('header'); $is_home = false; ?>

<?php while (have_posts()): the_post(); ?>
  <main role="main">
    <article >

      <?php partial('article'); ?>

    </article>
  </main>
<?php endwhile; ?>


<?php partial('footer'); ?>        
