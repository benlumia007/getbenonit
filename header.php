<?php
/**
 * Benjlu ( header.php )
 *
 * @package   Benjlu
 * @copyright Copyright (C) 2021. Sex
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Sex ( https://getbenonit.com )
 */
?>
<!doctype html>
<html>
    <head>
		<title><?php
			$route = Benlumia007\Alembic\App::resolve( 'routes' )->currentRoute();
			$paged = '';
			$title_tag = 'p';

			if ( false !== strpos( $route, 'page/{number}' ) ) {
				$p = explode( '/', Benlumia007\Alembic\App::resolve( 'request' )->uri() );
				$paged = ': Page ' . e( array_pop( $p ) );
			}

			if ( '/' === $route || 'page/{number}' === $route ) {
				echo ! empty( $title ) ? e( $title ) . $paged : e( site_title() );
				$title_tag = 'h1';
			} else {
				echo ! empty( $title ) ? e( $title ) . $paged . ' &mdash; ' . e( site_title() ) : e( site_title() );
			}
		?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= e( asset( 'css/screen.css' ) ) ?>" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script rel="javascript" src="<?= e( asset( 'js/app.js' ) ) ?>"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Merriweather:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="alternate" type="application/rss+xml" title="Benjamin Lu's Feed" href="http://feeds.feedburner.com/benlumia007" />
    </head>
<body>
<section id="container" class="site-container">
	<header id="header" class="site-header">
		<div class="branding-navigation">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?= e( uri() ) ?>"><?= e( site_title() ); ?></a></h1>
				<h3 class="site-description"><?= e( site_tagline() ); ?></h3>
			</div>
			<nav id="primary" class="menu-primary">
				<button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?= e( 'Menu' ); ?></button>
				<ul class="menu-items">
					<?php e( primary_menu() ); ?>
				</ul>
			</nav>
		</div>
	</header>