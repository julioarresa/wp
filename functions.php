<?php

function init_template(){

    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag');

    register_nav_menus(
        array(
            'top_menu' => 'Menú Principal'
        )
    );

}

add_action('after_setup_theme', 'init_template');

//Añadimos los estilos:
function assets(){
    wp_register_style('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', '', '4.4.1','all');
    wp_register_style('montserrat', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap','','1.0', 'all');
    
    wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap','montserrat'),'1.0', 'all');

    wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js','','1.16.0', true);
    wp_enqueue_script('boostraps', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery','popper'),'4.4.1', true);
    wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', '', '1.0', true);
}

add_action('wp_enqueue_scripts', 'assets');

function sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'footer',
            'descriptio' => 'Zona de widgets para pié de página',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>'
        )

    );
}

add_action('widgets_init', 'sidebar');

function productos_type(){

    $labels = array(
        'name' => 'Productos',
        'singular_name' => 'producto',
        'menu_name' => 'Productos'
    );

    $args = array(
       'label' => 'Productos',
       'description' => 'Productos de Julio',
       'labels' => $labels,
       'supports' => array('title', 'editor', 'thumbnail', 'revisions'), 
       'public' => true,
       'show_in_menu' => true,
       'menu_position' => 5,
       'menu_icon' => 'dashicons-cart',
       'can_export' => true,
       'publicly_queyrable' => true,
       'rewrite' => true,
       'show_in_rest' => true
    );

    register_post_type('producto', $args);
}

add_action('init', 'productos_type');
add_action('init', 'pgRegisterTax');
function pgRegisterTax() {
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Categorías de productos', 
            'singular_name' => 'Categoría de productos'
        ),
        'show_in_nav_menu' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'categoria-productos')
    );
    register_taxonomy('categoria-productos', array('producto'), $args);
}
