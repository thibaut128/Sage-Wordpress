<?php $__env->startSection('accueil'); ?>
        <?php 
            $logo = get_field( 'accueil_logo' );
            $auteur = get_field( 'accueil_auteur' );
            $bouton_cv = get_field( 'accueil_bouton' );
        ?>
        <div class="accueil__container container text-center">
            <img 
            class="img-fluid accueil__logo" 
            src="<?php echo $logo ['url']; ?>"
            alt="Logo de <?php echo $auteur; ?>"
            >
            <div class="text-center accueil__cv d-none d-sm-none d-lg-block">
                <div>
                    <h1> <?php echo $auteur; ?> </h1>
                </div>
                <a href=" <?php the_field('lien_cv'); ?>" target="_blank" class="accueil__button-cv">
                    <?php echo $bouton_cv; ?>
                </a>
            </div>
            <a class="accueil__arrow-container smoothscroll" href="#projets">
                <div class="accueil__arrow"></div>
                <div class="accueil__arrow"></div>
            </a>
        </div>
        <p><?php wp_get_nav_menu_items($navbar)?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('projets'); ?>
        <?php 
            $title = get_field( 'projets_titre' );
            $cross = get_field( 'cross' );
        ?>
        <div class="projets__container container">
            <div class="row">
                <div class="col-12 projets__title">
                    <h1>
                    <?php echo $title; ?>
                    </h1>
                </div>
            </div>
            <div class="row projets__row">
                <?php
                    $args = [
                        'post_type' => 'projets_miniature',
                        'nopaging' => true,
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ];
                    $loop = new WP_Query($args);
                ?>
                <?php while($loop->have_posts()): ?> <?php $loop->the_post();  ?>
                <?php $image = get_field( 'projet_miniature' ); ?>
                <?php $url = $image['url']; ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 projets__box">
                        <div class="projets__miniature">
                            <img src="<?php echo $url ; ?>" alt="<?php echo get_the_title() ?>">
                        </div>
                    </div>
                <?php endwhile; ?> 
                <?php wp_reset_postdata() ;?>
            </div>
            <?php 
                    $args = [
                        'post_type' => 'mes_projets',
                        'nopaging' => true,
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ];
                    $loop = new WP_Query($args);
                ?>
                <?php while($loop->have_posts()): ?> <?php $loop->the_post();  ?>
                <?php $image = get_field( 'projets_details_image' ); ?>
                <?php $url = $image['url']; ?>
                    <div class="container projets__popin <?php echo get_the_title() ?>">
                        <img class="projets__picture" src="<?php echo $url;?>">
                        <div class="row projets__popin-infos">
                            <div class="col-10 col-lg-11">
                                <h2><?php the_field('projets_details_titre'); ?></h2>
                            </div>
                            <div class="col-1 text-center cross__container">
                                <img class="cross" src="<?php echo $cross ['url'];?>">
                            </div>
                            <div class="col-lg-12">
                                <h3><?php the_field('projets_details_description'); ?></h3>
                            </div>
                            <div class="col-lg-12">
                                <h4><?php the_field('projets_details_text'); ?></h4>
                            </div>
                            <div class="col-lg-12">
                                <a class="discover" href="<?php the_field('projets_details_link'); ?>" target="_blank">
                                    Découvrir le projet
                                </a>
                            </div>
                        </div>
                    </div> 
                <?php endwhile; ?> 
                <?php wp_reset_postdata() ;?>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contact'); ?>
        <?php 
            $title = get_field( 'contact_titre' );
            $mail = get_field( 'contact_mail' );
            $mail_logo = get_field( 'contact_mail_logo' );
            $phone = get_field( 'contact_phone' );
            $phone_logo = get_field( 'contact_phone_logo' );          
        ?>
        <div class="contact__container container">
            <div class="row contact__content">
                <div class="col-12 contact__title">
                    <h1>
                    <?php echo $title; ?>
                    </h1>
                </div>
                <div class="col-12 col-xl-6 text-center contact__mail __link d-flex">
                    <img src="<?php echo $mail_logo ['url']; ?>">   
                    <a href="mailto:<?php echo $mail; ?>">
                        <h2>
                        <?php echo $mail; ?>
                        </h2>
                    </a>
                </div>    
                <div class="col-12 col-xl-6 text-center contact__phone __link d-flex">
                    <img src="<?php echo $phone_logo ['url']; ?>">
                    <a href="tel:<?php echo $phone; ?>">
                        <h2>
                        <?php echo $phone; ?>
                        </h2>
                    </a>
                </div>  
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>