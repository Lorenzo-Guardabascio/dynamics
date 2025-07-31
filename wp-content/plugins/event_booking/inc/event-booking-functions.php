<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// sanitize string and array
function sanitize($string, $trim = false){
	if (is_array($string)){
		$strng = array();
		foreach($string as $strk => $strv){
			$string1 = filter_var($strv, FILTER_SANITIZE_STRING);
			$string1 = trim($string1);
			$string1 = stripslashes($string1);
			$string1 = strip_tags($string1);
			$string1 = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string1);
			if ($trim)
				$string1 = substr($string1, 0, $trim);
			
			$strng[$strk] = $string1;
		}
		$string = $strng;
	} else {
		$string = filter_var($string, FILTER_SANITIZE_STRING);
		$string = trim($string);
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
		if ($trim)
			$string = substr($string, 0, $trim);
	}
	return $string;
}

// de_sanitize string and array
function decode_sanitized($str){
	if (is_array($str)){
		$strng = array();
		foreach($str as $strk => $strv){
			$strng[$strk] = html_entity_decode( $strv, ENT_QUOTES );
		}
		return $strng;
	}else{
		return html_entity_decode( $str, ENT_QUOTES );
	}
}

function event_booking_like_this_post(){
	$data = array();
	$event_booking_button_text 			= get_option( 'event_booking_button_text', 'Like' );
	$event_booking_unlike_button_text	= $event_booking_button_text; //get_option( 'event_booking_unlike_button_text', 'Unlike' );
	$event_booking_show_count 			= get_option( 'event_booking_show_count', 'Yes' );
	if( isset($_POST['like_nonce']) ){
		if( sanitize_text_field($_POST['like_nonce']) !== wp_create_nonce('Like Post')  ){
			$data["error"] = __("Oops...!!! Something went wrong. Please try again later", 'event_booking');
		} else {
			$postid = intval($_POST['pid']);
			$current_user = wp_get_current_user();
			$likes = get_post_meta($postid, 'event_booking_like', false);
			
			//$email_content=htmlspecialchars_decode(get_post_meta( $postid, 'event_booking_email_content', true ));
			//$email_ogg=htmlspecialchars_decode(get_post_meta( $postid, 'event_booking_email_ogg', true ));
			$event_date= htmlspecialchars_decode(get_post_meta( $postid, 'event_booking_event_time', true ));
			$event_hour= htmlspecialchars_decode(get_post_meta( $postid, 'event_booking_event_hour', true ));
			$auts = get_the_terms( $postid , 'autor_tax' );
			$relator ='';		
			if ($auts){
				foreach ( $auts as $aut ) {
					 $relator .= $aut->name;
					}
				}
			if( !in_array($current_user->ID, $likes) ){
				if( $postid ){
					add_post_meta($postid, 'event_booking_like', intval($current_user->ID));

					$likes = get_post_meta($postid, 'event_booking_like', false);
					$count = ($event_booking_show_count == 'Yes') ? '('. intval(count($likes)) .')' : '';

					$data["message"] = __($event_booking_unlike_button_text.' '.$count, 'event_booking');
					$data["disabled"] = "true";
					//email user
					wp_mail( 
						//email
						$current_user->user_email,
						//Ogg
						 'DyNAMICS > 30 Minuti con - Prenotazione incontro del '.$event_date.' ',
						//content
						'Hai prenotato la tua partecipazione all\'incontro con '.$relator.' che si terrà il giorno '.$event_date.' alle ore '.$event_hour.'.
Il giorno prima dell’incontro, riceverai via e-mail le istruzioni per l’accesso alla piattaforma online.' ,
						'',
						'',
					);
					//email admin
					wp_mail( 
						get_option('wisho_op_theme_reference_email'),
						'DyNAMICS > 30 Minuti con - Prenotazione incontro del '.$event_date.'' , 'L’utente '.$current_user->user_firstname.' '.$current_user->user_lastname .' '.  $current_user->user_email.' si è iscritto all\'evento di '.$relator.' che si terrà il '.$event_date.' alle ore '.$event_hour.'' ,
						'',
						''
					);
				}
			}else{
				delete_post_meta($postid, 'event_booking_like', intval($current_user->ID));
				$likes = get_post_meta($postid, 'event_booking_like', false);
				$count = ($event_booking_show_count == 'Yes') ? '('.count($likes).')' : '';
				$data["message"] = __($event_booking_button_text.' '.$count, 'event_booking');
				$data["disabled"] = "false";
				//email user
				wp_mail( 
					//email
					$current_user->user_email,
					//Ogg
						'DyNAMICS > 30 Minuti con - Annullamento partecipazione all\'incontro del '.$event_date.' ',
					//content
					'Hai annullato la partecipazione all\'incontro con '.$relator.' che si terrà il giorno '.$event_date.' alle ore '.$event_hour.'.' ,
					'',
					'',
				);
				//email admin
				wp_mail( 
					get_option('wisho_op_theme_reference_email'),
					'DyNAMICS > 30 Minuti con - Annullamento partecipazione a incontro del '.$event_date.'' , 'L’utente '.$current_user->user_firstname.' '.$current_user->user_lastname .' '.  $current_user->user_email.' ha annullato l\'iscrizione all\'evento di '.$relator.' che si terrà il '.$event_date.' alle ore '.$event_hour.'' ,
					'',
					''
				);
			}
		
		}
	}else{
		$data["error"] = __("Oops...!!! Something went wrong. Please try again later", 'event_booking');
	}
	echo json_encode($data);
	die();
}
add_action('wp_ajax_event_booking_like_this_post', 'event_booking_like_this_post');
add_action('wp_ajax_nopriv_event_booking_like_this_post', 'event_booking_like_this_post'); 


function eventbooking_enqueue_custom_script() {
    wp_enqueue_script( 'event-booking-js',plugins_url('../', __FILE__). 'assets/js/event-booking.js', array(), EVENT_BOOKING_VER, true );
    $ajax_like = 'jQuery(document).on("click", ".event_booking_like", function(event){
             event.preventDefault();
             var likeBtn = jQuery(this);
             var pid = jQuery(this).attr("data-id");
             var likeBtnSpan = jQuery(this).find("span");
             var likeBtnText = likeBtnSpan.text();
             jQuery.ajax({
                 type:"POST",
                 url: "'.home_url().'/wp-admin/admin-ajax.php",
                 data: { pid:pid, action:"event_booking_like_this_post", like_nonce:"'.wp_create_nonce('Like Post').'" },
                 beforeSend: function() { 
                     likeBtnSpan.text("Elaborazione..."); 
                 },
                 success: function(response) {
                     var objf = JSON.parse(response);
                     console.log(objf);
                     if( objf.error ){
                         likeBtnSpan.text( likeBtnText );
                         jQuery( "<div><small>"+objf.error+"</small></div>" ).insertAfter( likeBtn );
                     }
                     if( objf.message ){
                         likeBtnSpan.text( objf.message );
                         if( objf.disabled == "true" ){
                             likeBtn.removeClass("enabled").addClass("disabled");
                             likeBtn.prev().show();
                             likeBtnSpan.text("Annulla prenotazione");
						 }
                         else{
                             likeBtn.removeClass("disabled").addClass("enabled");
                             likeBtn.prev().hide();
                             likeBtnSpan.text("Prenota la tua partecipazione");
						 }
                     }
                 },
                 //complete: function() { 
                 //	likeBtnSpan.text("Like"); 
                 //}
             });
         });';
    wp_add_inline_script( 'event-booking-js', $ajax_like );
 }
 add_action( 'wp_enqueue_scripts', 'eventbooking_enqueue_custom_script' );
 

 // Display like button on front end
function event_booking_action_after_content($content) { 
	$event_booking_button_text 		= get_option( 'event_booking_button_text', 'Like' );
	//$event_booking_unlike_button_text	= get_option( 'event_booking_unlike_button_text', 'Unlike' );
	$event_booking_thumb_icon 		= get_option( 'event_booking_thumb_icon', 'fa-thumbs-up' );
	$event_booking_show_count 		= get_option( 'event_booking_show_count', 'Yes' );
	$event_booking_post_types        = 'event_booking';
	$disabled					= "enabled";
	$likes 						= get_post_meta(get_the_ID(), 'event_booking_like', false); 
	$current_user 				= wp_get_current_user();
	if( in_array($current_user->ID, $likes) ){
		$disabled = 'disabled';
		
		$likecontent = 'Annulla prenotazione';
	}else{
		$disabled1 = 'style="display:none"';
		$likecontent = 'Prenota la tua partecipazione';
	}
	
	//$btn_text = $event_booking_button_text; //( $disabled == 'disabled' ) ? $event_booking_unlike_button_text : $event_booking_button_text;
	$count = ($event_booking_show_count == 'Yes') ? '('.count($likes).')' : '';
	if( get_post_type() == $event_booking_post_types){
		$new_content = __($content, 'event_booking').'<span class="event_booking_lik" '.$disabled1.'> <span> Partecipazione prenotata </span></span> <buton class="event_booking_like '.$disabled.'" data-id="'.get_the_ID().'"> <span>'.$likecontent.' </span></buton>';
	}else{
		$new_content = __($content, 'event_booking');
	}
	return $new_content;
}
//add_action( 'the_content', 'event_booking_action_after_content'); 

function event_booking_loop() { 
	$event_booking_button_text 		= get_option( 'event_booking_button_text', 'Like' );
	//$event_booking_unlike_button_text	= get_option( 'event_booking_unlike_button_text', 'Unlike' );
	$event_booking_thumb_icon 		= get_option( 'event_booking_thumb_icon', 'fa-thumbs-up' );
	$event_booking_show_count 		= get_option( 'event_booking_show_count', 'Yes' );
	$event_booking_post_types        = 'event_booking';
	$disabled					= "enabled";
	$likes 						= get_post_meta(get_the_ID(), 'event_booking_like', false); 
	$current_user 				= wp_get_current_user();
	if( in_array($current_user->ID, $likes) ){
		$disabled = 'disabled';
		
		$likecontent = 'Annulla prenotazione';
	}else{
		$disabled1 = 'style="display:none"';
		$likecontent = 'Prenota la tua partecipazione';
	}
	
	//$btn_text = $event_booking_button_text; //( $disabled == 'disabled' ) ? $event_booking_unlike_button_text : $event_booking_button_text;
	if( get_post_type() == $event_booking_post_types && is_user_logged_in()){
		echo '<span class="event_booking_lik" '.$disabled1.'> <span> Partecipazione prenotata</span></span>';
		echo '<buton class="event_booking_like '.$disabled.'" data-id="'.get_the_ID().'"> <span>'.$likecontent.' </span></buton>';
	}
}

function event_booking_loop_ended() { 
	$event_booking_button_text 		= get_option( 'event_booking_button_text', 'Like' );
	//$event_booking_unlike_button_text	= get_option( 'event_booking_unlike_button_text', 'Unlike' );
	$event_booking_thumb_icon 		= get_option( 'event_booking_thumb_icon', 'fa-thumbs-up' );
	$event_booking_show_count 		= get_option( 'event_booking_show_count', 'Yes' );
	$event_booking_post_types        = 'event_booking';
	$disabled					= "enabled";
	$likes 						= get_post_meta(get_the_ID(), 'event_booking_like', false); 
	$current_user 				= wp_get_current_user();

	//$btn_text = $event_booking_button_text; //( $disabled == 'disabled' ) ? $event_booking_unlike_button_text : $event_booking_button_text;
	if( get_post_type() == $event_booking_post_types && is_user_logged_in()){

		echo '<a href="'. get_permalink() .'" class="event_booking_li  play-rec" style="" > <span> Vedi la registrazione</span></a>';

	}
}
