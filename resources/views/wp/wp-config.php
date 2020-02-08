<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'gowifi_wp' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'gowifiadmin' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', 'gowifi-BD-2020' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/** Para que no pida el FTP a la hora de instalar plugins y otros casos */
define('FS_METHOD', 'direct');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'Fy!GX1]|O]_aE_AXal-4@*xN%ZE/QUJrzVnoH!#zqn2S2pITBx>]#`$>aCDuY:gn' );
define( 'SECURE_AUTH_KEY', '?.`gU(ck+SiX5 S8fT1)Hj{gf7{}P+S/cRf%gx4ddgB|YpjSK:Q7Uxh^I5 (+OG!' );
define( 'LOGGED_IN_KEY', 's2o1a?iWXX 4Usqq4]G;Z^tf&S{6i=>kPj1ws8BE-39fBty:b]V8/EEDU|+lH>9*' );
define( 'NONCE_KEY', 'NQx(]vO]ho~7VVK u6}[gkdi?%lNl$*mwq<v Y]$_`iKvNQP6ZX7oTkNy>oqec]c' );
define( 'AUTH_SALT', '^#vR&%M}pBf^iK<DYPBviXt}uc9y3xjB:BB>y6A`%~eN5G(:vLu-1;d$!N!cmWxm' );
define( 'SECURE_AUTH_SALT', 'r:2O!hr]sNb/Hfl>sj0;28(uwjK/2~iFgb2?<t09Y|asS^%uy~Fqmst2sGq5Y0!b' );
define( 'LOGGED_IN_SALT', 'TB]3P<|<V>fVCGC FzUvl[n=~[p5&)JK^=GX5sj=K:M;JxE&pT+rH#Tpaxwd>@40' );
define( 'NONCE_SALT', '`ITOD6#=Z[_z/2Y+@^h]y7IyLoQwCzGrD@y}mvsd>Hv0(Tr|*@<LO;!8{EPjv& 8' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

