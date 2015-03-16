var showing = [false,false];
var showing0 = false;
var showing1 = false;

window.addEvent('domready', function(){
	
	$$('#NavSide a').each(function(el,index){
		el.addEvents({
			'mouseenter': function() {
			
			   showing[index] = true;
	         
	             $(this.get('rel')).setStyles({
	        	   'visibility': 'visible',
		           'top': '120px'
	             });
				
				},
			'mouseleave': function() {
				
				showing[index] = false;

	            var d=function(){
	    	      if(showing[index]) {  
			           $(el.get('rel')).setStyle('visibility','visible');
			      }else {  
					  $(el.get('rel')).setStyle('visibility','hidden');
					  }
                }.delay(500);
				
				}
			});
	});
	
	$$('#NavCategory').addEvents({
	'mouseenter':function() {
		showing[1] = true;
    },
	'mouseleave':function() {
		showing[1] = false;
		var el= this;
		var d=function(){
		  if(showing[1]) {  
			         el.setStyle('visibility','visible');
			      }else {  
					  el.setStyle('visibility','hidden');
				}
		 }.delay(500);
		
	}
		
	});
	
	
	$$('#NavBrand').addEvents({
	'mouseenter':function() {
		showing[0] = true;
    },
	'mouseleave':function() {
		showing[0] = false;
		var el= this;
		var d=function(){
		  if(showing[0]) {  
			         el.setStyle('visibility','visible');
			      }else {  
					  el.setStyle('visibility','hidden');
				}
		 }.delay(500);
		
	}
		
	});
		
	
});