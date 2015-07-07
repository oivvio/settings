<header class="Nav" role="banner">
  <div class="Nav-wrap">
    <a class="Nav-home" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <strong class="u-hiddenVisually">Startsidan</strong>
    </a>

    <nav class="Nav-inner" role="navigation">
      <?php symbol( 'Nav-logo', 'logo-s' ); ?>
      <?php navigation('primary', 'Nav'); ?>
      <?php symbol( 'Nav-logo', 'logo-s' ); ?>
    </nav>
  </use>
</header>
