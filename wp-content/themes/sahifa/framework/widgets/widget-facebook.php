<?php

add_action( 'widgets_init', 'tie_acebook_widget_box' );
function tie_acebook_widget_box() {
	register_widget( 'tie_facebook_widget' );
}
class tie_facebook_widget extends WP_Widget {

	function tie_facebook_widget() {
		$widget_ops = array( 'classname' => 'facebook-widget' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'facebook-widget' );
		$this->WP_Widget( 'facebook-widget',THEME_NAME .' - '.__( 'Facebook' , 'tie' ) , $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$color = 'light';
		if( !empty($instance['dark']) ) $color = 'dark';
		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$protocol = is_ssl() ? 'https' : 'http';

		echo $before_widget;
		if ( $title )
			echo $before_title;
			echo $title ; ?>
		<?php echo $after_title; ?>
			<script>
				window.___gcfg = {lang: 'ja_JP'};
				(function(w, d, s) {
				  function go(){
					var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
					  if (d.getElementById(id)) {return;}
					  js = d.createElement(s); js.src = url; js.id = id;
					  fjs.parentNode.insertBefore(js, fjs);
					};
					load('//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.3&appId=926600187364011', 'facebook-jssdk');
				  }
				  if (w.addEventListener) { w.addEventListener("load", go, false); }
				  else if (w.attachEvent) { w.attachEvent("onload",go); }
				}(window, document, 'script'));
				</script>

			<?php if($this->number === 4): ?>
				<div style="min-height:130px">
				<div class="fb-page" data-href="<?php echo $page_url ?>" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $page_url ?>"><a href="<?php echo $page_url ?>" style="display:block;text-indent: 100%;overflow:hidden;white-space:nowrap">三軒茶屋をもっと好きになる！三茶ファン</a></blockquote></div></div></div>
			<? else: ?>
				<div class="fb-page" data-href="<?php echo $page_url ?>" data-height="370" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $page_url ?>"><a href="<?php echo $page_url ?>" style="display:block;text-indent: 100%;overflow:hidden;white-space:nowrap">三軒茶屋をもっと好きになる！三茶ファン</a></blockquote></div></div>
			<?php endif; ?>
	<?php 
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['dark'] = strip_tags( $new_instance['dark'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' =>__( 'Find us on Facebook' , 'tie') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'tie') ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( !empty($instance['title']) ) echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e( 'Page URL :' , 'tie') ?></label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php if( !empty($instance['page_url']) ) echo $instance['page_url']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dark' ); ?>"><?php _e( 'Dark Skin ?' , 'tie') ?></label>
			<input id="<?php echo $this->get_field_id( 'dark' ); ?>" name="<?php echo $this->get_field_name( 'dark' ); ?>" value="true" <?php if( !empty($instance['dark']) ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>

	<?php
	}
}
?>