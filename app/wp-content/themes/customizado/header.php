<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php $root = get_template_directory_uri();?>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/reset.css">
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/style.css">
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/assets/css/comum.css">
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?=$root;?>/assets/css/<?= $css_especifico?>.css">
    <title><?php getTitle()?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="container">
            <?php wp_nav_menu(array(
              'theme-location' => 'header-menu'
            )) ?>
        </div>
    </header>

    