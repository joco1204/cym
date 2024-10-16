$(function(){
	$.ajax({
		type: 'post', 
		url: '../controller/ctrasesor.php',
		data: {
			action: 'informe_general_asesor',
			identificacion: $('#identificacion').val(),
			empresa: $('#empresa').val(),
			campana: $('#campana').val(),
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<div class="row">';
			$.each(data, function(i, row){
				html += '<div class="col-md-3 text-center">';
				html += '<input type="text" class="knob" value="'+row.porcentaje+'" data-width="100" data-height="100" data-bgColor="#e6e6e6" data-fgColor="'+row.color_informe+'" readonly="">';
				html += '<div class="knob-label"><b>'+row.error+' ('+row.siglas+')</b></div>';
				html += '</div>';
			});
			html += '</div>';
			html += '<script src="../../libs/plugins/knob/knob.js"></script>';
			$('#reporte_general').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post', 
		url: '../controller/ctrasesor.php',
		data: {
			action: 'fechas_monitoreo',
			identificacion: $('#identificacion').val(),
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option></option>'
			$.each(data, function(i, row){
				html += '<option value="'+row.fecha_registro+'">'+row.fecha_registro+'</option>'
			});
			$('#fecha').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
			
});
	
	
	