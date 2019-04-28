// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

$( document ).ready(function() {

	// Smoothscroll Function
	$('.smoothscroll').on('click', function() { // Au clic sur un élément .smoothscroll
				var page = $(this).attr('href'); // Page cible
				var speed = 750; // Durée de l'animation (en ms)
				$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); 
				return false;
	});

	// Hamburger menu click function
	$('.hamburger-menu').on('click', function() {
		$(this).toggleClass('is-active');
		$('.menu-label').toggleClass('active');
		$('.menu-container').toggleClass('active');
		$('.overlay').toggleClass('active');
	});

	// Hamburger menu click function
	$('.label-container').on('click', function() {
		$('.hamburger-menu').toggleClass('is-active');
		$('.menu-label').toggleClass('active');
		$('.menu-container').toggleClass('active');
		$('.overlay').toggleClass('active');
	});

	$('.projets__miniature').on('click', function() {
		var alt = $(this).children('img').attr('alt');
		$('.'+alt).addClass('active');
		$('.overlay').toggleClass('active');
		$('body').css('overflow','hidden');
	});

	$('.cross').on('click', function() {
		$(this).parents(':eq(2)').removeClass('active');
		$('.overlay').removeClass('active');
		$('body').css('overflow','auto')
	});

});