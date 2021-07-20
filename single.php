<?php
/**
 * Getbenonit ( single.php )
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
					<?php Benlumia007\Alembic\Engine::view( 'public/views/content-single', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>
				<?php endforeach ?>
				<?php Benlumia007\Alembic\Engine::view( 'public/views/pagination', [], $data )->display() ?>
			</main>
			<aside id="aside" class="sidebar-area">
				<div class="categories">
					<?php $categories = new Benlumia007\Alembic\Entry\Entries( new Benlumia007\Alembic\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'post' )->path() ) ); ?>
					<h2 class="categories-title">Categories</h2>
					<?php foreach( $categories->all() as $category ) : ?>
						<?php if ( $category->terms( 'category' ) ) : ?>
							<ul>
								<?php foreach( $category->terms( 'category' ) as $terms ) : ?>
									<li><a href="<?= $terms->uri(); ?>"><?= $terms->title(); ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</aside>
		</div>
	</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>