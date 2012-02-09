<?php


// Localization
load_theme_textdomain('cp', TEMPLATEPATH.'/lang/');


// load admin menu
require_once ( TEMPLATEPATH . '/admin/admin-menu.php');


// Register Sidebar
if ( function_exists('register_sidebar') ) 
{
   register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div><!-- #END widgetcontent --></div><!-- #END widget --><div class="clear"></div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2><div class="widgetcontent">',
   ));
}


// remove nofollow attribute
function remove_nofollow($string) 
{
	$string = str_ireplace(' rel="nofollow"', '', $string);
	return $string;
}
add_filter('the_content', 'remove_nofollow');
add_filter('comment_text', 'remove_nofollow');


// the new search widget
function cp_search_widget() 
{
	?>
	<div class="widget">
		<h2 class="widgettitle"><?php _e('Search', 'cp'); ?></h2>
		<div class="widgetcontent">
			<div class="widgetsearchform"><?php include(TEMPLATEPATH.'/searchform.php');?></div>
		</div>
	</div>
	<div class="clear"></div>
	<?php
}
register_sidebar_widget('CP Search', 'cp_search_widget');


// unregister the standard search widget
function cp_unregister_widgets() 
{
	unregister_widget('WP_Widget_Search');         
}
add_action('widgets_init', 'cp_unregister_widgets');  



// Add support for post thumbnails -- only WP 2.9+
if ( function_exists('add_theme_support') ) 
{
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(150,150);
}


// new comment function
function cp_comment_author_link() 
{
	$comment_author_link = get_comment_author_link();
	if ( ereg(']* class=[^>]+>', $comment_author_link) ) 
	{
		$comment_author_link = ereg_replace('(]* class=[\'"]?)', '\\1url ' , $comment_author_link );
	} 
	else 
	{
		$comment_author_link = ereg_replace('(<a )/', '\\1class="url "' , $comment_author_link );
	}
    echo $comment_author_link;
}


function cp_comment_author_avatar() 
{
	$email = get_comment_author_email();
	$avatar = str_replace("class='avatar", "class='photo avatar", get_avatar("$email", "42" ) );
	echo $avatar;
}


function cp_comments( $comment, $args, $depth ) 
{

	$GLOBALS['comment'] = $comment; ?>
                 
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		
		<a name="comment-<?php comment_ID() ?>"></a>
		
		<div class="comment-meta">
      
			<span class="name"><?php cp_comment_author_avatar(); ?></span>

			<?php if ( (get_comment_type() == "comment") ) { cp_comment_author_link(); } ?>
			<?php if ( (get_comment_type() == "pingback") or (get_comment_type() == "trackback") ) { ?><?php cp_comment_author_link(); ?><br /><?php } ?>
      	
			<?php if ( (get_comment_type() == "comment") or (get_comment_type() == "pingback") or (get_comment_type() == "trackback") ) { ?>
           		
				<span class="comment-date"> <?php _e('on', 'cp'); ?> <?php echo get_comment_date( __('F jS, Y', 'cp') ); ?> <?php _e('at', 'cp'); ?> <?php echo get_comment_time(); ?></span>
				<span class="edit"><?php edit_comment_link( __('Edit', 'cp'), '', '' ); ?></span>
				<span class="permalink"><a class="comment-permalink" href="<?php echo get_comment_link(); ?>" title="<?php _e('Direct link to this comment', 'cp'); ?>">#</a></span>
           		
			<?php } ?>
	     
		</div>
    	
		<div class="comment-entry" id="comment-<?php comment_ID(); ?>">
			
			<?php comment_text() ?>

			<?php if ( $comment->comment_approved == '0') { ?> <p class='comment-unapproved'><?php _e('Your comment is awaiting moderation.', 'cp'); ?></p> <?php } ?>
			
			<div class="comment-reply">

				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ) ?>

			</div>
			
		</div>

		<div class="clear"></div>   

	<?php 
} 

/* ------------------------ */
/*  define some shortcodes  */
/*  used in footer text     */
/* ------------------------ */

function cp_shortcode_copyright()
{
	return sprintf('&copy; %1$s <a href="%2$s" title="%3$s">%3$s</a> ', date('Y'), get_bloginfo('url'), get_bloginfo('name') );
}

function cp_shortcode_wordpress()
{
	return sprintf('%1$s <a href="http://wordpress.org" title="Wordpress">Wordpress</a> ', __('Powered by', 'cp') );
}

function cp_shortcode_credit()
{
	return sprintf('%1$s <a target="_blank" href="http://cproell.de/" title="Christian Proell">CP-Themes</a> ', __('Theme by', 'cp') );
}

add_shortcode ('copyright', 'cp_shortcode_copyright'); 
add_shortcode ('wordpress', 'cp_shortcode_wordpress');
add_shortcode ('credit', 'cp_shortcode_credit');


?>
