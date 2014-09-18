<?php get_header(); ?>

<!-- posts -->
<div id="posts">


<?php if (have_posts()) : ?>


<div class="post">
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="title">Arquivos da Categoria &#8216;<?php single_cat_title(); ?>&#8217;</h2>

<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="title">Posts com a tag &#8216;<?php single_tag_title(); ?>&#8217;</h2>

<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="title">Arquivos de <?php the_time('F jS, Y'); ?></h2>

<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="title">Arquivos de <?php the_time('F, Y'); ?></h2>

<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="title">Arquivos de <?php the_time('Y'); ?></h2>

<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="title">Arquivos por autor</h2>

<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="title">Arquivos do Blog</h2>

<?php } ?>

</div>
<div style="clear: both;"></div>



<?php while (have_posts()) : the_post(); ?>
		

<div class="post" id="post-<?php the_ID(); ?>">
<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente para <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="post-header">Categorias: <?php the_category(', ') ?></div>
<div class="entry">
<?php the_content('Leia mais &raquo;'); ?>
<div style="clear: both;"></div>
</div>
<div class="post-footer">Escrito por <?php the_author() ?> em <?php the_time('F jS, Y') ?> | <?php comments_popup_link('Nenhum coment&aacute;rio &#187;', '1 coment&aacute;rio &#187;', '% coment&aacute;rio &#187;'); ?><br />
<?php the_tags('Tags: ', ', ', ''); ?> <?php edit_post_link('Editar', '', ' | '); ?></div>
</div>
					
			

<?php endwhile; ?>

<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Arquivos mais antigos') ?></div>
<div class="alignright"><?php previous_posts_link('Arquivos mais recentes &raquo;') ?></div>
</div>


<?php endif;?>





<div style="clear: both;"></div>
</div>
<!-- end posts -->	


<?php get_sidebar(); ?>

<?php get_footer(); ?>