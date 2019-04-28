<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    <div class="overlay">
    </div>

    <div class="menu-container">
    </div> 

    <div class="menu">
      <div class="menu-label text-center">
          <a href="#accueil" class="smoothscroll label-container __link ">
            <h2>@php the_field( 'navmenu_item_1' ); @endphp</h2>
          </a>
          <a href="#cv" class="smoothscroll label-container __link d-lg-none d-xl-none">
            <h2>@php the_field( 'navmenu_item_2' ); @endphp</h2>
          </a>
          <a href="#projets" class="smoothscroll label-container __link ">
            <h2>@php the_field( 'navmenu_item_3' ); @endphp</h2>
          </a>
          <a href="#contact" class="smoothscroll label-container __link ">
            <h2>@php the_field( 'navmenu_item_4' ); @endphp</h2>
          </a>
        </div>

        <button class="hamburger hamburger-menu" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
    </div>

    <div id="accueil" class="" role="document">
      @yield('accueil')
    </div>
      <div class="container accueil__cv-container text-center d-lg-none d-xl-none">
        <div class="row accueil__cv-row">
          <div class="col-12">
            <h1>
            @php the_field( 'accueil_auteur' ); @endphp
            </h1>
          </div>
          <div class="col-12">
            <a href="@php the_field('lien_cv'); @endphp" target="_blank" class="accueil__button-cv">
              @php the_field( 'accueil_bouton' ); @endphp
            </a>
          </div>
        </div>
      </div>
    <div id="projets" class="" role="document">
      @yield('projets')
    </div>
    <div id="contact" class="" role="document">
      @yield('contact')
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
