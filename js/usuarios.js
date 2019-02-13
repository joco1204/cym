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
				html += '<td><button type="button" class="btn btn-success" data-toggle="tooltip" onclick="javascript: ver_usuario(\''+row.id_usuario+'\');" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open"></span></button></td>';
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
				"dom": 'Blfrtip',
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
				},
				"buttons": [
					'excel',
				],
				"ordering":  true,
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$('#canvas_empresa_campana').empty();

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
			html += '<option value=""></option>';
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
			action: 'perfil_usuario',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.perfil+'</option>';
			});
			$('#perfil').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});


	$('#perfil').change(function(){
		$('#empresa_campana').hide();
		$('#numero_campanas').val('0')
		if($(this).val() == '3' || $(this).val() == '4' || $(this).val() == '6' || $(this).val() == '7'){
			$('#empresa_campana').show();
			$('#numero_campanas').val('1');
			$('#canvas_empresa_campana').empty();

			var html = '';
			html += '<div class="row campanas">';
                html += '<div class="col col-md-3">';
                    html += '<div class="form-group has-feedback">';
                        html += '<label class="control-label" for="empresa_'+j+'">EMPRESA:</label>';
                        html += '<select class="form-control" id="empresa_'+j+'" name="empresa_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
                        html += '<div class="help-block with-errors"></div>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col col-md-3">';
                    html += '<div class="form-group has-feedback">';
                        html += '<label class="control-label" for="campana_'+j+'">CAMPAÑA:</label>';
                        html += '<select class="form-control" id="campana_'+j+'" name="campana_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                        html += '<div class="help-block with-errors"></div>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col col-md-3">';
                    html += '<div class="form-group has-feedback">';
                        html += '<label class="control-label" for="estado_campana_'+j+'">ESTADO:</label>';
                        html += '<select class="form-control" id="estado_campana_'+j+'" name="estado_campana_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                        html += '<div class="help-block with-errors"></div>';
                    html += '</div>';
                html += '</div>';
                html += '<div class="col col-md-3">';
                    html += '<br>';
                    html += '<button type="button" class="btn btn-success btn-sm" onclick="javascript: addCampana();" title="Añadir Campaña">';
                        html += '<span class="glyphicon glyphicon-plus"></span>';
                    html += '</button>';
                html += '</div>';
            html += '</div>';
            $('#canvas_empresa_campana').html(html);
            $("select").select2();

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
					$('#empresa_'+j+'').html(html);
				} else {
					console.log('Error: '+result.msg);
				}
			});

			$('#empresa_'+j+'').change(function(){
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
						$('#campana_'+j+'').html(html);
					} else {
						console.log('Error: '+result.msg);
					}
				});
			});

			//Estado campaña
			$('#estado_campana_'+j+'').append($('<option>', {
				value: '',
				text: '',
			}).attr("selected", true));
			$('#estado_campana_'+j+'').append($('<option>', {
				value: 'activo',
				text: 'activo',
			}));
			$('#estado_campana_'+j+'').append($('<option>', {
				value: 'inactivo',
				text: 'inactivo',
			}));
		} else {
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
				$('#modal_usuario').modal('toggle');
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
	});

	$('#usuario_form_modificar').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrusuarios.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#modal_usuario_modificar').modal('toggle');
				$("#modal_usuario_modificar .close").click();
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
	});
});

function ver_usuario(id_usuario){
	$("#modal_usuario_modificar").modal();
	$.ajax({
		type: 'post',
		url: '../controller/ctrusuarios.php',
		data: {
			action: 'data_usuario',
			id_usuario: id_usuario,
		},
		dataType: 'json'
	}).done(function(result){

		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#id_usuario').html(row.id);
				$('#id_usuario_m').val(row.id);
				$('#nombres_m').val(row.nombre);
				$('#apellidos1_m').val(row.apellido1);
				$('#apellidos2_m').val(row.apellido2);
				$('#identificacion_m').val(row.identificacion);
				$('#email_m').val(row.email);
				$('#usaurio_m').val(row.usuario);
				//Valida si el perfil es analista o lider
				if (row.perfil == '3' || row.perfil == '4' || row.perfil == '6'){
					$('#empresa_campana_m').show();
					$('#empresa_m').prop('disabled', false);
					$('#campana_m').prop('disabled', false);

					$.ajax({
						type: 'post',
						url: '../controller/ctrusuarios.php',
						data: {
							action: 'usuario_ec',
							id_usuario: id_usuario,
						},
						dataType: 'json'
					}).done(function(result2){
						if(result2.bool){
							var data2 = $.parseJSON(result2.msg);
							var html  = '';
							var num_campanas = 0;
							$('#canvas_empresa_campana_m').empty();
							$.each(data2, function(j, row2){
								j++;
								num_campanas = j;
								html += '<div class="row campanas_m">';
								html += '<div class="col col-md-3">';
								html += '<div class="form-group has-feedback">';
								html += '<label class="control-label" for="empresa_m_'+j+'">EMPRESA:</label>';
								html += '<select class="form-control" id="empresa_m_'+j+'" name="empresa_m_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
								html += '<div class="help-block with-errors"></div>';
								html += '</div>';
								html += '</div>';
								html += '<div class="col col-md-3">';
								html += '<div class="form-group has-feedback">';
								html += '<label class="control-label" for="campana_m_'+j+'">CAMPAÑA:</label>';
								html += '<select class="form-control" id="campana_m_'+j+'" name="campana_m_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
								html += '<div class="help-block with-errors"></div>';
								html += '</div>';
								html += '</div>';
								html += '<div class="col col-md-3">';
								html += '<div class="form-group has-feedback">';
								html += '<label class="control-label" for="estado_campana_m_'+j+'">ESTADO:</label>';
								html += '<select class="form-control" id="estado_campana_m_'+j+'" name="estado_campana_m_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
								html += '<div class="help-block with-errors"></div>';
								html += '</div>';
								html += '</div>';
								html += '<div class="col col-md-3">';
								html += '<br>';
								html += '<button type="button" class="btn btn-success btn-sm" onclick="javascript: addCampanaModificacion();" title="Añadir Campaña">';
								html += '<span class="glyphicon glyphicon-plus"></span>';
								html += '</button>';
								html += '</div>';
								html += '</div>';
							});
							$('#canvas_empresa_campana_m').html(html);
							$("select").select2();
							$('#numero_campanas_m').val(num_campanas);
							$.each(data2, function(j, row2){
								j++;
								var empresa = '#empresa_m_'+j;
								var campana = '#campana_m_'+j;
								var estado = '#estado_campana_m_'+j;
								//Ajax empresas
								$(empresa).empty();
								$.ajax({
									type: 'post',
									url: '../controller/ctrempresas.php',
									data: {
										action: 'empresas',
									},
									dataType: 'json'
								}).done(function(result3){
									if(result3.bool){
										var data3 = $.parseJSON(result3.msg);
										$.each(data3, function(k, row3){
											if (row2.id_empresa == row3.id){
												$(empresa).append($('<option>', {
													value: row3.id,
													text: row3.empresa, 
												}).attr("selected", true));
											} else {	
												$(empresa).append($('<option>', {
													value: row3.id,
													text: row3.empresa, 
												}));
											}
										});
									} else {
										console.log('Error: '+result2.msg);
									}
								});
								//Ajax campañas
								$(campana).empty();
								$.ajax({
									type: 'post',
									url: '../controller/ctrcampanas.php',
									data: {
										action: 'campanas',
										id_empresa: row2.id_empresa,
									},
									dataType: 'json'
								}).done(function(result3){
									if(result3.bool){
										var data3 = $.parseJSON(result3.msg);
										$.each(data3, function(i, row3){
											if (row2.id_campana == row3.id){
												$(campana).append($('<option>', {
													value: row3.id,
													text: row3.campana, 
												}).attr("selected", true));
											} else {	
												$(campana).append($('<option>', {
													value: row3.id,
													text: row3.campana, 
												}));
											}
										});
									} else {
										console.log('Error: '+result2.msg);
									}
								});
								//Estado campañas
								$(estado).empty();
								if (row2.estado == 'activo'){
									$(estado).append($('<option>', {
										value: 'activo',
										text: 'activo', 
									}).attr("selected", true));
									$(estado).append($('<option>', {
										value: 'inactivo',
										text: 'inactivo', 
									}));
								} else {	
									$(estado).append($('<option>', {
										value: 'inactivo',
										text: 'inactivo', 
									}).attr("selected", true));
									$(estado).append($('<option>', {
										value: 'activo',
										text: 'activo', 
									}));
								}
							});
						} else {
							console.log('Error: '+result2.msg);
						}
					});
				} else {
					$('#empresa_campana_m').hide();
					$('#empresa_m').prop('disabled', true);
					$('#campana_m').prop('disabled', true);
				}

				//Ajax de identificacion
				$('#tipo_identificacion_m').empty();
				$.ajax({
					type: 'post',
					url: '../controller/ctrusuarios.php',
					data: {
						action: 'tipo_identificacion',
					},
					dataType: 'json',
				}).done(function(result2){
					if(result2.bool){
						var data2 = $.parseJSON(result2.msg);
						$.each(data2, function(i, row2){
							if (row.tipo_identificacion == row2.id){
								$('#tipo_identificacion_m').append($('<option>', {
									value: row2.id,
									text: row2.tipo_identificacion, 
								}).attr("selected", true));
							} else {	
								$('#tipo_identificacion_m').append($('<option>', {
									value: row2.id,
									text: row2.tipo_identificacion, 
								}));
							}
						});
					} else {
						console.log('Error: '+result2.msg);
					}
				});

				//Ajax de perfil
				$('#perfil_m').empty();
				$.ajax({
					type: 'post',
					url: '../controller/ctrusuarios.php',
					data: {
						action: 'perfil',
					},
					dataType: 'json',
				}).done(function(result2){
					if(result2.bool){
						var data2 = $.parseJSON(result2.msg);
						$('#perfil_m').append($('<option>', {
							value: '',
							text: '', 
						}));
						$.each(data2, function(i, row2){
							if (row.perfil == row2.id){
								$('#perfil_m').append($('<option>', {
									value: row2.id,
									text: row2.perfil, 
								}).attr("selected", true));
							} else {	
								$('#perfil_m').append($('<option>', {
									value: row2.id,
									text: row2.perfil, 
								}));
							}
						});
					} else {
						console.log('Error: '+result2.msg);
					}
				});

				//Muestra las opciones de activo e inactivo
				$('#estado_m').empty();
				if(row.estado == 'activo'){
					$('#estado_m').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}).attr("selected", true));
					$('#estado_m').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}));
				} else {
					$('#estado_m').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}).attr("selected", true));
					$('#estado_m').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}));
				}

				//CUando hay un campio en el perfil
				$('#perfil_m').change(function(e){
					//Cuando el perfil es de analista o lider
					if($(this).val() == '3' || $(this).val() == '4' || $(this).val() == '6' || $(this).val() == '8'){
						$('#empresa_campana_m').show();
						$('#empresa_m').prop('disabled', false);
						$('#campana_m').prop('disabled', false);
						//Ajax de la empresa
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
									$('#empresa_m').append($('<option>', {
										value: '',
										text: '', 
									}));
									$('#empresa_m').append($('<option>', {
										value: row2.id,
										text: row2.empresa, 
									}));
								});
							} else {
								console.log('Error: '+result2.msg);
							}
						});
						//Limpia las opciones de la campaña
						$('#campana_m').empty();
						$('#campana_m').append($('<option>', {
							value: '',
							text: '', 
						}));
					} else {
						//Limpia de deshabilita todas las opciones de empresa y campaña
						$('#empresa_m').empty();
						$('#campana_m').empty();
						$('#empresa_m').prop('disabled', true);
						$('#campana_m').prop('disabled', true);
						$('#empresa_campana_m').hide();
					}
				});

				//CUando cambia la empresa
				$('#empresa_m').change(function(){
					//Ajax campañas
					$('#campana_m').empty();
					$.ajax({
						type: 'post',
						url: '../controller/ctrcampanas.php',
						data: {
							action: 'campanas',
							id_empresa: $('#empresa_m').val(),
						},
						dataType: 'json'
					}).done(function(result2){
						if(result2.bool){
							var data2 = $.parseJSON(result2.msg);
							$.each(data2, function(i, row2){
								$('#campana_m').append($('<option>', {
									value: '',
									text: '', 
								}));
								$('#campana_m').append($('<option>', {
									value: row2.id,
									text: row2.campana, 
								}));
							});
						} else {
							console.log('Error: '+result2.msg);
						}
					});
				});

			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
}

function addCampana(){
	var html = '';
	var count = ($('.campanas').length)+1;
	$('.campanas').val(count);
	$('#numero_campanas').val(count);

	html += '<div class="row campanas" id="empresa_campana_'+count+'">';
        html += '<div class="col col-md-3">';
            html += '<div class="form-group has-feedback">';
                html += '<label class="control-label" for="empresa_'+count+'">EMPRESA:</label>';
                html += '<select class="form-control" id="empresa_'+count+'" name="empresa_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
                html += '<div class="help-block with-errors"></div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="col col-md-3">';
            html += '<div class="form-group has-feedback">';
                html += '<label class="control-label" for="campana_'+count+'">CAMPAÑA:</label>';
                html += '<select class="form-control" id="campana_'+count+'" name="campana_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                html += '<div class="help-block with-errors"></div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="col col-md-3">';
            html += '<div class="form-group has-feedback">';
                html += '<label class="control-label" for="estado_campana_'+count+'">ESTADO:</label>';
                html += '<select class="form-control" id="estado_campana_'+count+'" name="estado_campana_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                html += '<div class="help-block with-errors"></div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="col col-md-3">';
        	html += '<br>';
            html += '<button type="button" class="btn btn-danger btn-sm" onclick="javascript: deleteCampanas('+count+');" title="Eliminar Campaña">';
                html += '<span class="glyphicon glyphicon-remove"></span>';
            html += '</button>';
        html += '</div>';
    html += '</div>';
    //
	$('#canvas_empresa_campana').append(html); 
	$("select").select2();
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
			$('#empresa_'+count).html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
	//Muestra campañas cuando se modifica empresa
	$('#empresa_'+count).change(function(){
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
				$('#campana_'+count).html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});
	//Estado campaña
	$('#estado_campana_'+count).append($('<option>', {
		value: '',
		text: '',
	}).attr("selected", true));
	$('#estado_campana_'+count).append($('<option>', {
		value: 'activo',
		text: 'activo',
	}));
	$('#estado_campana_'+count).append($('<option>', {
		value: 'inactivo',
		text: 'inactivo',
	}));
}

function addCampanaModificacion(){
	var html = '';
	var count = ($('.campanas_m').length)+1;
	$('.campanas_m').val(count);
	$('#numero_campanas_m').val(count);

	html += '<div class="row campanas_m" id="empresa_campana_m_'+count+'">';
        html += '<div class="col col-md-3">';
            html += '<div class="form-group has-feedback">';
                html += '<label class="control-label" for="empresa_m_'+count+'">EMPRESA:</label>';
                html += '<select class="form-control" id="empresa_m_'+count+'" name="empresa_m_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
                html += '<div class="help-block with-errors"></div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="col col-md-3">';
            html += '<div class="form-group has-feedback">';
                html += '<label class="control-label" for="campana_m_'+count+'">CAMPAÑA:</label>';
                html += '<select class="form-control" id="campana_m_'+count+'" name="campana_m_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                html += '<div class="help-block with-errors"></div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="col col-md-3">';
            html += '<div class="form-group has-feedback">';
                html += '<label class="control-label" for="estado_campana_m_'+count+'">ESTADO:</label>';
                html += '<select class="form-control" id="estado_campana_m_'+count+'" name="estado_campana_m_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                html += '<div class="help-block with-errors"></div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="col col-md-3">';
        	html += '<br>';
            html += '<button type="button" class="btn btn-danger btn-sm" onclick="javascript: deleteCampanasModifica('+count+');" title="Eliminar Campaña">';
                html += '<span class="glyphicon glyphicon-remove"></span>';
            html += '</button>';
        html += '</div>';
    html += '</div>';
    //
	$('#canvas_empresa_campana_m').append(html); 
	$("select").select2();
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
			$('#empresa_m_'+count).html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
	//Muestra campañas cuando se modifica empresa
	$('#empresa_m_'+count).change(function(){
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
				$('#campana_m_'+count).html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});
	//Estado campaña
	$('#estado_campana_m_'+count).append($('<option>', {
		value: 'activo',
		text: 'activo',
	}).attr("selected", true));
	$('#estado_campana_m_'+count).append($('<option>', {
		value: 'inactivo',
		text: 'inactivo',
	}));
}

function deleteCampanas(count){
	var campana = '.campanas';
	var empresa_campana = '#empresa_campana_'+count;
	var error_actual = $(campana).length;
	$(empresa_campana).remove();
	var count = $(campana).length;
	$('.campanas').val(count);
	$('#numero_campanas').val(count);
}

function deleteCampanasModifica(count){
	var campana = '.campanas_m';
	var empresa_campana = '#empresa_campana_m_'+count;
	var error_actual = $(campana).length;
	$(empresa_campana).remove();
	var count = $(campana).length;
	$('.campanas_m').val(count);
	$('#numero_campanas_m').val(count);
}