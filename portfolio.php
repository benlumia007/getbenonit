<?php
/**
 * Benjlu ( single.php )
 *
 * @package   Benjlu
 * @copyright Copyright (C) 2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => $title, 'query' => ! empty( $query ) ? $query : false ] )->display() ?>
	<section id="content" class="site-content">
		<div id="layout" class="right-sidebar">
			<main id="main" class="content-area">
				<?php foreach ( $entries->all() as $entry ) : ?>
					<?php Benlumia007\Alembic\Engine::view( 'public/views/content-portfolio', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>
				<?php endforeach ?>
				</main>
				<aside id="aside" class="sidebar">
					<div class="theme-detail">
						<h2>Theme Detail</h2>
						<table>
							<tbody>
								<tr>
									<th style="text-align: left">Name</th>
									<td><?= $entry->title(); ?></td>
								</tr>
								<tr>
									<th style="text-align: left">Version</th>
									<td><?= $entry->meta( 'version' ); ?></td>
								</tr>
								<tr>
									<th style="text-align: left">Last Updated</th>
									<td><?= $entry->meta( 'updated' ); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="featured">
						<h2 class="featured-title">Features</h2>
						<ul>
							<?php if ( $entry->terms( 'feature' ) ) : ?>
								<?php foreach ( $entry->terms( 'feature' ) as $term ) : ?>
									<li><?= e( $term->title() ) ?></li>
								<?php endforeach ?>
							<?php endif ?>
						</ul>
					</div>
				</aside>
		</div>
	</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>