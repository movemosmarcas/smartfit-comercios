<?php
/**
 * The 'Rsssl_Login_Failed_Event' class is a part of the 'Really Simple SSL pro' plugin,
 * which is developed by the company 'Really Simple Plugins'.
 * This class is responsible for handling the login failed event.
 *
 * @package     REALLY_SIMPLE_SSL\Security\WordPress\Eventlog\Events  // The categorization of this class.
 */

namespace REALLY_SIMPLE_SSL\Security\WordPress\Eventlog\Events;

use REALLY_SIMPLE_SSL\Security\WordPress\Eventlog\Rsssl_Event_Log_Handler;
use REALLY_SIMPLE_SSL\Security\WordPress\Limitlogin\Rsssl_Geo_Location;

/**
 * Class Rsssl_Login_Failed_Event
 *
 * This class extends the Rsssl_Event_Log_Handler class and provides methods to handle events,
 * sanitize data, and set translated and formatted messages.
 *
 * @package     REALLY_SIMPLE_SSL\Security\Wordpress\Eventlog\Events
 */
class Rsssl_Login_Failed_Event extends Rsssl_Event_Log_Handler {
	/**
	 * Class constructor.
	 *
	 * Initializes the object with a value of 1000.
	 */
	public function __construct() {
		parent::__construct( 1001 );
	}

	/**
	 * Handles an event.
	 *
	 * @param array $data Optional. The event data. Defaults to an empty array.
	 *
	 * @return void
	 */
	public static function handle_event( array $data = array() ): void {
		$_self = new self();
		$event = $_self->get_event( $_self->event_code );
		// if there is a user_login in the data array we will use it, otherwise we will use the default value.
		$user_login = sanitize_user( $data['user_login'] ) ?? '';
		// we add the username to the event data.
		$event['user_login'] = $user_login;
		$ip_address          = $data['ip_address'] ?? null;
		// we add the ip address to the event data.
		$event['ip_address'] = $ip_address;
		// we set the message for the event.
		$event['description'] = $_self->set_message( $event, $event['description'] );
		$country              = Rsssl_Geo_Location::get_county_by_ip( $ip_address );
		$event_data           = array(
			'iso2_code'    => $country,
			'country_name' => Rsssl_Geo_Location::get_country_by_iso2( $country ),
		);

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