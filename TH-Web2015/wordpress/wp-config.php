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
define('DB_NAME', 'thwp');

/** MySQL database username */
// define('DB_USER', 'thadmin');
define('DB_USER', 'root');

/** MySQL database password */
// define('DB_PASSWORD', 'password9901');
define('DB_PASSWORD', '123');

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
define('AUTH_KEY',         '@M]nH4CE|*%G^2E^-ojyS,Mby>Xaib#hUQCsaUFT]W#^Gr/_4{;IWp~-Qb|6>Nh?');
define('SECURE_AUTH_KEY',  'fT20=-)7C4i1j0c/PEZX8E&+dOH<iY>SHM/50Qp;EFFrU-Jj9qppSXS?q^4rY&jR');
define('LOGGED_IN_KEY',    'z4@Fk{0)<)b qe>}f(ACcm|6U&1{7?`U+h1p+af1Q9fw;!/!RCvR!QEaWgZZv5]C');
define('NONCE_KEY',        '7gQ;w._o,OM&S((!vypUDUZ,[K8C<Mqtv,p|}r2`k}iGW%EFV<l-aiWD?NEJ%|8J');
define('AUTH_SALT',        '|NP=fXYO$RrZV1@pF*Wv1E1fBb+6.8hK g0 ;.jIhb3_SHEZUTm8We*vT,LP_&.|');
define('SECURE_AUTH_SALT', '?o4,V6EH){~-$ZTgzAZg|Dp6-r*nzf}4L^s9P_|HR/~-~1aMVc-M(ZyK_$Q&moRo');
define('LOGGED_IN_SALT',   'N!U0-Mq=lcOiY]&0KIXy _dzReJp9s<qmCG_$_<xZ7gjZ{Xx@5#@d)CM>,x~[)}7');
define('NONCE_SALT',       'Hhvl}Ubza{CMW-W:Z)mBz7WpTNPFMR:z&edM;86TT%Q+}:+2)T^vG&-i^6.Q]b4y');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>