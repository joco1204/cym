$(function(){
	var id_perfil = sessionStorage.getItem('id_perfil');

	//Ajax tabla empresa
	$.ajax({
		type: 'post',
		url: '../controller/ctrempresas.php',
		data: {
			action: 'tabla_empresas',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_empresas">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID CLIENTE</th>';
			html += '<th>NOMBRE</th>';
			html += '<th>DOCUMENTO</th>';
			html += '<th>TIPO</th>';
			if(id_perfil == '1' || id_perfil == '2'){
				html += '<th></th>';
			}
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';

			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>';
				
				if(row.imagen != ''){
					html += '<img src="'+row.imagen+'" class="img-fluid img-thumbnail" alt="'+row.empresa+'" style="width: 60px; height: 60px;">';
				} else {
					html += '<img src="../../img/logo.png" class="img-fluid img-thumbnail" alt="'+row.empresa+'" style="width: 60px; height: 60px;">';
				}

				html += '</td>';
				html += '<td>'+row.empresa+'</td>';
				html += '<td>'+row.estado+'</td>';
				if(id_perfil == '1' || id_perfil == '2'){
					html += '<td><button type="button" class="btn btn-success btn-xs" onclick="javascript: modificar_validacion_rediferido(\''+row.id+'\');">Modificar</button></td>';
				}				
				html += '</tr>';
			});

			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID CLIENTE</th>';
			html += '<th>NOMBRE</th>';
			html += '<th>DOCUMENTOOOO</th>';
			html += '<th>TIPO</th>';
			if(id_perfil == '1' || id_perfil == '2'){
				html += '<th></th>';
			}
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_empresas').html(html);

			$('#tabla_empresas').dataTable({
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

	//Crea empresa
	$('#form_crear_empresa').submit(function(e){
		e.preventDefault();
		var data = $('#form_crear_empresa').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrempresas.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#crear_empresa').modal().hide();
				$("#crear_empresa .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/empresas/index');
				});
			} else {

				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});

	//Modificar empresa
	$('#form_modificar_empresa').submit(function(e){
		e.preventDefault();
		var data = $('#form_modificar_empresa').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrempresas.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#modificar_empresa').modal().hide();
				$("#modificar_empresa .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/empresas/index');
				});
			} else {

				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});
});

function modificar_validacion_rediferido(id_empresa){
	$("#modificar_validacion_rediferido").modal();
	$.ajax({
		type: 'post',
		url: '../controller/ctrempresas.php',
		data: {
			action: 'data_empresa',
			id: id_empresa
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#id_empresa').html(row.id);
				$('#id_empresa_m').val(row.id);
				$('#nombre_empresa_m').val(row.empresa);

				//Muestra las opciones de activo e inactivo
				$('#estado_empresa_m').empty();
				if(row.estado == 'activo'){
					$('#estado_empresa_m').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}).attr("selected", true));
					$('#estado_empresa_m').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}));
				} else {
					$('#estado_empresa_m').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}).attr("selected", true));
					$('#estado_empresa_m').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}));
				}

			})
		} else {
			console.log('Error: '+result.msg);
		}
	});
}