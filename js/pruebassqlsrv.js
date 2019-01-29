$(function(){
	//Ajax tabla servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrpruebassqlsrv.php',
		data: {
			action: 'consultaPruebas',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			console.log(data);
			$.each(data, function(i, row){
				html += "NOM_LISTA: "+row.NOM_LISTA+" | ";
				html += "INICIO_LLAMADA: "+row.NOM_LISTA+" <br>";
			});
			$('#pruebasconst').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
});