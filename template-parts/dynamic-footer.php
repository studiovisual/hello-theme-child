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
<footer id="sv-footer" class="sv-footer">

<div class="sv-footer__sessao-principal">
  <div class="sv-footer__coluna">
    <?php
    if ( function_exists( 'the_custom_logo' ) ) {
        echo get_custom_logo(); // Exibe o logo do site
    }
    ?>
    <p><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
	  
	<div class="sv-footer__icones-sociais">
    <a href="https://pt-br.facebook.com/Siteware/" aria-label="Visite nosso perfil no Facebook" title="Facebook Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/facebook.svg" alt="Facebook" width="24" height="24">
    </a>
    <a href="https://www.instagram.com/sitewaresolucoes/" aria-label="Visite nosso perfil no Instagram" title="Instagram Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/instagram.svg" alt="Instagram" width="24" height="24">
    </a>
    <a href="https://br.linkedin.com/company/siteware" aria-label="Visite nosso perfil no LinkedIn" title="Linkedin Siteware">
	  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/social-media/linkedin.svg" alt="Linkedin" width="24" height="24">
    </a>		
  </div>
	  
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
    <div class="sv-footer__coluna">
 
        <details id="details-desktop" open class="sv-footer__item-acordeao">
            <summary role="button" aria-expanded="true"><a href="<?php echo esc_url( $column['url'] ); ?>"><?php echo esc_html( $column['title'] ); ?></a></summary>

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

</footer>