<?php
/**
 * Getbenonit ( home.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => ! empty( $title ) ? $title : '' ] )->display() ?>
<section id="about" class="site-about">
	<div class="content-area">
		<?php foreach ( $entries->all() as $entry ) : ?>
			<?php Benlumia007\Alembic\Engine::view( 'public/views/content', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>
		<?php endforeach ?>
	</div>
</section>
<section id="portfolio" class="site-portfolio">
	<div class="content-area">
		<?php $portfolios = new Benlumia007\Alembic\Entry\Entries( new Benlumia007\Alembic\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'portfolio' )->path() ),
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
			<div class="has-3-columns">
				<?php foreach ( $portfolios->all() as $portfolio ) : ?>
					<div class="item">
						<img src="<?php echo uri( $portfolio->meta( 'thumbnail' ) ); ?>" />
						
						<?php if ( $portfolio->terms( 'tag' ) ) : ?>
							<div class="caption">
								<?php foreach ( $portfolio->terms( 'tag' ) as $term ) : ?>
								<a href="<?= $portfolio->uri() ?>"><h3 class="caption-text"><?php printf( e( $portfolio->title() ) ); ?></h3></a>
								<span class="caption-term"><?= e( $term->title() ) ?></span>
							</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- <section id="blog" class="site-blog">
	<div class="content-area">
		<?php
		$posts = new Benlumia007\Alembic\Entry\Entries(
			new Benlumia007\Alembic\Entry\Locator(
				Benlumia007\Alembic\ContentTypes::get( 'post' )->path()
			),
			[
				'order' => 'desc',
				'number' => 2
			]
		); ?>
		<header class="entry-header">
			<h1 class="entry-title">Blog</h1>
			<span>Latest News</span>
		</header>
		<div class="entry-content">
			<div class="grid has-2-columns">
				<?php foreach ( $posts->all() as $post ) : ?>
					<div class="item">
						<figure class="post-thumbnail">
							<img src="<?php echo uri( $post->meta( 'thumbnail' ) ); ?>" />
						</figure>
						<header class="blog-header">
							<h1 class="blog-title"><a href="<?= $post->uri(); ?>"><?= $post->title(); ?></a></h1>
						</header>
						<div class="blog-metadata">
							<?= $post->author()->title(); ?>
						</div>
						<div class="blog-content">
							<?= $post->excerpt(); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section> -->
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>

