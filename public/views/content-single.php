<?php
/**
 * Getbenonit ( content-single.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<article class="post">

	<header class="entry-header">
		<h1 class="entry-title"><?= widow( e( $entry->title() ) ) ?></h1>
		<div class="entry-metadata">
			<?php if ( $entry->author() ) : ?>
				<span class="entry-author"><?php include( public_path( 'svg/user.svg.php' ) ); ?><a href="<?= e( uri() . '/about-me' ); ?>"><?= e( $entry->author()->title() ) ?></a></span>
			<?php endif ?>

			<?php if ( $entry->date() ) : ?>
				<span class="entry-date"><?php include( public_path( 'svg/calendar-alt.svg.php' ) ); ?><?= e( $entry->date() ) ?></span>
			<?php endif ?>
		</div>
	</header>

	<div class="entry-content">
		<?= $entry->content() ?>
	</div>

	<footer class="entry-taxonomies">
		<div class="entry-category">
		<?php if ( $entry->terms( 'category' ) ) : ?>
			<?php foreach ( $entry->terms( 'category' ) as $term ) : ?>
				# <a href="<?= e( $term->uri() ) ?>"><?= e( $term->title() ) ?></a>
			<?php endforeach ?>
		<?php endif ?>
		</div>
		<div class="entry-tags">
			<?php if ( $entry->terms( 'tag' ) ) : ?>
				<?php foreach ( $entry->terms( 'tag' ) as $term ) : ?>
					# <a href="<?= e( $term->uri() ) ?>"><?= e( $term->title() ) ?></a>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</footer>

</article>