<?php
/*
Template Name: Action Map
*/
?>

<?php get_header(); ?>

<div id="ocCon">

	<div id="bannerCon">

	<div id="bannerPage"><img src="http://www.occupytogether.org/images/banner_actions.gif" alt="Actions Banner" /></div>

	<div id="ocBanner">
		<iframe src="http://www.meetup.com/occupytogether/embeds/map_and_stats?css=&amp;w=640&amp;bg=light" width="640" height="300" frameborder="0" border="0" allowtransparency="true" scrolling="no"></iframe>
	</div>
		<div id="ocBtnCon">
			<div class="ocBtn"><a href="http://www.meetup.com/occupytogether/" target="_blank"><img src="http://www.occupytogether.org/images/meetupInfo.gif" alt="Occupy Together Directory" /></a></div>
		</div>
	</div>
</div>

<div id="content" class="col-full">

	<div id="mainB" class="col-left">

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
	
</div><!-- #END content -->

<?php get_footer(); ?>
