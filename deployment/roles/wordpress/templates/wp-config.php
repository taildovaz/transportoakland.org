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
define('DB_NAME', '{{ database_name }}');

/** MySQL database username */
define('DB_USER', '{{ database_user }}');

/** MySQL database password */
define('DB_PASSWORD', '{{ database_password }}');

/** MySQL hostname */
define('DB_HOST', '{{ database_host }}');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WPCACHEHOME', dirname(__FILE__) . '/wp-content/plugins/wp-super-cache/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{{ wordpress_auth_key }}');
define('SECURE_AUTH_KEY',  '{{ wordpress_secure_auth_key }}');
define('LOGGED_IN_KEY',    '{{ wordpress_logged_in_key }}');
define('NONCE_KEY',        '{{ wordpress_nonce_key }}');
define('AUTH_SALT',        '{{ wordpress_auth_salt }}');
define('SECURE_AUTH_SALT', '{{ wordpress_secure_auth_salt }}');
define('LOGGED_IN_SALT',   '{{ wordpress_logged_in_salt }}');
define('NONCE_SALT',       '{{ wordpress_nonce_salt }}');

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
{% if wordpress_debug %}
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
{% else %}
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
{% endif %}
define('IMPORT_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') ) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

define('WP_TEMP_DIR', dirname(__FILE__) . '/wp-uploads/tmp');

/**
 * Required for Cloudflare forwarding
 * https://codex.wordpress.org/Function_Reference/is_ssl
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

{% if wordpress_ssl_enabled %}
define('FORCE_SSL_ADMIN', true);
$_SERVER['HTTPS'] = 'on';
{% endif %}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
