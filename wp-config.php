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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/johndiego/www/estoqueAbril/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'nB|Q+9|Cudkfnw}EVQXCM^^!U9dAzv*EUx`leOz:3D^FQ6:]1h(X[p9Lt+,AgK9M');
define('SECURE_AUTH_KEY',  'Q3SPEVMVH*8{7(XCC4%rOr%b8$1Mv>h4KHkD,4VfMq}u iyCt4zI|!,9EW:O?n r');
define('LOGGED_IN_KEY',    'f?AiA(q6QCNgs+MO~>$A.uyGJ/3n:jC=cOAkkr9iPa-xn;Ii=*3hr.Ig#aQRG/t{');
define('NONCE_KEY',        'p+CtRO0)G3X/I{8+(L6&3]QW!jnhVtj@(ED01YkPnU)ma]S}k;T~Tj`1:5a>ID]9');
define('AUTH_SALT',        'G`1kkEFyA5M QFU:(PNNZt7iD3XM1xDuKmx_{SqVyu633T.R>*J9roO8)$:-lsQP');
define('SECURE_AUTH_SALT', 'aRT-l(=zzo~RFxcq`?n|r#3~}<fpm&`]E/yV*+X#)n9:klqgD~?65c<PruhB|=[T');
define('LOGGED_IN_SALT',   'T^ZHsBKP654<nrw688M6w[%v.V4vx}q *8x]rxuivrXh/SPivye85U!8kDC!oTsn');
define('NONCE_SALT',       'whaD&_M%0>z+GsX(D>Qs?#$t.b1H.b=vH.+* w[h>R4y4!7gD6Pl?]AmXmqu{{&E');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_estoque';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
