<?php
/**
 * Understrap Child Theme Customizer
 *
 * @package understrap-child
 */

add_shortcode("green-under-left", "green_underlined_left");
function green_underlined_left( $atts, $content="" ) {
	return '<h4 class="green-text">'.$content.'</h4><div class="line-container"> <div class="green-line left"></div></div>';
}
add_shortcode("green-under-right", "green_underlined_right");
function green_underlined_right( $atts, $content="" ) {
	return '<h4 class="green-text">'.$content.'</h4> <div class="line-container"> <div class="green-line right"></div></div>';
}
add_shortcode("grey-under", "grey_underlined");
function grey_underlined( $atts, $content="" ) {
	return '<h4 class="grey-text">'.$content.'</h4> <div class="grey-line"></div>';
}
add_shortcode("grey-title", "grey_title");
function grey_title( $atts, $content="" ) {
	return '<h4 class="grey-title">'.$content.'</h4>';
}
add_shortcode("green-title", "green_title");
function green_title( $atts, $content="" ) {
	return '<h4 class="green-title">'.$content.'</h4>';
}

add_shortcode( 'wp_login_form', 'wp_login_form_custom' );
function wp_login_form_custom( $atts, $content="") {
	ob_start();
	function wpb_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
				background-image: url(http://path/to/your/custom-logo.png);
			height:100px;
			width:300px;
			background-size: 300px 100px;
			background-repeat: no-repeat;
			padding-bottom: 10px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'wpb_login_logo' );
	 wp_login_form();
	echo  '<a style="width: 100%; margin: auto;text-align: center;display: block;" href="https://registrazione.accmed.org" > Registrati </a>';
	echo  '<a style="width: 100%; margin: auto;text-align: center;display: block;" href="https://registrazione.accmed.org/?act=signup" > Il tuo profilo </a>';
	echo  '<a style="width: 100%; margin: auto;text-align: center;display: block;" href="https://registrazione.accmed.org/?act=link" > Non hai ricevuto il link di attivazione? </a>';
	echo  '<a style="width: 100%; margin: auto;text-align: center;display: block;" href="https://registrazione.accmed.org/?act=username" > Username dimenticato </a>';
	echo  '<a style="width: 100%; margin: auto;text-align: center;display: block;" href="https://registrazione.accmed.org/?act=password" > Password dimenticata </a>';
	return ob_get_clean();
}



add_shortcode( 'dynamics_download', 'dynamics_download' );
function dynamics_download( $atts, $content="") {
	ob_start();
	global $post;
 	$print_enable = htmlspecialchars_decode(get_post_meta( get_the_ID(), '_understrap_printable_page', true ));
	$downloadpdf_page = htmlspecialchars_decode(get_post_meta( get_the_ID(), '_understrap_download_page_pdf', true )); 
if ( $downloadpdf_page != '' ){ ?>
		<a class="ml-auto print-button" href="<?php  echo $downloadpdf_page ?>" download>versione PDF</i></a>
<?php }elseif( $print_enable == 'on' ){ ?>
		<a class="ml-auto print-button" href="javascript:window.print()" rel="nofollow" style="color:red;" >versione PDF</i></a>
<?php }
	return ob_get_clean();
}

add_shortcode( 'iframe', 'dynamics_frame' );
function dynamics_frame( $atts, $content) {
	$atts = shortcode_atts(array(
        'src' => null,
        'width' => null,
        'height' => null,
        'frameborder' => null,
    ), $atts);

	$src = $atts['src'];
    $width = $atts['width'];
    $height = $atts['height'];
    $frameborder = $atts['frameborder'];

	ob_start();
    $content = htmlentities($content);
	echo  '<iframe src="'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="'.$frameborder.'"></iframe>';
		return ob_get_clean();
}


add_shortcode('print_contact_form', 'print_contact_form');
function print_contact_form($atts, $content = "")
{
    $atts = shortcode_atts(array(
        'val' => null,
    ), $atts);
    $var = $atts['val'];
    ob_start();
	if (!$postid) {
		$postid = get_the_ID();
	}

	switch ($var) {
		case 'esperto':
			$auts = get_the_terms( $postid , 'autor_tax' );
			$relator ='';		
			if ($auts){
				foreach ( $auts as $aut ) {
					 $output .= $aut->name;
					}
				}
		break;
		case 'date':
			$output = htmlspecialchars_decode(get_post_meta( $postid, 'event_booking_event_time', true ));
		break;

		case 'hour':
			$output = htmlspecialchars_decode(get_post_meta( $postid, 'event_booking_event_hour', true ));
		break;
	
	}

	echo $output;
	$postid = '';

    return ob_get_clean();
}