<?php
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
@ini_set( 'upload_max_size' , '12M' );
@ini_set( 'post_max_size', '13M');
@ini_set( 'memory_limit', '15M' );

define( 'DB_NAME', 'woopg_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'islet1234$' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']QA>/>pcU-(Epg%B]Jv]&*XO6P=1Pk#2|jZbIRh[(=fs_0}Jgy+R!Da6K&nw%lY?' );
define( 'SECURE_AUTH_KEY',  'fF-^E^X1&@pLb]?Npa+ZPii`g.rt(q-9fjZwU=``EUN+em[&uS|wK0zZ-Q@4_4J[' );
define( 'LOGGED_IN_KEY',    '?7&h_t5n-sJk(S:rNKl7I(xQ1O&FdZ/P]Qg%8vpZt/=73]o}2#jG&d=k^<n7_z|g' );
define( 'NONCE_KEY',        'Cy5iJ&gAD}z5vqdF!s0[3&K1[L{@IVmr@im-L,dEsv~6!/pO1@}rn-[5s`E;JDpJ' );
define( 'AUTH_SALT',        'yZoM1F4,c_;7qGXNG2#5O7qy/g5u{keSwO>}Mr9JX wEWJZ<4M!I^9x8m:R(OR.9' );
define( 'SECURE_AUTH_SALT', 'm[LG!=YJC:]LXL&b(2q=~fMqgFlx,CEo ^kzWuxkSy`c^$<2lUp]@A<@yu |ww<]' );
define( 'LOGGED_IN_SALT',   '7dZ3-FIW8l*fyU,qfGA[G@N7k6,+Dh^<6[0P9`vK##oQ!iC@[DN4,_.JVj<p+Jhm' );
define( 'NONCE_SALT',       'vTtXtzw|)!AXUO-!9O>]T?:[P<jdvyqEo)G,u00lG]yMf^K|LXURwa;Y+FqBa]6G' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wo_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
define('FS_METHOD','direct');
