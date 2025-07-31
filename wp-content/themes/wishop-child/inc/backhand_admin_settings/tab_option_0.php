<?php

function sandbox_initialize_theme_options_tab_0() {  
    add_settings_section(  
        'page_0_section',         // ID used to identify this section and with which to register options  
        'Global',                  // Title to be displayed on the administration page  
        'page_0_section_callback', // Callback used to render the description of the section  
        'theme-setting-slug-0'                           // Page on which to add this section of options  
    ); 

    add_settings_field (   
        'wisho_op_theme_link_to_redirect',  // ID -- ID used to identify the field throughout the theme  
        'Link per il redirect del pulsante Accedi/Registrati', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_link_to_redirect', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-0', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_0_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Lasciare vuoto per reindrizzare alla pagina corrente', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_link_account',  // ID -- ID used to identify the field throughout the theme  
        'Link della pagina Account ', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_link_account', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-0', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_0_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            '', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_google',  // ID -- ID used to identify the field throughout the theme  
        'Script google', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_google', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-0', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_0_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Inserire tutto il codice google analytics compreso dei tag &lt;script&gt;', // DESCRIPTION -- The description of the field.
        )  
    );
    add_settings_field (   
        'wisho_op_theme_pixel',  // ID -- ID used to identify the field throughout the theme  
        'Script vari', // LABEL -- The label to the left of the option interface element  
        'wisho_op_theme_pixel', // CALLBACK FUNCTION -- The name of the function responsible for rendering the option interface  
        'theme-setting-slug-0', // MENU PAGE SLUG -- The page on which this option will be displayed  
        'page_0_section', // SECTION ID -- The name of the section to which this field belongs  
        array( // The array of arguments to pass to the callback. In this case, just a description.  
            'Inserire tutto il codice dei vari pixel compreso dei tag &lt;script&gt;', // DESCRIPTION -- The description of the field.
        )  
    );

    
    $variables_0=array(
        'wisho_op_theme_link_to_redirect' ,
        'wisho_op_theme_link_account' ,
        'wisho_op_theme_google' ,
        'wisho_op_theme_pixel' ,

    );

    foreach($variables_0 as $variable_0){
        register_setting('setting-group-0',$variable_0);
    }
} // function sandbox_initialize_theme_options

add_action('admin_init', 'sandbox_initialize_theme_options_tab_0');


function page_0_section_callback() {  
    echo '<p>Impostazioni globali</p>';  
} // function page_1_section_callback

/* ----------------------------------------------------------------------------- */
/* Field Callbacks */
/* ----------------------------------------------------------------------------- */ 


function wisho_op_theme_google($args) {  
    ?>
    <textarea type="textarea" id="wisho_op_theme_google" class="wisho_op_theme_google" name="wisho_op_theme_google" rows="5" cols="50"><?php echo get_option('wisho_op_theme_google') ?></textarea>
    <p class="description wisho_op_theme_google"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  
function wisho_op_theme_pixel($args) {  
    ?>
    <textarea type="textarea" id="wisho_op_theme_pixel" class="wisho_op_theme_pixel" name="wisho_op_theme_pixel" rows="5" cols="50"><?php echo get_option('wisho_op_theme_pixel') ?></textarea>
    <p class="description wisho_op_theme_pixel"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  
function wisho_op_theme_link_to_redirect($args) {  
    ?>
    <input type="text" id="wisho_op_theme_link_to_redirect" class="wisho_op_theme_link_to_redirect" name="wisho_op_theme_link_to_redirect" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_link_to_redirect') ?>">
    <p class="description wisho_op_theme_link_to_redirect"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  

function wisho_op_theme_link_account($args) {  
    ?>
    <input type="text" id="wisho_op_theme_link_account" class="wisho_op_theme_link_account" name="wisho_op_theme_link_account" rows="5" cols="50" value="<?php echo get_option('wisho_op_theme_link_account') ?>">
    <p class="description wisho_op_theme_link_account"> <?php echo $args[0] ?> </p>
    <?php      
} // end sandbox_toggle_header_callback  