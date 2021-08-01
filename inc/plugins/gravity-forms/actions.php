<?php
    add_action('gform_after_submission', 'maximus_crisp_sync', 10, 2);
    function maximus_crisp_sync($entry, $form) {

        $maximus_form_values = array();

        foreach ( $form['fields'] as $field ) {
            $inputs = $field->get_entry_inputs();
            if ( is_array( $inputs ) ) {
                foreach ( $inputs as $input ) {
                    $value = rgar( $entry, (string) $input['id'] );
                    // do something with the value
                    array_push($maximus_form_values, $value);
                }
            } else {
                $value = rgar( $entry, (string) $field->id );
                // do something with the value
                array_push($maximus_form_values, $value);
            }
        }

        
    }
?>