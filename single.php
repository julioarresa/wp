<?php get_header(); ?>

<main class='container my-3'>
    <?php 
        if(have_posts()){
            while(have_posts()){
                the_post();
            ?>
            <h1 class="my-3"><?php the_title(); ?></h1>
            <div class="row">
                <div class="col-md-5 col-12">
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="col-md-7 col-12">
                    <?php the_content(); ?>
                    <hr>
                    <h5>5,5 €/unidad</h5>    
                    <form action="post" class="form-inline">
                        <input class="form-control col-1" title="Unidades" type="number" name="" id="" placeholder="Unidades">
                        <button class="form-control btn btn-info col-2 my-1 ml-1">Comprar</button>
                    </form>
                </div>
            </div>
            <?php get_template_part('template-parts/post', 'navigation') ?>    
            <?php
            }
        }
    ?>
    
</main>

<footer>
    <?php get_footer(); ?>
</footer>

