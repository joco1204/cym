$(function(){

	//Ajax tabla servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrservicios.php',
		data: {
			action: 'tabla_servicios',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_servicios">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID SERVICIOS</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>CLIENTE</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.servicio+'</td>';
				html += '<td>'+row.cliente+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modifica_servicio_'+row.id+'">Modificar</button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID SERVICIOS</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>CLIENTE</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_servicios').html(html);
			$('#tabla_servicios').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrclientes.php',
		data: {
			action: 'clientes',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.cliente+'</option>';
			});
			$('#id_cliente').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	//Crea servicio
	$('#form_crear_servicio').submit(function(e){
		e.preventDefault();
		var data = $('#form_crear_servicio').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrservicios.php',
			data: data,
			dataType: 'json',
		}).done(function(result){
			if(result.bool){
				$('#crear_servicio').modal().hide();
				$("#crear_servicio .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/servicios/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});
});