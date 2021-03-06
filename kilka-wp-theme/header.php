<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/main.css?version=<?php echo time(); ?>">

    <?php wp_head(); ?>

</head>
    <body <?php body_class(); ?>>
         <?php
         get_template_part( 'template-parts/navbar');
        ?>
