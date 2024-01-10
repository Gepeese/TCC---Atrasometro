function verifica(){
	var texto = document.getElementById("matric");	
	if(texto.value != null){
      testaUsuario(texto.value);
	}	
}

function testaUsuario(matricula){
if(username) {
    var url="pesquisanome.php?matricula="+encodeURIComponent(matricula);
	requisicaoHTTP("GET",url,true);
	}
 }
	
function trataDados(){
 var info = ajax.responseText; 
 if(info != ""){
	var arrayOpcoes = eval(info);
	var camada=document.getElementById("exibirAqui");
	limpa(camada);
	camada.appendChild(listaNova);
 }
}
