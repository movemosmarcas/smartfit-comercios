<?php
/**
 * The 'Rsssl_Ip_Trusted_Event' class is a part of the 'Really Simple SSL pro' plugin,
 * which is developed by the company 'Really Simple Plugins'.
 * This class is responsible for handling the Rsssl_Ip_Trusted_Event event
 *
 * @package     REALLY_SIMPLE_SSL\Security\Wordpress\Eventlog\Events  // The categorization of this class.
 */

namespace REALLY_SIMPLE_SSL\Security\WordPress\EventLog\Events;

use REALLY_SIMPLE_SSL\Security\WordPress\EventLog\Rsssl_Event_Log_Handler;
use REALLY_SIMPLE_SSL\Security\WordPress\Limitlogin\Rsssl_Geo_Location;

/**
 * The 'Rsssl_Ip_Trusted_Event' class is a part of the 'Really Simple SSL pro' plugin,
 * which is developed by the company 'Really Simple Plugins'.
 * This class is responsible for handling the Rsssl_Ip_Trusted_Event event
 * with the event code of 2040.
 *
 * @package     REALLY_SIMPLE_SSL\Security\Wordpress\Eventlog\Events  // The categorization of this class.
 */
class Rsssl_Ip_Trusted_Event extends Rsssl_Event_Log_Handler {
	/**
	 * Class constructor.
	 *
	 * Initializes the object with a value of 1000.
	 */
	public function __construct() {
		parent::__construct( 2040 );
	}

	/**
	 * Handle an event.
	 *
	 * This method creates a new instance of the current class ($_self) and gets the event associated with the event code.
	 * It then logs the event with the provided data.
	 *
	 * @param array $data The data related to the event (default: empty array).
	 *
	 * @return void
	 */
	public static function handle_event( array $data = array() ): void {
		$_self = new self();
		$event = $_self->get_event( $_self->event_code );

		// Get the ip address from the data.
		$ip_address = $data['ip_address'] ?? null;

		$event['description'] = $_self->set_message( ['ip_address' => $ip_address], $event['description'] );

		$country    = Rsssl_Geo_Location::get_county_by_ip( $ip_address );
		$event_data = array(
			'iso2_code'    => $country,
			'country_name' => Rsssl_Geo_Location::get_country_by_iso2( $country ),
		);
		// Log the event with the data.
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
		//based on the value if the data is a string we sanitize it.
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
	 * @param array $args An array of arguments used in the message.
	 * @param string $message The message to be translated and formatted.
	 *
	 * @return string The formatted and translated message.
	 */
	protected function set_message( array $args, string $message ): string {
		return sprintf( __( $message, 'really-simple-ssl' ), $args['ip_address'] );
	}
}