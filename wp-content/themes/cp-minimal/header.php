<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="description" content="<?php bloginfo('description') ?>" />
	<meta name="language" content="<?php echo get_bloginfo('language'); ?>" />

	<title>
		<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Home<?php } ?>
		<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Search Results', 'cp'); ?><?php } ?>
		<?php if ( is_404() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('404 Nothing Found', 'cp');?><?php } ?>
		<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Author Archives', 'cp'); ?><?php } ?>
		<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
		<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
		<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive', 'cp'); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
		<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive', 'cp'); ?>&nbsp;|&nbsp;<?php the_time(__('F', 'cp')); ?><?php } ?>
		<?php if ( is_day() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive', 'cp'); ?>&nbsp;|&nbsp;<?php the_time(__('F j, Y', 'cp')); ?><?php } ?>
		<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Tag Archive', 'cp'); ?>&nbsp;|&nbsp;<?php single_tag_title("", true); } } ?>
	</title>

	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php bloginfo('template_url'); ?>/css/custom.css" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php if ( get_option('cp_feedburner')<>'') { echo get_option('cp_feedburner'); } else { bloginfo('rss2_url'); } ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_single() ) wp_enqueue_script('comment-reply'); ?>	

    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?> >

	<div id="container">

		<div id="top-nav" class="col-full">
			
			<div class="alignright">
			<?php get_search_form(); ?>
			</div>
		</div>

		<div id="header" class="col-full">

			<div id="logo">
			<a href="http://www.occupytogether.org">
			<img src="http://www.occupytogether.org/images/occupyTogether.png" alt="Occupy Together header" />
			</a>
			</div>

		</div><!-- #END header -->
	

		<div id="sec-nav" class="col-full">
			<ul class="nav">
<li <?php if ( is_home() || is_single() || is_search() || is_archive() ) { echo 'class="current_page_item"'; } ?>><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>">Home</a></li>
				<?php wp_list_pages('title_li=&exclude=22'); ?>
			</ul>
		</div>

</div>