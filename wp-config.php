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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'alpha' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'p$)aNrHw<ao:#i8V4?OglZ7 x:vROe3>$9iH}`&:fGT4vrXjs^iw8iFC>S>z=wjO' );
define( 'SECURE_AUTH_KEY',  'K}z#+b{n]v^;!X>MV/s6)ngX-mTIKseJ/&e}m6Np<:!P&?*sQPEsdT1eRj{VlcDx' );
define( 'LOGGED_IN_KEY',    '.L+5&(Ur%+fiO<)$hW* 5Nwb >=QymGl)trqS&|6YX?F(E:sj_|&b[qP,+{qP;:<' );
define( 'NONCE_KEY',        '8Y;qc>1J~vy(d=FHVe0A#!zW#H#Tbv!%bcS~d_Q  poX@]0^#wU{a}eUA!v*=xg<' );
define( 'AUTH_SALT',        '2)eKdrUKJDZO`F1Yx5<o5y~4b<r0ixrm7%efjZO#SG;I9,0B^L}U53=^ix!6,-vz' );
define( 'SECURE_AUTH_SALT', 'mB9Vr_2J26xsMU)->QuHn}PzB6z|b2A;Lz9B:Y}cn:LZhY$fL_c&D)iO>j?Ff[)`' );
define( 'LOGGED_IN_SALT',   '-z)O>LPF%_a- 7~!SV%R8K,6N&ec,5l so,sNRRW#<)ew^jtulK>tjV(d$MIZJkO' );
define( 'NONCE_SALT',       '+@};<QFp}B9cu[Bd$7g4=w$XXV82NtcZ1U?9.TIaG*eZ>Wo-UHpWh=f3c~]J:B6m' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
