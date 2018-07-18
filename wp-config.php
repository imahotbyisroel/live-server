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
define('DB_NAME', 'chesed_u251559457_imhtn');

/** MySQL database username */
define('DB_USER', 'chesed_u251559457_imhtn');

/** MySQL database password */
define('DB_PASSWORD', 'fq8*@1imgE3Uja%t');

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
define('AUTH_KEY',         '()itywGz6leWM]&V<<cWdxshQi#A~(9$VD_KG#56eh/@5pEYq6j YoyMWhf-Uz~`');
define('SECURE_AUTH_KEY',  ' 8+]ujk#OJgo0fy+f=$8k7bEAq[V|pd;CL9{mP^g$#LCE!`r#TTHb20Zf!!B~a> ');
define('LOGGED_IN_KEY',    'k*!w&q%f?SK,SE(;ww7vMk^e{5.++FFXAe2A_}LVjBow=D,Ww3-wK(t)Ep`j}oB7');
define('NONCE_KEY',        'QC)lgg@N@%[QN3n5^dZO_X:rQ+P< pm`$EwS7rlB}@GJFxWr{gwx|;(+96q8CYt>');
define('AUTH_SALT',        'WMx,+s2&fEKw.vtl}G{kZF5_hZl)@k8?x,7}1Vi<ElK/dzqO-}bZ~+614q?.1K!=');
define('SECURE_AUTH_SALT', '+4ZVb:-%[X?<uYo5V256hK5fgu5*DmPNqCL8)a.i`8^X(%V5to:=pLCe]^OWT@NE');
define('LOGGED_IN_SALT',   '@!!EE0`y);mlox|ct3X?e{WO|yrF9-6d|)tqiR#O83B%)_7V2ST/{Ex3ujes_PPX');
define('NONCE_SALT',       ')BXV^-m3Y4iu>e4>V}`]7~{ydKGg9d]OXf6sQwLK(Pk(N]._ML+]Ig+L]UrL&+b9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpimht_';

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
