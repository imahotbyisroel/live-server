<?php
/**
 * ZoDonations Template Hooks
 *
 * Action/filter hooks used for ZoDonation functions/templates.
 *
 * @author     Chinh Duong Manh
 * @category   Core
 * @package    ZoDonation/Templates
 * @version    1.0.x
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/* Donate Button  */
//add_filter('zodonations_form', 'spcharityplus_zodonations_form');
if(!function_exists('spcharityplus_zodonations_form')){
    function spcharityplus_zodonations_form(){
        return get_template_directory() . '/zodonations/views/zodonations.form.php';
    }
}


