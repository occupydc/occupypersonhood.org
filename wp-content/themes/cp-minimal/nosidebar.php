<?php
/*
Template Name: No Side Bar
*/
?>


<?php get_header(); ?>

<div id="content" class="col-full">

	<div id="mainB" class="col-left">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php include('post_none.php'); ?>

		<?php endwhile; ?>

		<?php else : ?>

			<div class="post-title">				

				<h4><?php _e('Sorry, no posts matched your criteria.', 'cp'); ?></h1>

			</div>

		<?php endif; ?>

	</div><!-- #END main -->
	

</div><!-- #END content -->

<?php get_footer(); ?>
