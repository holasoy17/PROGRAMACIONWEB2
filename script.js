


$(document).ready(function(){
	formSubmit()
})


function formSubmit(){
	 $('#formDatos').submit(function(e){
	 e.preventDefault()
    var code=$('#codigo').val()
	var nom=$('#nombre').val()
	var cre=$('#credito').val()
	var idcarrera=$('#idca').val()
	
	var data='&code='+code+'&nom='+nom+'&cre='+cre+'idcarrera='+idcarrera;

	$.ajax({
		url:'procesos/procesardatos.php',
		type: 'post',
		data: data,
		beforeSend: function(){
			console.log('enviando datos bd..')
		},
		success: function(resp){
			console.log('resp')
			$('#formDatos')[0].reset()
		}
	})


	 })

	
}