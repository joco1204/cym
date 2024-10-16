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
			html += '<th>NOMBRE(S)</th>';
			html += '<th>PRIMER APELLIDO</th>';
			html += '<th>SEGUNDO APELLIDO</th>';
			html += '<th>TIPO IDENTIFICACIÓN</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>USUARIO RED</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.nombre+'</td>';
				html += '<td>'+row.apellido1+'</td>';
				html += '<td>'+row.apellido2+'</td>';
				html += '<td>'+row.tipo_identificacion+'</td>';
				html += '<td>'+row.identificacion+'</td>';
				html += '<td>'+row.usuario+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success" data-toggle="tooltip" onclick="javascript: ver_asesor(\''+row.id+'\');" data-original-title="Ver"><span class="glyphicon glyphicon-eye-open"></span></button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID ASESOR</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>PRIMER APELLIDO</th>';
			html += '<th>SEGUNDO APELLIDO</th>';
			html += '<th>TIPO IDENTIFICACIÓN</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>USUARIO RED</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_asesor').html(html);
			$('#tabla_asesor').dataTable({
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
			$("select").select2();

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
			html += '<option value=""></option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.tipo_identificacion+'</option>';
			});
			$('#tipo_identificacion').html(html);
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
			$('#empresa_1').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});


	$('#empresa_1').change(function(){
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
				$('#campana_1').html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});

	$('#campana_1').change(function(){
		//
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: {
				action: 'lider_info',
				id_campana: $(this).val(),
			},
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				var data = $.parseJSON(result.msg);
				var html = '';
				html += '<option value=""></option>';
				$.each(data, function(i, row){
					html += '<option value="'+row.id_usuario+'">'+row.nombre_usuario+'</option>';
				});
				$('#lider_1').html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
		//
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: {
				action: 'formador_info',
				id_campana: $(this).val(),
			},
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				var data = $.parseJSON(result.msg);
				var html = '';
				html += '<option value=""></option>';
				$.each(data, function(i, row){
					html += '<option value="'+row.id_usuario+'">'+row.nombre_usuario+'</option>';
				});
				$('#formador_1').html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});

	//Estado campaña
	$('#estado_campana_1').append($('<option>', {
		value: '',
		text: '',
	}).attr("selected", true));
	$('#estado_campana_1').append($('<option>', {
		value: 'activo',
		text: 'activo',
	}));
	$('#estado_campana_1').append($('<option>', {
		value: 'inactivo',
		text: 'inactivo',
	}));

	//Crea asesor
	$('#form_crear_asesor').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#crear_asesor').modal('toggle');
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

	//Modificar asesor
	$('#modificar_asesor').submit(function(e){
		e.preventDefault();
		var data = $('#form_modificar_asesor').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#modificar_asesor').modal('toggle');
				$("#modificar_asesor .close").click();
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
});

function ver_asesor(id_asesor){
	$("#modificar_asesor").modal();

	$.ajax({
		type: 'post',
		url: '../controller/ctrasesor.php',
		data: {
			action: 'data_asesor',
			id: id_asesor,
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#id_asesor').html(row.id);
				$('#id_asesor_m').val(row.id);
				$('#nombre_m').val(row.nombre);
				$('#apellido1_m').val(row.apellido1);
				$('#apellido2_m').val(row.apellido2);
				$('#identificacion_m').val(row.identificacion);
				$('#usuario_m').val(row.usuario);
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
				$('#canvas_empresa_campana_m').empty();

				$.ajax({
					type: 'post',
					url: '../controller/ctrasesor.php',
					data: {
						action: 'asesor_ec',
						id: id_asesor,
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
							html += '<div class="campanas_m" id="empresa_campana_m_'+j+'">';
						        html += '<div class="row" >';
						            html += '<div class="col col-md-4">';
						                html += '<div class="form-group has-feedback">';
						                    html += '<label class="control-label" for="empresa_m_'+j+'">EMPRESA:</label>';
						                    html += '<select class="form-control" id="empresa_m_'+j+'" name="empresa_m_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
						                    html += '<div class="help-block with-errors"></div>';
						                html += '</div>';
						            html += '</div>';
						            html += '<div class="col col-md-4">';
						                html += '<div class="form-group has-feedback">';
						                    html += '<label class="control-label" for="campana_m_'+j+'">CAMPAÑA:</label>';
						                    html += '<select class="form-control" id="campana_m_'+j+'" name="campana_m_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
						                    html += '<div class="help-block with-errors"></div>';
						                html += '</div>';
						            html += '</div>';
						            html += '<div class="col col-md-4">';
						                html += '<div class="form-group has-feedback">';
						                    html += '<label class="control-label" for="lider_m_'+j+'">LIDER:</label>';
						                    html += '<select class="form-control" id="lider_m_'+j+'" name="lider_m_'+j+'" style="width: 100%" required="" data-error="Debe un lider de la campaña"></select>';
						                    html += '<div class="help-block with-errors"></div>';
						                html += '</div>';
						            html += '</div>';
						        html += '</div>';
						        html += '<div class="row">';
						            html += '<div class="col col-md-4">';
						                html += '<div class="form-group has-feedback">';
						                    html += '<label class="control-label" for="formador_m_'+j+'">FORMADOR:</label>';
						                    html += '<select class="form-control" id="formador_m_'+j+'" name="formador_m_'+j+'" style="width: 100%" required="" data-error="Debe un lider de la campaña"></select>';
						                    html += '<div class="help-block with-errors"></div>';
						                html += '</div>';
						            html += '</div>';
						            html += '<div class="col col-md-4">';
						                html += '<div class="form-group has-feedback">';
						                    html += '<label class="control-label" for="estado_campana_m_'+j+'">ESTADO:</label>';
						                    html += '<select class="form-control" id="estado_campana_m_'+j+'" name="estado_campana_m_'+j+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
						                    html += '<div class="help-block with-errors"></div>';
						                html += '</div>';
						            html += '</div>';
						            html += '<div class="col col-md-4">';
						                html += '<br>';
						                html += '<button type="button" class="btn btn-success btn-sm" onclick="javascript: addCampanaModificacion();" title="Añadir Campaña">'
						                	html += '<span class="glyphicon glyphicon-plus"></span>';
						            	html += '</button>';
						            html += '</div>';
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
							var lider = '#lider_m_'+j;
							var formador = '#formador_m_'+j;
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
							
							//
							$(lider).empty();
							$.ajax({
								type: 'post',
								url: '../controller/ctrasesor.php',
								data: {
									action: 'lider_info',
									id_campana: row2.id_campana,
								},
								dataType: 'json'
							}).done(function(result3){
								if(result3.bool){
									var data3 = $.parseJSON(result3.msg);
									$.each(data3, function(i, row3){
										if (row2.id_lider == row3.id_usuario){
											$(lider).append($('<option>', {
												value: row3.id,
												text: row3.nombre_usuario, 
											}).attr("selected", true));
										} else {
											$(lider).append($('<option>', {
												value: row3.id_usuario,
												text: row3.nombre_usuario, 
											}));
										}
									});
								} else {
									console.log('Error: '+result2.msg);
								}
							});

							//
							$(formador).empty();
							$.ajax({
								type: 'post',
								url: '../controller/ctrasesor.php',
								data: {
									action: 'formador_info',
									id_campana: row2.id_campana,
								},
								dataType: 'json'
							}).done(function(result3){
								if(result3.bool){
									var data3 = $.parseJSON(result3.msg);
									$.each(data3, function(i, row3){
										if (row2.id_formador == row3.id_usuario){
											$(formador).append($('<option>', {
												value: row3.id,
												text: row3.nombre_usuario, 
											}).attr("selected", true));
										} else {
											$(formador).append($('<option>', {
												value: row3.id_usuario,
												text: row3.nombre_usuario, 
											}));
										}
									});
								} else {
									console.log('Error: '+result2.msg);
								}
							});

							//Muestra campañas cuando se modifica empresa
							$(empresa).change(function(){
								$(campana).empty();
								$(lider).empty();
								$(formador).empty();
								$(estado).empty();
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

								$(estado).append($('<option>', {
									value: '',
									text: '', 
								}).attr("selected", true));
								$(estado).append($('<option>', {
									value: 'activo',
									text: 'activo', 
								}));
								$(estado).append($('<option>', {
									value: 'inactivo',
									text: 'inactivo', 
								}));

							});

							//Muestra lideres y formadores cuandp
							$(campana).change(function(){
								$(lider).empty();
								$(formador).empty();
								$(estado).empty();
								//Lider y formador
								$.ajax({
									type: 'post',
									url: '../controller/ctrasesor.php',
									data: {
										action: 'lider_info',
										id_campana: $(this).val(),
									},
									dataType: 'json'
								}).done(function(result){
									if(result.bool){
										var data = $.parseJSON(result.msg);
										var html = '';
										html += '<option value=""></option>';
										$.each(data, function(i, row){
											html += '<option value="'+row.id_usuario+'">'+row.nombre_usuario+'</option>';
										});
										$('#lider_m_'+count).html(html);
									} else {
										console.log('Error: '+result.msg);
									}
								});
								//
								$.ajax({
									type: 'post',
									url: '../controller/ctrasesor.php',
									data: {
										action: 'formador_info',
										id_campana: $(this).val(),
									},
									dataType: 'json'
								}).done(function(result){
									if(result.bool){
										var data = $.parseJSON(result.msg);
										var html = '';
										html += '<option value=""></option>';
										$.each(data, function(i, row){
											html += '<option value="'+row.id_usuario+'">'+row.nombre_usuario+'</option>';
										});
										$('#formador_m_'+count).html(html);
									} else {
										console.log('Error: '+result.msg);
									}
								});
								//
								$(estado).append($('<option>', {
									value: '',
									text: '', 
								}).attr("selected", true));
								$(estado).append($('<option>', {
									value: 'activo',
									text: 'activo', 
								}));
								$(estado).append($('<option>', {
									value: 'inactivo',
									text: 'inactivo', 
								}));
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

	html += '<div class="campanas" id="empresa_campana_'+count+'">';
		html += '<div class="row">';
			html += '<div class="col col-md-4">';
			    html += '<div class="form-group has-feedback">';
			        html += '<label class="control-label" for="empresa_'+count+'">EMPRESA:</label>';
			        html += '<select class="form-control" id="empresa_'+count+'" name="empresa_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
			        html += '<div class="help-block with-errors"></div>';
			    html += '</div>';
			html += '</div>';
			html += '<div class="col col-md-4">';
			    html += '<div class="form-group has-feedback">';
			        html += '<label class="control-label" for="campana_'+count+'">CAMPAÑA:</label>';
			        html += '<select class="form-control" id="campana_'+count+'" name="campana_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
			        html += '<div class="help-block with-errors"></div>';
			    html += '</div>';
			html += '</div>';
			html += '<div class="col col-md-4">';
			    html += '<div class="form-group has-feedback">';
			        html += '<label class="control-label" for="lider_'+count+'">LIDER:</label>';
			        html += '<select class="form-control" id="lider_'+count+'" name="lider_'+count+'" style="width: 100%" required="" data-error="Debe un lider de la campaña"></select>';
			        html += '<div class="help-block with-errors"></div>';
			    html += '</div>';
			html += '</div>';
	    html += '</div>';
	    html += '<div class="row">';
			html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
					html += '<label class="control-label" for="formador_'+count+'">FORMADOR:</label>';
					html += '<select class="form-control" id="formador_'+count+'" name="formador_'+count+'" style="width: 100%" required="" data-error="Debe un lider de la campaña"></select>';
					html += '<div class="help-block with-errors"></div>';
				html += '</div>';
			html += '</div>';
			html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
					html += '<label class="control-label" for="estado_campana_'+count+'">ESTADO:</label>';
					html += '<select class="form-control" id="estado_campana_'+count+'" name="estado_campana_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
					html += '<div class="help-block with-errors"></div>';
				html += '</div>';
			html += '</div>';
			html += '<div class="col col-md-4">';
				html += '<br>';
				html += '<button type="button" class="btn btn-danger btn-sm" onclick="javascript: deleteCampanas('+count+');" title="Eliminar Campaña">';
	                html += '<span class="glyphicon glyphicon-remove"></span>';
	            html += '</button>';
			html += '</div>';
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
	html += '<div class="campanas_m" id="empresa_campana_m_'+count+'">';
        html += '<div class="row" >';
            html += '<div class="col col-md-4">';
                html += '<div class="form-group has-feedback">';
                    html += '<label class="control-label" for="empresa_m_'+count+'">EMPRESA:</label>';
                    html += '<select class="form-control" id="empresa_m_'+count+'" name="empresa_m_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>';
                    html += '<div class="help-block with-errors"></div>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col col-md-4">';
                html += '<div class="form-group has-feedback">';
                    html += '<label class="control-label" for="campana_m_'+count+'">CAMPAÑA:</label>';
                    html += '<select class="form-control" id="campana_m_'+count+'" name="campana_m_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                    html += '<div class="help-block with-errors"></div>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col col-md-4">';
                html += '<div class="form-group has-feedback">';
                    html += '<label class="control-label" for="lider_m_'+count+'">LIDER:</label>';
                    html += '<select class="form-control" id="lider_m_'+count+'" name="lider_m_'+count+'" style="width: 100%" required="" data-error="Debe un lider de la campaña"></select>';
                    html += '<div class="help-block with-errors"></div>';
                html += '</div>';
            html += '</div>';
        html += '</div>';
        html += '<div class="row">';
            html += '<div class="col col-md-4">';
                html += '<div class="form-group has-feedback">';
                    html += '<label class="control-label" for="formador_m_'+count+'">FORMADOR:</label>';
                    html += '<select class="form-control" id="formador_m_'+count+'" name="formador_m_'+count+'" style="width: 100%" required="" data-error="Debe un lider de la campaña"></select>';
                    html += '<div class="help-block with-errors"></div>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col col-md-4">';
                html += '<div class="form-group has-feedback">';
                    html += '<label class="control-label" for="estado_campana_m_'+count+'">ESTADO:</label>';
                    html += '<select class="form-control" id="estado_campana_m_'+count+'" name="estado_campana_m_'+count+'" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>';
                    html += '<div class="help-block with-errors"></div>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col col-md-4">';
                html += '<br>';
                html += '<button type="button" class="btn btn-danger btn-sm" onclick="javascript: deleteCampanasModifica('+count+');" title="Eliminar Campaña">';
                html += '<span class="glyphicon glyphicon-remove"></span>';
            html += '</button>';
            html += '</div>';
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

	//Muestra lideres y formadores cuandp
	$('#campana_m_'+count).change(function(){
		//Muestra lider
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: {
				action: 'lider_info',
				id_campana: $(this).val(),
			},
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				var data = $.parseJSON(result.msg);
				var html = '';
				html += '<option value=""></option>';
				$.each(data, function(i, row){
					html += '<option value="'+row.id_usuario+'">'+row.nombre_usuario+'</option>';
				});
				$('#lider_m_'+count).html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
		//Muestra formador
		$.ajax({
			type: 'post',
			url: '../controller/ctrasesor.php',
			data: {
				action: 'formador_info',
				id_campana: $(this).val(),
			},
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				var data = $.parseJSON(result.msg);
				var html = '';
				html += '<option value=""></option>';
				$.each(data, function(i, row){
					html += '<option value="'+row.id_usuario+'">'+row.nombre_usuario+'</option>';
				});
				$('#formador_m_'+count).html(html);
			} else {
				console.log('Error: '+result.msg);
			}
		});
	});

	//Estado campaña
	$('#estado_campana_m_'+count).append($('<option>', {
		value: '',
		text: '',
	}).attr("selected", true));
	$('#estado_campana_m_'+count).append($('<option>', {
		value: 'activo',
		text: 'activo',
	}));
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

function formato_cargue(){
	window.location.href = "../../formato_cargue.csv";
}