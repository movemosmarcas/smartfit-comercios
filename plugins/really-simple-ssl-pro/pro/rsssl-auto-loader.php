<?php
/**
 * This file manages to autoload of the classes in the pro folder.
 *
 * @package     REALLY_SIMPLE_SSL\Pro
 */

spl_autoload_register(
	static function ( $the_class ) {
		// project-specific namespace prefix.
		$prefix = 'REALLY_SIMPLE_SSL';

		// base directory for the namespace prefix.
		$base_dir = rsssl_path . 'pro';

		// does the class use the namespace prefix?
		$len = strlen( $prefix );
		if ( 0 !== strncmp( $prefix, $the_class, $len ) ) {
		//	error_log( 'Class not found: ' . $the_class);
			return;
		}
		// get the relative class name.
		$relative_class = substr( $the_class, $len );
		$relative_class = strtolower( $relative_class ); // converting to lowercase.
		// converting backslashes to slashes, underscores to hyphens.
		$relative_class = str_replace( array( '\\', '_', 'dynamictables' ), array(
			'/',
			'-',
			'dynamic-tables'
		), $relative_class ); // New Line: handle the case of 'dynamic tables' to 'dynamic-tables' This is placeholder fix for now.

		$file           = $base_dir . $relative_class; // old way to form filename.
		$file           = preg_replace( '{/([^/]+)$}', '/class-$1.php', $file ); // new way to form filename.

		if (class_exists($the_class)) {
			return;
		}

		// if the file exists, require it.
		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
);
