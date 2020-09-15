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
define( 'DB_NAME', 'EL_GYgi80Sd' );

/** MySQL database username */
define( 'DB_USER', 'el_sari' );

/** MySQL database password */
define( 'DB_PASSWORD', 'xbRN9vXkK' );

/** MySQL hostname */
define( 'DB_HOST', '10.35.32.7' );

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
define( 'AUTH_KEY',          'U~%%,`y#Uo(Tj,dh:tw74oQ`&,w{Z-_F$tNT4v~*^dnV`rWx`7RU/iMBBsGCVP6D' );
define( 'SECURE_AUTH_KEY',   'mn^zaQ-r,|`S>TceUxq?P~kI2V?J@ct6v8Rpku{I9@^Z$,vON.TIh-Nt3D2J:m5)' );
define( 'LOGGED_IN_KEY',     '2km[ex];]w ~z W_AQ?&UC@u~rpql#U7oHkG*22I2%4`z %KuQpie!39,cEfQF) ' );
define( 'NONCE_KEY',         'IF]G~D@QZjBLIrAk>i{io2)5xV&iAST24_II[/{9Sa}Fl{jcyXCZA+G$ZU3VoEcV' );
define( 'AUTH_SALT',         'R?{>/E?6eG71`q1DG<x7430-7:*Nd8H@d79]UcY!>S,rx;XL`CA|hh|Zu_8|RV,r' );
define( 'SECURE_AUTH_SALT',  'loLulZWChC%SAWg2ulIpQF4^1EjPO9;3K4IS9+|b}!5mB|+%c^9@O=SBMf^hbhc?' );
define( 'LOGGED_IN_SALT',    ')2QwTy3(TeUCd0,mU@aA+6B>:2>M3_k1G:!yQF#cg_z*>PV)]nFi[9+>80(SYO(]' );
define( 'NONCE_SALT',        'V4(,l]-za_`$ObVg,OEd^4?v(mZf}x;AG.w6&fNmXHndlYW/*`@B,I|#qeK;t|7l' );
define( 'WP_CACHE_KEY_SALT', '/y|@*cykU?HZ5:u_R4D{]hd,$C==;KFH7,4j61s~Q@| Dk$0t~HkEhwXa5~>}euq' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'eZTQT_';


        define('WP_HOME', "https://sari.elementor.cloud/");
        define('WP_SITEURL', "https://sari.elementor.cloud/");
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
                $_SERVER['HTTPS'] = 'on';
        }


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
