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
?>
<footer class="sv-footer">
            <div class="sv-footer__container">
                <div class="sv-footer__social-logo">
                    <div class="sv-footer__logo">
                        <img src="https://www.tracbel.com.br/wp-content/uploads/2022/05/logo-tracbel.svg" alt="Logo Tracbel" class="sv-footer__logo-img">
                    </div>
                    <div class="sv-footer__social">
                        <a class="sv-footer__social-item" href="https://www.linkedin.com/company/tracbel-s-a/" target="_blank" aria-label="Acesso ao Linkedin" title="Acesso ao linkedin">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z"></path>
                            </svg>
                        </a>
                        <a class="sv-footer__social-item" href="https://www.instagram.com/grupotracbel/" target="_blank" aria-label="Acesso ao Instagram" title="Acesso ao instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M 8 3 C 5.243 3 3 5.243 3 8 L 3 16 C 3 18.757 5.243 21 8 21 L 16 21 C 18.757 21 21 18.757 21 16 L 21 8 C 21 5.243 18.757 3 16 3 L 8 3 z M 8 5 L 16 5 C 17.654 5 19 6.346 19 8 L 19 16 C 19 17.654 17.654 19 16 19 L 8 19 C 6.346 19 5 17.654 5 16 L 5 8 C 5 6.346 6.346 5 8 5 z M 17 6 A 1 1 0 0 0 16 7 A 1 1 0 0 0 17 8 A 1 1 0 0 0 18 7 A 1 1 0 0 0 17 6 z M 12 7 C 9.243 7 7 9.243 7 12 C 7 14.757 9.243 17 12 17 C 14.757 17 17 14.757 17 12 C 17 9.243 14.757 7 12 7 z M 12 9 C 13.654 9 15 10.346 15 12 C 15 13.654 13.654 15 12 15 C 10.346 15 9 13.654 9 12 C 9 10.346 10.346 9 12 9 z"></path>
                            </svg>
                        </a>
                        <a class="sv-footer__social-item" href="https://www.facebook.com/GrupoTracbel" target="_blank" aria-label="Acesso ao Facebook" title="Acesso ao facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                <path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"></path>
                            </svg>
                        </a>
                        <a class="sv-footer__social-item" href="https://www.youtube.com/channel/UCGVXh77FF9AWORQEefO6ZDQ" target="_blank" aria-label="Acesso ao Youtube" title="Acesso ao youtube">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                                <path d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="sv-footer__session--links">
                    <div class="sv-footer__column">
                        <h2 class="sv-footer__column-title">GRUPO TRACBEL</h2>
                        <ul class="sv-footer__column-list">
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/sobre-grupo-tracbel/">Grupo Tracbel</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://vagasgrupotracbel.rhgestor.com.br/">Trabalhe Conosco</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/responsabilidade-social/">Responsabilidade Social</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/onde-encontrar/">Onde encontrar</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/conselho-de-administracao/">Conselho de administração</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/conduta-e-etica-do-grupo-tracbel/">Conduta e Ética do Grupo Tracbel</a></li>
                        </ul>
                    </div>
                    <div class="sv-footer__column">
                        <h2 class="sv-footer__column-title">MARCAS</h2>
                        <ul class="sv-footer__column-list">
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link sv-footer__column-list-item-link--highlight" href="https://www.tracbel.com.br/retroescavadeiras-bull/">Retroescavadeiras – Bull</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/veiculos/">Caminhões e Ônibus – Volvo</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/escavadeiras-volvo/">Escavadeiras – Volvo</a></li>
                        </ul>
                    </div>
                    <div class="sv-footer__column">
                        <h2 class="sv-footer__column-title">SOLUÇÕES</h2>
                        <ul class="sv-footer__column-list">
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/solucoes/treinamentos/">Treinamentos</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/solucoes/solucoes-financeiras/">Soluções Financeiras</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/solucoes/manutencao-e-suporte/">Manutenção e Suporte</a></li>
                        </ul>
                    </div>
                    <div class="sv-footer__column">
                        <h2 class="sv-footer__column-title">NOTÍCIAS</h2>
                        <ul class="sv-footer__column-list">
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/blog/">Blog</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/sala-de-imprensa/">Sala de Imprensa</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/wp-content/uploads/2023/09/NC-Tracbel-Anuncio-de-Inicio-OFERTA-PUBLICA-DE-DISTRIBUICAO.pdf">Notícias de ofertas públicas</a></li>
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/revista-tracbel-2023/">Especial Tracbel 55 anos</a></li>
                        </ul>
                    </div>
                    <div class="sv-footer__column">
                        <h2 class="sv-footer__column-title">FALE CONOSCO</h2>
                        <ul class="sv-footer__column-list">
                            <li class="sv-footer__column-list-item"><a class="sv-footer__column-list-item-link" href="https://www.tracbel.com.br/contato/">Contato</a></li>
                        </ul>
                        <p class="sv-footer__contact-info"><strong>Tracbel Máquinas e Equipamentos – Brasil<br><span class="sv-footer__phone-number">0800 200 1000</span></strong></p>
                        <p class="sv-footer__contact-info"><strong>Tracbel Ônibus e Caminhões – Norte<br><span class="sv-footer__phone-number">0800 200 8880</span></strong></p>
                        <p class="sv-footer__contact-info"><strong>Tracbel Ônibus e Caminhões – Nordeste<br><span class="sv-footer__phone-number">0800 085 7500</span></strong></p>
                        <p class="sv-footer__working-hours">De segunda a sexta das 8h às 17h48</p>
                    </div>
                </div>

                <div class="sv-footer__divider"></div>
                <div class="sv-footer__session--copyright">
                    <p class="sv-footer__copyright">Tracbel © 2025. Todos os direitos reservados. | <a class="sv-footer__copyright-link" href="/politica-de-privacidade">Política de Privacidade</a> | Desenvolvido por: <a class="sv-footer__copyright-link" href="https://www.studiovisual.com.br" target="_blank">Studio Visual</a></p>
                </div>
            </div>
        </footer>