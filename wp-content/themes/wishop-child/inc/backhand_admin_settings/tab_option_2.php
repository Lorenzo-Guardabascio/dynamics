<?php

function sandbox_initialize_theme_options_tab_2() {  
    add_settings_section(  
        'page_2_section',         // ID used to identify this section and with which to register options  
        'Pagine interne',                  // Title to be displayed on the administration page  
        'page_2_section_callback', // Callback used to render the description of the section  
        'theme-setting-slug-2'                           // Page on which to add this section of options  
    ); 

    add_settings_field (   
        'wisho_op_theme_lock_page',  // ID -- ID used to identify the field throughout the theme  
        'Blocco pagine interne', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_lock_page', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Blocco pagine Aree tematiche', // DESCRIPTION -- The description of the field.
        )  
    );

    add_settings_field (   
        'wisho_op_theme_dynamics_highlights',  // ID -- ID used to identify the field throughout the theme  
        'Blocco pagine interne', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_dynamics_highlights', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Slocco pagine dynamics highlights', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_header_background_sub_page',  // ID -- ID used to identify the field throughout the theme  
        'Sfondo header pagine interne', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_header_background_sub_page', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Inserire il link completo dell\'immagine di sfondo', // DESCRIPTION -- The description of the field.
        )  
    );

    add_settings_field (   
        'wisho_op_theme_background_sub_page',  // ID -- ID used to identify the field throughout the theme  
        'Sfondo aree tematiche pagine interne', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_background_sub_page', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Inserire il link completo dell\'immagine di sfondo', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_reference_email',  // ID -- ID used to identify the field throughout the theme  
        'Email di referenza per gli eventi "30 minuti con"', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_reference_email', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Email di referenza per gli eventi "30 minuti con"', // DESCRIPTION -- The description of the field.
        )  
    );

    add_settings_field (   
        'wisho_op_theme_reference_cf7',  // ID -- ID used to identify the field throughout the theme  
        'Shortcode per gli eventi "30 minuti con"', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_reference_cf7', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Shortcode di referenza per gli eventi "30 minuti con"', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_reference_email_question',  // ID -- ID used to identify the field throughout the theme  
        'Email di referenza per domande', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_reference_email_question', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Email di referenza per domande', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_reference_cf7_question',  // ID -- ID used to identify the field throughout the theme  
        'Shortcode per gli eventi Domande', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_reference_cf7_question', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Shortcode di referenza per le domande', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_option_2',  // ID -- ID used to identify the field throughout the theme  
        'Option 2', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_option_2_callback', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-2', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_2_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'This is the description of the option 2', // DESCRIPTION -- The description of the field.
        )  
    );
    $variables=array(
        'wisho_op_theme_option_2' ,
        'wisho_op_theme_reference_email' ,
        'wisho_op_theme_reference_cf7' ,
        'wisho_op_theme_reference_email_question' ,
        'wisho_op_theme_reference_cf7_question' ,
        'wisho_op_theme_header_background_sub_page' ,
        'wisho_op_theme_lock_page' ,
        'wisho_op_theme_dynamics_highlights' ,
        'wisho_op_theme_background_sub_page' ,

    );

    foreach($variables as $variable){
        register_setting('setting-group-2',$variable);
    }
} // function sandbox_initialize_theme_options

add_action('admin_init', 'sandbox_initialize_theme_options_tab_2');


function page_2_section_callback() {  
    echo '<p>Section Description here</p>';  
} // function page_1_section_callback

/* ----------------------------------------------------------------------------- */
/* Field Callbacks */
/* ----------------------------------------------------------------------------- */ 


function wisho_op_theme_header_background_sub_page($args) {  
    ?>
    <input type="text" id="wisho_op_theme_header_background_sub_page" class="wisho_op_theme_header_background_sub_page" name="wisho_op_theme_header_background_sub_page" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_header_background_sub_page') ?>">
    <p class="description wisho_op_theme_header_background_sub_page"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_lock_page($args) {  
    if (get_option('wisho_op_theme_lock_page') == 'on'){
        $cecked = 'checked';
    }
    ?>
    <input type="checkbox" id="wisho_op_theme_lock_page" class="wisho_op_theme_lock_page" name="wisho_op_theme_lock_page" rows="5" cols="50" value="on" <?php echo $cecked ?> >
    <p class="description wisho_op_theme_lock_page"> <?php echo $args[0] ?> </p>
    <?php
} // end sandbox_toggle_header_callback 

function wisho_op_theme_dynamics_highlights($args) {  
    ?>
    <input type="text" id="wisho_op_theme_dynamics_highlights" class="wisho_op_theme_dynamics_highlights" name="wisho_op_theme_dynamics_highlights" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_dynamics_highlights') ?>">
    <p class="description wisho_op_theme_dynamics_highlights"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  
function wisho_op_theme_background_sub_page($args) {  
    ?>
    <input type="text" id="wisho_op_theme_background_sub_page" class="wisho_op_theme_background_sub_page" name="wisho_op_theme_background_sub_page" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_background_sub_page') ?>">
    <p class="description wisho_op_theme_background_sub_page"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_reference_email($args) {  
    ?>
    <input type="text" id="wisho_op_theme_reference_email" class="wisho_op_theme_reference_email" name="wisho_op_theme_reference_email" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_reference_email') ?>">
    <p class="description wisho_op_theme_reference_email"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_reference_cf7_question($args) {  
    ?>
    <input type="text" id="wisho_op_theme_reference_cf7_question" class="wisho_op_theme_reference_cf7_question" name="wisho_op_theme_reference_cf7_question" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_reference_cf7_question') ?>">
    <p class="description wisho_op_theme_reference_cf7_question"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_reference_email_question($args) {  
    ?>
    <input type="text" id="wisho_op_theme_reference_email_question" class="wisho_op_theme_reference_email_question" name="wisho_op_theme_reference_email_question" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_reference_email_question') ?>">
    <p class="description wisho_op_theme_reference_email_question"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  
function wisho_op_theme_reference_cf7($args) {  
    ?>
    <input type="text" id="wisho_op_theme_reference_cf7" class="wisho_op_theme_reference_cf7" name="wisho_op_theme_reference_cf7" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_reference_cf7') ?>">
    <p class="description wisho_op_theme_reference_cf7"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_option_2_callback($args) {  
    ?>
    <input type="text" id="wisho_op_theme_option_2" class="wisho_op_theme_option_2" name="wisho_op_theme_option_2" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_option_2') ?>">
    <p class="description wisho_op_theme_option_2"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  