<?php
/**
 * Social media icons for Paraswift
 *
 * @package paraswift
 * @since version 1.0.0
 */
?>
<ul>
	<?php if(get_theme_mod('facebook_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('facebook_link'));?>" target="_blank">
				<i class="fa fa-facebook"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('twitter_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('twitter_link'));?>" target="_blank">
				<i class="fa fa-twitter"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('linkedin_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('linkedin_link'));?>" target="_blank">
				<i class="fa fa-linkedin"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('pinterest_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('pinterest_link'));?>" target="_blank">
				<i class="fa fa-pinterest"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('instagram_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('instagram_link'));?>" target="_blank">
				<i class="fa fa-instagram"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('ytube_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('ytube_link'));?>" target="_blank">
				<i class="fa fa-youtube"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('flickr_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('flickr_link'));?>" target="_blank">
				<i class="fa fa-flickr"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('dribbble_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('dribble_link'));?>" target="_blank">
				<i class="fa fa-dribbble"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('tumblr_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('tumblr_link'));?>" target="_blank">
				<i class="fa fa-tumblr"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('reddit_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('reddit_link'));?>" target="_blank">
				<i class="fa fa-reddit"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('gplus_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('gplus_link'));?>" target="_blank">
				<i class="fa fa-google-plus"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('git_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('git_link'));?>" target="_blank">
				<i class="fa fa-github"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('stumble_link')){?>
		<li>
			<a href="<?php echo esc_url(get_theme_mod('stumble_link'));?>" target="_blank">
				<i class="fa fa-stumbleupon"></i>
			</a>
		</li>
	<?php }?>
</ul>