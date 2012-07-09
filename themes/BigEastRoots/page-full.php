<?php
/*
Template Name: Full Width
*/

	// Scroll to desired product using product H2 title
	if ( !empty($_REQUEST['gt']) ) {
		wp_enqueue_script('my-handle', get_stylesheet_directory_uri()  . '/js/goToH2.js' );
		$myvars = array('title' => $_REQUEST['gt'] );
		  wp_localize_script('my-handle', 'HGoTo', $myvars);
	} 

get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo $roots_options['container_class']; ?>">
    <?php roots_main_before(); ?>
      <div id="main" class="<?php echo $roots_options['fullwidth_class']; ?>" role="main">
        <div class="container">
          <?php roots_loop_before(); ?>
          <?php get_template_part('loop', 'page'); ?>
          <?php roots_loop_after(); ?>
	  <div style="clear:both;"></div>
        </div>
      </div><!-- /#main -->
	  <div id="split" class="noimage"></div><!-- /#split -->
    <?php roots_main_after(); ?>
    </div><!-- /#content -->
	<div id="bottomsplit">
		  <?php roots_content_after(); ?>
		<?php get_footer(); ?>
	</div><!-- /#bottomsplit -->