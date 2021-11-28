<?php get_header(); ?>

<main class='container my-3'>
    <?php 
        if(have_posts()){
            while(have_posts()){
                the_post();
                $taxonomy = get_the_terms(get_the_ID(), 'categoria-productos');
            ?>
            <h1 class="my-3">Este producto es: <?php the_title(); ?></h1>
            <div class="row">
                <div class="col-md-5 col-12">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="col-md-7 col-12">
                    <?php  echo do_shortcode('[contact-form-7 id="32" title="Formulario de contacto 1"]');?>
                    <hr>
                    <div class="singleproduct__paragraph">
                        <?php the_content() ?>
                    </div>
                    <h5>5,5 €/unidad</h5>    
                    <form action="post" class="form-inline">
                        <input class="form-control col-1" title="Unidades" type="number" name="" id="" placeholder="Unidades">
                        <button class="form-control btn btn-info col-2 my-1 ml-1">Comprar</button>
                    </form>
                </div>
            </div>

            <?php $args = array(
                'post_type' => 'producto',
                'post_per_page' => 6,
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria-productos',
                        'field' => 'slug',
                        'terms' => $taxonomy[0]->slug
                    )
                )
            );
            $producto = new WP_Query($args); 
            ?>
            
            <?php if($producto->have_posts()) { ?>
                <h3 class="text-center mt-3">Productos Relacionados</h3>
                <div class="row justify-content-center productos-relacionados">
                    <?php while($producto->have_posts()){
                        $producto->the_post(); ?>
                        <div class="col-2 my-3 text-center">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                                <h4><?php the_title(); ?></h4>
                            </a>
                        </div>  
                    <?php } ?>
                </div>
            <?php } ?>
   
            <?php
            }
        }
    ?>
    
</main>

<?php get_footer(); ?>