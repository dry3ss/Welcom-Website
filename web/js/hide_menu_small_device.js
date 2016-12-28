					function ToggleMe(param)
            		{
            				if( $(window).width() <=param.toggle_screen_width)
            				{
            					if(!param.activation_bool)//if we just changed the size we 
            						//resize the menu
            					{
            						param.activation_bool=true;            						
            						ToggleMenuVisibilityIfBool(param);
            					}
            					param.activation_bool=true;
            				}
            				else
            				{
            					if(param.activation_bool)//if we just changed the size we 
            						//resize the menu
            					{
            						param.activation_bool=false;
            						ToggleMenuVisibilityIfBool(param);
            					}
            					param.activation_bool=false;
            				}
            		};
            		function autoToggleBoolLauncher(param)
        			{
        				$( window ).resize(	function(){debounce(ToggleMe(param),100);});
        				ToggleMe(param);
            		};

            		function ToggleMenuVisibilityIfBool(param)
            		{
						if(param.activation_bool)
						{
							$(param.id_text_show).html(" Click me for the menu");
							$(param.class_select_to_hide).first(param.class_select_to_hide).toggle(200, 
							
									function toggleNextMenu() 
									{
								        $(this).next(param.class_select_to_hide).toggle(200, toggleNextMenu);
								    }		
								);
						}
						else
						{
							$(param.id_text_show).html("");
							$(param.class_select_to_hide).first(param.class_select_to_hide).show(200, 
									
									function showNextMenu() 
									{
								        $(this).next(param.class_select_to_hide).show(200, showNextMenu);
								    }		
								);
						}
					};
            		function ToggleMenuLauncher(param)
        			{
            			$(param.id_button_toggle).click(	function(){debounce(ToggleMenuVisibilityIfBool(param),200);}	);
					};