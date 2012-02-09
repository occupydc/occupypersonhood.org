<?php
/*
Template Name: Contact template
*/
?>

<?php get_header(); ?>

<div id="bannerPage"><img src="http://www.occupytogether.org/images/banner_contact.gif" alt="Contact Banner" /></div>

<div id="content" class="col-full">

	<div id="main" class="col-left">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php include('post-notitle.php'); ?>

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
