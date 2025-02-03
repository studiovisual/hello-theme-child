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
		<div class="sv-footer__main">
			<div class="sv-footer__content">
				<a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Ir para a página inicial', 'hello-theme-child'); ?>">
					<img
						src="<?php echo $stylesheet_dir_uri; ?>/assets/images/logo-siteware.svg"
						alt="Logo Studio Visual"
						class="sv-footer__logo"
						width="186"
						height="26"
						loading="lazy"
					/>
				</a>
	
				<p class="sv-footer-description">
					<?php esc_html_e('Levando pessoas e empresas mais longe.', 'hello-theme-child'); ?>
				</p>

				<?php if (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'pt-br'): ?>
					<p class="sv-footer__address">
						<strong>Belo Horizonte</strong> <br>
						Rua dos Timbiras, 2352 – 5º andar – Lourdes, Belo Horizonte – MG, 30140-069
					</p>
				<?php endif; ?>
			</div>
		
			<nav class="sv-footer__menu" aria-label="<?php esc_attr_e('Menu Principal do Rodapé', 'hello-theme-child'); ?>">
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

		<div class="sv-footer__certifications">
			<?php
				$certifications = [
					'scale-upv2.webp'     => 'Endeavor Scale Up',
					'top-scaleupsv2.webp' => 'Top Scaleups',
					'microsoft.svg'       => 'Microsoft Partner Gold',
					'cubo.svg'            => 'Cubo Itaú',
					'criatec.svg'         => 'Criatec 2',
					'crescera.svg'        => 'Crescera Capital',
					'great-place.svg'     => 'Great Place to Work'
				];

				foreach ($certifications as $certification => $alt_text): ?>
					<img
						src="<?php echo $stylesheet_dir_uri; ?>/assets/images/certifications/<?php echo esc_attr($certification); ?>"
						alt="<?php echo esc_attr($alt_text); ?>"
						width="100"
						height="65"
						loading="lazy"
					>
			<?php endforeach; ?>
		</div>

		<div class="sv-footer__menu-info">
			<nav class="sv-footer__menu-info-list" aria-label="<?php esc_attr_e('Links Informativos do Rodapé', 'hello-theme-child'); ?>">
				<?php
					if (has_nav_menu('footer-menu-info')) {
						wp_nav_menu(array(
							'theme_location' => 'footer-menu-info',
							'container'      => false,
							'menu_class'     => 'sv-footer__menu-info-list-itens',
							'depth'          => 2,
						));
					}
				?>
			</nav>

			<div class="sv-footer__social-container">
				<p class="sv-footer__social-text">
					<?php esc_html_e('Nos siga nas redes sociais:', 'hello-theme-child'); ?>
				</p>

				<div class="sv-footer__social_icons">
					<?php
						$social_icons = [
							'linkedin'  => 'https://br.linkedin.com/company/siteware',
							'facebook'  => 'https://pt-br.facebook.com/Siteware/',
							'instagram' => 'https://www.instagram.com/sitewaresolucoes/',
							'youtube'   => 'https://www.youtube.com/user/SitewareLabs'
						];
					foreach ($social_icons as $platform => $link): ?>
						<a
							href="<?php echo esc_url($link); ?>"
							aria-label="<?php printf(esc_attr__('Visite nosso perfil no %s', 'hello-theme-child'), ucfirst($platform)); ?>"
							title="<?php echo sprintf(esc_attr__('%s Siteware', 'hello-theme-child'), ucfirst($platform)); ?>"
							target="_blank"
							rel="noopener noreferrer">
							<img
								src="<?php echo $stylesheet_dir_uri; ?>/assets/images/social-media/<?php echo esc_attr($platform); ?>.svg"
								alt="<?php echo esc_attr(ucfirst($platform)); ?>"
								width="24"
								height="24"
								loading="lazy"
							>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<div class="sv-footer__copyright">
			<?php echo 'Siteware © ' . date('Y') . ' - ' . esc_html__('Todos os direitos reservados​', 'hello-theme-child'); ?>
		</div>
	</div>
</footer>