$(function(){
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
				$('#fecha_venta').val(row.fecha_venta);
				$('#fecha_validacion').val(row.fecha_validacion);
				$('#agent_asesor').append($('<option>', {
					value: row.id_agent,
					text: row.agent_matriz, 
				}).attr("selected", true));
				$('#nombre_asesor').val(row.nombre_asesor);
				$('#cedula').val(row.cedula_cliente);
				$('#tipo_servicio').append($('<option>', {
					value: row.id_tipo_servicio,
					text: row.tipo_servicio, 
				}).attr("selected", true));
				$('#motivo_principal').append($('<option>', {
					value: row.id_motivo,
					text: row.motivo, 
				}).attr("selected", true));
				$('#validador').append($('<option>', {
					value: row.id_usuario,
					text: row.usuario, 
				}).attr("selected", true));
				$('#observaciones').val(row.observaciones);

				$('#estado').empty();
					$.ajax({
						type:'post',
						url: '../controller/ctrvalidacion.php',
						data: {
							action: 'estado',
					},
					dataType: 'json'
				}).done(function(result2){
					if(result2.bool){
						var data2 = $.parseJSON(result2.msg);
						$.each(data2, function (j, row2){
							if (row.id_estado == row2.id){
								$('#estado').append($('<option>', {
									value: row2.id,
									text: row2.estado, 
								}).attr("selected", true));
							} else {
								$('#estado').append($('<option>', {
									value: row2.id,
									text: row2.estado, 
								}));
							}
						});
					} else {
						console.log('Error: '+result2.msg)
					}
				});
			});
			$('#fecha_venta').attr("disabled", true);
			$('#fecha_validacion').attr("disabled", true);
			$('#agent_asesor').prop( "disabled", true );
			$('#nombre_asesor').prop( "disabled", true );
			$('#cedula').attr( "disabled", true );
			$('#tipo_servicio').prop( "disabled", true );
			$('#motivo_principal').prop( "disabled", true );
			$('#validador').prop( "disabled", true );
			$('#observaciones').attr( "disabled", true );
			$('.input-group-addon').hide();


		} else {
			console.log('Error: '+result.msg);
		}
	});

	$('#validacion_form').submit(function(e){
		e.preventDefault();
		var data=$(this).serialize();
		$.ajax({
			type:'post',
			url:'../controller/ctrvalidacion.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				swal({
					title: "Correcto!",
					text: 'Se modifico venta declinada con éxito.',
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('validacion/declinadas/consultar/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});

	});
});