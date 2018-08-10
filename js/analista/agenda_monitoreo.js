$(function(){
	
	$.ajax({
		type: 'post', 
		url: '../controller/ctragendamonitoreo.php',
		data: {
			action: 'info_asesor',
			id_asesor: $('#id_asesor').val(),
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#nombre_asesor').html(row.nombres+' '+row.apellidos);
				$('#identificacion_asesor').html(row.identificacion);
				$('#campana_asesor').html(row.empresa.toUpperCase()+' - '+row.campana.toUpperCase());
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

});