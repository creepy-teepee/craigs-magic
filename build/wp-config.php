<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

require_once(__DIR__ . '/vendor/autoload.php');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'D_jWH,/?[sX;|0m|74||{=^^|9x:NW^dneO0|o9Z/k,_-qxL56n 7/I0NTP*^B^a');
define('SECURE_AUTH_KEY',  'O^ Em}D_lA1C{{!AIq<B^ywAD@I?DQ.(` WK4@kQ+~M,)%`v|(FE]a6lp;#NB;+,');
define('LOGGED_IN_KEY',    'nBtiDmSdfGSJH{: +i[Bq{+fb^l.Tx_0_H3ARC|M)]>_|`7~Zjw/Jewme]0|sb?M');
define('NONCE_KEY',        'Z*cUy{+3}uvn2L+-{B7g:(2PI#>P{1]H*|v@nI~3*S2j8D7I`00k1Q-n,|`W1=8+');
define('AUTH_SALT',        ',nk^h!):PG+AA|j$rOr$dpR@BVB>cd|QY]{X+~5JhQMQ>t9}e7:q&To-glX-A)[+');
define('SECURE_AUTH_SALT', 'L{8/G81=>7)^2+W%Drx@Qyuir8z:+w>M?LuqG9+Te(_M!+U=zQErf+]:CEMWTOUu');
define('LOGGED_IN_SALT',   'p8y{gN^D-Gk`6R<OSH+{)|Zjdd$Qav+]n-Sk_!HGI[0N>fu{K7?$WW+*LoU!=*5<');
define('NONCE_SALT',       ',*~`v+i85v[06/kn+nK&W{ILxh{eaMqA^RQ$qVXWh3``Ss&^)W8}&uFRSxhAV8bd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpcm_';

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
