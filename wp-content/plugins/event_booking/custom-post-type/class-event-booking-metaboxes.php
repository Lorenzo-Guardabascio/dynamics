<?php

/**
 * Create the Page meta boxes
 */


add_action('add_meta_boxes', 'event_booking_metabox_pages');
     function event_booking_metabox_pages()
    {
        $meta_box = array(
            'id' => 'event_booking-metabox-page-template-template-home',
            'title' => __('Subscription Settings', 'event_booking'),
            'description' =>'',
            'page' => ['event_booking'],
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(),
        );

        $meta_box['fields'] = array_merge( $meta_box['fields'],  event_booking_number_home_page_template() );

        event_booking_add_meta_box($meta_box);
    }
    add_action('add_meta_boxes', 'event_booking_subscription_info');
     function event_booking_subscription_info()
    {
        $meta_box = array(
            'id' => 'event_booking-subscription-info',
            'title' => __('Subscription info', 'event_booking'),
            'description' => '',
            'page' => ['event_booking'],
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(),
        );

        $meta_box['fields'] = array_merge( $meta_box['fields'],  event_booking_info() );


        event_booking_add_meta_box($meta_box);
    }

    function event_booking_info()
    {
        return array(

            array(
                'name' => __('Iscritti', 'event_booking'),
                'id' => '',
                'type' => 'like',
                'std' => '',
            ),

        );
    }

     function event_booking_number_home_page_template()
    {
        return array(

            array(
                'name' => __('Testo in header', 'event_booking'),
                'id' => '_event_booking_post_header',
                'type' => 'text',
                'std' => '',
            ),

            array(
                'name' => __('Data evento', 'event_booking'),
                'id' => 'event_booking_event_time',
                'type' => 'text',
                'std' => '',
            ),

            array(
                'name' => __('ora evento', 'event_booking'),
                'id' => 'event_booking_event_hour',
                'type' => 'text',
                'std' => '',
            ),

            array(
                'name' => __('Terminato', 'event_booking'),
                'id' => 'event_booking_event_end',
                'type' => 'checkbox',
                'std' => '',
            ),
            /*
            array(
                'name' => __('cf7 shortcode', 'event_booking'),
                'id' => 'event_booking_event_cf7',
                'type' => 'text',
                'std' => '',
            ),
            */
            array(
                'name' => __('Immagine Relatore', 'event_booking'),
                'id' => 'event_booking_event_image',
                'type' => 'file',
                'std' => '',
            ),
            /*
            array(
                'name' => __('Email Ogg Iscritti', 'event_booking'),
                'id' => 'event_booking_email_ogg',
                'type' => 'textarea',
                'std' => 'DyNAMICS > 30 Minuti con - Prenotazione incontro del [gg mese aaaa]',
            ),
            */
            /*
            array(
                'name' => __('Email Iscritti', 'event_booking'),
                'id' => 'event_booking_email_content',
                'type' => 'textarea',
                'std' => 'Hai prenotato la tua partecipazione all\'incontro con [Nome Cognome esperto] che si terrà il giorno [gg mese aaaa] alle ore [hh:mm].

                Il giorno prima dell’incontro, riceverai via e-mail le istruzioni per l’accesso alla piattaforma online.',
            ),
            */

        );
    }

    function add_master_meta()
    {
        return array(
            array(
                'name' => __('Edizione', 'event_booking'),
                'desc' => __('Edizione', 'event_booking'),
                'id' => '_event_booking_ed',
                'type' => 'text',
                'std' => '',
            ),
            array(
                'name' => __('Terminato', 'event_booking'),
                'desc' => __('Terminato', 'event_booking'),
                'id' => '_event_booking_status',
                'type' => 'checkbox',
                'std' => '',
            ),
            array(
                'name' => __('Tipologia', 'event_booking'),
                'desc' => __('Tipologia', 'event_booking'),
                'id' => '_event_booking_type',
                'type' => 'select',
                'options' => array(
                    'Master lab',
                    'Openday',
                    'Webinar',

                ),
                'std' => 'Master lab',
            ),
            array(
                'name' => __('Desc', 'event_booking'),
                'desc' => __('Info sulle date', 'event_booking'),
                'id' => '_event_booking_date_desc',
                'type' => 'text',
                'std' => '',
            ),

        );
    }

     function add_bbb_meta()
    {
        return array(
            array(
                'name' => __('Desc', 'event_booking'),
                'desc' => __('Info sulle date', 'event_booking'),
                'id' => '_event_booking_bbb_date_desc',
                'type' => 'text',
                'std' => '',
            ),
            array(
                'name' => __('Durata', 'event_booking'),
                'desc' => __('Tempo minimo di partecipazione formato 1:30:00 (1 ora, 30 minuti e 00 secondi )', 'event_booking'),
                'id' => '_event_booking_bbb_min_time_desc',
                'type' => 'text',
                'std' => '',
            ),
        );
    }

/**
 * estrapolazione dei dati :
 * 	public function get_post_time_by_name($post_name, $output = OBJECT) {
 *		global $wpdb;
 *			$post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='bbb-room'", $post_name ));
 *			$min_time = htmlspecialchars_decode(get_post_meta( $post, '_understrap_bbb_min_time_desc', true ));
 *			if ( $post && $min_time !='' ){
 *				//var_dump();
 *				$min_time = htmlspecialchars_decode(get_post_meta( $post, '_understrap_bbb_min_time_desc', true ));
 *				$date = strtotime($min_time);
 *				
 *				return date('H:i', $date);;
 *	}
 */