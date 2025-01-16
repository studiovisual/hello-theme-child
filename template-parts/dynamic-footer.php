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
			<a class="sv-footer__logo-link" href="<?php echo home_url(); ?>">
				<img
					src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/logo-studio-footer.svg"
					alt="Logo Studio Visual"
					class="sv-footer__logo"
				/>
			</a>
			<p class="sv-footer__description"><?php echo esc_html(get_bloginfo('description', 'display')); ?></p>

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

		<?php if (has_nav_menu('primary-footer-menu')): ?>
			<nav class="sv-footer__menu" aria-labelledby="footer-menu">
				<?php
				$menu_items = wp_get_nav_menu_items(get_nav_menu_locations()['primary-footer-menu']);
				if ($menu_items):
					foreach ($menu_items as $item):
						if ($item->menu_item_parent == 0): ?>
							<div class="sv-footer__menu-item">
								<details class="sv-footer__accordion-item" open>
									<summary>
										<a href="<?php echo esc_url($item->url); ?>">
											<?php echo esc_html($item->title); ?>
										</a>
									</summary>
									<?php
									// Display sub-items
									$sub_items = array_filter($menu_items, fn($sub_item) => $sub_item->menu_item_parent == $item->ID);
									if ($sub_items): ?>
										<ul>
											<?php foreach ($sub_items as $sub_item): ?>
												<li><a href="<?php echo esc_url($sub_item->url); ?>"><?php echo esc_html($sub_item->title); ?></a></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</details>
							</div>
						<?php endif;
					endforeach;
					else: ?>
						<p>Erro ao carregar os itens do menu de rodapé.</p>
				<?php endif; ?>
			</nav>
		<?php else: ?>
			<p>Menu de rodapé não configurado.</p>
		<?php endif; ?>
	</div>
</footer>