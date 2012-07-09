
jQuery(document).ready(function(){

function scrollToH2(title) {
	jQuery("h2").each(function(i,h2) { 
											var curr = jQuery(h2).html(); 
											if(curr == title) jQuery.scrollTo( jQuery(h2), 800 );
											} 
									);
									}
									
			if (HGoTo.title) {
					scrollToH2(HGoTo.title);
				}
});