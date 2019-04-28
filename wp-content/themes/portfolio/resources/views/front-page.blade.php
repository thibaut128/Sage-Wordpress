@extends('layouts.app')

@section('accueil')
        @php 
            $logo = get_field( 'accueil_logo' );
            $auteur = get_field( 'accueil_auteur' );
            $bouton_cv = get_field( 'accueil_bouton' );
        @endphp
        <div class="accueil__container container text-center">
            <img 
            class="img-fluid accueil__logo" 
            src="@php echo $logo ['url']; @endphp"
            alt="Logo de @php echo $auteur; @endphp"
            >
            <div class="text-center accueil__cv d-none d-sm-none d-lg-block">
                <div>
                    <h1> @php echo $auteur; @endphp </h1>
                </div>
                <a href=" @php the_field('lien_cv'); @endphp" target="_blank" class="accueil__button-cv">
                    @php echo $bouton_cv; @endphp
                </a>
            </div>
            <a class="accueil__arrow-container smoothscroll" href="#projets">
                <div class="accueil__arrow"></div>
                <div class="accueil__arrow"></div>
            </a>
        </div>
        <p>@php wp_get_nav_menu_items($navbar)@endphp</p>
@endsection

@section('projets')
        @php 
            $title = get_field( 'projets_titre' );
            $cross = get_field( 'cross' );
        @endphp
        <div class="projets__container container">
            <div class="row">
                <div class="col-12 projets__title">
                    <h1>
                    @php echo $title; @endphp
                    </h1>
                </div>
            </div>
            <div class="row projets__row">
                @php
                    $args = [
                        'post_type' => 'projets_miniature',
                        'nopaging' => true,
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ];
                    $loop = new WP_Query($args);
                @endphp
                @while ($loop->have_posts()) @php $loop->the_post();  @endphp
                @php $image = get_field( 'projet_miniature' ); @endphp
                @php $url = $image['url']; @endphp
                    <div class="col-xl-4 col-lg-6 col-md-6 projets__box">
                        <div class="projets__miniature">
                            <img src="@php echo $url ; @endphp" alt="@php echo get_the_title() @endphp">
                        </div>
                    </div>
                @endwhile 
                @php wp_reset_postdata() ;@endphp
            </div>
            @php 
                    $args = [
                        'post_type' => 'mes_projets',
                        'nopaging' => true,
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ];
                    $loop = new WP_Query($args);
                @endphp
                @while ($loop->have_posts()) @php $loop->the_post();  @endphp
                @php $image = get_field( 'projets_details_image' ); @endphp
                @php $url = $image['url']; @endphp
                    <div class="container projets__popin @php echo get_the_title() @endphp">
                        <img class="projets__picture" src="@php echo $url;@endphp">
                        <div class="row projets__popin-infos">
                            <div class="col-10 col-lg-11">
                                <h2>@php the_field('projets_details_titre'); @endphp</h2>
                            </div>
                            <div class="col-1 text-center cross__container">
                                <img class="cross" src="@php echo $cross ['url'];@endphp">
                            </div>
                            <div class="col-lg-12">
                                <h3>@php the_field('projets_details_description'); @endphp</h3>
                            </div>
                            <div class="col-lg-12">
                                <h4>@php the_field('projets_details_text'); @endphp</h4>
                            </div>
                            <div class="col-lg-12">
                                <a class="discover" href="@php the_field('projets_details_link'); @endphp" target="_blank">
                                    Découvrir le projet
                                </a>
                            </div>
                        </div>
                    </div> 
                @endwhile 
                @php wp_reset_postdata() ;@endphp
        </div>
@endsection

@section('contact')
        @php 
            $title = get_field( 'contact_titre' );
            $mail = get_field( 'contact_mail' );
            $mail_logo = get_field( 'contact_mail_logo' );
            $phone = get_field( 'contact_phone' );
            $phone_logo = get_field( 'contact_phone_logo' );          
        @endphp
        <div class="contact__container container">
            <div class="row contact__content">
                <div class="col-12 contact__title">
                    <h1>
                    @php echo $title; @endphp
                    </h1>
                </div>
                <div class="col-12 col-xl-6 text-center contact__mail __link d-flex">
                    <img src="@php echo $mail_logo ['url']; @endphp">   
                    <a href="mailto:@php echo $mail; @endphp">
                        <h2>
                        @php echo $mail; @endphp
                        </h2>
                    </a>
                </div>    
                <div class="col-12 col-xl-6 text-center contact__phone __link d-flex">
                    <img src="@php echo $phone_logo ['url']; @endphp">
                    <a href="tel:@php echo $phone; @endphp">
                        <h2>
                        @php echo $phone; @endphp
                        </h2>
                    </a>
                </div>  
            </div>
        </div>
@endsection
