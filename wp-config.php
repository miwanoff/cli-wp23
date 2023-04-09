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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cli-wp23' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'ePd.)^T(NPS[Js.sQ9yM+s!k7-TiWQDx<1Nknm`{y@Y`b8o7%*8ZCLYKB$YUKbQi' );
define( 'SECURE_AUTH_KEY',  '9QF[6y5^m5pQF= mBK84g0i+g$rr.dW-_NsHRC?DFo ,/tOJ{WTnSLT&[Y{CG>cR' );
define( 'LOGGED_IN_KEY',    'A4<AY5aep[1[Y`/3|yUR[c2cae(up7yw%)&QKm9XnCu$a=mFBKh^nMu9wR<}kNEI' );
define( 'NONCE_KEY',        'Bx7s9g5(,:v.!/CJOl>r]*Pl|,4&jII,TX*F1E4kCCPBx=/[Jw+z}UPqjE6lq%n,' );
define( 'AUTH_SALT',        '{+CKBg0V{Z+Xxe:`{^`~JK)^?aE:v4(+DqsU1ihqJKNy:2,5oK0B&NlQY=`7(t1o' );
define( 'SECURE_AUTH_SALT', 'w{%u#F+0^.-*S1yZHuY$Xj^IvW}&M9Q>8~8>(Oe}7L94/pib|+eqe>GvR 9-9WIZ' );
define( 'LOGGED_IN_SALT',   'i9a7ud/z0ba(]SG3FlysYQ]kgsw6 y]xGS#^a?nKf(q3b6scMxVx7J%!Jx*PEUU_' );
define( 'NONCE_SALT',       'cu/sV@I|M/BQ%]];Ha$OOjSBwaF?C-f1hd#m`E9~{7|=b;i8b3Vo$Exdx=L;jC^/' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
