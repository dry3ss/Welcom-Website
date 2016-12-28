
		/*--------------------------------------------------
		 * Lets the logo (identified with @param.id_logo_fix 
		 * scroll with the page at first, then  once
		 * @param.length_to_fix_scroll is reached, pulls
		 * the logo from the html flux and makes it fixed
		 * using the CSS class @param.class_scroll_fix
		 *  .--------------------------------------------*/
		function scroll_fix(param) 
		{
			  if ($(window).scrollTop() > param.length_to_fix_scroll)
			  {
				  $(param.id_logo_fix).addClass(param.class_scroll_fix);
			  }
			  else
			  {
				  $(param.id_logo_fix).removeClass(param.class_scroll_fix);					  
			  }					
		}

		function autoScrollFix(param)
		{		
			var debounced_stop_fix=debounce(function(){scroll_fix(param);}, 20,false);// 20 ms is a good compromise and it's almost unnoticeable
			$(window).on("scroll", debounced_stop_fix);				
		}
