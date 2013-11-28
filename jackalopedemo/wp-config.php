<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'masterminddemo1');

/** MySQL database username */
define('DB_USER', 'masterminddemo1');

/** MySQL database password */
define('DB_PASSWORD', 'Cd!12asaw');

/** MySQL hostname */
define('DB_HOST', 'masterminddemo1.db.6295080.hostedresource.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';Dh(#@hRPXGif>RH+(e6e}3G,|C[!^b^/n-+^!Sxy# LZTr$Xi6_!x[$ya%NKPC@');
define('SECURE_AUTH_KEY',  'VRKdmwdWvO|;LjnNW+{&L+|N/]MnEJwl q0$xah<8cWW7cB4E8cU|e&Z~9t1T7W}');
define('LOGGED_IN_KEY',    'f-td-$ 6i<+Pes`JEOeJb[L.h^8 Gz~)i^P}%vYq7I9CYLz9i1S9Hy[3;9cD)a;}');
define('NONCE_KEY',        '/c-c0]&t%7<X38k+t+Ygcv.X;pwU<Bf#R(+0+JV0AQO{?>i?x7jZa-|%,)t0#C&|');
define('AUTH_SALT',        '}N{px-Em#IDc$#k0c`6<&A6A|nJEPGY(7lgVS)AotLD|1Y|54G,*aD<;nuL-@g+p');
define('SECURE_AUTH_SALT', '+,M8Xao|44=;ww+!# n+dO9a9-LfZFMlE1|I9{b@(O%YO{50#6NPz#Jr))[$JBG<');
define('LOGGED_IN_SALT',   'YwM{g|501w{`x__$3m|59fKh-)fsxYN.<&^A^9 xZY/-#Js3+DiVR0solv1wMr=p');
define('NONCE_SALT',       '({|1VP~5X,XG!MQts}OTE$Z)[>eu#pCLk9v>PdOoV+Qne4C/Q!FqIk7;Y~fa*Z.4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
