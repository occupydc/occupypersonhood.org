<?php get_header(); ?>

<div id="ocBG">
	<div style="position:absolute;width:189px;height:300px;left:0;background-image:url('http://www.occupytogether.org/images/bgStrip_LEnd.gif');"></div>

	<div id="bannerCon">
	<div id="ocBanner">
		<?php if (function_exists('easing_slider')){ easing_slider(); }; ?>
	</div>
		<div id="ocBtnCon">
			<div class="ocBtn"><a href="/directory"><img src="http://www.occupytogether.org/images/ocDir_btn.png" alt="Occupy Together Directory" /></a></div>
			<div class="ocBtn"><a href="/actions"><img src="http://www.occupytogether.org/images/ocFind_btn.png" alt="Occupy Together Actions" /></a></div>
		</div>
	</div>
</div>

<div id="content" class="col-full">

	<div id="main" class="col-left">

		<div style="width:346px;height:39px;background-image:url('http://www.occupytogether.org/images/newsHeader.gif');margin-bottom:20px;"></div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php include('post.php'); ?>

		<?php endwhile; ?>
      

		<?php if ( function_exists('wp_pagenavi') ) { ?>

			<?php wp_pagenavi(); ?>

		<?php } else { ?>  
		
		   	<ul class="more-entries">

				<li class="alignleft"><?php next_posts_link( __('&laquo; Older Entries', 'cp') ); ?></li>
				<li class="alignright"><?php previous_posts_link( __('Newer Entries &raquo;', 'cp') ); ?></li>

			</ul>

		<?php } else : ?>

			<div class="post-title">			

				<h4><?php _e('No posts were found', 'cp'); ?></h4>

			</div>

		<?php endif; ?>

	</div><!-- #END main -->
	
	<?php get_sidebar(); ?>
	
</div><!-- #END content -->

<?php get_footer(); ?>
	
