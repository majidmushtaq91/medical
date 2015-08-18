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
define('DB_NAME', 'medical');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'H[~;U+N1#~H3`qhm=$m-1X)0&6RI*@*4)fec|u1; I;RSTTV#a_.pCTNZ]?+IPmd');
define('SECURE_AUTH_KEY',  'V2mu|fQ>{,9)rhRzI2A^Z!f*bL%Fy|0.:7V/ZTgjl$cCMwSH2Bk`=52rleMF95+B');
define('LOGGED_IN_KEY',    'Q[kv1yc-P;#*eMUGlnN(5$bLP89,6pAkqE}[i|[]1!<b;A{l_4m}GXx@9?JNa4C7');
define('NONCE_KEY',        '!=h*/v8<Id45P^LDpQL)[?6C7mw$FwaoWK:[J2~b6?b322iOPt2S@xTh@+wSYrY#');
define('AUTH_SALT',        'iMO.D9l},Gtl#>Q#^hqREb}=!5-#[6zbK,k0}DT1043UFBWbnY=QqIs428JA&Cqw');
define('SECURE_AUTH_SALT', 'I?>?_|x0dGJ/9Q?`~nu7nXP)|w6!wzFaebe=h@q,J333F^Jgo`kxXqq<U6?:j fI');
define('LOGGED_IN_SALT',   'Y)O3,.Hrf]ViCj+)Y$g5?l=)pXmlTxtzvv5($W6P]],k*rc^63uSfWFo=24K?_P[');
define('NONCE_SALT',       '7Y7mc^+FR8,zG*}ges{Eh,O,AqvnI[n+DwL#]<hq`$ ^TBPd4.pGh62MX3q]&?;X');

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
