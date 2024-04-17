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
define( 'AUTH_KEY',          ':%xFOCAz>/)*ecX*Qf]t_V#[%l>T[-a?Y_`D&{74&7uNA$nlA1jozct){$H?3}hN' );
define( 'SECURE_AUTH_KEY',   'FxsD#Q[X_Q,2JI2x504BV}&QvQbl!,[YmB!b~61#/VlQR$CNJ*!;PC(:S.zNlaT`' );
define( 'LOGGED_IN_KEY',     'EVy$1;E.TLIqIEgNU5@f^9B6A?_Hkt@?k<D|p?;ABu,xeU0=S!Pfoq=LA|2_4Xao' );
define( 'NONCE_KEY',         '(wT[*1[+$J1OJz|Wof_<Y7Hl(~(}VZa]J!>G)Gv?v.0[^/l)N890`WV!~?OA]>e}' );
define( 'AUTH_SALT',         ',xODRbg!t{L+nMb6pv8#;ZqO?&T|G63 QW.&#94ua-XLz*%G4.9i{ *2S}aWF9Dx' );
define( 'SECURE_AUTH_SALT',  '&g4fr{XT+&|c%=>ix:g{EuRV8WwoNu$-!j7T}:)HF!:]^^7>} 6VmI}#Ww;x7f4D' );
define( 'LOGGED_IN_SALT',    '~V&*lL6zCON2@&H-@/|nP,MxBR2>.!rI$ G6$7X]P@y{qO[_l,_=hcvC6gAYI+ y' );
define( 'NONCE_SALT',        'fP]1Qs%TenwiX=rnH5-3$jA_I(*;(`BCe9YyX`oQWNNEt}W{u.8VV:#8e=9I]f~W' );
define( 'WP_CACHE_KEY_SALT', 'h;$R($}S*6wf0/2_8V!5+p8Nlzy`Vh1],0V*s)1aD0;oFLR+%p~tqc<9->E=mlnL' );


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

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
