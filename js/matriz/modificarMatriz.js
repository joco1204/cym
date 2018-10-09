$(function(){
	$.ajax({
		type: 'post',
		url: '../controller/ctrmatriz.php',
		data: {
			action: 'data_matriz',
			id: $('#id_matriz').val(),
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#id').html(row.id);
				if(row.estado == 'activo'){
					$('#estado').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}).attr("selected", true));
					$('#estado').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}));
				} else {
					$('#estado').append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}).attr("selected", true));
					$('#estado').append($('<option>', {
						value: 'activo',
						text: 'activo',
					}));
				}
				$('#empresa_matriz').html(row.empresa);
				$('#campana_matriz').html(row.campana);
				$('#empresa_form').val(row.id_empresa);
				$('#campana_form').val(row.id_campana);
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrmatriz.php',
		data: {
			action: 'data_matriz_error', 
			id_matriz: $('#id_matriz').val()
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			$.each(data, function(i, row){
				var count = i+1;

				$('#tipo_error').val(count);
				html += '<div class="panel panel-danger error" id="tipo_error">';
					html += '<div class="panel-heading bg-danger">';
						html += '<p><b>Tipo error '+count+'</b></p>';
					html += '</div>';
					html += '<div class="panel-body">';
						html += '<div class="row">';
							html += '<div class="col col-md-6">';
								html += '<div class="form-group">';
									html += '<label for="tipo_error_'+count+'" class="control-label">Error</label>';
									html += '<select name="tipo_error_'+count+'" id="tipo_error_'+count+'" class="form-control" required=""></select> ';
								html += '</div>';
							html += '</div>';
							html += '<div class="col col-md-2">';
								html += '<div class="form-group">';
									html += '<label for="calculo_porcentaje_'+count+'" class="control-label">Calculo Valor</label>';
									html += '<select name="calculo_porcentaje_'+count+'" id="calculo_porcentaje_'+count+'" class="form-control" required="" style="width:100%;"></select>';
								html += '</div>';
							html += '</div>';
							html += '<div class="col col-md-2">';
								html += '<div class="form-group">';
									html += '<label for="estado_error_'+count+'" class="control-label">Estado</label>';
									html += '<select name="estado_error_'+count+'" id="estado_error_'+count+'" class="form-control" required="" style="width:100%;"></select>';
								html += '</div>';
							html += '</div>';
							html += '<div class="col col-md-2">';
								html += '<button type="button" class="btn btn-danger btn-sm" onclick="javascript: addItem('+count+');">';
									html += 'Item Error <span class="glyphicon glyphicon-plus"></span>';
								html += '</button>';
								html += '<input type="hidden" id="item_error_'+count+'" name="item_error_'+count+'">';
							html += '</div>';
						html += '</div>';
						html += '<br>';
						html += '<div class="row">';
							html += '<div class="col col-md-12" id="canvas_item_error_'+count+'"></div>';
						html += '</div>';
					html += '</div>';
				html += '</div>';
			});
			
			$('#canvas_matriz').html(html);
			$("select").select2();

			$.each(data, function(i, row){
				var count = i+1;
				$.ajax({
					type: 'post',
					url: '../controller/ctrmatriz.php',
					data: {
						action: 'tipo_error',
					},
					dataType: 'json'
				}).done(function(result2){
					if(result2.bool){
						var data2 = $.parseJSON(result2.msg);
						$.each(data2, function(j, row2){

							if (row.tipo_error == row2.id){
								$('#tipo_error_'+count).append($('<option>', {
									value: row2.id,
									text: row2.error, 
								}).attr("selected", true));
							} else {	
								$('#tipo_error_'+count).append($('<option>', {
									value: row2.id,
									text: row2.error, 
								}));
							}

						});
					} else {
						console.log('Error: '+result.msg);
					}
				});
				$('#calculo_porcentaje_'+count).empty();
				if(row.calculo_valor == 'por'){
					$('#calculo_porcentaje_'+count).append($('<option>', {
						value: 'por',
						text: 'Porcentual',
					}).attr("selected", true));
					$('#calculo_porcentaje_'+count).append($('<option>', {
						value: 'sum',
						text: 'Sumatorio',
					}));
				} else {
					$('#calculo_porcentaje_'+count).append($('<option>', {
						value: 'sum',
						text: 'Sumatorio',
					}).attr("selected", true));
					$('#calculo_porcentaje_'+count).append($('<option>', {
						value: 'por',
						text: 'Porcentual',
					}));
				}
				$('#estado_error_'+count).empty();
				if(row.estado == 'activo'){
					$('#estado_error_'+count).append($('<option>', {
						value: 'activo',
						text: 'activo',
					}).attr("selected", true));
					$('#estado_error_'+count).append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}));
				} else {
					$('#estado_error_'+count).append($('<option>', {
						value: 'inactivo',
						text: 'inactivo',
					}).attr("selected", true));
					$('#estado_error_'+count).append($('<option>', {
						value: 'activo',
						text: 'activo',
					}));
				}
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$('#matriz_form').submit(function(e){
		e.preventDefault();
		$('#action').val('modificar_matriz');
		var data = $(this).serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrmatriz.php',
			data: data,
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
					pageContent('administrador/matrices/index');
				});
			} else {
				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});


});

function addError(){
	var html = '';
	var count = ($('.error').length)+1;
	$('#tipo_error').val(count);
	html += '<div class="panel panel-danger error" id="tipo_error">';
		html += '<div class="panel-heading bg-danger">';
			html += '<p><b>Tipo error '+count+'</b></p>';
		html += '</div>';
		html += '<div class="panel-body">';
			html += '<div class="row">';
				html += '<div class="col col-md-6">';
					html += '<div class="form-group">';
						html += '<label for="tipo_error_'+count+'" class="control-label">Error</label>';
						html += '<select name="tipo_error_'+count+'" id="tipo_error_'+count+'" class="form-control" required=""></select> ';
					html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-2">';
					html += '<div class="form-group">';
						html += '<label for="calculo_porcentaje_'+count+'" class="control-label">Calculo Valor</label>';
						html += '<select name="calculo_porcentaje_'+count+'" id="calculo_porcentaje_'+count+'" class="form-control" required="" style="width:100%;">';
							html += '<option></option>';
							html += '<option value="por">Porcentual</option>';
							html += '<option value="sum">Sumatorio</option>';
						html += '</select>';
					html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-2">';
					html += '<span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" style="font-size: 30px;"></span>';
				html += '</div>';
				html += '<div class="col col-md-2">';
					html += '<button type="button" class="btn btn-danger btn-sm" onclick="javascript: addItem('+count+');">';
						html += 'Item Error <span class="glyphicon glyphicon-plus"></span>';
					html += '</button>';
					html += '<input type="hidden" id="item_error_'+count+'" name="item_error_'+count+'">';
				html += '</div>';
			html += '</div>';
			html += '<br>';
			html += '<div class="row">';
				html += '<div class="col col-md-12" id="canvas_item_error_'+count+'"></div>';
			html += '</div>';
		html += '</div>';
	html += '</div>';
	$('#canvas_matriz').append(html);

	$("select").select2();
	$('[data-toggle="tooltip"]').tooltip({
		"container": "body", 
		"title": "Se puede seleccionar entre valor porcentual y sumatorio. El valor porcentual determina el mismo valor para todos los items del error (0 o 100). El valor sumatorio es incremental para todos los items del error y se debe calcular de 0 a 100"
	});

	$.ajax({
		type: 'post',
		url: '../controller/ctrmatriz.php',
		data: {
			action: 'tipo_error',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.error+'</option>';
			});
			$('#tipo_error_'+count).html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
}

function addItem(error_n){
	var html = '';
	var class_error = '.error_n_'+error_n;
	var count = ($(class_error).length)+1;
	$('#item_error_'+error_n).val(count);
	html += '<div class="panel panel-success error_n_'+error_n+'" id="item_error_'+error_n+'_'+count+'">';
	html += '<div class="panel-heading bg-success">';
	html += '<p><b>Item '+count+'</b></p>';
	html += '</div>';
	html += '<div class="panel-body">';
	html += '<div class="row">';
	html += '<div class="col col-md-6">';
	html += '<div class="form-group">';
	html += '<label for="nombre_item_error_'+error_n+'_'+count+'" class="control-label">Item</label>';
	html += '<input type="text" name="nombre_item_error_'+error_n+'_'+count+'" id="nombre_item_error_'+error_n+'_'+count+'" class="form-control" required="">';
	html += '</div>';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<label for="valor_'+error_n+'_'+count+'" class="control-label">Valor cumplimiento item</label>';
	html += '<input type="number" name="valor_'+error_n+'_'+count+'" id="valor_'+error_n+'_'+count+'" class="form-control" required="" min="1" max="100">';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<button type="button" class="btn btn-success btn-sm" onclick="javascript: puntoEntrenamiento('+error_n+', '+count+');">';
	html += 'Punto <span class="glyphicon glyphicon-plus"></span>';
	html += '</button>';
	html += '<input type="hidden" id="punto_entrenamiento_'+error_n+'_'+count+'" name="punto_entrenamiento_'+error_n+'_'+count+'">';
	html += '</div>';
	html += '</div>';
	html += '<br>';
	html += '<div class="row">';
	html += '<div class="col col-md-12" id="canvas_punto_entrenamiento_'+error_n+'_'+count+'"></div>';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	$('#canvas_item_error_'+error_n).append(html);
	$("select").select2();
}

function puntoEntrenamiento(error_n, item_n){
	var html = '';
	var class_item = '.item_n_'+error_n+'_'+item_n;
	var count = ($(class_item).length)+1;
	$('#punto_entrenamiento_'+error_n+'_'+item_n).val(count);	
	html += '<div class="panel panel-primary item_n_'+error_n+'_'+item_n+'" id="punto_entrenamiento_'+error_n+'_'+item_n+'_'+count+'">';
	html += '<div class="panel-heading bg-primary">';
	html += '<p><b>Punto Entrenamiento '+count+', Item '+item_n+'</b></p>';
	html += '</div>';
	html += '<div class="panel-body">';
	html += '<div class="form-group">';
	html += '<div class="col col-md-12">';
	html += '<input type="text" name="desc_punto_entrenamiento_'+error_n+'_'+item_n+'_'+count+'" id="punto_entrenamiento_'+error_n+'_'+item_n+'_'+count+'" class="form-control" required="">';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	$('#canvas_punto_entrenamiento_'+error_n+'_'+item_n).append(html);
	$("select").select2();
}