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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'V=*/0=9:r!;d*+1(`&L?(FcN/&j*D?a$pB?B=Ko`auB24dI?,YqG-Tmsez@9*l}:');
define('SECURE_AUTH_KEY',  'Ng%WLP#P?b`})n/!5]CW[Z;e$T]AxD7iy(&]9XaQypmRfg^~ruc[Nm%f-L8y%j@c');
define('LOGGED_IN_KEY',    'd%0oiN:-^TX?tf_F592-Omd-+<sbN4zD*C#4;RoxRmxwi^+<=i0|vJ,Kr8+f9+hK');
define('NONCE_KEY',        '(?@vM<bJiG*F<&Hky|8He~KbgWbTQa9UL=rZ<Lq3PoIU}JJ8Gx.Fc[Lh^.zhTU&[');
define('AUTH_SALT',        '<L/$cegZfmFNn(:fA|2sIj_g}-}Kq#_W}yCH)O%}UGJXH^c&$d,/7hYxx8 7*d?Q');
define('SECURE_AUTH_SALT', '/p!$Fp<V|ER`n8|%lgiW[DV?D[M)!Y9fBjR,(vyp }}MMknVn79W>09|N|&>72VV');
define('LOGGED_IN_SALT',   '4;rzwR(hF9spm|fUf-74{kOn.Qb04/l><*F)l&9}S#j!yFkrqhwN!sz~Z)xpJ)(j');
define('NONCE_SALT',       'Pe:K&B4k@(,#5y5f[buI9d61qI<Sz`wa&~aC?6of7Qfooo}(1qPdK%j<3Z|)-EZx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
