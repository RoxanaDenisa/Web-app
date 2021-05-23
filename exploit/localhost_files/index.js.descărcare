  function afiseaza_meniu_profil(){
	  if ($(".lista_profil").css("display") == "none")
			$(".lista_profil").css("display","contents");
	 	 else{
			$(".lista_profil").hide();
			/*
			$(document).mouseup(function(e) {
				var container = $(".lista_profil");

				// if the target of the click isn't the container nor a descendant of the container
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					container.hide();
				}
			});*/
		 }
	}
	
	$(document).on( "click", "#replace_login" ,function() {// on click pe "Ai deja cont?"
		$("#login").html(`
		
		<form action="php/inregistreaza.php" method="post">	 
		  <input type="text" placeholder="Nume" name="nume"><br><br>
		  <input type="text" placeholder="Mail" name="mail"><br><br>
		  <input type="password" placeholder="Parola" name="parola"><br><br>
		  <input type="submit" class="submit_btn" value="Submit"><br><br>
		</form>
		<p id="replace_inregistrare">Ai deja cont?</p>`);
	  console.log( "replace_login" );
	});
	
	$(document).on( "click", "#replace_inregistrare" ,function() {//on click pe "Nu ai încă un cont?"
		$("#login").html(`
		<form action="php/login.php" method="post">
			<input type="text" id="fname" placeholder="nume" name="nume"><br><br>
			<input type="password" placeholder="parola" id="lname" name="parola"><br><br>
			<input type="submit" value="Submit">
			</form>	
			<p id="replace_login"> Nu ai încă un cont?</p>`);
		console.log( "replace_inregistrare" );
	});
	
	function deschide_autentificare(){
		 if ($("#login").css("display") == "none")
	  
			$("#login").show();
	     else{
			$("#login").hide();
	}}
	
	$(".lupa").click(function() { // fire up search button
		search_str = $("#search_bar").val();
		console.log("lupa apasata");
		$(".container").children('#product').each(function(){
			product_name=$(this).find("#descriere").text();
			if(!(product_name.toLowerCase()).includes(search_str.toLowerCase())){
				$(this).hide();
			}else
				$(this).show();
		});
	  //alert( "Nu am gasit nimic" );
	});
	
$( document ).ready(function() {
  console.log( "ready!" );
  
	var url_string = window.location.href;
	var url = new URL(url_string);
	var c = url.searchParams.get("msg");
	if( c != null){
		switch( c ){
			case "succes":
				msg="Contul a fost creat cu succes!";
				type="success";
				break;
			case "prod_add_succ":
				msg="Produs încărcat cu succes!";
				type="success";
				break;
			case "error":
				msg="Acest cont există deja!";
				type="error";
				break;
			case "wrong_usr_or_pass":
				msg="Username sau parola greșite!";
				type="error";
				break;
		}
			
		$.notify(msg, {
			  className:type,
			  clickToHide: true,
			  autoHide: true,
			  showDuration: 150,
			  globalPosition: 'top right'
			});
	}
	$("#product").on('click', '*',function(){
			consile.log("luat!!@#!@#"); 	
			alert("produs adăugat în coș!");
		});
	
  
});