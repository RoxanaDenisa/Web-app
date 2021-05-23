$( document ).ready(function() {	
	$(document).on( "click", "#add_size_btn" ,function() {
		size=$("#size").val();
		count=$("#count").val();
		console.log(size);
		var regExp = /^\d+$/g;
		if(!regExp.test(size)){
		$.notify("marimea trebuie să fie de tipul intreg", {
			  className:"error",
			  clickToHide: false,
			  autoHide: true,
			  globalPosition: 'top right'
			});
		}else{
			cod="<li ><input class='sizes' type='text' name='sizes[]' value='"+size+"'/><input class='counts' type='text' name='counts[]' value='"+count+"'/></li>";
			$('ul').append(cod);
		}
	});	
});	



