<div id="sidebar" class="col-right">

	<div id="smMenu">
	 	<ul id="iconmenu">
			<li id="panel1c"><a href="http://www.facebook.com/OccupyTogether" target="_blank"></a></li>
 			<li id="panel2c"><a href="http://www.twitter.com/OccupyTogether" target="_blank"></a></li>
			<li id="panel3c"><a href="http://www.youtube.com/occupytv" target="_blank"></a></li>
			<li id="panel4c"><a href="http://www.occupytogether.org/feed.rss" target="_blank"></a></li>	  
 		</ul>
	</div>

	<div style="width:300px;height:193px;margin-bottom:20px;"><a href="http://www.15october.net" target="_blank"><img src="http://www.occupytogether.org/images/15oct.jpg" alt="15October website" /></a></div>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>

		<!-- Display recent posts -->
		<div class="widget">

			<h2 class="widgettitle"><?php _e('Recent Posts', 'cp'); ?></h2>

			<div class="widgetcontent">

				<ul><?php wp_get_archives('type=postbypost&limit=10'); ?></ul>

			</div>
		
		</div>

		<!-- Meta -->
		<div class="widget">

			<h2 class="widgettitle"><?php _e('Meta', 'cp'); ?></h2>

			<div class="widgetcontent">

				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
				</ul>

			</div>
		
		</div>

	<?php endif; ?>

</div>

<div class="clear"></div>
