<?php
/**
 * Created by PhpStorm.
 * User: nfigueira
 * Date: 14/04/2017
 * Time: 11:51
 */
class dsButton {
	public function __construct() {
		
		//Add shortcode
		add_shortcode('direct-stripe', array( $this, 'direct_stripe_buttons_func'));
		//Process button
		add_action( 'wp_ajax_ds_process_button',  array( $this, 'direct_stripe_process_button') );
		add_action( 'wp_ajax_nopriv_ds_process_button',  array( $this, 'direct_stripe_process_button') );
	}
	
	/**
	 * Shortcode creation and final display
	 *
	 * @since 2.0.0
	 */
	public function direct_stripe_buttons_func( $atts ) {
		//Set up data
		include( DSCORE_PATH . 'includes/ds-data.php');
		//Enqueue JS and send parameters
		wp_localize_script('direct-stripe-handler-script', $instance, $params);
		wp_enqueue_script('direct-stripe-checkout-script');
		wp_enqueue_script('direct-stripe-handler-script');
		
		ob_start();
		include( DSCORE_PATH . 'includes/ds-button.php');
		include( DSCORE_PATH . 'includes/ds-answers.php');
		return ob_get_clean();
		
	}
	
	/**
	 * Heart of the action; button triggered
	 *
	 * @since 2.0.0
	 */
	function direct_stripe_process_button() {
		$type = isset($_POST['type']) ? $_POST['type'] : '';
		if( isset( $type ) && $type === 'payment' ) {
			include( DSCORE_PATH . 'process/ds_payment.php');
			wp_die();
		} elseif( isset( $type ) && $type === 'subscription' ) {
			include( DSCORE_PATH . 'process/ds_subscription.php');
			wp_die();
		} elseif( isset( $type ) && $type === 'donation' ) {
			$pre_amount = isset($_POST['type']) ? $_POST['type'] : '';
			include( DSCORE_PATH . 'process/ds_donation.php');
			wp_die();
		} else {
			wp_die( __('Button type argument was not recognized', 'direct-stripe') );
		}
	}
}
$dsButton = new dsButton;