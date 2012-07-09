<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <?php roots_stylesheets(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo  bloginfo( 'template_directory' );?>/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo  bloginfo( 'template_directory' );?>/js/JScrollPane/jScrollPane.css" />

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

  <script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.0.6.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
  
  <?php roots_head(); ?>
  <?php wp_head(); ?>
    <script type="text/javascript" src="<?php echo  bloginfo( 'template_directory' );?>/js/JScrollPane/jScrollPane.js"></script>
	<script type="text/javascript" src="<?php echo  bloginfo( 'template_directory' );?>/js/jquery.scrollTo-1.4.2-min.js"></script>
    <script type="text/javascript" src="<?php echo  bloginfo( 'template_directory' );?>/js/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo  bloginfo( 'template_directory' );?>/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript">
	  jQuery(document).ready(function(){
			
			jQuery("a[rel='contactUs']").fancybox({
					'scrolling' : 'no',
					'autoScale' : false,
					'width': 490,
					'height': 500,
					'autoDimensions' : false, 
					'titleShow'	: false,
					'onComplete' : function() {jQuery('#fancybox-content > div').jScrollPane();},
					'onClosed'	: function() {
						jQuery("#login_error").hide();
						jQuery(".error").hide();
					}
			});
			
			jQuery("#email_form").bind("submit", function() {
					
						
						var evalidate = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
						var emailv =jQuery("#_email").val();
					
						if (emailv.length < 1 || !(evalidate.test(emailv))) {
							jQuery(".error").show();
							jQuery.fancybox.resize();
							return false;
						}
					
						jQuery.fancybox.showActivity();

					jQuery.ajax({
							type	: "POST",
							cache	: false,
							url		: "<?php echo  home_url();?>/script/sendmail.php",
							data	: jQuery(this).serializeArray(),
							success: function(data) {
								 jQuery.fancybox("<?php echo  home_url();?>/img/success.png",{
									'scrolling' : 'no',
									'content' : '<table style="height: 55px;margin:0;" width="300em" border="0" cellspacing="0" cellpadding="2"><tr><td><img src=\"<?php echo  home_url();?>/img/success.png\"></img></td><td><h2>Thank you for your email</h2></td></tr></table>',
									'titleShow'	: false}); 
									return false;
							},
							error: function(jqXHR,txtst,errThrwn) { alert(txtst);alert(errThrwn);}
						});

						return false;
					});
					
			});
	  </script>

</head>

<body <?php body_class(roots_body_class()); ?>>
  <?php roots_wrap_before(); ?>
  <div id="wrap" class="container" role="document">
  <?php roots_header_before(); ?>
    <header id="banner" class="<?php global $roots_options; echo $roots_options['container_class']; ?>" role="banner">
      <?php roots_header_inside(); ?>
      <div class="container">

        <a id="logo" href="<?php echo home_url() . "/?lang=" .  qtrans_getLanguage(); ?>">
			<?php if(qtrans_getLanguage()=='en'): ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="343" height="150" alt="<?php bloginfo('name'); ?>">
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/logoSp.png" width="343" height="150" alt="<?php bloginfo('name'); ?>">
			<?php endif; ?>
        </a>
		<div class="langchs"><?php qtrans_generateLanguageSelectCode('image',''); ?></div>
		<div id="phone"><?php global $hp_mb; echo apply_filters('the_title', $hp_mb->get_the_value('compphone')) ?></div>

        <nav id="nav-main" role="navigation">
          <?php wp_nav_menu(array('theme_location' => 'primary_navigation')); ?>
        </nav>

        <?php if (wp_get_nav_menu_items('Utility Navigation')) { ?>
        <nav id="nav-utility">
          <?php wp_nav_menu(array('theme_location' => 'utility_navigation')); ?>
        </nav>
        <?php } ?>

      </div>
    </header>
  <?php roots_header_after(); ?>
