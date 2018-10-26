$(document).ready(function(){
	var origin   = document.location.href.match(/[^\/]+$/);  // Returns base URL
		
		$('a[href$="'+origin+'"]').parent().addClass("current");
	
});
