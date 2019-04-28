<?php
	add_action('projets_loop');

	function projets_loop(){
		$args = [
			'post_type' => 'mes_projets'
		];
		$myprojets = new WP_query($args);

		if($myprojets->have_posts() ) : while ( $myprojets->have_posts() ) : $myprojets->the_post(); 

		echo '<div class="container projets__popin">';




	};
		

    
        
	/*<div class="container projets__popin">
        <div class="thumbnail"> <?php echo the_post_title ?></div>
        <div class="row projets__popin_infos">
            <div class="col-10 col-sm-11">
                <h2> </h2>
            </div>
            <div class="col-sm-1 text-center cross__container">
            </div>
            <div class="col-sm-12">
                <h3> </h3>
            </div>
            <div class="col-sm-12">
                <h4> </h4>
            </div>
            <div class="col-sm-12">
                <a class="discover" href="" target="_blank">
                    Découvrir le projet
                </a>
            </div>
        </div>
    </div> 
	*/
		
?>