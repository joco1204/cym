$(function(){
	//Vista de venta declinada
	$.ajax({
		type: 'post',
		url: '../controller/ctrvalidacion.php',
		data: {
			action: 'vista_validacion',
			id_declinada: $('#id_declinada').val(),
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function (i, row){
				$('#estado').html(row.estado);
				$('#fecha_venta').html(row.fecha_venta);
				$('#fecha_validacion').html(row.fecha_validacion);
				$('#agent_asesor').html(row.agent_matriz);					
				$('#nombre_asesor').html(row.nombre_asesor);
				$('#cedula').html(row.cedula_cliente);
				$('#tipo_servicio').html(row.tipo_servicio);
				$('#motivo_principal').html(row.motivo);
				$('#validador').html(row.usuario);
				$('#observaciones').html(row.observaciones);
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

});