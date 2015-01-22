<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'Orix_prod');
//define('DB_USER', 'root');
//define('DB_PASSWORD', 'password');
//define('DB_HOST', '127.0.0.1');
//define('DB_CHARSET', 'utf8');
//define('DB_COLLATE', '');
define('DB_NAME', 'dev_orix_wp_copy_of_prod');
define('DB_USER', 'bleonard');
define('DB_PASSWORD', 'Summer123@');
define('DB_HOST', 'localhost:3306');
define('DB_CHARSET', 'utf8');
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
define('AUTH_KEY',         '0<1*j188)3A>z.Q-p>d9a(S0v7@!fSidDOiS~_3X7%`.voeQHA]btqUcdSjTy0lz');
define('SECURE_AUTH_KEY',  '=&dc@Mn8p=]p|<z5kd+ctHDTm@zEm+5:ul>AGc|wzg*~8xy#45*OZ?iw<.@Z6m, ');
define('LOGGED_IN_KEY',    'tcu?0T];ed~Q9m+m|Xvru=~:89+rPq-]}|u.,.ukI0+-!>VQahw!OKv`59 Zw8eS');
define('NONCE_KEY',        '8G.C~cj d%+Jn6H@OHZP`h4|^-nv)IN+Ts+#^%F1@sL;QbK[H4FrlF33J?sjLCaz');
define('AUTH_SALT',        'g(9Kl8xO0tr`]mDuDq)UP?XHJ/b>;K^o^y!$M7*q3;+MM:ScP>H!Hf*~R Q!Q96L');
define('SECURE_AUTH_SALT', '?iJg9Kr,O5gr7|(bGhm8@eb}iJ!+-mnD<^MFBc,)U8--W@r0:!VHs[1){QqH-e?S');
define('LOGGED_IN_SALT',   'LK@67zwtC8>c{N/K0f0!-Vxe(-vhn]&L_qa;sH1M4`Wq|Px~xRHBz0NK3f:W,+Z-');
define('NONCE_SALT',       'Kh<@ 2g4@ZCJ.;4:R=1 -sV)OcH0oV[VkO^-gaT- K+{w/-~:/f^w.qav[E|>ED<');


define( 'WPCF7_ADMIN_READ_CAPABILITY', 'manage_options' );
define( 'WPCF7_ADMIN_READ_WRITE_CAPABILITY', 'manage_options' );


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
