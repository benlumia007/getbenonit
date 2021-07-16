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
<section id="about" class="site-about">
	<div class="content-area">
		<div class="page">
			<?php foreach ( $entries->all() as $entry ) : ?>
				<?php Benlumia007\Alembic\Engine::view( 'public/views/content', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>
			<?php endforeach ?>
		</div>
	</div>
</section>
<section id="portfolio" class="site-portfolio">
	<div class="content-area">
		<div class="page">
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
				<span>Some of my recent works.</span>
			</header>

			<div class="entry-content">
				<div class="items">
					<?php foreach ( $posts->all() as $post ) : ?>
						<div class="item">
							<img src="<?php echo uri( $post->meta( 'thumbnail' ) ); ?>" />
							
							<?php if ( $post->terms( 'category' ) ) : ?>
								<div class="caption">
									<?php foreach ( $post->terms( 'category' ) as $term ) : ?>
									<a href="<?= $post->uri() ?>"><h3 class="caption-text"><?php printf( e( $post->title() ) ); ?></h3></a>
									<span class="caption-term"><?= e( $term->title() ) ?></span>
								</div>
								<?php endforeach ?>
							<?php endif ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>