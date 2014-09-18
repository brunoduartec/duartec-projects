<?php /* Template Name: Archives */ ?>
<?php get_header(); ?>


<!-- post -->
<div id="post">

<div class="post">

<h2 class="title">Arquivos</h2>

<div class="entry">

<?php get_search_form(); ?>
<div style="clear: both;"></div><br />


<h2>Arquivos por mês:</h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
<div style="clear: both;"></div><br />


<h2>Arquivos por categoria:</h2>
<ul>
<?php wp_list_categories(); ?>
</ul>
<div style="clear: both;"></div>


</div>

</div>





<div style="clear: both;"></div>
</div>
<!-- end post -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>