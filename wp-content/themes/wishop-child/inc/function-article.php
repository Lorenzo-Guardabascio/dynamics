<?php
/**
 * Understrap Child Theme Customizer
 *
 * @package understrap-child
 */

if (!function_exists('understrap_article_header')) {
    function understrap_article_header()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'understrap'));
            if ($categories_list && understrap_categorized_blog()) {
                printf('<span class="card-title">' . esc_html__(' %1$s ', 'understrap') . '</span>', $categories_list); // WPCS: XSS OK.
            }

        }

    }
}

function post_only_class($class = '', $post_id = null)
{
    // Separates classes with a single space, collates classes for post DIV
    echo join(' ', get_post_class($class, $post_id));
}

if (!function_exists('understrap_all_excerpts_get_more_link')) {
    /**
     * Adds a custom read more link to all excerpts, manually or automatically generated
     *
     * @param string $post_excerpt Posts's excerpt.
     *
     * @return string
     */
    function understrap_all_excerpts_get_more_link($post_excerpt)
    {

        return $post_excerpt . ' [...]
        </div>
        </div>
        <div class="card-footer text-center bg-transparent">
        <a href="' . esc_url(get_permalink(get_the_ID())) . '">


                              <button type="button" class="btn w-75 " >LEGGI DI PIÙ</button>
                                </a></div>';
    }

}
if (!function_exists('understrap_posted_on')) {
    function understrap_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published mt-4 mb-4" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s"> (%4$s) </time>';
        }
        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );
        $posted_on = sprintf(
            esc_html_x('%s', 'post date', 'understrap'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );
        $byline = sprintf(
            esc_html_x('', 'r', 'understrap'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );
        echo '<span class="posted-on mt-3 mb-3">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }
}
if (!function_exists('understrap_posted_on_news')) {
    function understrap_posted_on_news()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf($time_string,

            esc_attr(get_the_date('d M Y')),
            esc_html(get_the_date('d M Y')),
            esc_attr(get_the_modified_date('d M Y')),
            esc_html(get_the_modified_date('d M Y'))

        );
        echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
    }
}
if (!function_exists('understrap_posted_on_last')) {
    function understrap_posted_on_last()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())

        );
        echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
    }
}
function is_blog()
{
    if (is_page(get_option('page_for_posts')) == $post->ID) {
        return true;
    }
}
if (!function_exists('understrap_print_post_main')) {
    function understrap_print_post_main($id = null)
    {
        if (!$id) {
            $id = get_the_ID();
        }

        $title_header = htmlspecialchars_decode(get_post_meta($id, '_understrap_post_header_title', true));
        $subtitle_header = htmlspecialchars_decode(get_post_meta($id, '_understrap_post_header_subtitle', true));
        $text_header = htmlspecialchars_decode(get_post_meta($id, '_understrap_post_header_text', true));
        if ('' != get_the_post_thumbnail()) {
            global $container;
            ?>

		<div class="header-container" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>)" >
			<div class="<?php echo esc_attr($container); ?>" tabindex="-1">
				<div class="row">
					<div class="col-12 col-md-6 pl-0">
					<h2> <?php echo $title_header ?> </h2>
					<h3> <?php echo $subtitle_header ?> </h3>
					<p> <?php echo $text_header ?> </p>
					</div>
				</div>
			</div>
		</div>
<?php
}
    }
}
/**
 * Generate breadcrumbs
 */
if (!function_exists('get_breadcrumb')) {
    function get_breadcrumb()
    {
        $container = get_theme_mod('understrap_container_type');
        $home_breadcrumbs = 1; // put 1 to show breadcrumbs on home page, otherwise leave it as it is
        $separator = '  <span class="delimiter"> > </span> '; // separator
        $home = 'Home'; // home text
        $mycurrent = 1; //put 1 to show current post/page title in breadcrumbs, otherwise leave put 0
        global $post;
        $myhome_url = get_bloginfo('url');
        if (is_home() || is_front_page()) {
            if ($home_breadcrumbs == 1) {
                echo '<div class="breadcrumb"><div class="' . esc_attr($container) . '"> Sei qui: <a href="' . $myhome_url . '">' . $home . '</a>';
                if (is_blog()) {
                    echo ' > ';
                    echo '<span>';
                    $archive_id = get_option('page_for_posts');
                    echo get_the_title($archive_id);
                    echo '</span>';
                }
                echo '</div>';
            }
        } else {
            echo '<div class="breadcrumb"><div class="' . esc_attr($container) . '"> Sei qui:&nbsp;<a href="' . $myhome_url . '">' . $home . '</a> ' . $separator . ' ';
            if (is_category()) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($thisCat->parent, true, ' ' . $separator . ' ');
                }

                echo '<span>' . 'Archive :"' . single_cat_title('', false) . '"' . '</span>';
            } elseif (is_search()) {
                echo '<span>' . 'Results :"' . get_search_query() . '"' . '</span>';
            } elseif (is_day()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '" > ' . get_the_time('Y') . '</a> ' . $separator . ' ';
                echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $separator . ' ';
                echo '<span>' . get_the_time('d') . '</span>';
            } elseif (is_month()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $separator . ' ';
                echo '<span>' . get_the_time('F') . '</span>';
            } elseif (is_year()) {
                echo '<span>' . get_the_time('Y') . '</span>';
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    if (wp_get_post_terms($post->ID, 'topics', array("fields" => "names"))) {
                        $post_type = wp_get_post_terms($post->ID, 'topics', array("fields" => "names"))[0];
                        $post_link = wp_get_post_terms($post->ID, 'topics', array("fields" => "slugs"));
                        $post_link_cats = get_the_terms($post->ID, 'categories_1');

                        if ($post_link[0] == 'update' ) {
                            $post_link[0] = 'update';
                            $post_type = 'Approfondimenti';
                        }
                        if ($post_link[0] == 'slidekit') {
                            $post_link[0] = 'slidekit';
                            $post_type = 'Slidekit';
                        }
                        if ($post_link[0] == 'digital-events') {
                            $post_link[0] = 'digital_event';
                            $post_type = 'Materiali dai webinar';
                        }
                        if ($post_link[0] == 'podcast') {
                            $post_type = 'DyNAMICS Highlights';
                        }
                        if ($post_link[0] == 'casi-clinici-interattivi' || $post_link[0] == 'video-lezioni') {
                            $post_link[0] = 'interattivita';
                            $post_type = 'Videolezioni';

                        }
                        if($post_link_cats){
                            foreach ($post_link_cats as $post_cat) {

                                $post_link_cat = $post_cat->slug;
                                $post_name_cat = $post_cat->name;
    
                            }
                        }
                    
                        if ($post_cat->slug) {
                            echo '<a href="' . $myhome_url . '/' . $post_link_cat . '/">' . $post_name_cat . '</a> >';
                            $post_link_child_cats = '/' . $post_link_cat;
                        }

                        echo '<a href="' . $myhome_url . $post_link_child_cats . '/' . $post_link[0] . '/" > ' . $post_type . '</a>';
                    } elseif (get_post_type($post) =="digital_event") {
                        //var_dump(get_post_type_object(get_post_type($post)));
                        $post_type =get_post_type_object(get_post_type($post))->label;
                        $post_name =get_post_type_object(get_post_type($post))->name;
  
                            if ($post_name== 'digital_event' && get_option('wisho_op_theme_d_e')) {
                                $post_link = get_option('wisho_op_theme_d_e');
                            }

                            echo '<a href="'.$post_link.'" > Materiali dai webinar </a>';

                    } else {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        $s_name = $post_type->labels->singular_name;
                        if($slug['slug'] == "event_booking" ){ 
                            $s_name = "30 minuti con";
                            $slug['slug'] = "30-minuti-con-replay";
                         }
                        echo '<a href="' . $myhome_url . '/' . $slug['slug'] . '/">' . $s_name . '</a>';
                    }
                    if ($mycurrent == 1) {
                        echo ' ' . $separator . ' ' . '<span>' . get_the_title() . '</span>';
                    }

                } else {
                    $archive_id = get_option('page_for_posts');
                    echo '<a href="';
                    echo get_permalink($archive_id);
                    echo '">';
                    echo get_the_title($archive_id);
                    echo '</a>';
                    echo ' > ';
                    if ($mycurrent == 0) {
                        $cats = preg_replace("#^(.+)\s$separator\s$#", "$1", $cats);
                    }

                    echo $cats;
                    if ($mycurrent == 1) {
                        echo '<span>' . get_the_title() . '</span>';
                    }

                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                if (is_post_type_archive('digital_event')) {
                    echo '<span>Materiali dai webinar</span>';
                }
                elseif (is_post_type_archive('event_booking')) {
                    echo '<span>30 minuti con</span>';
                }
                elseif (is_archive()) {
                    echo '<span>Archivio</span>';
                } elseif (wp_get_post_terms($post->ID, 'topics', array("fields" => "names"))) {
                    $post_type = wp_get_post_terms($post->ID, 'topics', array("fields" => "names"))[0];
                    if ($post_type == "Update") {
                        $post_type = "Approfondimenti";
                    }
                    echo '<span>' . $post_type . '</span>';
                } else {
                    $post_type = get_post_type_object(get_post_type());
                    echo '<span>' . $post_type->labels->singular_name . '</span>';
                }

            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                echo get_category_parents($cat, true, ' ' . $separator . ' ');
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                if ($mycurrent == 1) {
                    echo ' ' . $separator . ' ' . '<span>' . get_the_title() . '</span>';
                }

            } elseif (is_page() && !$post->post_parent) {
                if ($mycurrent == 1) {
                    echo '<span>' . get_the_title() . '</span>';
                }

            } elseif (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1) {
                        echo ' ' . $separator . ' ';
                    }

                }
                if ($mycurrent == 1) {
                    echo ' ' . $separator . ' ' . '<span>' . get_the_title() . '</span>';
                }

            } elseif (is_tag()) {
                echo '<span>' . 'Posts tagged "' . single_tag_title('', false) . '"' . '</span>';
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo '<span>' . 'Articles By ' . $userdata->display_name . '</span>';
            } elseif (is_404()) {
                echo '<span>' . '404' . '</span>';
            }
            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                    echo ' (';
                }

                echo __(' > <span> Pagina ') . ' ' . get_query_var('paged').'</span>';
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                    echo ')';
                }

            }
            echo '</div></div>';
        }
    }

}

function dynamics_page_bar($external_id =null,$page=null )
{      
    $term_array = array();
   
    if($external_id != null){
        $parent_id= $external_id;
        $parent_permalink = get_permalink($parent_id);
        $current_terms = get_the_terms( get_the_ID() , 'topics' );
        //var_dump($current_terms);
        if($current_terms){
            foreach($current_terms as $current_term){
                    array_push($term_array, $parent_permalink.''.$current_term->slug.'/' );
            }
        }
    }

    elseif(wp_get_post_parent_id()){
        $parent_id = wp_get_post_parent_id();

    }else{
        $parent_id = get_the_ID();
    }


    global $wp;
    $nav_meta = [];

    $current_page = get_permalink();;
    
    $keys_array= array(
    '_left_navigation_bar_patologie',
    '_left_navigation_bar_patologie_link',
    '_left_navigation_bar_medicine',
    '_left_navigation_bar_medicine_link',
    '_left_navigation_bar_casi',
    '_left_navigation_bar_casi_link',
    '_left_navigation_bar_immagini',
    '_left_navigation_bar_immagini_link',
    '_left_navigation_bar_topic',
    '_left_navigation_bar_topic_link',
    '_left_navigation_bar_interactivity',
    '_left_navigation_bar_interactivity_link',
    '_left_navigation_bar_update',
    '_left_navigation_bar_update_link',
    '_left_navigation_bar_slidekit',
    '_left_navigation_bar_slidekit_link',
    '_left_navigation_bar_podcast',
    '_left_navigation_bar_podcast_link',
);

foreach($keys_array as $key_array){
    if (htmlspecialchars_decode(get_post_meta( $parent_id,$key_array, true))!=''){

        $value_array= htmlspecialchars_decode(get_post_meta( $parent_id,$key_array, true));

    }else{

        $value_array=htmlspecialchars_decode(get_post_meta( get_the_ID() ,$key_array, true));
        
    }
    $nav_meta[$key_array] = $value_array;

}


$patologie =         $nav_meta['_left_navigation_bar_patologie'];
$patologie_link =    $nav_meta['_left_navigation_bar_patologie_link'];
$medicine =          $nav_meta['_left_navigation_bar_medicine'];
$medicine_link =     $nav_meta['_left_navigation_bar_medicine_link'];
$casi =              $nav_meta['_left_navigation_bar_casi'];
$casi_link =         $nav_meta['_left_navigation_bar_casi_link'];
$immagini =          $nav_meta['_left_navigation_bar_immagini'];
$immagini_link =     $nav_meta['_left_navigation_bar_immagini_link'];
$topic =             $nav_meta['_left_navigation_bar_topic'];
$topic_link =        $nav_meta['_left_navigation_bar_topic_link'];
$interactivity =     $nav_meta['_left_navigation_bar_interactivity'];
$interactivity_link =$nav_meta['_left_navigation_bar_interactivity_link'];
$update =            $nav_meta['_left_navigation_bar_update'];
$update_link =       $nav_meta['_left_navigation_bar_update_link'];
$slidekit =          $nav_meta['_left_navigation_bar_slidekit'];
$slidekit_link =     $nav_meta['_left_navigation_bar_slidekit_link'];
$podcast =           $nav_meta['_left_navigation_bar_podcast'];
$podcast_link =      $nav_meta['_left_navigation_bar_podcast_link'];

/*
    $patologie = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_patologie', true));
    $patologie_link = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_patologie_link', true));
    $medicine = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_medicine', true));
    $medicine_link = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_medicine_link', true));
    $casi = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_casi', true));
    $casi_link = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_casi_link', true));
    $immagini = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_immagini', true));
    $immagini_link = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_immagini_link', true));
    $topic = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_topic', true));
    $topic_link = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_topic_link', true));
    $interactivity = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_interactivity', true));
    $interactivity_link = htmlspecialchars_decode(get_post_meta( $parent_id, '_left_navigation_bar_interactivity_link', true));
*/
    if ($patologie != '' || $patologie_link != '' || $medicine != '' || $medicine_link != '' || $casi != '' || $casi_link != '' || $immagini != '' || $immagini_link != '' || $topic != '' || $topic_link != '') {
        ?>
        <div class="col-4 col-md-3 rt-bar">
            <div class=" collapser-aside d-block d-lg-none text-right"> 
                <button data-toggle="collapse" data-target="#custom_bar_navigation" class="ml-auto navbar-toggler "><span class="navbar-toggler-icon"></span></button>
            </div>
            <ul id="custom_bar_navigation" class="w-100 custom_bar_navigation collapse ">
            <?php
            echo '<p class="page-title">
            '. get_the_title($parent_id) .'
            </p>';
        if ($patologie != '') {
            echo '<li><a class="';
            if ($current_page == $patologie_link || ($term_array && in_array($patologie_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $patologie_link . '"> > ';
            echo $patologie;
            echo ' </a></li>';
        }

        if ($medicine != '') {
            echo '<li><a class="';
            if ($current_page == $medicine_link || ($term_array && in_array($medicine_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $medicine_link . '"> > ' . $medicine . ' </a></li>';
        }

        if ($interactivity != '') {echo
                '<li><a class="';
            if ($current_page == $interactivity_link  || ($term_array && in_array($interactivity_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $interactivity_link . '"> > ' . $interactivity . ' </a></li>';
        }
        if ($casi != '') {echo
                '<li><a class="';
            if ($current_page == $casi_link  || ($term_array && in_array($casi_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $casi_link . '"> > ' . $casi . ' </a></li>';
        }

        if ($immagini != '') {
            echo '<li><a class="';
            if ($current_page == $immagini_link  || ($term_array && in_array($immagini_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $immagini_link . '"> > ' . $immagini . ' </a></li>';
        }

        /*if ($topic != '') {echo
                '<li><a class="';
            if ($current_page == $topic_link) {
                echo 'navigation_active';
            }
            echo '" href="' . $topic_link . '"> > ' . $topic . ' </a></li>';
        }*/

        //new
        if ($update != '') {echo
                '<li><a class="';
            if ($current_page == $update_link || ($term_array && in_array($update_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $update_link . '"> > ' . $update . ' </a></li>';
        }

        if ($slidekit != '') {echo
                '<li><a class="';
            if ($current_page == $slidekit_link || ($term_array && in_array($slidekit_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $slidekit_link . '"> > ' . $slidekit . ' </a></li>';
        }

        if ($podcast != '') {echo
                '<li><a class="';
            if ($current_page == $podcast_link || ($term_array && in_array($podcast_link, $term_array))) {
                echo 'navigation_active';
            }
            echo '" href="' . $podcast_link . '"> > ' . $podcast . ' </a></li>';
        }
        
        if(get_the_terms( $post->ID , 'topics' ) ) {

            $terms = get_the_terms( $post->ID , 'topics' );
            foreach($terms as $term){
                if($term->slug == "podcast"){
                    dynamic_sidebar( 'right-sidebar-podcast' );
                }
                
            }   
        }
        ?>
            </ul>
        </div>
        <?php
}

}

function dynamics_page_bar_single($tag = null )
{   
    

    if ($tag !=null) {
        ?>
        <div class="col-4 col-md-3 rt-bar">
        <div class=" collapser-aside d-block d-lg-none text-right"> 
        <button data-toggle="collapse" data-target="#custom_bar_navigation" class="ml-auto navbar-toggler "><span class="navbar-toggler-icon"></span></button>
            </div>

            <ul id="custom_bar_navigation" class="w-100 custom_bar_navigation collapse ">
            <?php
            if($tag !='on-demand'){
            echo '<p class="page-title">
            Filtra per
            </p>';
            echo '<li><a href="' . get_site_url()  .'\/ematologia/' .$tag . '"> > Ematologia</a></li>';
            echo '<li><a href="' . get_site_url()  .'\/nefrologia/' .$tag . '"> > Nefrologia</a></li>';
            echo '<li><a href="' . get_site_url()  .'\/neurologia/' .$tag . '"> > Neurologia</a></li>';
            echo '<li><a href="' . get_site_url()  .'\/immunologia/' .$tag . '"> > Immunologia</a></li>';

                    if($tag == "podcast"){
                        dynamic_sidebar( 'right-sidebar-podcast' );
                    }
                }
                elseif($tag == "on-demand"){
                        dynamic_sidebar( 'right-sidebar-on-demand' );
                }
                

        ?>  
        
            </ul>
        </div>
        <?php
}

}


function bigScreenScript() {
?>
<script>
    ;(function() {
        // other stuff
        function setClickHandler(id, fn) {
            //document.getElementById(id).onclick = fn
            //console.log(id);
            var element = document.getElementById(id);
 
            //If it isn't "undefined" and it isn't "null", then it exists.
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById(id).onclick = fn
            } 
            
        }
        setClickHandler('video_container', function(e) {
            var className = e.target.className
            if (~className.indexOf('htmlvid')) {
                BigPicture({
                    el: e.target,
                    vidSrc: e.target.getAttribute('vidSrc'),
                })
            }
        })
    })()
</script>
<?php
}
add_action('wp_footer', 'bigScreenScript');


function get_custom_search_form( $args = array() ) {
	/**
	 * Fires before the search form is retrieved, at the start of get_search_form().
	 *
	 * @since 2.7.0 as 'get_search_form' action.
	 * @since 3.6.0
	 *
	 * @link https://core.trac.wordpress.org/ticket/19321
	 */
	do_action( 'pre_get_search_form' );

	$echo = true;

	if ( ! is_array( $args ) ) {
		/*
		 * Back compat: to ensure previous uses of get_search_form() continue to
		 * function as expected, we handle a value for the boolean $echo param removed
		 * in 5.2.0. Then we deal with the $args array and cast its defaults.
		 */
		$echo = (bool) $args;

		// Set an empty array and allow default arguments to take over.
		$args = array();
	}

	// Defaults are to echo and to output no custom label on the form.
	$defaults = array(
		'echo'       => $echo,
		'aria_label' => '',
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	 * Filters the array of arguments used when generating the search form.
	 *
	 * @since 5.2.0
	 *
	 * @param array $args The array of arguments for building the search form.
	 */
	$args = apply_filters( 'search_form_args', $args );

	$format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';

	/**
	 * Filters the HTML format of the search form.
	 *
	 * @since 3.6.0
	 *
	 * @param string $format The type of markup to use in the search form.
	 *                       Accepts 'html5', 'xhtml'.
	 */
	$format = apply_filters( 'search_form_format', $format );

	$search_form_template = locate_template( 'custom_searchform.php' );
	if ( '' != $search_form_template ) {
		ob_start();
		require( $search_form_template );
		$form = ob_get_clean();
	} else {
		// Build a string containing an aria-label to use for the search form.
		if ( isset( $args['aria_label'] ) && $args['aria_label'] ) {
			$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '" ';
		} else {
			/*
			 * If there's no custom aria-label, we can set a default here. At the
			 * moment it's empty as there's uncertainty about what the default should be.
			 */
			$aria_label = '';
		}
		if ( 'html5' == $format ) {
			$form = '<form role="search" ' . $aria_label . 'method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
				<label>
					<span class="screen-reader-text">' . _x( 'Search for:', 'label' ) . '</span>
					<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" />
				</label>
				<input type="submit" class="search-submit" value="' . esc_attr_x( 'Search', 'submit button' ) . '" />
			</form>';
		} else {
			$form = '<form role="search" ' . $aria_label . 'method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
				<div>
					<label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label' ) . '</label>
					<input type="text" value="' . get_search_query() . '" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="' . esc_attr_x( 'Search', 'submit button' ) . '" />
				</div>
			</form>';
		}
	}

	/**
	 * Filters the HTML output of the search form.
	 *
	 * @since 2.7.0
	 *
	 * @param string $form The search form HTML output.
	 */
	$result = apply_filters( 'get_search_form', $form );

	if ( null === $result ) {
		$result = $form;
	}

	if ( isset( $args['echo'] ) && $args['echo'] ) {
		echo $result;
	} else {
		return $result;
	}
}

add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );

function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $my_attr = 'd_esperto';

if ( isset( $atts[$my_attr] ) ) {
    $out[$my_attr] = $atts[$my_attr];
}

return $out;
}
?>