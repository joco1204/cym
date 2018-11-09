$(function(){

	$.ajax({
		type: 'post',
		url: '../controller/ctrvalidacion.php',
		data: {
			action: 'estado',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function (i, row){
				html += '<option value="'+row.id+'">'+row.estado+'</option>';
			});
			$('#estado').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrvalidacion.php',
		data: {
			action: 'tipo_servicio',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function (i, row){
				html += '<option value="'+row.id+'">'+row.tipo_servicio+'</option>';
			});
			$('#tipo_servicio').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrvalidacion.php',
		data: {
			action: 'motivo_principal',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function (i, row){
				html += '<option value="'+row.id+'">'+row.motivo+'</option>';
			});
			$('#motivo_principal').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrvalidacion.php',
		data: {
			action: 'validador',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function (i, row){
				html += '<option value="'+row.id+'">'+row.nombre+' '+row.apellido1+'</option>';
			});
			$('#validador').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrvalidacion.php',
		data: {
			action: 'agent_asesor',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function (i, row){
				html += '<option value="'+row.id+'">'+row.agent_matriz+'</option>';
			});
			$('#agent_asesor').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$('#agent_asesor').change(function(){
		$.ajax({
			type: 'post',
			url: '../controller/ctrvalidacion.php',
			data: {
				action: 'nombre_asesor',
				id_asesor: $(this).val(),
			},
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				var data = $.parseJSON(result.msg);
				$.each(data, function (i, row){
					$('#nombre_asesor').val(row.nombre_asesor);
					$('#id_asesor').val(row.id_asesor);
				});
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});

	$('#validacion_form').submit(function(e){
		e.preventDefault();
		$('#action').val('guardar_validacion');
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
					text: 'Se guardo venta declinada con éxito.',
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('validacion/consultar_declinadas/consulta_declinada','id_declinada='+result.msg);
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});

	});

});