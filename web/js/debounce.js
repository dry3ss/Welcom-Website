	
/*--------------------------------------------------
	 * Stops a function from being called more than 
	 * once every (@param) wait
	 * 
	 * Thanks to David Walsh : https://davidwalsh.name/javascript-debounce-function
	 *  .--------------------------------------------*/
	function debounce(func, wait, immediate)
	{
		var timeout;
		return function() 
		{
			var context = this, args = arguments;
			var later = function() 
			{
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};
