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
            <summary><a href="<?php echo esc_url( $column['url'] ); ?>"><?php echo esc_html( $column['title'] ); ?></a></summary>

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
            <summary><?php echo esc_html( $column['title'] ); ?></summary>

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
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-sup-2021-1440x439-1-1024x312.webp" alt="Logo 1">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/TOP-ScaleUps-black.png.webp" alt="Logo 2">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Microsoft-partner-06.svg" alt="Logo 3">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Cubo-05.svg" alt="Logo 4">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Criatec-04.svg" alt="Logo 5">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Crescera-02.svg" alt="Logo 6">
  </div>
  <div class="footer-session-2-column">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/GPTW-03.svg" alt="Logo 7">
  </div>
</div>

  </section>

  <hr class="footer-divider">

  <!-- Sessão 3 -->
  <div class="footer-session footer-session-3">
    <div class="footer-session-3-links">
      <a href="https://www.siteware.com.br/politicas-de-privacidade/">Políticas de privacidade</a>
      <a href="https://app.pipefy.com/public/form/v7kOE2Us">Canal de denúncias</a>
      <a href="https://siteware.stratws.com/">Acessar o STRATWs One</a>
    </div>

    <div class="footer-session-3-social">
      <p>Nos siga nas redes sociais</p>
      <div class="icones-sociais">
    <a href="https://br.linkedin.com/company/siteware" title="Linkedin Siteware">
      <svg class="icon-linkedin" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
      </svg>
    </a>
    <a href="https://pt-br.facebook.com/Siteware/" title="Facebook Siteware">
      <svg class="icon-facebook" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
      </svg>
    </a>
    <a href="https://www.instagram.com/sitewaresolucoes/" title="Instagram Siteware">
      <svg class="icon-instagram" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
          </svg>
    </a>
    
    <a href="https://www.youtube.com/c/Siteware" title="YouTube Siteware">
      <svg class="icon-youtube" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
      </svg>
    </a>
  </div>
    </div>
  </div>

  <section class="footer-copyright">
    <p>Siteware © 2024 Todos os direitos reservados</p>
  </section>
</footer>