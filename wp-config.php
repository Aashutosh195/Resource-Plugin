<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'practical' );

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
define( 'AUTH_KEY',         'VYVmu+(7Qk#&tQX?TS/p~Oiwa!AAJ%Hgw-EYoqyTjd]=ofP&Li[_fOPx;kJBZi_u' );
define( 'SECURE_AUTH_KEY',  'Wey(h4S1xe?RVADU|~xt0H!hduIw<l@%jk2*HYv ZPb/Au6k14e93y%FA,KGz <}' );
define( 'LOGGED_IN_KEY',    'q:|=!(L}N<`.L*mb(JJ<ha(!cTgMD)i|m6GO{Rwv;Xs;L[=.bD@MoO%)<vY1mW)3' );
define( 'NONCE_KEY',        'y93#2:{c.}ky[+)%:73JG1%+]ml/~:h[VwK@9!`2Wy@zk1Bz$-M)RzGZW-K+qaX8' );
define( 'AUTH_SALT',        'ZdV6Zhz)HY~l6:^4AZ:!j>I*1!EBcFf;jPQVtoRLs4IXx^M_sx/>PRP>0>C!-yNl' );
define( 'SECURE_AUTH_SALT', 'P//nO3xD!_m3~HR-)YTB-=*8h{Sfjv(TG}7)tanHn j/v7y8/<YYgI7T$p&(z*uk' );
define( 'LOGGED_IN_SALT',   'OQ.!IfrX6D@wDRPhvE8ipHEw<z(aNc@1jkB^IG&KK.Y{K}.6$s#`PTZ:F;;lI@8D' );
define( 'NONCE_SALT',       '3@N}JsHkD[8[^x*2kS^n%i VlAtd$W>c5@aJX:mF&}~k[vrN,)&)H0dnJKMI|@PJ' );

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
