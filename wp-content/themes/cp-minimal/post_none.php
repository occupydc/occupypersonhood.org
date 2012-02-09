<?php /* Post 2 */ ?>
            
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

		<div class="post-content">
				
			<div class="post-title">
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cp'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</div>
				
			<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
				<div>
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } ?>
					
			<div class="post-entry">
				<?php the_content( '<div class="post-read-more">' . __("Continue reading &raquo;", "cp") . '</div>' ); ?>
			</div>

			<?php if ( is_single() or is_page() ) { wp_link_pages(array('before' => '<p class="post-pages"><strong>' . __('Pages:', 'cp') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); } ?>
					
			<div class="clear"></div>

		</div><!--#END post-content -->

	</div><!-- #END post -->
