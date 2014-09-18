<?php /* Template Name: Links */ ?>

<?php get_header(); ?>


<!-- post -->
<div id="post">


<div class="post">

<h2 class="title">Links</h2>

<div class="entry">
<ul>
<?php wp_list_bookmarks(); ?>
</ul>
</div>

</div>



<div style="clear: both;"></div>
</div>
<!-- end post -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>