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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'PU3o2$_Sah_EUbTeMJ` A]wE+/QS)a0}|  f(mJ56*>a|SMX7hIIj4G{y?d^=wFD' );
define( 'SECURE_AUTH_KEY',  'fV+7sB,)y&Y/_y`N-OR8(CThg#fjF,EHoh&mNL9#hsN`+_L#%bia0>tm:lb53<:Z' );
define( 'LOGGED_IN_KEY',    ':F(!l$|eeGq#E{NP|AKrhzzg.7Ue3>}ogE(<QKzi./G% {H;<GPWr07&h+Ia3*Vw' );
define( 'NONCE_KEY',        '#begm[#?d~$+3OEcAs3/xNAio}_rZw`^psX%W>,G04}jk{LmM{2/e^EQGYFINVo5' );
define( 'AUTH_SALT',        'j66Dv5^%PrG#,f7#-gozZZZUB>P<:z,Qo#_h(QQkBl}FPv[mfIP~ov/5Z#r sar|' );
define( 'SECURE_AUTH_SALT', 'v=[86WqC0^71Ww!6w=o}bd~K,cAwK}q;N ?=}*%$G7f];_+5X^UO6w[>41l0-RYk' );
define( 'LOGGED_IN_SALT',   'b8Kyri5s%MVIbC*`$NWWTUG<W$+mx=/}mUxT|xJ& )FAVIac(2v3M/DC-p D7q44' );
define( 'NONCE_SALT',       'aU?d{d_6!:wh-w*pK_7$8%^V[gU!fuU^Css9omwhO)}_+MngT5O+tA*n7-WA=)Pp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
