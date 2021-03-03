
<?php
/**
 * Camaraderie ( header.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2018-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'camaraderie' ) ?></a>
	<div id="masthead" class="main-navigation">
		<?php Benlumia007\Backdrop\View\display( 'menu', [ 'primary' ] ); ?>
	</div>
	<?php $is_front = ( is_front_page() && ! is_home() ); ?>
		<header id="header" class="site-header <?php echo $is_front ? 'custom' : 'header'; ?>-image">
			<?php if ( $is_front ) { ?>
				<div class="site-avatar"></div>
			<?php } ?>
			<div class="site-branding">
				<?php Benlumia007\Backdrop\Site\display_site_title(); ?>
				<?php Benlumia007\Backdrop\Site\display_site_description(); ?>
			</div>
			<?php if ( is_front_page() ) { ?>
				<div class="author-description">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_author_meta( 'user_description' );
							endwhile;
						endif;
					?>
				</div>
			<?php } ?>
		</header>