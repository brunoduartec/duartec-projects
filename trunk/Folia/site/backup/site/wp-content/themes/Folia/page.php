<?php get_header(); ?>

<!-- posts -->
<div id="posts">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="post">
<h2 class="title"><?php the_title(); ?></h2>
<div class="entry">
<?php the_content('Leia mais &raquo;'); ?>
<div style="clear: both;"></div>
</div>
</div>


<?php endwhile; endif; ?>
		
		
<?php edit_post_link('Editar', '<p>', '</p>'); ?>
	
	
	
	
<div style="clear: both;"></div>
</div>
<!-- end posts -->	

<?php get_sidebar(); ?>

<?php get_footer(); ?>