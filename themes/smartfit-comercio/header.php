<?php
 
 /** This is header 
* @package OMTBID

*/
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?> SmartFit </title>
    <meta name="robots" content="noindex, nofollow">
    <?php wp_head(); ?>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/favicon.ico" type="image/x-icon" />
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('/organism/o-header/o-header'); ?>