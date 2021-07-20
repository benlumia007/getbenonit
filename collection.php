<?php
/**
 * Getbenonit ( collection.php )
 *
 * @package   Getbenonit
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */
?>
<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => $title ] )->display() ?>
    <section id="content" class="site-portfolio">
        <div id="main" class="content-area">
            <article class="page">
            <?php if ( isset( $query ) ) : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?= e( $query->title() ) ?></h1>
                </header>
                <?php if ( $content = $query->content() ) : ?>
                    <div class="entry-content">
                        <?= $content ?>
                    </div>
                <?php endif; ?>
            <?php endif ?>
            </article>
            <div class="entry-content">
                <div class="grid has-3-columns">
                    <?php foreach ( $entries->all() as $post ) : ?>
                        <div class="item">
                            <img src="<?php echo uri( $post->meta( 'thumbnail' ) ); ?>" />
                            
                            <?php if ( $post->terms( 'tag' ) ) : ?>
                                <div class="caption">
                                    <?php foreach ( $post->terms( 'tag' ) as $term ) : ?>
                                    <a href="<?= $post->uri() ?>"><h3 class="caption-text"><?php printf( e( $post->title() ) ); ?></h3></a>
                                    <span class="caption-term"><?= e( $term->title() ) ?></span>
                                </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    <?php endforeach; ?>
                    <?php Benlumia007\Alembic\Engine::view( 'public/views/pagination', [], $data )->display() ?>
                </div>
            </div>
        </div>
    </section>
<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>