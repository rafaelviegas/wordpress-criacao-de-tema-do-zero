<?php get_header(); ?>

<main class="home-main">
    <div class="container">
        <h1>Bem-vindo!</h1>
        <ul class="imoveis-listagem">
            <?php 
                $loop = new WP_Query(array('post_type' => 'imovel'));
                if ($loop -> have_posts()){
                    while ($loop -> have_posts()){
                        $loop -> the_post(); 
            ?>
                <li class="imoveis-listagem-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail() ?>
                        <h1><?php the_title();?></h1>
                        <div><?php the_content();?></div> 
                    </a>
                </li>
            <?php            
                    } 
                } 
            ?>
        </ul>
    </div>
</main>
<?php get_footer(); ?>