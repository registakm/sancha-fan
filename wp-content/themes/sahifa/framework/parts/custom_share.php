<?php
global $post, $page_builder_id;

$share_box_class= "custom-share-box";

$post_link = tie_get_option( 'share_shortlink' ) ? wp_get_shortlink() : get_permalink();
$protocol = is_ssl() ? 'https' : 'http';

?>

<div class="<?php echo $share_box_class ?>">
	<div class="custom-share-box-area">
		<ul class="custom-share-buttons">
			<?php if( tie_get_option( 'custom_share_T' ) ): ?>
				<li class="custom-share-item">
					<a href="http://twitter.com/share?url=<?php echo $post_link; ?>&text=<?php the_title(); ?>&via=<?php if( tie_get_option( 'share_twitter_username' )) echo 'via @'.tie_get_option( 'share_twitter_username' ); ?>" class="social-twitter custom-share-button" rel="external" target="_blank">
					<i class="fa fa-twitter"></i>
					<?php _eti( 'ツイート' );?></a>
				</li>
			<?php endif; ?>	
			<?php if( tie_get_option( 'custom_share_F' ) ): ?>
				<li class="custom-share-item">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo $post_link; ?>" class="social-facebook custom-share-button" rel="external" target="_blank">
					<i class="fa fa-facebook"></i>
					<?php _eti( 'シェア' );?></a>
				</li>
			<?php endif; ?>
			<?php if( tie_get_option( 'custom_share_L' ) && wp_is_mobile() ): ?>
				<li class="custom-share-item">
					<a href="http://line.me/R/msg/text/?<?php echo the_title(); ?>%0D%0A<?php echo $post_link; ?>" class="share-line custom-share-button">
					<i class="fa fa-line"></i>
					<?php _eti( '送る' );?></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<div class="clear"></div>
</div> <!-- .share-post -->