<!doctype html>
<html <?php echo get_language_attributes(); ?>>
  <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <body <?php body_class() ?>>
    <div class="overlay">
    </div>

    <div class="menu-container">
    </div> 

    <div class="menu">
      <div class="menu-label text-center">
          <a href="#accueil" class="smoothscroll label-container __link ">
            <h2><?php the_field( 'navmenu_item_1' ); ?></h2>
          </a>
          <a href="#cv" class="smoothscroll label-container __link d-lg-none d-xl-none">
            <h2><?php the_field( 'navmenu_item_2' ); ?></h2>
          </a>
          <a href="#projets" class="smoothscroll label-container __link ">
            <h2><?php the_field( 'navmenu_item_3' ); ?></h2>
          </a>
          <a href="#contact" class="smoothscroll label-container __link ">
            <h2><?php the_field( 'navmenu_item_4' ); ?></h2>
          </a>
        </div>

        <button class="hamburger hamburger-menu" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
    </div>

    <div id="accueil" class="" role="document">
      <?php echo $__env->yieldContent('accueil'); ?>
    </div>
      <div class="container accueil__cv-container text-center d-lg-none d-xl-none">
        <div class="row accueil__cv-row">
          <div class="col-12">
            <h1>
            <?php the_field( 'accueil_auteur' ); ?>
            </h1>
          </div>
          <div class="col-12">
            <a href="<?php the_field('lien_cv'); ?>" target="_blank" class="accueil__button-cv">
              <?php the_field( 'accueil_bouton' ); ?>
            </a>
          </div>
        </div>
      </div>
    <div id="projets" class="" role="document">
      <?php echo $__env->yieldContent('projets'); ?>
    </div>
    <div id="contact" class="" role="document">
      <?php echo $__env->yieldContent('contact'); ?>
    </div>
    <?php do_action('get_footer') ?>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php wp_footer() ?>
  </body>
</html>
