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
define('DB_NAME', 'tpl_backup');

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
define('AUTH_KEY',         'xeir5d4vdgcishstj4psdykny8jawf8y9ebourpg82xopz7xpefs73cpmbgcj4jf');
define('SECURE_AUTH_KEY',  'dbquntoh44trtpdhjb3e18huvxp89pjca7vyzt2ugnvdvtvx7gijxobizow1b8ja');
define('LOGGED_IN_KEY',    '4npqcclhkljdwdahcfoncalsdazd5mi5vy2f6lq32sdzkdwh2fgwix3qjznvdcb7');
define('NONCE_KEY',        'ojz5kimfvfnznh1wgbym2oeroxx8np4naadybzpi872hnaxw7tmz6p2qfsph3qda');
define('AUTH_SALT',        '6lku2oooklwwjx0fvagcnulx65xrq37p6iirergzqyp5ndpuem6jlexpzxgtpogr');
define('SECURE_AUTH_SALT', 'nw38gvj32fs7chrbzcgihvgzxmima6uzoeezcrv1ujzjggomwxiygrxilhcslj4k');
define('LOGGED_IN_SALT',   'e7kijyolvrrn8gpimnghy5wmlvnf6ojw3jbzi7z4gninwrf2e2pauw7gbznqic3m');
define('NONCE_SALT',       'jymibdg5nfhtq0qcfg7dja2r1ajjjap9l3gveg2cpnrwnaeh3vqj7dbtf7nuuzxz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpyj_';

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
define( 'WP_MEMORY_LIMIT', '128M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );
