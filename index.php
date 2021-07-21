<?php
/**
 * Getbenonit ( index.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */

require_once( 'vendor/autoload.php' );

define( 'GETBENONIT_DIR', __DIR__ );

$getbenonit = new Benlumia007\Alembic\Core\Framework();

$config = require_once( 'app/functions-config.php' );

$getbenonit->instance( 'path', GETBENONIT_DIR );
$getbenonit->instance( 'uri', $config['uri'] );
$getbenonit->instance( 'uri/relative', parse_url( $getbenonit->uri, PHP_URL_PATH ) );
$getbenonit->instance( 'routes', new Benlumia007\Alembic\Routing\Routes() );
$getbenonit->singleton( 'cache', function() { return new Benlumia007\Alembic\Tools\Collection(); } );
$getbenonit->instance( 'config/entry', require_once( $getbenonit->path . '/app/functions-entry.php' ) );
$getbenonit->instance( 'path/content', 'user/content' );
$getbenonit->singleton( 'template/engine', Benlumia007\Alembic\Template\Engine\Engine::class );
$getbenonit->singleton( 'content/types', function() { return new Benlumia007\Alembic\Entry\Types(); } );
$getbenonit->instance( 'cache/meta', [ 'date', 'category', 'slug' ] );
$getbenonit->singleton( 'mix', function( $app ) { $file = "{$app->path}/public/mix-manifest.json"; return file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : null; } );
$getbenonit->singleton( 'request', Benlumia007\Alembic\Http\Request::class );
$getbenonit->singleton( 'yaml', Benlumia007\Alembic\Tools\Yaml::class );
$getbenonit->proxy( Benlumia007\Alembic\Proxies\Engine::class, 'Benlumia007\Alembic\Engine' );
$getbenonit->proxy( Benlumia007\Alembic\Proxies\ContentTypes::class, 'Benlumia007\Alembic\ContentTypes' );
$getbenonit->boot();

$getbenonit->routes->get( 'blog/feed', Benlumia007\Alembic\Controllers\Feed::class, 'top' );
$getbenonit->routes->get( 'blog/page/{number}', Benlumia007\Alembic\Controllers\Blog::class, 'top' );

Benlumia007\Alembic\ContentTypes::add( 'category', new Benlumia007\Alembic\Entry\Types\Category( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'feature', new Benlumia007\Alembic\Entry\Types\Feature( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'tag', new Benlumia007\Alembic\Entry\Types\Tag( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'author', new Benlumia007\Alembic\Entry\Types\Author( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'post', new Benlumia007\Alembic\Entry\Types\Post( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'portfolio', new Benlumia007\Alembic\Entry\Types\Portfolio( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::add( 'page', new Benlumia007\Alembic\Entry\Types\Page( $getbenonit->routes ) );
Benlumia007\Alembic\ContentTypes::registerRoutes();
$getbenonit->routes->get( '/blog', Benlumia007\Alembic\Controllers\Blog::class );
$getbenonit->routes->get( '/', Benlumia007\Alembic\Controllers\Home::class );

if ( isset( $_GET['bust-cache'] ) ) {

	if ( 'all' === $_GET['bust-cache'] ) {

		$files = glob( $getbenonit->resolve( 'path' ) . "/user/cache/content/*.json" );

		foreach ( $files as $filename ) {
			unlink( $filename );
		}
	} else {
		$path = $getbenonit->resolve( 'path' ) . '/user/cache';

		$name = preg_replace( '/[^A-Za-z0-9\/_-]/i', '', $_GET['bust-cache'] );

		if ( file_exists( "{$path}/{$name}.json" ) ) {
			unlink( "{$path}/{$name}.json" );
		}
	}
}

// Check if ob_gzhandler already loaded
if ( ini_get( 'output_handler' ) !== 'ob_gzhandler' ) {
	if ( extension_loaded( 'zlib' ) ) {
		if ( ! ob_start( 'ob_gzhandler' ) ) {
			ob_start();
		}
	}
}

// Launch the current controller.
$current = $getbenonit->routes->current();