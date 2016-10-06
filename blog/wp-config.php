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
define('DB_NAME', 'brainwma_brain');

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
define('AUTH_KEY',         'PHfl tGDnQtpZ7Yjp~6#,>Av%tO-94JWQ[)#T>/A~r<92IC!nYhLg7#-+6N] V)C');
define('SECURE_AUTH_KEY',  ')ez[V7~/Z!|7:m p+_W`2KP$!H5<Wv16;4[!zNx[)+^MRxI4V>l{>XL5Lwv$&b;F');
define('LOGGED_IN_KEY',    ',fzO><h5{:[l6D?{i;r^:w&#4^eNyVlOJR<kkBs=yE4aT1J=g(r[SvweH:k4-/:=');
define('NONCE_KEY',        'X19@SLhX}1VXY4P,KR?}+77R+O1/dr`S!|[Xe|WVpq2K!r!80:qk7rtDD<y|X~ I');
define('AUTH_SALT',        '3Ga@hkT$Xo8*ii^a:5lLBg).a{.5xN@`vnTa!7V{jkjdkedY~Nh4YR+zGs+KX)ZY');
define('SECURE_AUTH_SALT', '[$@L10]9]v5}e~M1XFZV^`D^a7z]3sN~r@[B.SP*L_Z&pNfpSA-mqm1Q2,ny@BJ_');
define('LOGGED_IN_SALT',   'g@ kzBxlzNj ;hYYg+i3DR5t1n>x}rU}br1nyp0cBzh? ,A4 M+yA!BhGl:,g)e9');
define('NONCE_SALT',       '1Ral&L*&@ aNb]odauGNVp>aiGJ;D>*2~w{I-kC>sa;bYQgFE<+0LW!r+,&xzkXS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
