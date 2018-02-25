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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B4UJayIeTpLLy0aUvT9lteUPrRG7ccwK4S0meJM70HFpZRKYkKjNYYaEftFUD6jip+OVaHCdH2idVyLhKi7ZkQ==');
define('SECURE_AUTH_KEY',  'k++VoklPLtxkeuHYZT8tg8jJARs3pUcE3vx5iZMrrOz0v6AiI6F9yA9CiuXCJq3c8QOiNzGkVUTuHI0T+PvdRQ==');
define('LOGGED_IN_KEY',    'qkn8PDkOjG37GahXMCC0Oyq++cvvJPDuc19GANnrqWnRdcw6OrNgzViJnLf7yO458HE3T6fZqaRpDAHL1Kvnmw==');
define('NONCE_KEY',        'L6Ezbdyb8qphe/KHB8zaMPlsIiRLkpoSRLInIqUmEAbtjlEnt5qwptycEP5wxk3+MFk92mmtI7bOO76jTQQ8dg==');
define('AUTH_SALT',        'Fe/mTO/IVnXzJJ8SzScdZrwBZT7t9tbrdT6elxtxEKYVQngGuMYs/Ogeq/CntH3NWjKHdcDsLqgYhcYbr7Ns4Q==');
define('SECURE_AUTH_SALT', 'zRuw+rNz/dAHmTitMU+6XXpYekwJcPLrbFIxqi+eE0ylgf7NO/1+7BIBPfX/zCLdQexkSFXdZqltTrHDNcBGtg==');
define('LOGGED_IN_SALT',   'rkLsOEZiKH08ll2WdENVf8/m/vTeDD1/Cu8js6F5wi5Q7ey3gNx2QLMrQmDDE8DcSfSF8YROnJxJKsHs9dyc+g==');
define('NONCE_SALT',       'Hih11jf4CxKSTI8xfKrBfXVkSh2PFx7HAuY4mU4IDj0OdnhwBm5Telya+1jkig2svVc9bbvcD5RlazKj+FOPaA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
