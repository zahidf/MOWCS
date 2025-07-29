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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u716423947_UTxwN' );

/** Database username */
define( 'DB_USER', 'u716423947_fLmFr' );

/** Database password */
define( 'DB_PASSWORD', 'AjeJ7SeQ6b' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          '8CModS2?v-rQ9`*p^nqO<zWhFHj08nd4<6CsWx%VfZX,x1@<p.}rkX.&NTZbu +?' );
define( 'SECURE_AUTH_KEY',   '^ 3/ o+]-[aq@J`xBRyynD*HtPxErcqH{^kFhpGG-kBo^bU9ilwU#_I6:MpB#KN/' );
define( 'LOGGED_IN_KEY',     'HI zmX+{r1,i}Vfks$Hqnez5i<Q> Zj+9flqwNjQsKK@29}LW)8;TJjteH6#9K=c' );
define( 'NONCE_KEY',         '4zeK6q9m](/4KmA)[z%QvUL<bRhFU/xjsMAFMBjcjanZ~T]aJfZwIo%;XiH35msK' );
define( 'AUTH_SALT',         '=LTH<ZjI@tD$v;E?p<QR_&t5~<u^|GEc7GN/>tBX1xzdg5@K76sW#s_^]@x;C(wI' );
define( 'SECURE_AUTH_SALT',  'SdZ%k}4K#R|,BT/XE9;E)+Z$l.JKA~E{}0nEwjQvfAfYA<V. !oeBc@N03*99PZ[' );
define( 'LOGGED_IN_SALT',    'UuR#k6C&dc%z[j=pVwjh}1WR<}HnfS;SmS<}Eq?@sTk0fz(M_pN&zShg@i{#(-Ua' );
define( 'NONCE_SALT',        'ljgG>J6yHy4]1f,S)CFaUy#b(O <:dj4!y<b#Q_69 A,a2&%S&ev k~,+7:#;.^m' );
define( 'WP_CACHE_KEY_SALT', 'B4ErZ4(z`DYH(q9`eEB$()sM1NDRjs-!Yu>;B9:_f[LQ=o`MXL,D~|SvAIq6 kL[' );


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
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '00915f3ec835c22a17cdc7dbe323bb3b' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
