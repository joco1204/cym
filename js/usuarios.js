$(function(){

	//Ajax tabla servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrusuarios.php',
		data: {
			action: 'tabla_usuarios',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_usuarios">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID USUARIO</th>';
			html += '<th>USUARIO</th>';
			html += '<th>PERFIL</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>APELLIDO1</th>';
			html += '<th>APELLIDO2</th>';
			html += '<th>TIPO IDENTIFICACIÓN</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>EMAIL</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id_usuario+'</td>';
				html += '<td>'+row.usuario+'</td>';
				html += '<td>'+row.perfil+'</td>';
				html += '<td>'+row.nombre+'</td>';
				html += '<td>'+row.apellido1+'</td>';
				html += '<td>'+row.apellido2+'</td>';
				html += '<td>'+row.tipo_identificacion+'</td>';
				html += '<td>'+row.identificacion+'</td>';
				html += '<td>'+row.email+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs">Modificar</button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID USUARIO</th>';
			html += '<th>USUARIO</th>';
			html += '<th>PERFIL</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>APELLIDO 1</th>';
			html += '<th>APELLIDO 2</th>';
			html += '<th>TIPO IDENTIFICACIÓN</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>EMAIL</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_usuarios').html(html);
			$('#tabla_usuarios').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25, 
				"language": {
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
				    },
				    "oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
				}
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrusuarios.php',
		data: {
			action: 'tipo_identificacion',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value="">[Seleccione una opción]</option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.tipo_identificacion+'</option>';
			});
			$('#tipo_identificacion').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrusuarios.php',
		data: {
			action: 'perfil',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value="">[Seleccione una opción]</option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.perfil+'</option>';
			});
			$('#perfil').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});


	$('#perfil').change(function(e){
		if($(this).val() == '3' || $(this).val() == '4'){
			$('#empresa_campana').show();
			$('#empresa').prop('disabled', false);
			$('#campana').prop('disabled', false);
			//empresas
			$.ajax({
				type: 'post',
				url: '../controller/ctrempresas.php',
				data: {
					action: 'empresas',
				},
				dataType: 'json'
			}).done(function(result){
				if(result.bool){
					var data = $.parseJSON(result.msg);
					var html = '';
					html += '<option value="">[Seleccione una opción]</option>';
					$.each(data, function(i, row){
						html += '<option value="'+row.id+'">'+row.empresa+'</option>';
					});
					$('#empresa').html(html);
				} else {
					console.log('Error: '+result.msg);
				}
			});

			$('#empresa').change(function(){
				//campanas
				$.ajax({
					type: 'post',
					url: '../controller/ctrcampanas.php',
					data: {
						action: 'campanas',
						id_empresa: $(this).val(),
					},
					dataType: 'json'
				}).done(function(result){
					if(result.bool){
						var data = $.parseJSON(result.msg);
						var html = '';
						html += '<option value="">[Seleccione una opción]</option>';
						$.each(data, function(i, row){
							html += '<option value="'+row.id+'">'+row.campana+'</option>';
						});
						$('#campana').html(html);
					} else {
						console.log('Error: '+result.msg);
					}
				});
			});
		} else {
			$('#empresa').prop('disabled', true);
			$('#campana').prop('disabled', true);
			$('#empresa_campana').hide();
		}
	});

	$('#usuario_form').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();

		$.ajax({
			type: 'post',
			url: '../controller/ctrusuarios.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#modal_usuario').modal().hide();
				$("#modal_usuario .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/usuarios/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
		

	})
});