<?php

function sandbox_initialize_theme_options_tab_1() {  
    add_settings_section(  
        'page_1_section',         // ID used to identify this section and with which to register options  
        'Home',                  // Title to be displayed on the administration page  
        'page_1_section_callback', // Callback used to render the description of the section  
        'theme-setting-slug-1'                           // Page on which to add this section of options  
    );

    add_settings_field (   
        'wisho_op_theme_option_1_0',                      // ID used to identify the field throughout the theme  
        'Aree tematiche in home',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_home_areas',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'Slug delle aree temtiche da visualizzare in home',
        )  
    );  

    add_settings_field (   
        'wisho_op_theme_option_image_news',                      // ID used to identify the field throughout the theme  
        'Image news',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_image_news',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire il link completo dell\'immagine',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_casi_clinici',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni casi clinici',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_casi_clinici',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_videolezioni',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni videolezioni',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_videolezioni',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_atlante',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni atlante interattivo',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_atlante',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_atlante_img',                      // ID used to identify the field throughout the theme  
        'Immagine ultime pubblicazioni atlante interattivo',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_atlante_img',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_atlante_img_link',                      // ID used to identify the field throughout the theme  
        'Immagine ultime pubblicazioni atlante interattivo link',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_atlante_img_link',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_slidekit',                      // ID used to identify the field throughout the theme  
        'Immagine ultime pubblicazioni slidekit',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_slidekit',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub_update',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni update',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub_update',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_last_pub__podcast',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni Podcast',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_last_pub__podcast',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_interactive_last_pub',                      // ID used to identify the field throughout the theme  
        'Tag ultime pubblicazioni video',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_interactive_last_pub',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei video tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_interactive_last_pub_hl',                      // ID used to identify the field throughout the theme  
        'Id pagina Highlights ',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_interactive_last_pub_hl',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei video tag da visualizzare',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_img_cat',                      // ID used to identify the field throughout the theme  
        'Tag ultime immagini',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_img_cat',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire lo SLUG dei tag da visualizzare per le immagini',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_img_bg',                      // ID used to identify the field throughout the theme  
        'Immagine per tag immagini commentate',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_img_bg',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link immagine',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_30_link',                      // ID used to identify the field throughout the theme  
        'Link 30 minuti con in programma',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_30_link',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link 30 minuti con in prog',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_option_30_link_replay',                      // ID used to identify the field throughout the theme  
        'Link replay 30 minuti con in programma',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_30_link_replay',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link 30 minuti con in prog',
        )  
    );  

    add_settings_field (   
        'wisho_op_theme_d_e',                      // ID used to identify the field throughout the theme  
        'Link digital event',                           // The label to the left of the option interface element  
        'wisho_op_theme_d_e',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link immagine',
        )  
    );  

    add_settings_field (   
        'wisho_op_theme_d_e_img',                      // ID used to identify the field throughout the theme  
        'Link img digital event',                           // The label to the left of the option interface element  
        'wisho_op_theme_d_e_img',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link immagine',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_d_e_img_mobi',                      // ID used to identify the field throughout the theme  
        'Link img digital event mobile',                           // The label to the left of the option interface element  
        'wisho_op_theme_d_e_img_mobi',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link immagine',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_on_demand_q',                      // ID used to identify the field throughout the theme  
        'Link img on demand Q',                           // The label to the left of the option interface element  
        'wisho_op_theme_on_demand_q',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link immagine',
        )  
    );  
    add_settings_field (   
        'wisho_op_theme_on_demand_a',                      // ID used to identify the field throughout the theme  
        'Link img on demand A',                           // The label to the left of the option interface element  
        'wisho_op_theme_on_demand_a',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'inserire link immagine',
        )  
    );  
    
    add_settings_field ('wisho_op_theme_videolezioni_link','Link videolezioni ','wisho_op_theme_videolezioni_link','theme-setting-slug-1','page_1_section',array( 'inserire link videolezioni',)  );  
    add_settings_field ('wisho_op_theme_casi_clinici_link','Link casi_clinici ','wisho_op_theme_casi_clinici_link','theme-setting-slug-1','page_1_section',array( 'inserire link casi_clinici',)  );  
    add_settings_field ('wisho_op_theme_approfondimenti_link','Link approfondimenti ','wisho_op_theme_approfondimenti_link','theme-setting-slug-1','page_1_section',array( 'inserire link approfondimenti',)  );  
    add_settings_field ('wisho_op_theme_slidekit_link','Link slidekit ','wisho_op_theme_slidekit_link','theme-setting-slug-1','page_1_section',array( 'inserire link slidekit',)  );  
    add_settings_field ('wisho_op_theme_podcast_link','Link podcast ','wisho_op_theme_podcast_link','theme-setting-slug-1','page_1_section',array( 'inserire link slidekit',)  );  
    add_settings_field ('wisho_op_theme_webinar_link','Link webinar ','wisho_op_theme_webinar_link','theme-setting-slug-1','page_1_section',array( 'inserire link slidekit',)  );  

    add_settings_field (   
        'wisho_op_theme_option_1_1',                      // ID used to identify the field throughout the theme  
        'Option 1',                           // The label to the left of the option interface element  
        'wisho_op_theme_option_1_1_callback',   // The name of the function responsible for rendering the option interface  
        'theme-setting-slug-1',                          // The page on which this option will be displayed  
        'page_1_section',         // The name of the section to which this field belongs  
        array(                              // The array of arguments to pass to the callback. In this case, just a description.  
            'This is the description of the option 1',
        )  
    );  
    $variables_1=array(
        'wisho_op_theme_option_home_areas' ,
        'wisho_op_theme_option_image_news' ,
        'wisho_op_theme_option_last_pub' ,
        'wisho_op_theme_option_last_pub_casi_clinici' ,
        'wisho_op_theme_option_last_pub_videolezioni' ,
        'wisho_op_theme_option_last_pub_atlante' ,
        'wisho_op_theme_option_last_pub_atlante_img' ,
        'wisho_op_theme_option_last_pub_atlante_img_link' ,
        'wisho_op_theme_on_demand_q' ,
        'wisho_op_theme_on_demand_a' ,
        'wisho_op_theme_option_30_link' ,
        'wisho_op_theme_option_30_link_replay' ,
        'wisho_op_theme_option_last_pub_slidekit' ,
        'wisho_op_theme_option_last_pub_update' ,
        'wisho_op_theme_option_last_pub__podcast' ,
        'wisho_op_theme_option_interactive_last_pub' ,
        'wisho_op_theme_option_interactive_last_pub_hl' ,
        'wisho_op_theme_option_img_cat' ,
        'wisho_op_theme_option_img_bg' ,
        'wisho_op_theme_d_e' ,
        'wisho_op_theme_d_e_img' ,
        'wisho_op_theme_d_e_img_mobi' ,
        'wisho_op_theme_option_1_1' ,
        'wisho_op_theme_videolezioni_link',
        'wisho_op_theme_casi_clinici_link',
        'wisho_op_theme_approfondimenti_link',
        'wisho_op_theme_slidekit_link',
        'wisho_op_theme_podcast_link',
        'wisho_op_theme_webinar_link',

    );

    foreach($variables_1 as $variable){
        register_setting('setting-group-1',$variable);
    }


} // function sandbox_initialize_theme_options

add_action('admin_init', 'sandbox_initialize_theme_options_tab_1');


function page_1_section_callback() {  
    echo '<p>Impostazioni home</p>';  
} // function page_1_section_callback


/* ----------------------------------------------------------------------------- */
/* Field Callbacks */
/* ----------------------------------------------------------------------------- */ 

function wisho_op_theme_option_home_areas($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_1" class="wisho_op_theme_option_1" name="wisho_op_theme_option_home_areas" value="<?php echo get_option('wisho_op_theme_option_home_areas') ?>">
    <p class="description wisho_op_theme_option_1"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_option_image_news($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_image_news" class="wisho_op_theme_option_image_news" name="wisho_op_theme_option_image_news" value="<?php echo get_option('wisho_op_theme_option_image_news') ?>">
    <p class="description wisho_op_theme_option_image_news"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  
function wisho_op_theme_d_e($args) {  
    ?>
    <input type="text" id="wisho_op_theme_d_e" class="wisho_op_theme_d_e" name="wisho_op_theme_d_e" value="<?php echo get_option('wisho_op_theme_d_e') ?>">
    <p class="description wisho_op_theme_d_e"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_d_e_img($args) {  
    ?>
    <input type="text" id="wisho_op_theme_d_e_img" class="wisho_op_theme_d_e_img" name="wisho_op_theme_d_e_img" value="<?php echo get_option('wisho_op_theme_d_e_img') ?>">
    <p class="description wisho_op_theme_d_e_img"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_d_e_img_mobi($args) {  
    ?>
    <input type="text" id="wisho_op_theme_d_e_img_mobi" class="wisho_op_theme_d_e_img_mobi" name="wisho_op_theme_d_e_img_mobi" value="<?php echo get_option('wisho_op_theme_d_e_img_mobi') ?>">
    <p class="description wisho_op_theme_d_e_img_mobi"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  


function wisho_op_theme_option_last_pub($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub" class="wisho_op_theme_option_last_pub" name="wisho_op_theme_option_last_pub" value="<?php echo get_option('wisho_op_theme_option_last_pub') ?>">
    <p class="description wisho_op_theme_option_last_pub"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_option_30_link($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_30_link" class="wisho_op_theme_option_30_link" name="wisho_op_theme_option_30_link" value="<?php echo get_option('wisho_op_theme_option_30_link') ?>">
    <p class="description wisho_op_theme_option_30_link"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_option_30_link_replay($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_30_link_replay" class="wisho_op_theme_option_30_link_replay" name="wisho_op_theme_option_30_link_replay" value="<?php echo get_option('wisho_op_theme_option_30_link_replay') ?>">
    <p class="description wisho_op_theme_option_30_link_replay"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_on_demand_q($args) {  
    ?>
    <input type="text" id="wisho_op_theme_on_demand_q" class="wisho_op_theme_on_demand_q" name="wisho_op_theme_on_demand_q" value="<?php echo get_option('wisho_op_theme_on_demand_q') ?>">
    <p class="description wisho_op_theme_on_demand_q"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_on_demand_a($args) {  
    ?>
    <input type="text" id="wisho_op_theme_on_demand_a" class="wisho_op_theme_on_demand_a" name="wisho_op_theme_on_demand_a" value="<?php echo get_option('wisho_op_theme_on_demand_a') ?>">
    <p class="description wisho_op_theme_on_demand_a"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_videolezioni_link($args) {?><input type="text" id="wisho_op_theme_videolezioni_link" class="wisho_op_theme_videolezioni_link" name="wisho_op_theme_videolezioni_link" value="<?php echo get_option('wisho_op_theme_videolezioni_link') ?>"> <p class="description wisho_op_theme_videolezioni_link"> <?php echo $args[0] ?> </p>   <?php }
function wisho_op_theme_casi_clinici_link($args) {?><input type="text" id="wisho_op_theme_casi_clinici_link" class="wisho_op_theme_casi_clinici_link" name="wisho_op_theme_casi_clinici_link" value="<?php echo get_option('wisho_op_theme_casi_clinici_link') ?>"> <p class="description wisho_op_theme_casi_clinici_link"> <?php echo $args[0] ?> </p>   <?php }
function wisho_op_theme_approfondimenti_link($args) {?><input type="text" id="wisho_op_theme_approfondimenti_link" class="wisho_op_theme_approfondimenti_link" name="wisho_op_theme_approfondimenti_link" value="<?php echo get_option('wisho_op_theme_approfondimenti_link') ?>"> <p class="description wisho_op_theme_approfondimenti_link"> <?php echo $args[0] ?> </p>   <?php }
function wisho_op_theme_slidekit_link($args) {?><input type="text" id="wisho_op_theme_slidekit_link" class="wisho_op_theme_slidekit_link" name="wisho_op_theme_slidekit_link" value="<?php echo get_option('wisho_op_theme_slidekit_link') ?>"> <p class="description wisho_op_theme_slidekit_link"> <?php echo $args[0] ?> </p>   <?php }
function wisho_op_theme_podcast_link($args) {?><input type="text" id="wisho_op_theme_podcast_link" class="wisho_op_theme_podcast_link" name="wisho_op_theme_podcast_link" value="<?php echo get_option('wisho_op_theme_podcast_link') ?>"> <p class="description wisho_op_theme_podcast_link"> <?php echo $args[0] ?> </p>   <?php }
function wisho_op_theme_webinar_link($args) {?><input type="text" id="wisho_op_theme_webinar_link" class="wisho_op_theme_webinar_link" name="wisho_op_theme_webinar_link" value="<?php echo get_option('wisho_op_theme_webinar_link') ?>"> <p class="description wisho_op_theme_webinar_link"> <?php echo $args[0] ?> </p>   <?php }

function wisho_op_theme_option_last_pub_casi_clinici($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_casi_clinici" class="wisho_op_theme_option_last_pub_casi_clinici" name="wisho_op_theme_option_last_pub_casi_clinici" value="<?php echo get_option('wisho_op_theme_option_last_pub_casi_clinici') ?>">
    <p class="description wisho_op_theme_option_last_pub_casi_clinici"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_option_last_pub_videolezioni($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_videolezioni" class="wisho_op_theme_option_last_pub_videolezioni" name="wisho_op_theme_option_last_pub_videolezioni" value="<?php echo get_option('wisho_op_theme_option_last_pub_videolezioni') ?>">
    <p class="description wisho_op_theme_option_last_pub_videolezioni"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_option_last_pub_atlante($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_atlante" class="wisho_op_theme_option_last_pub_atlante" name="wisho_op_theme_option_last_pub_atlante" value="<?php echo get_option('wisho_op_theme_option_last_pub_atlante') ?>">
    <p class="description wisho_op_theme_option_last_pub_atlante"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_option_last_pub_atlante_img($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_atlante_img" class="wisho_op_theme_option_last_pub_atlante_img" name="wisho_op_theme_option_last_pub_atlante_img" value="<?php echo get_option('wisho_op_theme_option_last_pub_atlante_img') ?>">
    <p class="description wisho_op_theme_option_last_pub_atlante_img"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_option_last_pub_atlante_img_link($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_atlante_img_link" class="wisho_op_theme_option_last_pub_atlante_img_link" name="wisho_op_theme_option_last_pub_atlante_img_link" value="<?php echo get_option('wisho_op_theme_option_last_pub_atlante_img_link') ?>">
    <p class="description wisho_op_theme_option_last_pub_atlante_img_link"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_option_last_pub_slidekit($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_slidekit" class="wisho_op_theme_option_last_pub_slidekit" name="wisho_op_theme_option_last_pub_slidekit" value="<?php echo get_option('wisho_op_theme_option_last_pub_slidekit') ?>">
    <p class="description wisho_op_theme_option_last_pub_slidekit"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_option_last_pub_update($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub_update" class="wisho_op_theme_option_last_pub_update" name="wisho_op_theme_option_last_pub_update" value="<?php echo get_option('wisho_op_theme_option_last_pub_update') ?>">
    <p class="description wisho_op_theme_option_last_pub_update"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 
function wisho_op_theme_option_last_pub__podcast($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_last_pub__podcast" class="wisho_op_theme_option_last_pub__podcast" name="wisho_op_theme_option_last_pub__podcast" value="<?php echo get_option('wisho_op_theme_option_last_pub__podcast') ?>">
    <p class="description wisho_op_theme_option_last_pub__podcast"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_option_interactive_last_pub($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_interactive_last_pub" class="wisho_op_theme_option_interactive_last_pub" name="wisho_op_theme_option_interactive_last_pub" value="<?php echo get_option('wisho_op_theme_option_interactive_last_pub') ?>">
    <p class="description wisho_op_theme_option_interactive_last_pub"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_option_interactive_last_pub_hl($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_interactive_last_pub_hl" class="wisho_op_theme_option_interactive_last_pub_hl" name="wisho_op_theme_option_interactive_last_pub_hl" value="<?php echo get_option('wisho_op_theme_option_interactive_last_pub_hl') ?>">
    <p class="description wisho_op_theme_option_interactive_last_pub_hl"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback 

function wisho_op_theme_option_img_cat($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_img_cat" class="wisho_op_theme_option_img_cat" name="wisho_op_theme_option_img_cat" value="<?php echo get_option('wisho_op_theme_option_img_cat') ?>">
    <p class="description wisho_op_theme_option_img_cat"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  
function wisho_op_theme_option_img_bg($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_img_bg" class="wisho_op_theme_option_img_bg" name="wisho_op_theme_option_img_bg" value="<?php echo get_option('wisho_op_theme_option_img_bg') ?>">
    <p class="description wisho_op_theme_option_img_bg"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_option_1_1_callback($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_1" class="wisho_op_theme_option_1" name="wisho_op_theme_option_1_1" value="<?php echo get_option('wisho_op_theme_option_1_1') ?>">
    <p class="description wisho_op_theme_option_1"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

