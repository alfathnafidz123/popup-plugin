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
define( 'AUTH_KEY',          'f#=/diNc8zAAK|#$w;G4,eq%Dc6Md>ftG>lj5IR.J)}f](?A*1t/-(9zD/W#H8H:' );
define( 'SECURE_AUTH_KEY',   '`bQwZD9>9VU$I1wk.<hP22O??)Z>jWC9ak |Nkzp*x([YgjgA6S.vQ:sX/t-d~^C' );
define( 'LOGGED_IN_KEY',     '0+SV7V[,1s6C<71uh4zbjyO8&]~l5N%A2b3D_^!iTRCn)df1=-j^[4XoDC)^^WPh' );
define( 'NONCE_KEY',         'JZ[dHt7NGp)fqW;5=(.rb>jlvSLn&#JCH:,CO4N<2^1~W%P*.7j74X LuUW/K[)J' );
define( 'AUTH_SALT',         'Fc98L[]og][eG[ >o}G|QC6UTx$N>6c&O*vD1:Ow_%H|us92_,=a%i5*dA;xE6BM' );
define( 'SECURE_AUTH_SALT',  '=]{([$`OWaaw3[~`Le=U]r R8_g=pMM_R-n9?emKy8H**GzdJ`I~s>t9lM+9IS$k' );
define( 'LOGGED_IN_SALT',    'vC5;,{nX^<#+qd^--GWxhAIOjn9O[P tc8}ljUkD-.uO!%cy<#R:LWl})t%W+%hR' );
define( 'NONCE_SALT',        'NL^r>2*Y-`=&qnU^rJY7}%k>E*?npBzefmak=[lOz{KqPRhy-XS)kQteg2=doj`D' );
define( 'WP_CACHE_KEY_SALT', ' Fz4nIqy[J?i_x&HH?1xBUeM# AHlX7/K<fI9Mu.AGt*r=9<!.>QgOrbi%pQ45HO' );


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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);


define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
