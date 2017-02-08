<?php
add_theme_support('post-thumbnails');

function add_post_type_imoveis(){

    $nomeSingular = 'Imóvel';
    $nomePlural = 'Imóveis';
    $description = 'Imóveis da imobiliária';

    $labels = array(
        'name' => $nomePlural,
        'name_singular' => $nomeSingular,
        'add_new_item' => 'Adicionar novo ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'not_found' => 'Nenhum ' .$nomeSingular .' encontrado.' 
    );
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'description' => $description,
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => $supports
    );

    register_post_type('imovel', $args);
}

add_action('init','add_post_type_imoveis');

function register_menu_navegation(){
    register_nav_menu('header-menu','main-menu');
}

add_action('init','register_menu_navegation');

function getTitle(){
    bloginfo('name');
    if(!is_home()) echo ' | ';
    the_title();
}

function register_taxonomy_localizacao(){

    $nomeSingular = 'Localização';
    $nomePlural = 'Localizações';


    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'add_new_item' => 'Adicionar ' . $nomeSingular,
        'separate_items_with_commas' => 'Separe as ' . $nomePlural .' por vírgulas'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true
    );

    register_taxonomy('localizacao','imovel', $args); 
}

add_action('init','register_taxonomy_localizacao');

function preenche_conteudo_informacoes_imovel($post) {  

    $imoveis_meta_data = get_post_meta( $post->ID );?>

    <style>
        .maluras-metabox {
            display: flex;
            justify-content: space-between;
        }

        .maluras-metabox-item {
            flex-basis: 30%;

        }

        .maluras-metabox-item label {
            font-weight: 700;
            display: block;
            margin: .5rem 0;

        }

        .input-addon-wrapper {
            height: 30px;
            display: flex;
            align-items: center;
        }

        .input-addon {
            display: block;
            border: 1px solid #CCC;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
            height: 100%;
            width: 30px;
            text-align: center;
            line-height: 30px;
            box-sizing: border-box;
            background-color: #888;
            color: #FFF;
        }

        .maluras-metabox-input {
            height: 100%;
            border: 1px solid #CCC;
            border-left: none;
            margin: 0;
        }

    </style>
    <div class="maluras-metabox">
        <div class="maluras-metabox-item">
            <label for="maluras-preco-input">Preço:</label>
            <div class="input-addon-wrapper">
                <span class="input-addon">R$</span>
                <input id="maluras-preco-input" class="maluras-metabox-input" type="text" name="preco_id"
                value="<?= number_format($imoveis_meta_data['preco_id'][0], 2, ',', '.'); ?>">
            </div>
        </div>

        <div class="maluras-metabox-item">
            <label for="maluras-vagas-input">Vagas:</label>
            <input id="maluras-vagas-input" class="maluras-metabox-input" type="number" name="vagas_id"
            value="<?= $imoveis_meta_data['vagas_id'][0]; ?>">
        </div>

        <div class="maluras-metabox-item">
            <label for="maluras-banheiros-input">Banheiros:</label>
            <input id="maluras-banheiros-input" class="maluras-metabox-input" type="number" name="banheiros_id"
            value="<?= $imoveis_meta_data['banheiros_id'][0]; ?>">
        </div>

        <div class="maluras-metabox-item">
            <label for="maluras-quartos-input">Quartos:</label>
            <input id="maluras-quartos-input" class="maluras-metabox-input" type="number" name="quartos_id"
            value="<?= $imoveis_meta_data['quartos_id'][0]; ?>">
        </div>

    </div>
<?php

}
function register_meta_boxes(){
    add_meta_box(
        'informacoes-imoveis',
        'Informações do Imóvel',
        'preenche_conteudo_informacoes_imovel',
        'imovel',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes','register_meta_boxes');

function salvar_meta_info_imoveis( $post_id ) {
    if( isset($_POST['preco_id']) ) {
        update_post_meta( $post_id, 'preco_id', sanitize_text_field( $_POST['preco_id'] ) );
    }
    if( isset($_POST['vagas_id']) ) {
        update_post_meta( $post_id, 'vagas_id', sanitize_text_field( $_POST['vagas_id'] ) );
    }
    if( isset($_POST['banheiros_id']) ) {
        update_post_meta( $post_id, 'banheiros_id', sanitize_text_field( $_POST['banheiros_id'] ) );
    }
    if( isset($_POST['quartos_id']) ) {
        update_post_meta( $post_id, 'quartos_id', sanitize_text_field( $_POST['quartos_id'] ) );
    }
}

add_action('save_post', 'salvar_meta_info_imoveis');

function enviar_e_checar_email($nome, $email, $mensagem) {
		return wp_mail( 'rafaelnet35@gmail.com', 'Email Imobiliária', 'Nome: ' . $nome . "\n" . $mensagem  );
}
