<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? hello_get_footer_layout_class() : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'container' => false,
	'echo' => false,
] );
?>
<footer id="site-footer" class="site-footer dynamic-footer <?php echo esc_attr( $footer_class ); ?>">

<div class="footer-session footer-session-1 principal">
  <div class="column">
    <?php
    if ( function_exists( 'the_custom_logo' ) ) {
        echo get_custom_logo(); // Exibe o logo do site
    }
    ?>
    <p><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
  </div>

  <?php
  if ( has_nav_menu( 'primary-footer-menu' ) ) :
    
    $menu_items = wp_get_nav_menu_items( get_nav_menu_locations()['primary-footer-menu'] );

    if ( $menu_items ) :
        $menu_columns = [];
        
        foreach ( $menu_items as $item ) {
            if ( $item->menu_item_parent == 0 ) {
                
                $menu_columns[$item->ID] = [
                    'title' => $item->title,
                    'url'   => $item->url,
                    'sub_items' => [],
                ];
            } else {
                
                $menu_columns[$item->menu_item_parent]['sub_items'][] = [
                    'title' => $item->title,
                    'url'   => $item->url,
                ];
            }
        } 
	?>
	
	<?php foreach ( $menu_columns as $column ) : ?>
    <div class="column">
        <!-- Versão para Desktop -->
        <details id="details-desktop" open class="footer-menu-item">
            <summary role="button" aria-expanded="true"><a href="<?php echo esc_url( $column['url'] ); ?>"><?php echo esc_html( $column['title'] ); ?></a></summary>

            <?php if ( ! empty( $column['sub_items'] ) ) : ?>
                <ul>
                    <?php foreach ( $column['sub_items'] as $sub_item ) : ?>
                        <li><a href="<?php echo esc_url( $sub_item['url'] ); ?>"><?php echo esc_html( $sub_item['title'] ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </details>

        <!-- Versão para Mobile -->
        <details id="details-mobile" class="footer-menu-item">
            <summary role="button" aria-expanded="false"><?php echo esc_html( $column['title'] ); ?></summary>

            <?php if ( ! empty( $column['sub_items'] ) ) : ?>
                <ul>
                    <?php foreach ( $column['sub_items'] as $sub_item ) : ?>
                        <li><a href="<?php echo esc_url( $sub_item['url'] ); ?>"><?php echo esc_html( $sub_item['title'] ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </details>
    </div>
<?php endforeach; ?>
	
    <?php else :
        echo '<p>Erro ao carregar os itens do menu de rodapé.</p>';
    endif;

  else :
    echo '<p>Menu de rodapé não configurado.</p>';
  endif;
  ?>

</div>
	
  <section class="footer-session-2">
<div class="footer-session-2-container">
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-sup-2021-1440x439-1-1024x312.webp" alt="Endeavor Scale Up">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/TOP-ScaleUps-black.png.webp" alt="TOP Scaleups">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Microsoft-partner-06.webp" alt="Microsoft Partner">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Cubo-05.webp" alt="Cubo">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Criatec-04.webp" alt="Criatec">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Crescera-02.webp" alt="Crescera Capital">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/GPTW-03.webp" alt="Great Place to Work Certification">
  </div>
</div>

  </section>

  <hr class="footer-divider">

  <!-- Sessão 3 -->
  <div class="footer-session footer-session-3">
    <div class="footer-session-3-links">
      <a href="https://siteware.intest.com.br/politicas-de-privacidade/">Políticas de privacidade</a>
      <a href="https://app.pipefy.com/public/form/v7kOE2Us">Canal de denúncias</a>
      <a href="https://siteware.stratws.com/">Acessar o STRATWs One</a>
    </div>

    <div class="footer-session-3-social">
      <p>Nos siga nas redes sociais</p>
      <div class="icones-sociais">
    <a href="https://br.linkedin.com/company/siteware" target="_blank" aria-label="Visite nosso perfil no LinkedIn" title="Linkedin Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/linkedin.svg" alt="Linkedin" width="24" height="24">
    </a>
    <a href="https://pt-br.facebook.com/Siteware/" target="_blank" aria-label="Visite nosso perfil no Facebook" title="Facebook Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/facebook.svg" alt="Facebook" width="24" height="24">
    </a>
    <a href="https://www.instagram.com/sitewaresolucoes/" target="_blank" aria-label="Visite nosso perfil no Instagram" title="Instagram Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/instagram.svg" alt="Instagram" width="24" height="24">
    </a>
    
    <a href="https://www.youtube.com/c/Siteware" target="_blank" aria-label="Visite nosso perfil no YouTube" title="YouTube Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/youtube.svg" alt="YouTube" width="24" height="24">
    </a>
  </div>
    </div>
  </div>

  <section class="footer-copyright">
    <p>Siteware © 2024 Todos os direitos reservados</p>
  </section>
</footer>