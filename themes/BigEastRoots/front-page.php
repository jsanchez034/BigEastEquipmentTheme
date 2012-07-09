<?php
/*
Template Name: Full Width
*/
get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo $roots_options['container_class']; ?>">
    <?php roots_main_before(); ?>
      <div id="main" class="<?php echo $roots_options['fullwidth_class']; ?>" role="main">
	   <?php if (function_exists('nivoslider4wp_show')) { nivoslider4wp_show(); } ?>
        <div class="container" style="display:none;" >
          <?php roots_loop_before(); ?>
          <?php get_template_part('loopNT', 'page'); ?>
          <?php roots_loop_after(); ?>
        </div>
      </div><!-- /#main -->
	  <div id="split"><span><?php global $hp_mb; echo apply_filters('the_title', $hp_mb->get_the_value('mdlBanner')) ?></span></div><!-- /#split -->
    <?php roots_main_after(); ?>
    </div><!-- /#content -->
	<div id="bottomsplit">
		  <?php roots_content_after(); ?>
		<?php get_footer(); ?>
	</div><!-- /#bottomsplit -->