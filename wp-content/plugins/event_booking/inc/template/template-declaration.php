<?php
add_filter('template_include', 'my_function_name');
function my_function_name( $template ) {
 if ("example" == $name){
  $template = dirname( __FILE__ ) . '/my-template.php';
 }
 return $template;
}

function output_event_booking(){
    ?>
    	<!-- MATERIALI DAI WEBINAR -->
	<div class="news-container booking-event mb-2" style="background-image:url(<?php echo plugins_url('../../', __FILE__). '/assets/img/30_min.png' ?>)">
		<div class="container container-news" id="content" tabindex="-1">
			<h2 class="home-section-title">30 MINUTI CON</h2>
            <h4 class="home-section-sub-title">
Gli Esperti di Dynamics a vostra disposizione «live» ogni mese per 30 minuti per discutere di una tematica di interesse comune.<br>
Vedi gli incontri programmati, prenota la tua partecipazione e invia le tue domande.
</h4>

			<div class="row article-news">
				<!-- .row -->
				<?php
			$args = array(
				'post_type' => 'event_booking',
				'orderby' => 'date',
				'order' => 'ASC',
				'posts_per_page'=>-1,
			);

			$child_query = new WP_Query( $args );
            $counter = 0;
			?>

				<?php
				while (( $child_query->have_posts() ) &&( $counter <=1 ) ) : $child_query->the_post();
                $ended = htmlspecialchars_decode(get_post_meta(get_the_ID(), 'event_booking_event_end', true)); 
                if($ended != "on"){
                    $counter ++;
                ?>
                <article <?php post_class('col-6'); ?> id="post-<?php the_ID(); ?>">

                <a <?php /*href=" echo the_permalink(); " */?>>
                        <div class="row" >
                            <div class="col-12" >
                                        <style>
                                        .home-page .news-container .container-news .article-news article a .row .col-12 .entry-meta.digital .posted-on {
                                                text-align: center;
                                                padding: 2rem;
                                        }
                                        .home-page .news-container .container-news .article-news article a .row .col-12 .entry-meta.digital .posted-on .entry-date{
                                                color: #fff;
                                        }
                                        </style>

                                        <?php
                                        if (!$id) {
                                            $id = get_the_ID();
                                        }

                                         $speacker = htmlspecialchars_decode(get_post_meta($id, 'event_booking_event_image', true)); 
                                         ?>
                                        <div class="entry-meta tab-image-event-booking" style="background-image:url(<?php echo $speacker ?>);"></div><!-- .entry-meta -->
        
                                        
                                        <div class="entry-content" style="height:100%">
                                                
                                                <?php 
                                                 $event_date= htmlspecialchars_decode(get_post_meta( $id, 'event_booking_event_time', true ));
                                                 $event_hour= htmlspecialchars_decode(get_post_meta( $id, 'event_booking_event_hour', true ));
                                                ?>
                                                <span class="author-span">

                                                        <?php
                                                        echo $event_date;
                                                        echo ' | ore ';
                                                        echo $event_hour;
                                                        echo '<br>';
                                                         _e(' 30 minuti con ', 'understrap-child');
                                                        $auts = get_the_terms( $post->ID , 'autor_tax' );
                                                        
                                                        if ($auts){
                                                            foreach ( $auts as $aut ) {
                                                                echo '<b>'. $aut->name.'</b>';
                                                                }
                                                            }else{
                                                            echo get_author_name() ;
                                                            }?>
                                                    </span>
                                                <?php 
                                                /*
                                                 if($post->post_excerpt){
                                                        $estract_content= $post->post_excerpt;
                                                }else{
                                                        $estract_content= get_the_content();
                                                } ?>
                                                < ?php $article_contet= wp_strip_all_tags($estract_content); ? >
                                                < ?php $article_text= substr($article_contet, 0, 100); ? >
                                                <p class="entry-title" ><?php echo $article_text ?>...</p>
                                                <?php */ the_title( '<h1 class="entry-title ">', '</h1>' );
                                                //the_excerpt(); ?>
         
                                        </div><!-- .entry-content -->
                            </div>
                            
                            <div class="w-100"><?php /* echo event_booking_loop(); */?></div>
                        </div>
                </a>
        
        </article><!-- #post-## -->
        <?php
        $id='';
                                            }
				endwhile; ?>


				<?php
			wp_reset_postdata();
			?>
			</div>
		</div>
	</div><!-- Container end -->



	<div class="news-container booking-event" >
		<div class="container container-news pt-0 pb-0" id="content" tabindex="-1">
			<div class="row article-news">
            <a class="archive-links archive-links-bookings" href="<?php echo get_home_url() ?>/event_booking/"><?php _e('Vedi tutti gli incontri ', 'understrap-child' ) ?><span class="dyn-icona-menu"></span></a>
			</div>
		</div>
	</div><!-- Container end -->
    <?php
}
?>