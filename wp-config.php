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
define('DB_NAME', 'jbr_wordpress');

/** MySQL database username */
define('DB_USER', 'jbr_wordpress');

/** MySQL database password */
define('DB_PASSWORD', '5said-0jilt-8input-Howl');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '==AY!z -@8ZAy]x!`N--@z5E%4i{/faps@&sPT*!HCzL|6Shbs<>L8Ig B?oP&KK');
define('SECURE_AUTH_KEY',  'AMm~.0d:;NtphWt2k.I_#wLTO|7ZNSE/f$)@VQb+2qU4,T^=lm){Ocx-2E.EC?B5');
define('LOGGED_IN_KEY',    ' ZPU@,-`E+~VQgg8?h|MM=QLX1[v|>WxNT|5cL+lxj-;XLnFX3T}#2xq%3+Ijb3-');
define('NONCE_KEY',        'j--i{bV!4x1EWF=:f6UoHm:6AE:^vZ?y?C<8g9E`RkJQodw gQ++_ZaCeT=Ec9i|');
define('AUTH_SALT',        '=>BaeLw6:2`Di:?UX[LZ6U^L5DnDTk&~^@8W9ibd,Rw<TT3ia~[e/1],P?VsM_!C');
define('SECURE_AUTH_SALT', 'JX~PJI`fd+m_4$w+C{^IJ=(Nu-XQ6/qZj(|_:2eR1Ym4(.^~ GI6<YQG=Hmdz`)S');
define('LOGGED_IN_SALT',   'qMc,Du0)0Tn*)s)UEk~*oruzz2SCA$p0Fq!YR!SV#>7{y&UZI})G&{#-#v06<WD]');
define('NONCE_SALT',       '9lX m%: C9IVnqJxoi5@K>H% ktoQY7(4<(IcEe}A7.!dJG5g|4327ee2Gt@=~t2');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jbr_';

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
