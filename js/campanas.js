$(function(){
	var id_perfil = sessionStorage.getItem('id_perfil');

	//Ajax tabla campanas
	$.ajax({
		type: 'post',
		url: '../controller/ctrcampanas.php',
		data: {
			action: 'tabla_campanas',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_campanas">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID CAMPAÑAS</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th>EMPRESA</th>';
			html += '<th>ESTADO</th>';
			if(id_perfil == '1' || id_perfil == '2'){
				html += '<th></th>';
			}
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.campana+'</td>';
				html += '<td>'+row.empresa+'</td>';
				html += '<td>'+row.estado+'</td>';
				if(id_perfil == '1' || id_perfil == '2'){
					html += '<td><button type="button" class="btn btn-success btn-xs" onclick="javascript: modificar_campana(\''+row.id+'\');">Modificar</button></td>';
				}
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID CAMPAÑAS</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th>EMPRESA</th>';
			html += '<th>ESTADO</th>';
			if(id_perfil == '1' || id_perfil == '2'){
				html += '<th></th>';
			}
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_campanas').html(html);

			$('#tabla_campanas').dataTable({
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
			$('#id_empresa').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
	//Crea campana
	$('#form_crear_campana').submit(function(e){
		e.preventDefault();
		var data = $('#form_crear_campana').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrcampanas.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#crear_campana').modal('toggle');
				$("#crear_campana .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/campanas/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});

	//Crea campana
	$('#form_modificar_campana').submit(function(e){
		e.preventDefault();
		var data = $('#form_modificar_campana').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrcampanas.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#modificar_campana').modal('toggle');
				$("#modificar_campana .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/campanas/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});
});

function modificar_campana(id_campana){
	$("#modificar_campana").modal();
	$.ajax({
		type: 'post',
		url: '../controller/ctrcampanas.php',
		data: {
			action: 'data_campana',
			id: id_campana,
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#id_campana').html(row.id);
				$('#id_campana_m').val(row.id);

				$('#empresa_m').empty();
				$.ajax({
					type: 'post',
					url: '../controller/ctrempresas.php',
					data: {
						action: 'empresas',
					},
					dataType: 'json'
				}).done(function(result2){
					if(result2.bool){
						var data2 = $.parseJSON(result2.msg);
						$.each(data2, function(i, row2){
							$('#id_empresa_m').append($('<option>', {
								value: '',
								text: '', 
							}));
							if (row.id_empresa = row2.id){
								$('#id_empresa_m').append($('<option>', {
									value: row2.id,
									text: row2.empresa, 
								}).attr("selected", true));
							} else {
								$('#id_empresa_m').append($('<option>', {
									value: row2.id,
									text: row2.empresa, 
								}));
							}
						});
					} else {
						console.log('Error: '+result2.msg);
					}
				});
				$('#nombre_campana_m').val(row.campana);
				$('#estado_campana_m').empty();
				if(row.estado == 'activo'){
					$('#estado_campana_m').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}).attr("selected", true));
					$('#estado_campana_m').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}));
				} else {
					$('#estado_campana_m').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}).attr("selected", true));
					$('#estado_campana_m').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}));
				}
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
}