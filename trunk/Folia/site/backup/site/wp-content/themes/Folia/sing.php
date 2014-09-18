<?php get_header();?>

<br />

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- post -->
<div id="post">

<div class="post">
<h2 class="title"><?php the_title(); ?></h2>
<div class="post-header"><?php echo(str_word_count(get_the_content())); ?> palavras
<br />
Categoria: <?php the_category(', ') ?></div>
<div class="entry">
<?php the_content('Leia mais &raquo;'); ?>
<div style="clear: both;"></div>
</div>
<div class="post-footer">Escrito por <?php the_author() ?> | <?php the_time('d / M / Y') ?>.<br />
<?php the_tags('Tags: ', ', ', ''); ?> <?php edit_post_link('Editar', '<p>', '</p>'); ?></div>
</div>	

<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Arquivos mais antigos') ?></div>
<div class="alignright"><?php previous_posts_link('Arquivos mais recentes &raquo;') ?></div>
</div>

<div style="clear: both;"></div>
</div>
<!-- end post -->


<!-- comments -->
<?php comments_template(); ?>
<!-- end comments -->


<?php endwhile; else: ?>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>