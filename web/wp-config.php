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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'database' );

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
define( 'AUTH_KEY',         'JnXRS(v^4F|7p%rcL}=>Tc K*N|=}9{+^tq[j|iroXf[Im&BX(G;^`S7=?D;f *W' );
define( 'SECURE_AUTH_KEY',  'k)LqON9*Qd]){pZW{>Qamqet$U&c!pbl-o(xBL=gr)iZ=f8%UXb7W=WDq=~9?4ME' );
define( 'LOGGED_IN_KEY',    'hhI)U~6.GV|I9e{qzny`nCxvKcEDl$0|>p?yz! 4;/t$E3jfCr6Bj+VXWPd):j6s' );
define( 'NONCE_KEY',        'TK2*4lFl7hI`iJ)~KO.Pg96mi9-FajeDMoFt2C~[2a ~GmUm7%o ~MqSvb8Y?Pp/' );
define( 'AUTH_SALT',        '$py~L%7SU)PZfeotG`i>Wwz9?Jb+rAfYLD%H2!c2nC^INPQ13Bof$3x;?o2&CRp7' );
define( 'SECURE_AUTH_SALT', 'I]$Kwt_l^~kI-(u5Kn$-F4Rya%^IA*s&!wkgeHa$ru(UAiXzI;IoU4u30k:BFh?c' );
define( 'LOGGED_IN_SALT',   't|=(2[c3W[Ofop3T|^9z,0K_Hn;4S~L*.in}:Uj*ffompa[9T4Kg{1Vg:Z mSV5u' );
define( 'NONCE_SALT',       'S2Ddw)6PG_1~v0ZFa]:f^;lsc,s.,T!C/w7$Q+,b,SUW_c+pLamZzCL&@n!n8{q$' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
