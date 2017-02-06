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