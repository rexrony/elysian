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
define('DB_NAME', 'elysian_global');

/** MySQL database username */
define('DB_USER', 'eylsiangloba_ron');

/** MySQL database password */
define('DB_PASSWORD', '03452295067');

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
define('AUTH_KEY',         'y>@uLR5aj63q?L~AaZ8>qg_(:B/#rr?@/,<smuk+Dc8^cB0IMwx04s]IEsU[ze>(');
define('SECURE_AUTH_KEY',  'J?.L636vmQX-,o6> TX1bS%V8;;5sTXqS#BJFLAXtyWA<,f F#szIGAp:5nbHt}L');
define('LOGGED_IN_KEY',    '8oe-brTrg7<Lj5D(:DsVmE0.u)9_T@2;kP=y-><#&6Z/|+Y>mWT8o}CaE$+Q*9-?');
define('NONCE_KEY',        ';&C3]D`!:%#L-!d.FH 0hT)YxZb4+J$`{l_gSQ2U]F4s@| th$z&^%Hl4P;GbNw1');
define('AUTH_SALT',        '~GU!D$e)6f];n+wQ;z$$B_R5Q8}:b`%]p:WNFR#nt| JT93)XM*+[8ZgESV+^f]}');
define('SECURE_AUTH_SALT', '`T+JtURB@L#9Fc$)]bf,}[M&YZL?6I&k0=4:P =ZK)= v=N5)1gK;|dmC<FXDdg;');
define('LOGGED_IN_SALT',   't5%Rn*d[;[D/5&Au<5iM<7[_B^_it<=**66{3@B@XfuAC_u~2>EnsyVJC15K*{pN');
define('NONCE_SALT',       '`^e7l+-*|<UsH2,6/ewTS}za~r]$-,S#yO4/`0%H@KX.[a(.73OHQ qrw%xZ8ekR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'el_';

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
