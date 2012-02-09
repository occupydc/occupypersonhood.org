<?php
/*
Template Name: Posters
*/
?>


<?php get_header(); ?>

<div id="bannerPage"><img src="http://www.occupytogether.org/images/banner_posters.gif" alt="Posters Banner" /></div>

<div id="content" class="col-full">

<div id="main" class="col-left">

<div class="post">
<p>The posters provided on this page are free for you to download, print, and hang up within your community, not only to promote local efforts, but the solidarity of all occupiers around the country. In fact, we highly encourage it as this will be a great means of spreading the word and getting others involved.</p>

<p>All of the posters on this page have been graciously donated to the cause by graphic designers who have contacted us and sent us materials. Due to the growing number of submissions and the limited availability of our volunteers, we are no longer accepting open submissions at this time.</p>

<p><em><strong>Note:</strong> These are to be used as promotional materials and flyers. Please respect city ordinances about posting such materials. Occupy Together <strong>does not</strong> post these materials and are not responsible for how they are used. These are here for protesters to use, remix, and share via printed handouts, posters, and digital banners/avatars. Thank you (and be environmentally conscious!).</em></p>

<p>To download, just right click and save the poster (an Acrobat PDF) to your hard drive.</p>
</div>
</div>
	
<div id="sidebar" class="col-right">
<div class="widget textwidget sticky">
This is where resources for the design shit will go.
</div>
</div>


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
