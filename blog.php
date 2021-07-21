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
	<section id="content" class="site-content">
		<div id="layout" class="right-sidebar">
			<main id="main" class="content-area">
				<?php foreach ( $entries->all() as $entry ) : ?>
					<?php Benlumia007\Alembic\Engine::view( 'public/views/content', [ $entry->type()->name() ], [ 'entry' => $entry ] )->display() ?>
				<?php endforeach ?>
				<?php Benlumia007\Alembic\Engine::view( 'public/views/pagination', [], $data )->display() ?>
			</main>
			<aside id="aside" class="sidebar-area">
				<div class="categories">
					<?php $categories = new Benlumia007\Alembic\Entry\Entries( new Benlumia007\Alembic\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'category' )->path() ) ); ?>
					<h2 class="categories-title">Categories</h2>
					<?php foreach( $categories->all() as $category ) : ?>
						<ul>
								<li><a href="<?= $category->uri(); ?>"><?= $category->title(); ?></a></li>
							</ul>
					<?php endforeach; ?>
				</div>
				<div class="archives">
					<?php 
						$current_year = $current_month = $current_day = '';
						$posts = new Benlumia007\Alembic\Entry\Entries( new Benlumia007\Alembic\Entry\Locator( Benlumia007\Alembic\ContentTypes::get( 'post' )->path() ),
							[
								'order' => 'desc',
								'number' => PHP_INT_MAX
							]
						); 
					?>
					<h2 class="archives-title">Archives</h2>

<div class="o-content-width mt-8">

<?php foreach ( $posts->all() as $post ) : ?>

	<?php
	$timestamp = is_numeric( $post->meta( 'date' ) ) ? $post->meta( 'date' ) : strtotime( $post->meta( 'date' ) );

	// Get the post's year and month. We need this to compare it with the previous post date.
	$year   = date( 'Y', $timestamp );
	$month  = date( 'm', $timestamp );
	$daynum = date( 'd', $timestamp );

	// If the current date doesn't match this post's date, we need extra formatting.
	if ( $current_year !== $year || $current_month !== $month ) :

		// Set the current year and month to this post's year and month.
		$current_year  = $year;
		$current_month = $month;
		$current_day   = '';

		echo '<ul>';
		printf(
			'<li><a class="text-gray-700 no-underline hover:underline border-0" href="%s">%s</a></li>',
			\Benlumia007\Alembic\App::resolve( 'content/types' )->get( 'post' )->uri( "{$year}/{$month}" ),
			date( 'F Y', $timestamp )
		);
		echo '</ul>';


	endif;
endforeach
					?>
				</div>
			</aside>
		</div>
	</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>