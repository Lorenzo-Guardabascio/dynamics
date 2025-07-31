<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<article <?php post_class('col-12 col-md-6'); ?> id="post-<?php the_ID(); ?>">

<div class="container">
        <div class="row" >
            <div class="col-12 event_booking-single" >
                        <?php
                        if (!$id) {
                            $id = get_the_ID();
                        }

                         $speacker = htmlspecialchars_decode(get_post_meta($id, 'event_booking_event_image', true)); 
                         ?>

                        <img class="speaker" src="<?php echo $speacker; ?>" alt="Speaker">
                        <div class="entry-content" style="height:100%">
                                
                                <?php 
                                 $event_date= htmlspecialchars_decode(get_post_meta( $id, 'event_booking_event_time', true ));
                                 $event_hour= htmlspecialchars_decode(get_post_meta( $id, 'event_booking_event_hour', true ));
                                ?>
                                <p class="">

                                        <?php
                                        echo $event_date;
                                        echo '&nbsp;|&nbsp;ore ';
                                        echo $event_hour;
                                        echo '<br>';
                                         _e(' 30 minuti con ', 'understrap-child');
                                        $auts = get_the_terms( $post->ID , 'autor_tax' );
                                    ?>
                                    <span class="author-span">
                                        <?php
                                        if ($auts){
                                            foreach ( $auts as $aut ) {
                                                echo '<b>'. $aut->name.'</b>';
                                                }
                                            }else{
                                            echo get_author_name() ;
                                            }?>
                                    </span>
                                        </p>
                                <?php the_title( '<h1 class="entry-title ">', '</h1>' ); ?>

                        </div><!-- .entry-content -->
            </div>
            
            <div class="w-100"><?php /* echo event_booking_loop(); */?></div>
        </div>
</div>

</article><!-- #post-## -->