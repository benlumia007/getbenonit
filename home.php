<?php
/**
 * Benjlu ( home.php )
 *
 * @package   Benjlu
 * @copyright Copyright (C) 2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => ! empty( $title ) ? $title : '' ] )->display() ?>
	<section id="content" class="site-content">
		<div id="main" class="content-area alignwide">
			<?php foreach ( $entries->all() as $entry ) : ?>

			<?php Benlumia007\Alembic\Engine::view( 'public/views/content', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>

			<?php endforeach ?>

			<div class="portfolio">
			<?php

			$posts = new Benlumia007\Alembic\Entry\Entries(
				new Benlumia007\Alembic\Entry\Locator(
					Benlumia007\Alembic\ContentTypes::get( 'portfolio' )->path()
				),
				[
					'order' => 'desc',
					'number' => PHP_INT_MAX
				]
			); ?>

			<header class="entry-header">
				<h1 class="entry-title">Portfolio</h1>
			</header>

			<div class="items">
				<?php foreach ( $posts->all() as $post ) : ?>
					<div class="item">
						<?php printf( e( $post->title() ) ); ?>
					</div>
				<?php endforeach; ?>
			</div>

			<?php Benlumia007\Alembic\Engine::view( 'public/views/pagination', [], $data )->display() ?>
		</div>
	</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>