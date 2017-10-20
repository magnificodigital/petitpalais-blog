<?php
// Breadcrumbs
function custom_breadcrumbs() {
       
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = pll__('Início');
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
                              
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.pll__('Arquivos').'</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.pll__('Arquivos').'</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' '.pll__('Arquivos').'</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.pll__('Arquivos').'</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.pll__('Arquivos').'</strong></li>';
               
        } else if ( is_year() ) {
               
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.pll__('Arquivos').'</strong></li>';
               
        } else if ( is_author() ) {
               
            global $author;
            $userdata = get_userdata( $author );
               
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="'.pll__('Resultados para').': ' . get_search_query() . '">'.pll__('Resultados para').': ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            echo '<li>' . pll__('Página não encontrada') . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

register_nav_menus( array(
    'topo' => 'Topo Cabeçalho',
    'footer' => 'Rodapé',
));

add_filter('excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length($length) {
    return 30; //Nova quantidade de caracteres do excerpt
}

// Mover os scripts para o footer
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

//Troca o logo
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('<?php bloginfo('template_url') ?>/img/logo.png');
            width: 192px;
            height: 74px;
            background-size: 100%;
        }
   </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo'); 

add_theme_support('post-thumbnails');
add_image_size('submenu',265,150, true);
add_image_size('630x465',630,465, true);
add_image_size('600x600',600,600, true);
add_image_size('280x200',280,200, true);
add_image_size('320x375',320,375, true);
add_image_size('490x375',490,375, true);


add_action('wp_enqueue_scripts', 'meu_tema_enqueue_scripts');
function meu_tema_enqueue_scripts() {
    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
        wp_enqueue_script('scripts', get_template_directory_uri()."/js/main.js", array('jquery'));
    } else {
        wp_enqueue_script('scripts', get_template_directory_uri()."/assets/scripts.min.js", array('jquery'));
    }
    wp_localize_script('scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_ajax_fale_conosco', 'fale_conosco_mail');
add_action('wp_ajax_nopriv_fale_conosco', 'fale_conosco_mail');
function fale_conosco_mail() {

    parse_str($_REQUEST['dados'], $array_dados);

    //Fazer a mensagem com uma variavel $mensagem
    $mensagem = "Você tem um novo cadastro\n";
    foreach ($array_dados as $dado => $value) {
        if ($dado != "assunto") {
            $mensagem .= $dado.": ";
            $mensagem .= $value."\n";
        }
    }

    $to = get_option('email_envio');
    $subject = 'Novo Cadastro - '.$array_dados['assunto'];

    if (wp_mail($to, $subject, $mensagem)) {
        echo json_encode(array('mensagem' => 'Cadastro realizado com sucesso!'));
    } else {
        echo json_encode(array('mensagem' => 'Não foi possível realizar o cadastro.'));
    }

    wp_die();

}

function my_general_section() {

    add_settings_section(
        'enderecos', 
        'Endereços', 
        '', 
        'general' 
    );

    add_settings_field( 
        'facebook_icon', 
        'Facebook', 
        'my_textbox_callback', 
        'general', 
        'enderecos',
        array( 
            'facebook_icon' 
        )  
    ); 

    add_settings_field( 
        'instagram_icon', 
        'Instagram', 
        'my_textbox_callback', 
        'general', 
        'enderecos', 
        array(
            'instagram_icon' 
        )  
    );

    add_settings_field( 
        'whatsapp_icon', 
        'Número WhatsApp', 
        'my_textbox_callback', 
        'general', 
        'enderecos', 
        array(
            'whatsapp_icon' 
        )  
    );

    add_settings_field( 
        'linkedin_icon', 
        'Linkedin', 
        'my_textbox_callback', 
        'general', 
        'enderecos', 
        array(
            'linkedin_icon' 
        )  
    );

    add_settings_field( 
        'google_icon', 
        'Google +', 
        'my_textbox_callback', 
        'general', 
        'enderecos', 
        array(
            'google_icon' 
        )  
    );

    add_settings_field( 
        'pinterest_icon',
        'Pinterest', 
        'my_textbox_callback', 
        'general', 
        'enderecos', 
        array(
            'pinterest_icon' 
        )  
    );

    add_settings_field( 
        'email_envio',
        'Email para envio', 
        'my_textbox_callback', 
        'general', 
        'enderecos', 
        array(
            'email_envio' 
        )  
    );
  
    register_setting('general','facebook_icon', 'esc_attr');
    register_setting('general','instagram_icon', 'esc_attr');
    register_setting('general','whatsapp_icon', 'esc_attr');
    register_setting('general','linkedin_icon', 'esc_attr');
    register_setting('general','google_icon', 'esc_attr');
    register_setting('general','pinterest_icon', 'esc_attr');
    register_setting('general','email_envio', 'esc_attr');

}

add_action('admin_init', 'my_general_section'); 

function my_textbox_callback($args) {
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" class="regular-text" />';
}

//Posts relacionados
function my_related_posts($number) {
    $args = array('posts_per_page' => $number, 'post_in'  => get_the_tag_list());
    $the_query = new WP_Query( $args );
    $posts = array();
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $post['titulo'] = get_the_title();
        $post['link'] = get_the_permalink();
        $post['data'] = get_the_time('d/m/Y');
        $post['thumbnail'] = get_the_post_thumbnail($id,'320x375', array('title' => get_the_title(), 'alt' => get_the_title()));
        array_push($posts, $post);
    endwhile;
    wp_reset_postdata();
    wp_reset_query();
    return $posts;
}

//Traduções estáticas
pll_register_string('Data', 'Data', 'petitpalais', false);
pll_register_string('Leia Sobre', 'Leia Sobre', 'petitpalais', false);
pll_register_string('Mais Lidas', 'Mais Lidas', 'petitpalais', false);
pll_register_string('De volta ao topo', 'De volta ao topo', 'petitpalais', false);
pll_register_string('Categorias', 'Categorias', 'petitpalais', false);
pll_register_string('Siga-nos', 'Siga-nos', 'petitpalais', false);
pll_register_string('Receba novidades por e-mail', 'Receba novidades por e-mail', 'petitpalais', false);
pll_register_string('Política de Privacidade', 'Política de Privacidade', 'petitpalais', false);
pll_register_string('Contato', 'Contato', 'petitpalais', false);
pll_register_string('Entrega a nível nacional através da DHL ou Fedex', 'Entrega a nível nacional através da DHL ou Fedex', 'petitpalais', false);
pll_register_string('Aceitamos', 'Aceitamos', 'petitpalais', false);
pll_register_string('Nome', 'Nome', 'petitpalais', false);
pll_register_string('Telefone', 'Telefone', 'petitpalais', false);
pll_register_string('Mensagem', 'Mensagem', 'petitpalais', false);
pll_register_string('Enviar', 'Enviar', 'petitpalais', false);
pll_register_string('Exibir telefone', 'Exibir telefone', 'petitpalais', false);
pll_register_string('Página não encontrada', 'Página não encontrada', 'petitpalais', false);
pll_register_string('Resultados para', 'Resultados para', 'petitpalais', false);
pll_register_string('Arquivos', 'Arquivos', 'petitpalais', false);
pll_register_string('Início', 'Início', 'petitpalais', false);
pll_register_string('Sua busca não foi encontrada', 'Sua busca não foi encontrada', 'petitpalais', false);
pll_register_string('A página que você está buscando não foi encontrada, você pode fazer uma nova busca ou', 'A página que você está buscando não foi encontrada, você pode fazer uma nova busca ou', 'petitpalais', false);
pll_register_string('voltar para home', 'voltar para home', 'petitpalais', false);
pll_register_string('O que você está procurando?', 'O que você está procurando?', 'petitpalais', false);
pll_register_string('Buscar', 'Buscar', 'petitpalais', false);
pll_register_string('Entre em contato conosco', 'Entre em contato conosco', 'petitpalais', false);
pll_register_string('Use o formulário abaixo ou fale conosco por telefone, e-mail ou pelas redes sociais. Vamos adorar conversar com você!', 'Use o formulário abaixo ou fale conosco por telefone, e-mail ou pelas redes sociais. Vamos adorar conversar com você!', 'petitpalais', false);
pll_register_string('Compartilhar', 'Compartilhar', 'petitpalais', false);
pll_register_string('Posts Relacionados', 'Posts Relacionados', 'petitpalais', false);
pll_register_string('Leitura', 'Leitura', 'petitpalais', false);


register_post_type('banner',
    array(
        'labels' => array(
            'name' => __('Banners'),
            'singular_name' => __('Banner'),
            'menu_name' => 'Banners',
            'all_items' => 'Todos os Banners'
        ),
    'public' => true,
    'rewrite' => array('slug' => 'banner', 'with_front' => false),
    'has_archive' => false,      
    'supports' => array('title'),
    'menu_icon' => 'dashicons-images-alt'
    )
);

?>