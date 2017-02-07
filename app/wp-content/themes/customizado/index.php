<?php 
    $queryTaxonomy = array_key_exists('taxonomy', $_GET);

    if($queryTaxonomy && $_GET['taxonomy'] === ''){
        wp_redirect(home_url());
    }

    $css_especifico = 'index';
    require_once('header.php');
?>

<main class="home-main">
    <div class="container">
        <?php $taxonomies = get_terms('localizacao'); ?>
            <form class="busca-localizacao-form">
                <select class="busca-localizacao" name="taxonomy">
                    <option value="">Todos</option>
                    <?php foreach($taxonomies as $taxonomy) { ?>
                        <option value="<?= $taxonomy -> slug; ?>"><?= $taxonomy-> name; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Filtrar">
            </form>
        <ul class="imoveis-listagem">
            <?php
            
                if($queryTaxonomy){
                    $taxQuery = array(
                        array(
                            'taxonomy' => 'localizacao',
                            'field' => 'slug',
                            'terms' => $_GET['taxonomy']
                        )
                    );
                }
         
                $args = array(
                    'post_type' => 'imovel',
                    'tax_query' => $taxQuery
                );

                $loop = new WP_Query($args);
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