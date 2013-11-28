<?php 
	
	/**
	 *
	 * Template elements after the page content
	 *
	 **/
	
	// create an access to the template main object
	global $tpl;
	
	// disable direct access to the file	
	defined('GAVERN_WP') or die('Access denied');
	
?>
		
				<?php if(gk_is_active_sidebar('mainbody_bottom')) : ?>
				<div id="gk-mainbody-bottom">
					<?php gk_dynamic_sidebar('mainbody_bottom'); ?>
				</div>
				<?php endif; ?>
				
				<!--[if IE 8]>
				<div class="ie8clear"></div>
				<![endif]-->
			</section><!-- end of the mainbody section -->
		
			<?php 
			if(
				get_option($tpl->name . '_page_layout', 'right') != 'none' && 
				gk_is_active_sidebar('sidebar') && 
				(
					$args == null || 
					($args != null && $args['sidebar'] == true)
				)
			) : ?>
			<?php do_action('gavernwp_before_column'); ?>
			<aside id="gk-sidebar">
				<?php gk_dynamic_sidebar('sidebar'); ?>
				
				<!--[if IE 8]>
				<div class="ie8clear"></div>
				<![endif]-->
			</aside>
			<?php do_action('gavernwp_after_column'); ?>
			<?php endif; ?>
			
			<!--[if IE 8]>
			<div class="ie8clear"></div>
			<![endif]-->
		</div><!-- end of the #gk-mainbody-columns -->
	</div><!-- end of the .gk-page section -->
</div><!-- end of the .gk-page-wrap section -->	

<?php if(gk_is_active_sidebar('bottom1')) : ?>
<div id="gk-bottom1">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('bottom1'); ?>
		
		<!--[if IE 8]>
		<div class="ie8clear"></div>
		<![endif]-->
	</div>
</div>
<?php endif; ?>

<?php if(gk_is_active_sidebar('bottom2')) : ?>
<div id="gk-bottom2">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('bottom2'); ?>
		
		<!--[if IE 8]>
		<div class="ie8clear"></div>
		<![endif]-->
	</div>
</div>
<?php endif; ?>

<?php if(gk_is_active_sidebar('bottom3')) : ?>
<div id="gk-bottom3">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('bottom3'); ?>
		
		<!--[if IE 8]>
		<div class="ie8clear"></div>
		<![endif]-->
	</div>
</div>
<?php endif; ?>

<?php if(gk_is_active_sidebar('bottom4')) : ?>
<div id="gk-bottom4">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('bottom4'); ?>
		
		<!--[if IE 8]>
		<div class="ie8clear"></div>
		<![endif]-->
	</div>
</div>
<?php endif; ?>

<?php if(gk_is_active_sidebar('bottom5')) : ?>
<div id="gk-bottom5">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('bottom5'); ?>
		
		<!--[if IE 8]>
		<div class="ie8clear"></div>
		<![endif]-->
	</div>
</div>
<?php endif; ?>

<?php if(gk_is_active_sidebar('bottom6')) : ?>
<div id="gk-bottom6">
	<div class="gk-page widget-area">
		<?php gk_dynamic_sidebar('bottom6'); ?>
		
		<!--[if IE 8]>
		<div class="ie8clear"></div>
		<![endif]-->
	</div>
</div>
<?php endif; ?>