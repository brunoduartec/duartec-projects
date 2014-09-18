<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">


<!-- utf-8 or iso-8859-1 -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!-- end utf-8 or iso-8859-1 -->

<!-- title page -->
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<!-- end title page -->

<!-- css -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!-- end css -->

<!-- pingback -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- end pingback -->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>
<body>
<!-- start -->


<!-- page -->
<div id="page">


<!-- logo and search -->
<div id="logo-search">

<div id="logo"><h1><?php bloginfo('name'); ?></h1></div>

<div id="search">
<form action="<?php bloginfo('home'); ?>/">
<input name="s" type="text" id="text" value="Pesquisa..." />
<input type="submit" id="submit" value="Ok" />
</form>
</div>

<div style="clear: both;"></div>
</div>
<div style="clear: both;"></div>
<!-- end logo and search -->


<!-- image -->
<div id="image">
</div>
<div style="clear: both;"></div>
<!-- end image -->


<!-- menu -->
<div id="menu">
<ul>
<li <?php if ( is_home() ) { echo ' class="active"'; } ?>><a href="<?php bloginfo('home'); ?>">Home</a></li>
<?php wp_list_pages('title_li=&depth=4&sort_column=menu_order'); ?>
</ul>

<div style="clear: both;"></div>

</div>

<div style="clear: both;"></div>
<!-- end menu -->