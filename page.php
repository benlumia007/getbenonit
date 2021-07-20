<?php
/**
 * Getbenonit ( page.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => $title, 'query' => ! empty( $query ) ? $query : false ] )->display() ?>
<section id="content" class="site-content">
		<div id="layout" class="right-sidebar">
			<main id="main" class="content-area">
				<?php foreach ( $entries->all() as $entry ) : ?>
					<?php Benlumia007\Alembic\Engine::view( 'public/views/content-page', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>
				<?php endforeach ?>
			</main>
			<aside id="aside" class="sidebar-area">
			
			</aside>
		</div>
	</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>