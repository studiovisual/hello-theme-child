<?php

/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$stylesheet_dir_uri = esc_url(get_stylesheet_directory_uri());

?>

<footer id="sv-footer" class="sv-footer">
	<div class="sv-footer__container">
		<div class="sv-footer__content">
			<a class="sv-footer__logo-link" href="<?php echo home_url(); ?>" title="Ir para a página inicial">
				<img
					src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/logo-studio-footer.svg"
					alt="Logo Studio Visual"
					class="sv-footer__logo"
				/>
			</a>


			<p class="sv-footer__description">Ultrapasse as metas do seu projeto digital com a Studio Visual.</p>

			<div class="sv-footer__social_icons">
				<?php
					$social_icons = [
						'facebook' => 'https://www.facebook.com/StudioVisualBR',
						'instagram' => 'https://www.instagram.com/studiovisualbr/',
						'linkedin' => 'https://www.linkedin.com/company/studio-visual/'
					];
				foreach ($social_icons as $platform => $link): ?>
					<a
						href="<?php echo esc_url($link); ?>"
						aria-label="Visite nosso perfil no <?php echo ucfirst($platform); ?>"
						title="<?php echo ucfirst($platform); ?> Studio Visual"
						target="_blank"
						rel="noreferrer noopener">
						<img
							src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/social-media/<?php echo $platform; ?>.svg"
							alt="<?php echo ucfirst($platform); ?>"
							width="24"
							height="24"
						>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

		<nav class="sv-footer__menu">
			<?php
				if (has_nav_menu('primary-footer-menu')) {
					wp_nav_menu(array(
						'theme_location' => 'primary-footer-menu',
						'container'      => false,
						'menu_class'     => 'sv-footer__menu-list',
						'depth'          => 2,
					));
				}
			?>
		</nav>
	</div>
</footer>