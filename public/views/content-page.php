<?php
/**
 * Getbenonit ( content-page.php )
 *
 * @package   GetBenOnit
 * @copyright Copyright (C) 2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<article class="page">
	<header class="entry-header">
		<h1 class="entry-title"><?= $entry->title(); ?></h1>
	</header>

	<div class="entry-content">
		<?= $entry->content() ?>
	</div>
</article>