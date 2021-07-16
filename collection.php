<?php Benlumia007\Alembic\Engine::view( 'header', [], [ 'title' => $title ] )->display() ?>
<section id="content" class="site-content">
		<div id="main" class="content-area">
            <article class="post">
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
		</div>
	</section>

<div class="app-content border-box overflow-hidden relative max-w-full mx-auto pt-16 text-xl leading-loose">
    <main class="app-main mx-auto mb-12 border-box">

        <div class="collection-list o-content-width mt-8">

            <ul>

                <?php foreach ( $entries->all() as $entry ) : ?>

                    <li><a href="<?= $entry->uri() ?>"><?= $entry->title() ?></a></li>

                <?php endforeach ?>

            </ul>

        </div>

        <?php Benlumia007\Alembic\Engine::view( 'public/views/pagination', [], $data )->display() ?>

    </main>
</div>

<?php Benlumia007\Alembic\Engine::view( 'footer' )->display() ?>