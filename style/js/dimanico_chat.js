function aff(i, nova){
	return function(){	
		var pessoas = $(".pessoas");		
		var id_amigo =  pessoas[i].children[0].value;
		if(jQuery.inArray(id_amigo, controle)==-1){
		    console.log("nao ta no array");
		    controle.push(id_amigo);
			$('<div class="boxes-'+i+' boxes" id="box-'+i+'"></div>').appendTo('#divFora');	
			$.get("../controller/chamar_titulo.php", {nome: id_amigo}, function(titulo){
				$('<div class="titulo-'+i+' titulo"></div>').appendTo('#box-'+i+'');
		   		$('.titulo-'+i+'').css("display", "block").addClass("msg_css").html(titulo);

		   		$('<div class="fechar-'+i+' fechar"></div>').appendTo('#box-'+i+'');
		   		$('.fechar-'+i+'').click(function(){
					$('#box-'+i+'').remove();
					var indice_removido = jQuery.inArray(id_amigo, controle);
					if(indice_removido!=-1){
					    controle.splice(indice_removido,1);
					    console.log(controle);
					}    
				})			
				$.get("../controller/chamar_mensagem.php", {nome: id_amigo}, function(resposta){	
					$('<div class="msg-'+i+' mensagem"></div>').appendTo('#box-'+i+'');	
			   		$('.msg-'+i+'').html(resposta);
			   		$('<textarea>', {
					    'class': 'form-control texto-'+i+' texto',
					    placeholder: "Escreva sua mensagem...",
					    name: "texto"
					}).appendTo('#box-'+i+'');
					//**
					setInterval(verificar, 1000);
					function verificar() {
				   		$.get("../controller/chamar_nova_msg.php",{id_amigo: pessoas[i].children[0].value},function(nova_msg){
							if("true" == nova_msg){	
								$('.titulo-'+i+'').css("background-color", "green");
								$('.boxes-'+i+'').css("border-color", "green");
							}
						})	
					}				
			   		//**	
					$('.texto-'+i+'').keypress(function(event){ 
						var keycode = (event.keyCode ? event.keyCode : event.which);//nao entendi essa linha
						if(keycode == '13'){
							var id_to = id_amigo;
							var texto = $('.texto-'+i+'').val();
								$.get("../controller/chamar_enviar.php", {msg: texto, id_to: id_to}, function(retorno){	
									$.get("../controller/chamar_mensagem.php", {nome: id_to}, function(resposta){
								   		$('.msg-'+i+'').html(resposta);
									})				
									$('.texto-'+i+'').val("");
								})
						} 
					});
				})	
				//setar 0 nas mensagens lidas
				$('#box-'+i+'').click(function() {
				  	$.get("../controller/setar_como_lida.php", {nome: id_amigo}, function(lida){
				  			$('.titulo-'+i+'').css("background-color", "gray");
				  			$('.boxes-'+i+'').css("border-color", "gray");
				  	})
				});
			})	
		}else{
			console.log("ja existe");
		}    				
	}
}

var controle = [];
window.onload = function(){
	var intervalo_msg = setInterval(function(){$(".mensagem").scrollTop( 10000 );}, 500);
	function pausa(){
		clearInterval(this.intervalo_msg);
	}
	function rolar(){
	 	this.intervalo_msg = setInterval(function(){$(".mensagem").scrollTop( 10000 );}, 500);	
	}
	setInterval(membros, 500);
	function membros(){	
		$("#barra").load("../controller/chamar_mostrar.php",function(responseTxt,statusTxt,xhr){
			var pessoas = $(".pessoas");	
			var numero_de_pessoas = $(".pessoas").length;		
			var i=0;
			do{
				$.get("../controller/chamar_nova_msg.php",{id_amigo: pessoas[i].children[0].value},function(nova_msg){
					console.log(i);
					if("true" == nova_msg){
						console.log("nova msg");
					}
					console.log(pessoas[i].children[1]);
				})
				pessoas[i].children[1].onclick = aff(i);
				i++;
			}while(i < numero_de_pessoas);
		});	
	}
}


//para minimizar
/*$('.titulo-'+i+'').click(function() {
$('.box-'+i+'').css("bottom", "-350px");
$('.fechar-'+i+'').toggle();
$('.msg-'+i+'').toggle();
$('.texto-'+i+'').toggle();
})*/
