<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the web site, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * Database settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '616278557698cdd6f4bd11ad8e09bb027967c54ddf0db05424ba33080fb70ad2' );


/** Database hostname */

define( 'DB_HOST', 'localhost:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication unique keys and salts.

 *

 * Change these to different unique phrases! You can generate these using

 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.

 *

 * You can change these at any point in time to invalidate all existing cookies.

 * This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'V&fHh2HYqT>p#62c=)7la8IfC{;c~!;oGnab$H_w=rccqKosLZpF(=`$eVWE%o{C' );

define( 'SECURE_AUTH_KEY',  'X6`dP%:l= ~I7XYn0Sl8x8VM)^rpZFy-7Cb8+Fb{k/gT-C6MH6 ^u{0KR@Lnf0:d' );

define( 'LOGGED_IN_KEY',    '0(UyQ<g_(~q!}>jMC^uL@hiIiK(Vd,NeRc_T{||wX67!lVK}R%N-{8(5BXJTXYo:' );

define( 'NONCE_KEY',        '7n}NYNWtC$}/FRf^f*{%tA$?PHN*BWXm1vz.%v{}3I4XW<QRFv?sZU]x7ist&-{Z' );

define( 'AUTH_SALT',        'OQg$U$hb#qY_9nj)}6A/Wd-:z0o&RspNvYHlE(:^RZRIvAd.cn6qcG u3EE5An3f' );

define( 'SECURE_AUTH_SALT', 'E^2da}NuICP-0<D6}kq<M|B$>TZ|KzBB>TIXgl<}[EE -HsmA^ct3M]=.=hcw/?,' );

define( 'LOGGED_IN_SALT',   'msFlpP/aC?gXWzE.r}3f`-+X%$0f|E>PL#)nFr]OjZ}vmA#Wk@`>K{:2((5|X#67' );

define( 'NONCE_SALT',       'ZV_P~pVZr/.Yr8HmP$7m}NJN%.-L <DO~/NlEl|v<$L^$FV{ph9SFLG.bcVY!F`Y' );


/**#@-*/


/**

 * WordPress database table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';


/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 *

 * For information on other constants that can be used for debugging,

 * visit the documentation.

 *

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
