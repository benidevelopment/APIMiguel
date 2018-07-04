//mi libreria
$(document).ready(function(){
	$("#boton").click(function(){
	/*	$.get("html/menu.html",function(data){
			$("ul.menu").html(data);
		},"html")
		$(this).hide();*/
		
	  $.getJSON("html/menu.json",function(data){
		  $("ul.menu").html(""); 
		  $.each(data,function(clave,valor){ 
		  var enla=$("<a>").attr("href","#").text(valor.texto);
		  enla.click(abrir("html/"+valor.destino));
		  var li=$("<li>").append(enla);
		  $("ul.menu").append(li);
		  })
		  
		  function abrir(enlace){
			  return function(e){
				e.preventDefault();
				$("#contenedor").load(enlace);
			  }  
		  }
		  

		  
		  
	  })
	})
})