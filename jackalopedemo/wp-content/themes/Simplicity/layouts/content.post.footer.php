<?php

/**
 *
 * The template fragment to show post footer
 *
 **/

// disable direct access to the file	
defined('GAVERN_WP') or die('Access denied');

global $tpl; 

?>

<?php do_action('gavernwp_after_post_content'); ?>

<?php if((!is_page_template('template.fullwidth.php') && ('post' == get_post_type() || 'page' == get_post_type())) && get_the_title() != '') : ?>
	<?php if(!('post' == get_post_type() && get_option($tpl->name . '_post_aside_state', 'Y') == 'N')) : ?>
		<?php if(!(get_post_type() == 'page' && get_option($tpl->name . '_template_show_details_on_pages', 'Y') == 'N')) : ?>
			<?php if(get_option($tpl->name . '_display_post_details', 'Y') == 'Y' && !(is_tag() || is_search())) : ?>
				<?php gk_post_aside(); ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if(is_singular()) : ?>
	<?php 
		// variable for the social API HTML output
		$social_api_output = gk_social_api(get_the_title(), get_the_ID()); 
	?>
		
	<?php if($social_api_output != '' || gk_author(false, true)): ?>
	<footer>
		<?php echo $social_api_output; ?>
	</footer>
	<?php endif; ?>
<?php endif; ?>