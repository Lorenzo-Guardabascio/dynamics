<?php

    function event_booking_add_meta_box($meta_box)
    {
        if (!is_array($meta_box)) {
            return false;
        }

        $callback = function($post,$meta_box){
        
            event_booking_create_meta_box( $post, $meta_box["args"] );
        };

        add_meta_box($meta_box['id'], $meta_box['title'], $callback, $meta_box['page'], $meta_box['context'], $meta_box['priority'], $meta_box);
    }


 function event_booking_create_meta_box($post, $meta_box)
    {
        // set up for fallback to old way of doing things
        $wp_version = get_bloginfo('version');

        if (!is_array($meta_box)) {
            return false;
        }

        echo '<div class="event_booking-metabox">';

        if (isset($meta_box['description']) && $meta_box['description'] != '') {
            echo '<p class="event_booking-metabox-description">' . $meta_box['description'] . '</p>';
        }

        wp_nonce_field(basename(__FILE__), 'event_booking_meta_box_nonce');

        foreach ($meta_box['fields'] as $field) {
            // Get current post meta data
            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '<div class="event_booking-metabox-field">';

            if ($field['type'] == 'checkbox') {
                echo '<div class="event_booking-metabox-left"><p>' . $field['name'] . '</p></div>';
            } else {
                echo '<div class="event_booking-metabox-left"><label for="' . $field['id'] . '">' . $field['name'] . '</label></div>';
            }

            echo '<div class="event_booking-metabox-right">';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['std']) . '" size="30" />';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'time':
                    echo '<input type="time" name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['std']) . '" size="30" />';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'date-time':
                    echo '<input type="datetime-local" name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['std']) . '" size="30" />';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'date':
                    echo '<input type="date" name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['std']) . '" size="30" />';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'textarea':
                    echo '<textarea name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '" rows="8" style="width:100%">' . ($meta ? $meta : $field['std']) . '</textarea>';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'file': ?>
				<script type="text/javascript">
				//<![CDATA[
					jQuery(function($) {
						var frame;

						$('#<?php echo $field['id']; ?>_button').on('click', function(e) {
							e.preventDefault();

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
									text: '<?php _e("Insert", "event_booking");?>',

									click: function() {
										var models = frame.state().get('selection'),
											url = models.first().attributes.url;

										$('#<?php echo $field['id']; ?>').val( url );

										frame.close();
									}
								}
							});
						});
					});
					//]]>
				</script>
			<?php
echo '<input type="text" name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['std']) . '" size="30" class="file" /> <input type="button" class="button" name="' . $field['id'] . '_button" id="' . $field['id'] . '_button" value="Browse" />';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'images':  ?>
				<script type="text/javascript">
					//<![CDATA[
					jQuery(function($) {
						var frame,
						    images = '<?php echo get_post_meta($post->ID, '_event_booking_image_ids', true); ?>',
						    selection = loadImages(images);

						$('#event_booking_images_upload').on('click', function(e) {
							e.preventDefault();

							// Set options for 1st frame render
							var options = {
								title: '<?php _e("Create Featured Gallery", "event_booking");?>',
								state: 'gallery-edit',
								frame: 'post',
								selection: selection
							};

							// Check if frame or gallery already exist
							if( frame || selection ) {
								options['title'] = '<?php _e("Edit Featured Gallery", "event_booking");?>';
							}

							frame = wp.media(options).open();

							// Tweak views
							frame.menu.get('view').unset('cancel');
							frame.menu.get('view').unset('separateCancel');
							frame.menu.get('view').get('gallery-edit').el.innerHTML = '<?php _e("Edit Featured Gallery", "event_booking");?>';
							frame.content.get('view').sidebar.unset('gallery'); // Hide Gallery Settings in sidebar

							// When we are editing a gallery
							overrideGalleryInsert();
							frame.on( 'toolbar:render:gallery-edit', function() {
	    						overrideGalleryInsert();
							});

							frame.on( 'content:render:browse', function( browser ) {
							    if ( !browser ) return;
							    // Hide Gallery Settings in sidebar
							    browser.sidebar.on('ready', function(){
							        browser.sidebar.unset('gallery');
							    });
							    // Hide filter/search as they don't work
							    browser.toolbar.on('ready', function(){
	    						    if(browser.toolbar.controller._state == 'gallery-library'){
	    						        browser.toolbar.$el.hide();
	    						    }
							    });
							});

							// All images removed
							frame.state().get('library').on( 'remove', function() {
							    var models = frame.state().get('library');
								if(models.length == 0){
								    selection = false;
	    							$.post(ajaxurl, { ids: '', action: 'event_booking_save_images', post_id: event_booking_ajax.post_id, nonce: event_booking_ajax.nonce });
								}
							});

							// Override insert button
							function overrideGalleryInsert() {
	    						frame.toolbar.get('view').set({
									insert: {
										style: 'primary',
										text: '<?php _e("Save Featured Gallery", "event_booking");?>',

										click: function() {
											var models = frame.state().get('library'),
											    ids = '';

											models.each( function( attachment ) {
											    ids += attachment.id + ','
											});

											this.el.innerHTML = '<?php _e("Saving...", "event_booking");?>';

											$.ajax({
												type: 'POST',
												url: ajaxurl,
												data: {
													ids: ids,
													action: 'event_booking_save_images',
													post_id: event_booking_ajax.post_id,
													nonce: event_booking_ajax.nonce
												},
												success: function(){
	    											selection = loadImages(ids);
	    											$('#_event_booking_image_ids').val( ids );
	    											frame.close();
												},
												dataType: 'html'
											}).done( function( data ) {
												$('.event_booking-gallery-thumbs').html( data );
											});
										}
									}
								});
							}
						});

						// Load images
						function loadImages(images) {
							if( images ){
							    var shortcode = new wp.shortcode({
	            					tag:    'gallery',
	            					attrs:   { ids: images },
	            					type:   'single'
	            				});

							    var attachments = wp.media.gallery.attachments( shortcode );

	            				var selection = new wp.media.model.Selection( attachments.models, {
	            					props:    attachments.props.toJSON(),
	            					multiple: true
	            				});

	            				selection.gallery = attachments.gallery;

	            				// Fetch the query's attachments, and then break ties from the
	            				// query to allow for sorting.
	            				selection.more().done( function() {
	            					// Break ties with the query.
	            					selection.props.set({ query: false });
	            					selection.unmirror();
	            					selection.props.unset('orderby');
	            				});

	            				return selection;
							}

							return false;
						}

					});
					//]]>
				</script>
			<?php
// SPECIAL CASE:
                    // std controls button text; unique meta key for image uploads
                    $meta = get_post_meta($post->ID, '_event_booking_image_ids', true);
                    $thumbs_output = '';
                    $button_text = ($meta) ? __('Edit Gallery', 'event_booking') : $field['std'];
                    if ($meta) {
                        $field['std'] = __('Edit Gallery', 'event_booking');
                        $thumbs = explode(',', $meta);
                        $thumbs_output = '';
                        foreach ($thumbs as $thumb) {
                            $thumbs_output .= '<li>' . wp_get_attachment_image($thumb, array(32, 32)) . '</li>';
                        }
                    }

                    echo '<input type="hidden" name="event_booking_meta[_event_booking_image_ids]" id="_event_booking_image_ids" value="' . ($meta ? $meta : 'false') . '" />';
                    echo '<input type="button" class="button" name="' . $field['id'] . '" id="event_booking_images_upload" value="' . $button_text . '" />';
                    echo '<p class="howto event_booking-metabox-gallery-howto">' . $field['desc'] . '</p>';
                    echo '<ul class="event_booking-gallery-thumbs">' . $thumbs_output . '</ul>';
                    break;

                case 'select':
                    echo '<select name="event_booking_meta[' . $field['id'] . ']" id="' . $field['id'] . '">';
                    foreach ($field['options'] as $key => $option) {
                        echo '<option value="' . $key . '"';
                        if ($meta) {
                            if ($meta == $key) {
                                echo ' selected="selected"';
                            }

                        } else {
                            if ($field['std'] == $key) {
                                echo ' selected="selected"';
                            }

                        }
                        echo '>' . $option . '</option>';
                    }
                    echo '</select>';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'radio':
                    foreach ($field['options'] as $key => $option) {
                        echo '<label class="radio-label"><input type="radio" name="event_booking_meta[' . $field['id'] . ']" value="' . $key . '" class="radio"';
                        if ($meta) {
                            if ($meta == $key) {
                                echo ' checked="checked"';
                            }

                        } else {
                            if ($field['std'] == $key) {
                                echo ' checked="checked"';
                            }

                        }
                        echo ' /> ' . $option . '</label> ';
                    }
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'color':
                    if ($meta) {
                        $val = ' value="' . $meta . '"';
                    } else {
                        $val = '';
                    }
                    echo '<input type="color" id="' . $field['id'] . '_cp" class="event_booking-color-picker" name="event_booking_meta[' . $field['id'] . ']"' . $val . ' data-default-color="' . $field['std'] . '" />';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;

                case 'checkbox':
                    $val = '';
                    if ($meta) {
                        if ($meta == 'on') {
                            $val = ' checked="checked"';
                        }

                    } else {
                        if ($field['std'] == 'on') {
                            $val = ' checked="checked"';
                        }

                    }

                    echo '<input type="hidden" name="event_booking_meta[' . $field['id'] . ']" value="off" />';
                    echo '<input type="checkbox" id="' . $field['id'] . '" name="event_booking_meta[' . $field['id'] . ']" value="on"' . $val . ' /> ';
                    echo '<label for="' . $field['id'] . '">' . $field['name'] . '</label>';
                    echo '<p class="howto">' . $field['desc'] . '</p>';
                    break;
                case 'like':  
                    $submissions= get_post_meta($post->ID, 'event_booking_like', false); 
                    echo '<h3 class="howto">Totale iscritti:' . count($submissions) . '</h3>';  
                    foreach($submissions as $useridlikes){
                        echo '<p class="howto">' . get_userdata($useridlikes)->user_email . '</p>';    
                    }
                    //echo '<p class="howto">' . get_userdata($useridlikes)->user_email . '</p>';    
                    //add_filter('user_row_actions', 'send_verification_email_link', 10, 2);
                    //echo "<a class='send_verification_email' href='" . admin_url( "users.php?action=send_verification_email&amp;user_id=" . $user_object->ID ) . "'>" . __( 'Send Verification Email' ) . "</a>";
                    //echo "<a class='send_verification_email' href='" . admin_url( "users.php?action=send_verification_email&amp;user_id=" . $user_object->ID ) . "'>" . __( 'Send Verification Email' ) . "</a>";
                    break;
            }
            echo '</div><!--END .event_booking-metabox-right-->';

            echo '</div>';
        }

        echo '</div>';
    }

/**
 * Save custom Meta Box
 *
 * @param int $post_id The post ID
 */
function event_booking_save_meta_box($post_id)
    {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!isset($_POST['event_booking_meta']) || !isset($_POST['event_booking_meta_box_nonce']) || !wp_verify_nonce($_POST['event_booking_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }

        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }

        }

        foreach ($_POST['event_booking_meta'] as $key => $val) {
            update_post_meta($post_id, $key, stripslashes(htmlspecialchars($val)));
        }

    }
add_action( 'save_post', 'event_booking_save_meta_box' );

/**
 * Save image ids
 */
     function event_booking_save_images()
    {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!isset($_POST['ids']) || !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'event_booking-ajax')) {
            return;
        }

        if (!current_user_can('edit_posts')) {
            return;
        }

        $ids = strip_tags(rtrim($_POST['ids'], ','));
        update_post_meta($_POST['post_id'], '_event_booking_image_ids', $ids);

        // update thumbs
        $thumbs = explode(',', $ids);
        $thumbs_output = '';
        foreach ($thumbs as $thumb) {
            $thumbs_output .= '<li>' . wp_get_attachment_image($thumb, array(32, 32)) . '</li>';
        }

        echo $thumbs_output;

        die();
    }
add_action('wp_ajax_event_booking_save_images', 'event_booking_save_images');

/**
 * Load scripts needed for metabox fields
 *
 * @since  1.1
 */
     function event_booking_metabox_scripts()
    {
        global $post;

        wp_enqueue_script('media-upload');

        if (isset($post)) {
            wp_localize_script('jquery', 'event_booking_ajax', array(
                'post_id' => $post->ID,
                'nonce' => wp_create_nonce('event_booking-ajax'),
            ));
        }
    }
add_action('admin_enqueue_scripts', 'event_booking_metabox_scripts');

?>
