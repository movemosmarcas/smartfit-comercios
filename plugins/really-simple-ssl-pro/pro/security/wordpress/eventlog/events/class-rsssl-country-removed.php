<?php
/**
 * The 'Rsssl_Country_Removed' class is a part of the 'Really Simple SSL pro' plugin,
 * which is developed by the company 'Really Simple Plugins'.
 * This class handles the removal of a country in the Rsssl_Event_Log_Handler application.
 *
 * @package     Really_Simple_SSL\Security\Wordpress\EventLog\Events  // The categorization of this class.
 */

namespace Really_Simple_SSL\Security\WordPress\EventLog\Events;

use Really_Simple_SSL\Security\WordPress\EventLog\Rsssl_Event_Log_Handler;

/**
 * Class Rsssl_Country_Removed
 *
 * This class handles the removal of a country in the Rsssl_Event_Log_Handler application.
 *
 * @package   Rsssl_Country_Removed
 * @category  Handlers
 */
class Rsssl_Country_Removed extends Rsssl_Event_Log_Handler {
	/**
	 * Class constructor.
	 *
	 * Initializes the object with a value of 1000.
	 */
	public function __construct() {
		parent::__construct( 2011 );
	}

	/**
	 * Handles an event by logging it with the given data.
	 *
	 * This method instantiates the object and retrieves the event based on the event code.
	 * Then, it logs the event with the provided data.
	 *
	 * @param array $data An associative array of data related to the event.
	 *
	 * @return void
	 */
	public static function handle_event( array $data = array() ): void {
		$_self = new self();
		$event = $_self->get_event( $_self->event_code );

		// we log the event with the data.
		$_self->log_event( $event, $event_data );
	}

		/**
		 * Sanitizes an array of data.
		 *
		 * @param array $data The data to sanitize.
		 *
		 * @return array The sanitized data.
		 */
	protected function sanitize( array $data ): array {
		// based on the value if the data is a string we sanitize it.
		foreach ( $data as $key => $value ) {
			if ( is_string( $value ) ) {
				$data[ $key ] = sanitize_text_field( $value );
			}
			if ( isset( $data['ip_address'] ) ) {
				$data['ip_address'] = filter_var( $data['ip_address'], FILTER_VALIDATE_IP );
			}
		}
		// Now here you can add more sanitization for the data for custom values.

		// Return the sanitized data.
		return $data;
	}

		/**
		 * Sets a translated message using sprintf function.
		 *
		 * @param array  $args An array of arguments used in the message.
		 * @param string $message The message to be translated and formatted.
		 *
		 * @return string The formatted and translated message.
		 */
	protected function set_message( array $args, string $message ): string {
		return sprintf( __( $message, 'really-simple-ssl' ), $args['user_login'] );
	}
}