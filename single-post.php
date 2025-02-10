<?php
// Impede acesso direto
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$categories = get_the_category();

?>

<main class="single-post-container">
    <!-- Coluna Esquerda -->
    <aside class="sidebar-left">
        <div class="table__content">
            <p class="toc__title"><?php echo __('Conteúdo', 'hello-theme-child'); ?></p>
            <?php echo do_shortcode('[ez-toc]'); ?>
        </div>
        
        <div class="author__content">
            <div class="author__info">
                <a class="author__link" href="<?php echo get_author_posts_url($author_id);?>" title="<?php echo __('Ir para página do autor', 'hello-theme-child'); ?>">
                    <img class="author__image" src="<?php echo get_avatar_url($author_id); ?>" alt="<?php the_author(); ?>" width="69" height="69">
                    <span class="post__author">Por: <span class="author__name"><?php the_author(); ?></span></span>
                </a>
                <br />
                <span class="post__date">Publicação: <?php echo get_the_date('d/m/Y'); ?></span>
            </div>
            <div class="share">
                <a class="icon icon__share-rounded" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" d="M6.227 12.61h4.19v13.48h-4.19zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187z"></path></svg></a>
                <a class="icon icon__share-rounded" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16c0 5.628 3.875 10.35 9.101 11.647v-7.98h-2.474V16H13.1v-1.58c0-4.085 1.849-5.978 5.859-5.978.76 0 2.072.15 2.608.298v3.325c-.283-.03-.775-.045-1.386-.045-1.967 0-2.728.745-2.728 2.683V16h3.92l-.673 3.667h-3.247v8.245C23.395 27.195 28 22.135 28 16"></path></svg></a>
                <a class="icon icon__share-rounded" href="https://x.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" d="M28 8.557a10 10 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.7 9.7 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.94 4.94 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a5 5 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174q-.476-.001-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.9 9.9 0 0 1-6.114 2.107q-.597 0-1.175-.068a13.95 13.95 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013q0-.32-.015-.637c.96-.695 1.795-1.56 2.455-2.55z"></path></svg></a>
                <a class="icon icon__share-rounded" href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" fill-rule="evenodd" d="M16.21 4.41C9.973 4.41 4.917 9.465 4.917 15.7c0 2.134.592 4.13 1.62 5.832L4.5 27.59l6.25-2.002a11.24 11.24 0 0 0 5.46 1.404c6.234 0 11.29-5.055 11.29-11.29 0-6.237-5.056-11.292-11.29-11.292m0 20.69c-1.91 0-3.69-.57-5.173-1.553l-3.61 1.156 1.173-3.49a9.35 9.35 0 0 1-1.79-5.512c0-5.18 4.217-9.4 9.4-9.4s9.397 4.22 9.397 9.4c0 5.188-4.214 9.4-9.398 9.4zm5.293-6.832c-.284-.155-1.673-.906-1.934-1.012-.265-.106-.455-.16-.658.12s-.78.91-.954 1.096c-.176.186-.345.203-.628.048-.282-.154-1.2-.494-2.264-1.517-.83-.795-1.373-1.76-1.53-2.055s0-.445.15-.584c.134-.124.3-.326.45-.488.15-.163.203-.28.306-.47.104-.19.06-.36-.005-.506-.066-.147-.59-1.587-.81-2.173-.218-.586-.46-.498-.63-.505-.168-.007-.358-.038-.55-.045-.19-.007-.51.054-.78.332-.277.274-1.05.943-1.1 2.362-.055 1.418.926 2.826 1.064 3.023.137.2 1.874 3.272 4.76 4.537 2.888 1.264 2.9.878 3.43.85.53-.027 1.734-.633 2-1.297s.287-1.24.22-1.363c-.07-.123-.26-.203-.54-.357z" clip-rule="evenodd"></path></svg></a>
            </div>
        </div>
    </aside>

    <!-- Coluna Central -->
    <article class="post__content">
        <div class="main__category">
            <?php
            if (!empty($categories)) : 
            ?>
                <span class="icon icon__svg">
                    <svg class="e-font-icon-svg e-fas-caret-right" aria-hidden="true" viewBox="0 0 192 512" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z" fill="#E31B23"></path></svg>
                </span>
                <a class="main__category__link" title="<?php echo esc_attr('Categoria', 'hello-theme-child'); ?>" href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo __($categories[0]->name); ?></a>
            <?php endif; ?>
        </div>

        <div class="title">
            <h1 class="post__title"><?php the_title(); ?></h1>
        </div>

        <div class="author__content show__mobile">
            <div class="author__info">
                <a class="author__link" href="<?php echo get_author_posts_url($author_id);?>" title="<?php echo __('Ir para página do autor', 'hello-theme-child'); ?>">
                    <img class="author__image" src="<?php echo get_avatar_url($author_id); ?>" alt="<?php the_author(); ?>" width="69" height="69">
                    <span class="post__author">Por: <span class="author__name"><?php the_author(); ?></span></span>
                </a>
                <br />
                <span class="post__date">Publicação: <?php echo get_the_date('d/m/Y'); ?></span>
            </div>
            <div class="share">
                <a class="icon icon__share-rounded" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" d="M6.227 12.61h4.19v13.48h-4.19zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187z"></path></svg></a>
                <a class="icon icon__share-rounded" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16c0 5.628 3.875 10.35 9.101 11.647v-7.98h-2.474V16H13.1v-1.58c0-4.085 1.849-5.978 5.859-5.978.76 0 2.072.15 2.608.298v3.325c-.283-.03-.775-.045-1.386-.045-1.967 0-2.728.745-2.728 2.683V16h3.92l-.673 3.667h-3.247v8.245C23.395 27.195 28 22.135 28 16"></path></svg></a>
                <a class="icon icon__share-rounded" href="https://x.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" d="M28 8.557a10 10 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.7 9.7 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.94 4.94 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a5 5 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174q-.476-.001-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.9 9.9 0 0 1-6.114 2.107q-.597 0-1.175-.068a13.95 13.95 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013q0-.32-.015-.637c.96-.695 1.795-1.56 2.455-2.55z"></path></svg></a>
                <a class="icon icon__share-rounded" href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#ffffff" fill-rule="evenodd" d="M16.21 4.41C9.973 4.41 4.917 9.465 4.917 15.7c0 2.134.592 4.13 1.62 5.832L4.5 27.59l6.25-2.002a11.24 11.24 0 0 0 5.46 1.404c6.234 0 11.29-5.055 11.29-11.29 0-6.237-5.056-11.292-11.29-11.292m0 20.69c-1.91 0-3.69-.57-5.173-1.553l-3.61 1.156 1.173-3.49a9.35 9.35 0 0 1-1.79-5.512c0-5.18 4.217-9.4 9.4-9.4s9.397 4.22 9.397 9.4c0 5.188-4.214 9.4-9.398 9.4zm5.293-6.832c-.284-.155-1.673-.906-1.934-1.012-.265-.106-.455-.16-.658.12s-.78.91-.954 1.096c-.176.186-.345.203-.628.048-.282-.154-1.2-.494-2.264-1.517-.83-.795-1.373-1.76-1.53-2.055s0-.445.15-.584c.134-.124.3-.326.45-.488.15-.163.203-.28.306-.47.104-.19.06-.36-.005-.506-.066-.147-.59-1.587-.81-2.173-.218-.586-.46-.498-.63-.505-.168-.007-.358-.038-.55-.045-.19-.007-.51.054-.78.332-.277.274-1.05.943-1.1 2.362-.055 1.418.926 2.826 1.064 3.023.137.2 1.874 3.272 4.76 4.537 2.888 1.264 2.9.878 3.43.85.53-.027 1.734-.633 2-1.297s.287-1.24.22-1.363c-.07-.123-.26-.203-.54-.357z" clip-rule="evenodd"></path></svg></a>
            </div>
        </div>

        <div class="featured__image">
            <?php the_post_thumbnail('large'); ?>
        </div>

        <div class="content">
            <div class="table__content show__mobile">
                <p class="toc__title"><?php echo __('Conteúdo', 'hello-theme-child'); ?></p>
                <?php echo do_shortcode('[ez-toc]'); ?>
            </div>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </article>

    <!-- Coluna Direita -->
    <aside class="sidebar-right">
        <div class="post__banner">
            <?php
            $category_id = $categories[0]->term_id;
            $show_banner = get_field('show_banner', 'category_' . $category_id); 

            if ($show_banner) {
                $categories = get_the_category();
                $banner = get_field('banner', 'category_' . $category_id);
                
                // Exibe o banner apenas se houver uma imagem
                if (!empty($banner)) {
                    echo '<a href="' . esc_url($banner['url']['url']) . '" target="_blank" title="Confira">
                            <img src="' . esc_url($banner['imagem']['url']) . '" alt="' . esc_attr($banner['imagem']['alt']) . '">
                        </a>';
                }
            }
            ?>
        </div>
    </aside>


    
</main>

<?php get_footer(); ?>
