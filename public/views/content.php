<?php
/**
 * Getbenonit ( content.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php $format = $entry->meta( 'format' ); ?>

<article class="post post-format-<?= $format ? e( $format ) : 'standard' ?>">

	<?php if ( 'aside' !== $format ) : ?>

		<header class="entry-header">
			<h1 class="entry-title"><a href="<?= e( $entry->uri() ) ?>"><?= e( $entry->title() ) ?></a></h1>

			<div class="entry-metadata">
				<?php if ( $entry->date() ) : ?>
					<span class="entry-date"><?= e( $entry->date() ) ?></span>
				<?php endif ?>
			</div>

		</header>

	<?php endif ?>

	<figure class="post-thumbnail">
		<img src="<?php echo uri( $entry->meta( 'thumbnail' ) ); ?>" />
	</figure>

	<?php if ( 'aside' === $format ) : ?>
		<div class="entry-content">
			<?= $entry->content() ?>

		</div>
	<?php else : ?>
		<div class="entry-summary">
			<?= $entry->excerpt() ?>
		</div>
	<?php endif ?>

</article>