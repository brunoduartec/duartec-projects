<?php get_header(); ?>

<!-- posts -->
<div id="posts">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<div class="post">
<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanete para <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="post-header"><?php echo(str_word_count(get_the_content())); ?> palavras
<br />
Categoria: <?php the_category(', ') ?></div>
<div class="entry">
<?php the_content('Leia mais &raquo;'); ?>
<div style="clear: both;"></div>
</div>
<div class="post-footer">Escrito por <?php the_author() ?> | <?php the_time('d / M / Y') ?>. | <?php comments_popup_link('Nenhum coment&aacute;rio &#187;', '1 coment&aacute;rio &#187;', '% coment&aacute;rios &#187'); ?><br />
<?php the_tags('Tags: ', ', ', ''); ?> <?php edit_post_link('Editar', '<p>', '</p>'); ?></div>
</div>

<?php endwhile; ?>

<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Arquivos mais antigos') ?></div>
<div class="alignright"><?php previous_posts_link('Arquivos mais recentes &raquo;') ?></div>
</div>

<?php endif; ?>

<div style="clear: both;"></div>
</div>
<!-- end posts -->	
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>