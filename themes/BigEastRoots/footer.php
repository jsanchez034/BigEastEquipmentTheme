    <?php roots_footer_before(); ?>
    <footer id="content-info" class="<?php global $roots_options; echo $roots_options['container_class']; ?>" role="contentinfo">
      <?php roots_footer_inside(); ?>
      <div class="container">
        <?php dynamic_sidebar('roots-footer'); ?>
			<?php 
				global $hp_mb;
				$tit = $hp_mb->get_the_value('title');
				if (strlen(trim($tit)) > 0)  echo '<div class="titbanner"><span>' .  apply_filters('the_title', $tit) . '</span></div>';
				echo '<div class="prodboxcont">';
				$count = 0;
				while($hp_mb->have_fields('homepage'))
				{
					$count++;
					//if($count%3 == 0) {echo '<div class="prodbox last">';} else {echo '<div class="prodbox">';}
					echo '<div class="prodbox last">';
					echo '<div class="boximg"><a href="'. $hp_mb->get_the_value('imglink') . '" target="blank_"><img src="' . $hp_mb->get_the_value('link') . '"/></a></div>';
				 	//echo '<div class="boxdesc">' . apply_filters('the_title', $hp_mb->get_the_value('description')) . '</div>';
					echo '</div>';
					
				}
				echo '</div>';
			
			?>
        <p class="copy"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></small></p>
      </div>
    </footer>
    <?php roots_footer_after(); ?>
  </div><!-- /#wrap -->
  			<div id="form_container" style="display:none" >

			<h1><a>Contact Us</a></h1>
			<form id="email_form" class="appnitro"  method="post" action="">
			<div class="form_description">
				
				<div class="floatleft"  style="width:380px;"><img  src="<?php echo  bloginfo( 'template_directory' ) . (qtrans_getLanguage()=='en' ? '/img/logo.png' : '/img/logoSp.png') ?>" width="343" height="150" /></div>
				<div class="floatleft nopad spbot">
					<p>BIG EAST EQUIPMENT, INC.</p>
					<p>P.O. Box 166355</p>
					<p>Miami, FL 33116-6355</p>
					<p><b>Phone</b> (305) 253-9998</p>
					<p><b>Fax</b> (305) 387-8487</p>
					<p><b>Cell</b> (305) 785-7588</p>
					<p><b>E Mail</b>  <a href="mailto:Sales@bigeastequipment.com">Sales@bigeastequipment.com</a></p>
					<p><b>Web</b> <a href="http://www.bigeastequipment.com">www.bigeastequipment.com</a></p>
				</div>
				
				<div class="clearb"></div>

			</div>						
				<ul >
				
						<li id="li_1" >
			<label class="description" for="element_1"><?php _e("Name")?> </label>
			<div class="left">
				<input id="_fname" name= "fname" class="element text medium" maxlength="255" size="25" value=""/>
				<label><?php _ex("First","mypage","roots")?></label>
			</div>
			<div class="right">
				<input id="_lname" name= "lname" class="element text medium" maxlength="255" size="25" value=""/>
				<label><?php _ex("Last","mypage","roots")?></label>
			</div> 
			<div class="left">
				<input id="_came" name= "cname" class="element text medium" maxlength="255" size="25" value=""/>
				<label><?php _ex("Company Name","mypage","roots")?></label>
			</div>
			</li>		<li id="li_2" >
			<label class="description" for="_addr"><?php _e("Contact Info")?></label>
			
			<div>
				<input id="_addr1" name="addr1" class="element text large" value="" type="text">
				<label for="_addr1"><?php _e("Address")?></label>
			</div>
		
			<div>
				<input id="_phone" name="phone" class="element text large" value="" type="text">
				<label for="_phone"><?php _ex("Phone","mypage","roots")?></label>
			</div>
			
			<div>
				<input id="_email" name="email" class="element text large" value="" type="text">
				<p><label for="_email"><?php _e("Email")?></label><span class="error floatr"><?php _ex("* Invalid Email address, Please verify address","mypage","roots")?></span></p>
			</div>
			
			</li>					
			<li id="li_4" >
			<p><label class="description floatl" for="_time"><?php _ex("Best time to be reached","mypage","roots")?> </label></p>
			<div class="clearb">
				<input id="_time" name="time" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
			</li> 
			
			<li id="li_5" >			
			<p><label class="description floatl" for="_look"><?php _ex('What are you looking for? (equipment, parts, other)',"mypage","roots")?> </label></p>
			<div class="clearb">
				<input id="_look" name="look" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
			</li>
			
			<li id="li_6" >
			<p><label class="description floatl" for="_budget"><?php _ex("Budget range (Equipment only; not for parts)","mypage","roots")?> </label></p>
			<div class="clearb">
				<input id="_budget" name="budget" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
			</li> 
		
			<li id="li_7" >
			<label class="description" for="_comm"><?php _ex("Any other specific needs you may have for the above inquiry ?","mypage","roots")?> </label>
			<div>
				<textarea id="_comm" name="comm" class="element textarea medium"></textarea> 
			</div> 
			</li>
				
						<li class="buttons">
					<input type="hidden" name="form_id" value="27472" />
					
					<input id="saveForm" class="button" type="submit" name="submit" value="<?php _e("Submit") ?>" />
			</li>
				</ul>
			</form>	

	</div>

  <?php wp_footer(); ?>
  <?php roots_footer(); ?>

  <!--[if lt IE 7]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>