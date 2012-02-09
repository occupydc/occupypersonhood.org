<?php
/*
Template Name: Action Map
*/
?>

<?php get_header(); ?>

<div id="content" class="col-full">
	
    <div stle="margin-bottom:20px;"><iframe src="http://www.meetup.com/occupytogether/embeds/map_and_stats?css=&amp;w=960&amp;bg=light" width="960" height="275" frameborder="0" border="0" allowtransparency="true" scrolling="no"></iframe></div>

	<div id="main" class="col-left">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php include('post.php'); ?>

			<?php comments_template(); ?>

		<?php endwhile; ?>

		<?php else : ?>

			<div class="post-title">				

				<h4><?php _e('Sorry, no posts matched your criteria.', 'cp'); ?></h1>

			</div>

		<?php endif; ?>

	</div><!-- #END main -->
	
	<?php get_sidebar(); ?>

</div><!-- #END content -->

<?php get_footer(); ?>
