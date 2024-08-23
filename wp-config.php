<?php
define( 'WP_CACHE', true );
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


 define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '|lRjdn}@G!V0-{^}:|iDm#e7Vh3OXkMZQLix+t9^VLdG%_(xJk7wD`;WScpevUi.' );
define( 'SECURE_AUTH_KEY',   '{:1`-6%t4eYkc22nJ@z>4#j%j:xHF-FKPts<`M87>2$(oXRRF-x}0vrlzVyEX@Mf' );
define( 'LOGGED_IN_KEY',     'wXxE-;?-R`j0?L`Rdik?@dcV*:$<$yaR rkmb[/s#9:Fb51iSdf^T$l2zc4d$/Ta' );
define( 'NONCE_KEY',         'V{W-9/G5Uvv$ys5@0D/:3$)d{>lJYW%s;EN1myxgY`#LrDt^U~[&M@BXv~O;`#S6' );
define( 'AUTH_SALT',         'iyO/:[79Znd(/k|V6zqPJ56n_$a-g=8)Lb?75J=ub-s[Jto@ksC|Y#z9lGTYYy8^' );
define( 'SECURE_AUTH_SALT',  'LwuEm(|wg;Yz9h>mgXgz5 EN.iwB*X?RjHOd-CY~ ~b2+`O^m@@/R:;UulGxB ?}' );
define( 'LOGGED_IN_SALT',    'Wpj?v_ovV=0yU2vZY.gBafb3aP])o3F79n4|t6drxaLre;CfOx3YrWh?X,2K3?e;' );
define( 'NONCE_SALT',        ')q.HCbn7a{4.3Q3}mcAgTu_nI)MmQXif2dF.PPa%53,=bp|gpoZ%4FG;3]99kdVQ' );
define( 'WP_CACHE_KEY_SALT', '%) 4M>NANa{^]lQn>k(`iAN_@-KXN<25WeAF#UxA1`Aq`X~Mjsw!Eg(iiQBCT!22' );


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
	define( 'WP_DEBUG', true );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

