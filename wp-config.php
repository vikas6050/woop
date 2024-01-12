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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wooppg_wp2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Abcd6050@@@@' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define('AUTH_KEY',          '#O%6`%xbibCxvpvE?FvL`B_+)AO8xH<6Rf/&`n>xLifC&e+0=5Pxw}4yyQ*{9m}%');
define('SECURE_AUTH_KEY',   'L30TnuD8dy+]&b=}_X!DAB;9orYe%}-:9bdo#-+Q=SSl:1@5jyi:U*kk3}fYGUM,');
define('LOGGED_IN_KEY',     'fZbe^z U;w%>_c;C]Gjk6l.r PD6gH>kMWbQ6K-#Q[N3Q <L^6=>##po67%J%Cd%');
define('NONCE_KEY',         '$-Mi/hHveC,YNN|j=TLw`3C7i+&Vh@??FrT0kJ_Qx/v^uBtbZ}{Tpe-nE,yxjKv~');
define('AUTH_SALT',         'R*o0]su[glR|B=?K^|bP1U0b;[DuOB^R+K|_sHB#/4F[P(B/,5D7@=FkH4qL=%*G');
define('SECURE_AUTH_SALT',  '4*$5 Q3pb_8/lSkkPb{PRPnWW][s$ASdrxAHrT{ut5,R7<xjj?u.3ErjP?6ZlP?U');
define('LOGGED_IN_SALT',    '-i2A&@(+@Ay3W?ExCcl m16h/1Pf*%[-e#*]i?B5NS*uP||HJ~~Z|XX]ZU3aHey=');
define('NONCE_SALT',        'R+GuQ},L>gNG+Y-$s)XVQmwD+xs;R=@GkB/yLP!$}-0X|~Yf+R@J47KvtS-i>KT(');
define( 'WP_CACHE_KEY_SALT', 'QJx4_NPj4l1=]N[|[2GJKNAbR=|]|jGT%2-=zi#4N<wp]?eh<u4(5slaHur3vk/ ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';



