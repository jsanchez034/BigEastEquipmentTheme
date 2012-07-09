<div class="my_meta_control">
 
	<p>Information for the 3 Boxes of the HomePage Footer</p>
 
	<h4>Info Boxes</h4>
 
	 
	<p>Add documents to the library by entering in a title, 
	URL and selecting a level of access. Upload new documents 
	using the "Add Media" box.</p>
	
	<?php $mb->the_field('compphone'); ?>
	<label>Company Phone Number</label>
	<p><input class="multilanguage-input" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
 
	<?php $mb->the_field('title'); ?>
	<label>Caption</label>
	<p><input class="multilanguage-input" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
	
	<?php $mb->the_field('mdlBanner'); ?>
	<label>Middle Ribbon Text</label>
	<p><input class="multilanguage-input" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
	
	<p>===========================================</p>
 
	<?php while($mb->have_fields_and_multi('homepage',array('length' => 1, 'limit' => 6))): ?>
	<?php $mb->the_group_open(); ?>
 
		<?php $mb->the_field('link'); ?>
		<label>Image URL</label>
		<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		 <?php //$mb->the_field('description'); ?>
		 <!--<label>Description</label>-->
		 <!--<textarea class="multilanguage-input" name="<?php //$metabox->the_name(); ?>" rows="3"><?php //$metabox->the_value(); ?></textarea>-->
		
		<?php $mb->the_field('imglink'); ?>
		<label>Image Link</label>
		<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<p>
			<a href="#" class="dodelete button">Remove Document</a>
		</p>
 
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 
	<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-homepage button">Add Document</a></p>

</div>