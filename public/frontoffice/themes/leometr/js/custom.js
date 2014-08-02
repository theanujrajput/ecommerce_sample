$(document).ready( function(){

	$("#productsview a.btn").click( function(){
		if( $(this).attr("rel") == "view-grid" ){
			$("#product_list").addClass("view-grid").removeClass("view-list");
			$(".icon-th").addClass("active");
			$(".icon-th-list").removeClass("active");
		} else {
			$("#product_list").addClass("view-list").removeClass("view-grid");
			$(".icon-th-list").addClass("active");
			$(".icon-th").removeClass("active");
		}
		return false;
	} );
} );

(function($) {
	$.fn.OffCavasmenu = function(opts) {
		// default configuration
		var config = $.extend({}, {
			opt1: null,
			text_warning_select:'Please select One to remove?',
			text_confirm_remove:'Are you sure to remove footer row?',
			JSON:null
		}, opts);
		// main function
	

		// initialize every element
		this.each(function() {  
			var $btn = $('#topnavigation .btn-navbar');
			var	$nav = null;
			 

			if (!$btn.length) return;
	 	 	var $nav = $('<section id="off-canvas-nav"><nav class="offcanvas-mainnav" ><div id="off-canvas-button"><span class="off-canvas-nav"></span>Close</div></nav></sections>'); 
	 	 	var $menucontent = $($btn.data('target')).find('.megamenu').clone();
			$("body").append( $nav );
	 	 	$("#off-canvas-nav .offcanvas-mainnav").append( $menucontent );
		 
		
 			$('html').addClass ('off-canvas');
			$("#off-canvas-button").click( function(){
				$btn.click();	
			} ); 
			$btn.toggle( function(){
				$("body").removeClass("off-canvas-inactive").addClass("off-canvas-active");
			}, function(){
				$("body").removeClass("off-canvas-active").addClass("off-canvas-inactive");
		 
			} );

		});
		return this;
	}
	
})(jQuery);


$(document).ready( function(){
	
	/* off Canvasmenu */
	jQuery("#topnavigation").OffCavasmenu();
	 $('#topnavigation .btn-navbar').click(function () {
     $('body,html').animate({
      scrollTop: 0
     }, 0);
    return false;
   });

	
} );

/*bootstrap menu*/
$(window).ready( function(){
 $(document.body).on('click', '[data-toggle="dropdown"]' ,function(){
  if(!$(this).parent().hasClass('open') && this.href && this.href != '#'){
   window.location.href = this.href;
  }

 });
 $("#topnavigation .dropdown .caret").click( function() {
  $(this).parent().toggleClass('iopen'); 
 } );
//  $("#topnavigation .nav-collapse").OffCanvasMenu();
} );