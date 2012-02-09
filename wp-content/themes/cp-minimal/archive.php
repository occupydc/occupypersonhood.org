<?php get_header(); ?>

<div id="content" class="col-full">

	<div id="main" class="col-left">

		<?php if ( have_posts() ) : ?> <?php $post = $posts[0]; ?>

			<div class="post-title">

				<?php if ( is_category() ) { ?>
					<h4><?php _e('Category:', 'cp'); ?> <span><?php single_cat_title(); ?></span></h4>
				<?php } elseif ( is_tag() ) { ?>
					<h4><?php _e('Tag:', 'cp'); ?> <span><?php single_tag_title(); ?></span></h4>
				<?php } elseif ( is_day() ) { ?>
					<h4><?php _e('Archive:', 'cp'); ?> <span><?php the_time( __('F jS, Y', 'cp') ); ?></span></h4>
				<?php } elseif ( is_month() ) { ?>
					<h4><?php _e('Archive:', 'cp'); ?> <span><?php the_time( __('F, Y', 'cp') ); ?></span></h4>
				<?php } elseif ( is_year() ) { ?>
					<h4><?php _e('Archive:', 'cp'); ?> <span><?php the_time( __('Y', 'cp') ); ?></span></h4>
				<?php } elseif ( is_author() ) { ?>	
					<h4><?php _e('Author Archive', 'cp'); ?></h4>
				<?php } elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) { ?>
					<h4><?php __('Blog Archives', 'cp'); ?></h4>
				<?php } ?>

			</div>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php include('post.php'); ?>

			<?php endwhile; ?>
        
			<?php if ( function_exists('wp_pagenavi') ) { ?>
			
				<?php wp_pagenavi(); ?>

			<?php } else { ?>  
		
    	   		<ul class="more-entries">

					<li class="alignleft"><?php next_posts_link( __('&laquo; Older Entries', 'cp') ); ?></li>
					<li class="alignright"><?php previous_posts_link( __('Newer Entries &raquo;', 'cp') ); ?></li>

				</ul>

			<?php } ?>

		<?php else : ?>
					
			<div class="post-title">			
	
				<h4><?php _e('No posts were found', 'cp'); ?></h4>

			</div>

		<?php endif; ?>

	</div><!-- #END main -->

	<?php get_sidebar(); ?>

</div><!-- #END content -->

<?php get_footer(); ?>
