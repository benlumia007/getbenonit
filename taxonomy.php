<?php
/**
 * Getbenonit ( taxonomy.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => $query->title() ] )->display() ?>
<section id="content" class="site-content">
	<div id="main" class="content-area">
		<article class="post">
			<?php if ( isset( $query ) ) : ?>
				<header class="entry-header">
					<h1 class="entry-title"><?= $query->title() ?></h1>

					<?php if ( $desc = $query->content() ) : ?>
						<div class="archive-header__description"><?= $desc ?></div>
					<?php endif ?>
				</header>
			<?php endif ?>

			<ul>
				<?php foreach ( $entries->all() as $entry ) : ?>
					<li><a href="<?= $entry->uri() ?>"><?= $entry->title() ?></a></li>
				<?php endforeach ?>
			</ul>
		</article>
	</div>
</section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>