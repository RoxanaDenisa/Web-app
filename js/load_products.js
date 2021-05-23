$(document).ready(function(){
	moneda=" lei";
	cart=[]
	function check_if_is_admin(){
		var val;
		jQuery.ajax({
		 type: "POST",
		 async: false,
		 url: 'php/get_admin_status.php',
		 /*dataType: 'text',*/
		 success: function (data, textStatus) {
		        if(data==1)
					val = true;
				else
					val = false;
		        }
		});
		return val;
	}
	
	function get_user_name(){
		var r;
		jQuery.ajax({
		 type: "POST",
		 async: false,
		 url: 'php/get_user_id.php',
		 dataType: 'text',
		 success: function (data, textStatus) {
		        if(data.length==0)
					r = false;
				else
					r = data;
		        }
		});	
		return r;
	}
	$(document).on( "click", "#com" ,function() {
		console.log("ai dat click");
		jQuery.ajax({
		 type: "POST",
		 async: false,
		 url: 'php/comenzile_mele.php',
		 dataType: 'json',
		 success: function ( data , textStatus) {
		  cmz=$('<div id="cos">');
		  container=$(".container");
		  container.html("");
			 	 for( i=0; i<data.length; i++){
				articol=$('<div id="art">');
				articol.append('<img src="'+data[i]["img"]+'">');
				articol.append('<p class="id_produs">'+data[i]["id_produs"]+'</p>');
				articol.append('<p class="localitate">'+data[i]["localitate"]+'</p>');
				articol.append('<p class="nume_prenume">'+data[i]["nume_prenume"]+'</p>');
				articol.append('<p class="product_nm">'+data[i]["nume_produs"]+'</p>');
				articol.append('<p class="telefon">'+data[i]["telefon"]+'</p>');
				articol.append('<p class="size">'+data[i]["size"]+'</p>');
				articol.append('<p class="cantitate">'+data[i]["cantitate"]+'</p>');
				articol.append('<p class="pret">'+data[i]["pret"]+moneda+'</p><br>');
				cmz.append(articol);
			 }
			 container.append(cmz);
			console.log(data);
		 }
		});
		});
		
	//submit_button
	
	
	$(document).on( "click", "#submit_button" ,function() {
		nume_prenume=$('#nume_prenume').val();
		adresa=$('#adresa').val();
		telefon=$('#telefon').val();
		jQuery.ajax({
		 type: "POST",
		 async: false,
		 data: { nume_pren : nume_prenume, adresa: adresa, telefon: telefon, cart: cart},
		 url: 'php/plasare_comanda.php',
		 dataType: 'text',
		 success: function (data, textStatus) {
			 console.log(data);
			 $(".container").html("");
			 load_all_products();
			if(data=="1")
			$.notify("Comanda plasată cu succes!", {
			  className: "success",
			  clickToHide: true,
			  autoHide: true,
			  showDuration: 150,
			  globalPosition: 'top right'
			})
			else
			$.notify("Hopa, a apărut o eroare!", {
			  className: "error",
			  clickToHide: true,
			  autoHide: true,
			  showDuration: 150,
			  globalPosition: 'top right'
			})
		}
		});
		
	});
	
	$(document).on( "click", "#plaseaza_comanda" ,function() {//la click pe comanda din coș
		container=$(".container");
		container.html("");
		form=$("<div id='order_box'>");
		form.append('<h1 id="formular"> Formular de livrare </h1>');
		form.append('<input type="text" placeholder="nume și prenume complet" id="nume_prenume"><br><br>');
		form.append('<input type="text" placeholder="adresa de livrare" id="adresa"><br><br>');
		form.append('<input type="text" maxlength="10" placeholder="nr. de telefon" id="telefon"><br><br>');
		form.append('<button id="submit_button"  >Plasează comanda</button>');
		container.append(form);
	});
	$(document).on( "click", "#cdc" ,function() {
		container=$(".container");
		container.html("");
		cos=$('<div id="cos">');
		console.log(cart);
		var total=0;
		total=parseInt(total,10);
		for( i=0; i<cart.length; i++){
			articol=$('<div id="art">');
			articol.append('<img src="'+cart[i][5]+'">');
			articol.append('<p class="product_nm">'+cart[i][0]+'</p>');
			articol.append('<p class="size">'+cart[i][3]+'</p>');
		    articol.append('<p class="cantitate">'+cart[i][4]+'</p>');
			articol.append('<p class="pret">'+cart[i][1]+moneda+'</p><br>');
			cos.append(articol);
			var b;
			b=cart[i][1];
			b=parseInt(b,10);
			total=total+b;
		}
		cos.append('<h1 id="total"> Total: '+total.toString() +moneda+' </h1>' );
		cos.append('<input style="background-image:url(../image/bg.jpg); margin: 0 auto; display: block;	padding: 10px 29px;	border-radius: 14px;border: solid #5a5a5a 2px;font-family:Corbel Light;" type="button" value="Comanda" id="plaseaza_comanda">');
		container.append(cos);
		
	});
	
	$(document).on( "click", ".add_to_cart" ,function() {//la click pe add to cart
		marime=$('.marime option:selected').text();
		cantitate=$('.cant').val();
		cart.push([$(".product_name").text(),$(".pret").text().split(" ")[0],$('#pd').attr('value'),marime,cantitate,$(".slideshow img").attr("src")]);
		$.notify("produs adăugat în coș!", {
			  className: "success",
			  clickToHide: true,
			  autoHide: true,
			  showDuration: 150,
			  globalPosition: 'top right'
			});
		
		/*jQuery.ajax({
			 type: "POST",
			 async: false,
			 url: 'php/palasare_comanda.php',
			 dataType: 'text',
			 data: {user_name: get_user_name(), cos : cart},
			 success: function (data, textStatus) {
				  console.log(data);
			 }
			});*/
	});
	
	//click on product	
	$(document).on( "click", "#product" ,function() {//la click pe produs
	if(check_if_is_admin()==false){
		id=$(this).find('.nimi_pres_img').attr("value");//.text();
		container=$(".container");
		container.html("");
		//console.log(product);
	  //	
	  jQuery.ajax({
		 type: "POST",
		 url: 'php/get_product_by_id.php',
		 dataType: 'json',
		 data: {id:id},
		 success: function (data, textStatus) {
				images=get_files(data[0]['url_imagini']);//get list of images for this protuct
				if(images.length==0)
					images=["../noimage.jpg"];//imagine standard
				slideshow=$('<div class="slideshow">');
				container.append(slideshow);
				for( i=0;i<images.length;i++){
					$('.slideshow').append('<img src="image/'+images[i]+'">');
				}
				
				$('.slideshow').slick({//add slideshow
				  dots: true,
				  infinite: true,
				  speed: 500,
				  fade: true,
				  cssEase: 'linear'
				});
				
				product_details=$('<div id="pd" value="'+id+'">');
				container.append(product_details);
				product_details.append('<p class="product_name">'+data[0]['nume_produs']+'</p>');
				product_details.append('<p class="desc">'+data[0]['descriere']+'</p>');
				product_details.append('<p class="pret">'+data[0]['pret']+moneda+'</p>');
				product_details.append('<a class="add_to_cart"><img src="image/add_shopping_cart.svg"></a>');
				//product_details.append('<a class="add_to_fav"><img src="image/favorite.png"></a>');
				container.append(slideshow);
				
				 jQuery.ajax({
				 type: "POST",
				 url: 'php/get_stoc.php',
				 dataType: 'json',
				 data: {id : id},
				 success: function (data, textStatus) {
					marime=$('<select name="marime" class="marime">');
					cant=[]
					for(i=0; i < data.length;i++){
						marime.append('<option value="'+i+'">'+data[i]['marimea']+'</option>');
						cant.push(data[i]['cantitate']);
					}
					$(".add_to_cart").before(marime);
					$(".add_to_cart").before('<select class="cant" name="cant" style="width: 80px; margin-left: 20px;" placeholder="cantitatea"></select><br>');
					for(i=0; i < cant[0];i++){
						$(".cant").append('<option>'+(i+1)+'</option>');
					}
					$('.marime').change(function(){ //$('.marime')[0].selectedIndex
						i=$(this)[0].selectedIndex;
						$('.cant').empty();
						n=parseInt(cant[i]);
						for(i=0; i < n;i++)
							$(".cant").append('<option>'+(i+1)+'</option>');
						$(".cant").attr("max",cant[i]);
					})
				}
				});
				
				
			}
		});
	}
	});
	/*left menu click*/
	$(document).on( "click", "#buton" ,function() {//la click pe meniul din stanga
	  categorie=$(this).first().text();	
	  jQuery.ajax({
		 type: "POST",
		 url: 'php/get_products.php',
		 dataType: 'json',
		 data: {categorie : categorie},
		 success: function (data, textStatus) {
		            left_menu = $("#butoane");
					container = $(".container");
					container.html("");
					for(i=0; i < data.length;i++){
						images=get_files(data[i]['url_imagini']);
						if(images.length==0)
							images=["../noimage.jpg"];//imagine standard
						div=$('<div id="product">');
						if(check_if_is_admin()==true)
							div.append('<img id="x" value="'+data[i]['id']+'" src="image/x.png" style="width: 30px; position: absolute; margin-left: 169px;">');
						div.append('<img class="nimi_pres_img" value="'+data[i]['id']+'" src="'+data[i]['url_imagini']+"/"+images[0]+'">');
						div.append('<p id="descriere">'+data[i]['nume_produs']+'</p>');
						div.append('<p id="pret">'+data[i]['pret']+moneda+'</p>');
						container.append(div);
					}
		        }
		});
	});
	/*click pe x*/
	$(document).on( "click", "#x" ,function() {//event de stergere produs
	  product=$(this).parent();
	  id=$(this).attr("value");	
	  //console.log(id );

	  jQuery.ajax({
		 type: "POST",
		 url: 'php/delete_product.php',
		 dataType: 'text',
		 data: {id : id},
		 success: function (data, textStatus) {
					product.remove();
					container=$(".container");
					if(container.children().length==0){
						location.reload();
					}
					//foreach butoane
		        }
		});
	});
	
	function get_files(path){
		var r;
		path = "../" + path + "/*";	
		jQuery.ajax({
		 type: "POST",
		 async: false,
		 url: "php/get_files.php",
		 data: { dir : path },
		 dataType: 'json',
		 success: function(data) {
		 	r = data;
		  }
		});
		return r;
	}
	
	function not_in(a,b){
		for(j=0;j<categorii_inserate.length;j++)
			if(a==b[j])
				return false;
		return true;
	}

	function generate_categories(){
		jQuery.ajax({
		 type: "POST",
		 data: {categorie : "%"},
		 url: 'php/get_products.php',
		 dataType: 'json',
		 success: function (data, textStatus) {
					categorii_inserate=[];
		            left_menu = $("#butoane");
					//console.log(left_menu);
		            for(i=0; i < data.length;i++){
							if(not_in(data[i]["categorie"], categorii_inserate)){
								left_menu.append('<div id="buton"><a href="#">'+data[i]["categorie"]+'</a></div>');
								categorii_inserate.push(data[i]["categorie"]);
							}
						//console.log(categorii_inserate);
			        }
					
		        }
		});
	}

	function load_all_products(){
		
	 	jQuery.ajax({
		 type: "POST",
		 url: 'php/get_products.php',
		 dataType: 'json',
		 data: {categorie : "%"},
		 success: function ( data , textStatus) {
			 //console.log(data);
				container = $(".container");
				for(i=0; i < data.length;i++){
					images=get_files(data[i]['url_imagini']);
					if(images.length==0)
						images=["../noimage.jpg"];//imagine standard
					div=$('<div id="product">');
					if(check_if_is_admin()==true)
						div.append('<img id="x" value="	'+data[i]['id']+'"src="image/x.png" style="width: 30px; position: absolute; margin-left: 169px;">');
					div.append('<img class="nimi_pres_img" value="'+data[i]['id']+'" src="'+data[i]['url_imagini']+"/"+images[0]+'">');
					div.append('<p id="descriere">'+data[i]['nume_produs']+'</p>');
					div.append('<p id="pret">'+data[i]['pret']+moneda+'</p>');
					container.append(div);
				}
			}
		});
	}

	load_all_products();
	generate_categories();
	//console.log(check_if_is_admin());
});