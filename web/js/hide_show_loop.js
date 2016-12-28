/*--------------------------------------------------
	 * If the user has scrolled more than (@TWIG_Param)
	 * TWIG_length_stop_anim_backgr stops the animation
	 * of the background images
	 *  .--------------------------------------------*/
	function changeStateIfScrolledMore(param,variables) 
	{
		  if ($(window).scrollTop() > param.length_to_change)
		  {
			  variables.state_scroll=false;
		  }
		  else
		  {
			  variables.state_scroll=true;					  
		  }			
	}		
	function autoChangeStateIfScrolledMore(param,variables)
	{
		
		var debounced_change_state =debounce(function(){changeStateIfScrolledMore(param,variables);},300, false);
		$(window).on("scroll",debounced_change_state);
		
	};
	
	/*--------------------------------------------------
	 * Cycles through @param.max objects 
	 * (selected using @param.sel) WHILE @variables.state_scroll
	 * equals true
	 *  .--------------------------------------------*/
	function showNextOne(param,variables) 
	{	

			if ((!variables.state_scroll)||(param.max<=0))
			{
				return;
			}	
			else if (variables.i==param.max)
			{					
				variables.nex=$(param.sel).first(param.sel);
				variables.i=0;
			}
			else if ((variables.i>param.max) || (variables.i<1))
			{
				alert("ERROR NewsbarAnimationNext with i="+variables.i);
				return;
			}  
			variables.curr.fadeOut({ duration: 2000 });
			variables.nex.fadeIn({ duration: 2000 });
			variables.curr=variables.nex;
			variables.nex=variables.nex.next(param.sel);
			variables.i++;
	}
	function showPreviousOne(param,variables) 
	{
			variables.nex=variables.curr;
			variables.curr=variables.nex.prev(param.sel);
			if ((!variables.state_scroll)||(param.max<=0))
			{
				return;
			}	
			else if (variables.i==1)
			{				
				variables.curr=$(param.sel).last(param.sel);
				variables.i=param.max+1;
			}
			else if ((variables.i>param.max) || (variables.i<1))
			{
				alert("ERROR NewsbarAnimationPrevious with i="+param.i);
				return;
			}
			variables.nex.fadeOut({  duration: 2000 });
			variables.curr.fadeIn({  duration: 2000 });
			variables.i--;
	}
	function autoShowHideLoop(param, variables)
	{
		var debounced_show_hide_direct=debounce(function(){showNextOne(param,variables);},500, false);
		var debounced_show_hide_indirect=debounce(function(){showPreviousOne(param,variables);},500, false);
		$(param.id_arrow_left).click(debounced_show_hide_indirect);
		$(param.id_arrow_right).click(debounced_show_hide_direct);	
		
		function timer_launch_newsbar(){	}setInterval(debounced_show_hide_direct,5000);	
		
		var debounced_change_state =debounce(function(){changeStateIfScrolledMore(param,variables);},300, false);
		$(window).on("scroll",debounced_change_state);
	};
	/*Usage:
	 *  do somethiing like this : ATTENTION: the "second" part, after  var first_img=...
	 *   has to be done after all the javascript is loaded, at the end of the page...
	 *  
	 					var loop_images_param=
			    		    { 
			        				length_to_change: 700,//number of pixels to scroll before stopping the loop
			        				max:3,//number of images
			        				sel: 'img.back_id_',//the selector (jquery type) that can be used to get all the images
			        				id_arrow_left: '#arrow_left',
			        				id_arrow_right: "#arrow_right"
			        		};
	 					$(function() 
            		    {   
            		   		
			        		var first_img=$(loop_images_param.sel).first(loop_images_param.sel);      	         
			    			var loop_images_variables=
			    		    { 
			    					state_scroll: true,
			    					curr: first_img,
			    					nex: first_img.next(loop_images_param.sel),
			    					i:1
			    			}; 
                		    autoShowHideLoop(loop_images_param,loop_images_variables);        		    	 						
            		    });
	 */