$(function(){

	//Ajax tabla campanas
	$.ajax({
		type: 'post',
		url: '../controller/ctrasesor.php',
		data: {
			action: 'tabla_asesor',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_asesor">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID ASESOR</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>APELLIDO(S)</th>';
			html += '<th>EMPRESA</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.identificacion+'</td>';
				html += '<td>'+row.nombres+'</td>';
				html += '<td>'+row.apellidos+'</td>';
				html += '<td>'+row.empresa+'</td>';
				html += '<td>'+row.campana+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modifica_asesor_'+row.id+'">Modificar</button></td>';
				html += '</tr>';

				html += '<div id="modifica_asesor_'+row.id+'" class="modal fade" role="dialog" >';
				html += '<div class="modal-dialog modal-lg">';
				html += '<div class="modal-content">';
				html += '<form id="form_modifica_asesor" autocomplete="off">';
				html += '<div class="modal-header bg-blue">';
				html += '<button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>';
				html += '<h4 class="modal-title">MODIFICAR ASESOR</h4>';
				html += '<input type="hidden" id="action" name="action" value="modificar_asesor">';
				html += '</div>';
				html += '<div class="modal-body">';
				html += '<div class="row">';
				html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="empresa_'+row.id+'">EMPRESA:</label>';
				html += '<select class="form-control" id="empresa_'+row.id+'" name="empresa_'+row.id+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
				html += '<div class="help-block with-errors"></div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="campana_modificar">CAMPAÑA:</label>';
				html += '<select class="form-control" id="campana_modificar" name="campana_modificar" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
				html += '<div class="help-block with-errors"></div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="identificacion_modificar">NÚMERO DE IDENTIFICACION:</label>';
				html += '<input type="text" id="identificacion_modificar" name="identificacion_modificar" class="form-control" required="" data-error="Debe ingresar número de indentificación" value="'+row.identificacion+'">';
				html += '<div class="help-block with-errors"></div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="row">';
				html += '<div class="col col-md-6">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="nombres_modificar">NOMBRE(S):</label>';
				html += '<input type="text" id="nombres_modificar" name="nombres_modificar" class="form-control" required="" data-error="Debe ingresar nombre(s)" value="'+row.nombres+'">';
				html += '<div class="help-block with-errors"></div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-6">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="apellidos_modificar">APELLIDO(S):</label>';
				html += '<input type="text" id="apellidos_modificar" name="apellidos_modificar" class="form-control" required="" data-error="Debe ingresar apellidos(s)" value="'+row.apellidos+'">';
				html += '<div class="help-block with-errors"></div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';

				html += '<div class="row">';
				html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="estado_modificar">ESTADO:</label>';
				html += '<select class="form-control" id="estado_modificar" name="estado_modificar" style="width: 100%" required="" data-error="Debe seleccionar un estado"></select>';
				html += '<div class="help-block with-errors"></div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';

				html += '</div>';
				html += '<div class="modal-footer">';
				html += '<button type="submit" class="btn btn-success btn-sm" >GUARDAR</button>';
				html += '<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CERRAR</button>';
				html += '</div>';
				html += '</form>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID ASESOR</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>APELLIDO(S)</th>';
			html += '<th>EMPRESA</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_asesor').html(html);
			$('#tabla_asesor').dataTable({
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
			$("select").select2();

		} else {
			console.log('Error: '+result.msg);
		}
	});

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
			html += '<option value=""></option>';
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
				html += '<option value=""></option>';
				$.each(data, function(i, row){
					html += '<option value="'+row.id+'">'+row.campana+'</option>';
				});
				$('#campana').html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});

	//Crea campana
	$('#form_crear_asesor').submit(function(e){
		e.preventDefault();
		var data = $('#form_crear_asesor').serialize();
		
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#crear_asesor').modal().hide();
				$("#crear_asesor .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/asesores/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});

	//Ajax upload file product
	$('#cargar_asesores_form').submit(function(e){
		e.preventDefault();
		$('#cargar_asesores').modal('toggle');
		var file = $('#archivo_asespres').prop('files')[0];
		var data = new FormData();
		data.append('action', 'cargar_asesores');
		data.append('file', file);
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: data,
			processData: false,
			contentType: false,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				swal({
					title: "Success!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/asesores/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});
});