<?php
$image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
?>
<section class="facebook-like-box">
	<div class="likebox-container">
		<div class="likebox-img" style="background-image:url(<?php echo $image_array[0]; ?>);background-repeat:no-repeat;background-position: center;"></div>
		<div class="likebox-container-btn">
			<p class="likebox-container-title">この記事が気に入ったら<br>いいね！しよう</p>
			<div class="likebox-button" style="min-height:20px">
				<div class="fb-like" data-href="https://www.facebook.com/sanchafan.page" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
			</div>
		</div>
	</div>
</section><!-- .facebook-like-box -->