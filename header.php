<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri()?>/js/index.js"></script>
    <title>Radiokable Landing</title>
    <?php  wp_head()?>

</head>
<body>

<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3">
                <img src="<?php echo get_template_directory_uri()?>/assets/img/logo.png" alt="logo">
            </div>
            <div class="col-9">
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'top_menu',
                            'menu_class' => 'menu-principal',
                            'container_class' => 'container-menu'
                        )
                    ); 
                    ?>
                </nav>
            </div>
        </div>
    </div>

</header>
    
