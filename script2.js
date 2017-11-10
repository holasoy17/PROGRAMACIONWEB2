function enviar_datos_ajax(){
	var n=document.getElementById("nombre").value
	var c=document.getElementById("codigo").value
	var co=document.getElementById("credito").value
	var id=document.getElementById("idca").value

	var url="procesos/procesardatos.php";

	$.ajax({
		type:"post",
		url :url,
		data:{nombre:n,codigo:c,credito:co,idca:id},
		success:function(reset,resp){
			$("#dataTablee").php(reset);
			//console.log('resp')
			$('#formDatos')[0].reset()
		}
		
	})
}