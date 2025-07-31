<?php

//Vimeo link
//add input field
add_action('admin_init', 'de_meta_codes_init_func');

function de_meta_codes_init_func()
{
    //$id, $title, $callback, $page, $context, $priority, $callback_args
    add_meta_box('de_meta_info', 'Difgital event', 'de_meta_metabox_func', 'digital_event');
}

function de_meta_metabox_func()
{
    global $post;

    $de_meta = get_post_meta($post->ID, 'de_meta', true);
    ?>
<div class="input_fields_wrap_de_meta">
    <a class="add_field_button de_meta button-secondary">Aggiungi blocco</a>
    <?php
if (isset($de_meta) && is_array($de_meta)) {
        $i = 1;
        $output = '';
        $havecheck = 'checked="checked" ';

        foreach ($de_meta as $text) {
            $output = '<div class="understrap-metabox-field">
            <div class="understrap-metabox-left">
                <p>Titolo e link del de_meta</p>
            </div>
            <div class="understrap-metabox-right">
                <label for="de_meta['.$i.'][is_title]"> È un titolo sezione</label><br>
                <input type="checkbox" name="de_meta['.$i.'][is_title]" id="de_meta['.$i.'][is_title]" value="on"  '.   ( $text['is_title'] == 'on' ?  $havecheck : '') .' size="30">
            </div>
            <div class="understrap-metabox-right">
            <label for="de_meta['.$i.'][title]"> Titolo </label><br>
                <input type="text" name="de_meta['.$i.'][title]" placeholder="Titolo" id="de_meta['.$i.'][title]" value="'. $text['title'] .'" size="30">
            </div>
            <div class="understrap-metabox-right">
            <label for="de_meta['.$i.'][autor]"> Autore</label><br>
                <input type="text" name="de_meta['.$i.'][autor]" placeholder="Autore" id="de_meta['.$i.'][autor]" value="'. $text['autor'] .'" size="30">
            </div>
            <div class="understrap-metabox-right">
            <label for="de_meta['.$i.'][webcast]"> Link webcast</label><br>
                <input type="text" name="de_meta['.$i.'][webcast]" placeholder="link" id="de_meta['.$i.'][webcast]" value="'. $text['webcast'] .'" size="30">
                <input type="button" class="button search-webcast" name="webcast['.$i.']" id="webcast'.$i.'" value="Browse"  />
            </div>
            <div class="understrap-metabox-right">
                <label for="de_meta['.$i.'][diapo]"> Link file diapositiva</label><br>
                <input type="text" name="de_meta['.$i.'][diapo]" id="de_meta['.$i.'][diapo]" value="'. $text['diapo'] .'" size="30">
                <input type="button" class="button search-diapo" name="de_meta['.$i.'][diapo]" id="diapo'.$i.'" value="Browse"  />
            </div>';

            if ($i !== 1 && $i > 1) {
                $output .= '<a href="#" class="remove_field button-primary">Rimuovi</a><hr>';
            } else {
                $output .= '<hr></div>';
            }

            echo $output;
            $i++;
        }

    } else {
        echo '
        <div class="understrap-metabox-field">
            <div class="understrap-metabox-left">
                <p>Titolo e link del de_meta</p>
            </div>
            <div class="understrap-metabox-right">
                <label for="de_meta[1][is_title]"> È un titolo sezione</label><br>
                <input type="checkbox" name="de_meta[1][is_title]" id="de_meta[1][is_title]" value="on" size="30">
            </div>
            <div class="understrap-metabox-right">
            <label for="de_meta[1][title]"> Titolo </label><br>
                <input type="text" name="de_meta[1][title]" placeholder="Titolo" id="de_meta[1][title]" value="" size="30">
            </div>
            <div class="understrap-metabox-right">
            <label for="de_meta[1][autor]"> Autore</label><br>
                <input type="text" name="de_meta[1][autor]" placeholder="Autore" id="de_meta[1][autor]" value="" size="30">
            </div>
            <div class="understrap-metabox-right">
            <label for="de_meta[1][webcast]"> Link webcast</label><br>
                <input type="text" name="de_meta[1][webcast]" placeholder="link" id="de_meta[1][webcast]" value="" size="30">
                <input type="button" class="button search-webcast" name="webcast[1]" id="webcast1" value="Browse"  />
            </div>
            <div class="understrap-metabox-right">
                <label for="de_meta[1][diapo]"> Link file diapositiva</label><br>
                <input type="text" name="de_meta[1][diapo]" id="de_meta[1][diapo]" value="" size="30">
                <input type="button" class="button search-diapo" name="de_meta[1][diapo]" id="diapo1" value="Browse"  />
            </div>
            <hr>
        </div>';
        
    }
    ?>
</div>

    <?php
}

//save value
add_action('save_post', 'save_my_de_meta_post_meta');

function save_my_de_meta_post_meta($post_id)
{
    // Bail if we're doing an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post')) {
        return;
    }

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array(), // and those anchors can only have href attribute
        ),
    );
    // If any value present in input field, then update the post meta
    if (isset($_POST['de_meta'])) {
        // $post_id, $meta_key, $meta_value
        update_post_meta($post_id, 'de_meta', $_POST['de_meta']);
    }
}
add_action('admin_footer', 'my_admin_de_meta_footer_script');

function my_admin_de_meta_footer_script()
{
    global $post;

    $de_meta = get_post_meta($post->ID, 'de_meta', true);
    $x = 1;
    if (is_array($de_meta)) {
        $x = 0;
        foreach ($de_meta as $text) {
            $x++;
        }
    }
    if(  'digital_event' == $post->post_type ) {?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Dynamic input fields ( Add / Remove input fields )
        var max_fields      = 100; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap_de_meta"); //Fields wrapper
        var add_button      = $(".add_field_button.de_meta"); //Add button ID
        
        var x = <?php echo $x ?>; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                function de_meta_generate_append(x){
                var appended=`
                <div class="understrap-metabox-field">
                    <div class="understrap-metabox-left">
                        <p>Titolo e link del de_meta</p>
                    </div>
                    <div class="understrap-metabox-right">
                        <label for="de_meta[`+x+`][is_title]"> È un titolo sezione</label><br>
                        <input type="checkbox" name="de_meta[`+x+`][is_title]" id="de_meta[`+x+`][is_title]" value="on" size="30">
                    </div>
                    <div class="understrap-metabox-right">
                    <label for="de_meta[`+x+`][title]"> Titolo </label><br>
                        <input type="text" name="de_meta[`+x+`][title]" placeholder="Titolo" id="de_meta[`+x+`][title]" value="" size="30">
                    </div>
                    <div class="understrap-metabox-right">
                    <label for="de_meta[`+x+`][autor]"> Autore</label><br>
                        <input type="text" name="de_meta[`+x+`][autor]" placeholder="Autore" id="de_meta[`+x+`][autor]" value="" size="30">
                    </div>
                    <div class="understrap-metabox-right">
                    <label for="de_meta[`+x+`][webcast]"> Link webcast</label><br>
                        <input type="text" name="de_meta[`+x+`][webcast]" placeholder="link" id="de_meta[`+x+`][webcast]" value="" size="30">
                        <input type="button" class="button search-webcast" name="webcast[`+x+`]" id="webcast`+x+`" value="Browse"  />
                    </div>
                    <div class="understrap-metabox-right">
                        <label for="de_meta[`+x+`][diapo]"> Link file diapositiva</label><br>
                        <input type="text" name="de_meta[`+x+`][diapo]" id="de_meta[`+x+`][diapo]" value="" size="30">
                        <input type="button" class="button search-diapo" name="de_meta[`+x+`][diapo]" id="diapo`+x+`" value="Browse"  />
                    </div>
                        <a href="#" class="remove_field button-primary">Rimuovi</a>
                        <hr>
                    
                </div>
                    `;
                return appended

                }
                $(wrapper).append(de_meta_generate_append(x));
            }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
    jQuery(function($) {
        var frame;
        //diapo browse file
        $(document).on('click','.search-diapo', function(e) {
            var idf = $(this).attr('name').match(/\d+/);
            
            // Set options for 1st frame render
            var options = {
                state: 'insert',
                frame: 'post'
            };

            frame = wp.media(options).open();
            // Tweak views
            frame.menu.get('view').unset('gallery');
            frame.menu.get('view').unset('featured-image');
            frame.toolbar.get('view').set({
                insert: {
                    style: 'primary',
                    text: '<?php _e("Insert", "understrap"); ?>',

                    click: function() {
                        var models = frame.state().get('selection'),
                            url = models.first().attributes.url;
                        $('#de_meta\\['+idf+'\\]\\[diapo\\]').val( url );

                        frame.close();
                    }
                }
            });
        });
        $(document).on('click','.search-webcast', function(e) {
            var idf = $(this).attr('name').match(/\d+/);
            
            // Set options for 1st frame render
            var options = {
                state: 'insert',
                frame: 'post'
            };

            frame = wp.media(options).open();
            // Tweak views
            frame.menu.get('view').unset('gallery');
            frame.menu.get('view').unset('featured-image');
            frame.toolbar.get('view').set({
                insert: {
                    style: 'primary',
                    text: '<?php _e("Insert", "understrap"); ?>',

                    click: function() {
                        var models = frame.state().get('selection'),
                            url = models.first().attributes.url;
                        $('#de_meta\\['+idf+'\\]\\[webcast\\]').val( url );

                        frame.close();
                    }
                }
            });
        });
    });
    </script>
                <?php
    }
}

?>
