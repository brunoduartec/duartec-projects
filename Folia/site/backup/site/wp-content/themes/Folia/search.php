<?php get_header(); ?>

<!-- posts -->
<div id="posts">


<?php if (have_posts()) : ?>

<div class="post">
<h2 class="title">Resultados da busca</h2>
</div>
<div style="clear: both;"></div>


<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente para <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="post-header">Categoria: <?php the_category(', ') ?></div>
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

<?php else : ?>
<div class="post">
<h2 class="title">Nenhum post foi encontrado. Tentar outra pesquisa?</h2>
<div class="entry"><?php get_search_form(); ?></div>
</div>
<?php endif; ?>






<div style="clear: both;"></div>
</div>
<!-- end posts -->	



<?php get_sidebar(); ?>

<?php get_footer(); ?>