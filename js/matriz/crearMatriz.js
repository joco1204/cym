$(function(){

	//Clientes
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
			$('#cliente').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	//Servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrservicios.php',
		data: {
			action: 'servicios',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<option value=""></option>';
			$.each(data, function(i, row){
				html += '<option value="'+row.id+'">'+row.servicio+'</option>';
			});
			$('#servicio').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$('#matriz_form').submit(function(e){
		e.preventDefault();
		$('#action').val('crear_matriz')
		var data = $(this).serialize();
		alert(data);

		$.ajax({
			type: 'post',
			url: '../controller/ctrmatriz.php',
			data: data,
			dataType: 'json',
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

	
function addMatriz(){
	if($('#cliente').val() == '' && $('#servicio').val() == ''){
		swal("Atención!","Debe seleccionar Cliente y Servicio","warning");
	} else if($('#cliente').val() == '' && $('#servicio').val() != ''){
		swal("Atención!","Debe seleccionar Cliente","warning");
	} else if($('#cliente').val() != '' && $('#servicio').val() == ''){
		swal("Atención!","Debe seleccionar Servicio","warning");
	} else {
		var cliente = document.getElementById("cliente");
  		var servicio = document.getElementById("servicio");
  		$('#matriz_pannel').show();
		$('#cliente_matriz').html(cliente.options[cliente.selectedIndex].text);
		$('#servicio_matriz').html(servicio.options[servicio.selectedIndex].text);
		$('#cliente_form').val(cliente.value);
		$('#servicio_form').val(servicio.value);
		$('#cliente').attr("disabled", true);
		$('#servicio').attr("disabled", true);
		$('#add_matriz').attr("disabled", true);
	}
}

function addError(){
	var html = '';
	var count = ($('.error').length)+1;
	$('#tipo_error').val(count);
	html += '<div class="panel panel-danger error" id="tipo_error_'+count+'">';
	html += '<div class="panel-heading bg-danger">';
	html += '</div>';
	html += '<div class="panel-body">';
	html += '<div class="row">';
	html += '<div class="col col-md-3">';
	html += '<div class="form-group">';
	html += '<label for="tipo_error_'+count+'" class="control-label">Tipo error '+count+'</label>';
	html += '<input type="text" name="tipo_error_'+count+'" id="tipo_error_'+count+'" class="form-control" required="">';
	html += '</div>';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<div class="form-group">';
	html += '<label for="calculo_porcentaje_'+count+'" class="control-label">Calculo Valor</label>';
	html += '<select name="calculo_porcentaje_'+count+'" id="calculo_porcentaje_'+count+'" class="form-control" required="">';
	html += '<option></option>';
	html += '<option value="por">Porcentual</option>';
	html += '<option value="sum">Sumatorio</option>';
	html += '<option value="mul">Multiplicativo</option>';
	html += '</select>';
	html += '</div>';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<div class="form-group">';
	html += '<label for="estado_'+count+'" class="control-label">Estado</label>';
	html += '<select name="estado_'+count+'" id="estado_'+count+'" class="form-control" required="">';
	html += '<option></option>';
	html += '<option value="activo">Activo</option>';
	html += '<option value="inactivo">Inactivo</option>';
	html += '</select>';
	html += '</div>';
	html += '</div>';
	html += '<div class="col col-md-3">';
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
}

function addItem(error_n){
	var html = '';
	var class_error = '.error_n_'+error_n;
	var count = ($(class_error).length)+1;
	$('#item_error_'+error_n).val(count);
	html += '<div class="panel panel-success error_n_'+error_n+'" id="item_error_'+error_n+'_'+count+'">';
	html += '<div class="panel-heading bg-success">';
	html += '</div>';
	html += '<div class="panel-body">';
	html += '<div class="row">';
	html += '<div class="col col-md-3">';
	html += '<div class="form-group">';
	html += '<label for="nombre_item_error_'+error_n+'_'+count+'" class="control-label">Item '+count+'</label>';
	html += '<input type="text" name="nombre_item_error_'+error_n+'_'+count+'" id="nombre_item_error_'+error_n+'_'+count+'" class="form-control" required="">';
	html += '</div>';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<label for="valor_'+error_n+'_'+count+'" class="control-label">Valor item</label>';
	html += '<input type="text" name="valor_'+error_n+'_'+count+'" id="valor_'+error_n+'_'+count+'" class="form-control" required="">';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<div class="form-group">';
	html += '<label for="estado_item_'+error_n+'_'+count+'" class="control-label">Estado</label>';
	html += '<select name="estado_item_'+error_n+'_'+count+'" id="estado_item_'+error_n+'_'+count+'" class="form-control" required="">';
	html += '<option></option>';
	html += '<option value="activo">Activo</option>';
	html += '<option value="inactivo">Inactivo</option>';
	html += '</select>';
	html += '</div>';
	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<button type="button" class="btn btn-success btn-sm" onclick="javascript: puntoEntrenamiento('+error_n+', '+count+');">';
	html += 'Punto de Entrenamiento <span class="glyphicon glyphicon-plus"></span>';
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
	html += '</div>';
	html += '<div class="panel-body">';
	html += '<div class="form-group">';
	html += '<div class="col col-md-4">';
	html += '<label for="desc_punto_entrenamiento_'+error_n+'_'+item_n+'_'+count+'" class="control-label">Punto Entrenamiento '+count+', Item '+item_n+'</label>';
	html += '</div>';
	html += '<div class="col col-md-8">';
	html += '<input type="text" name="desc_punto_entrenamiento_'+error_n+'_'+item_n+'_'+count+'" id="punto_entrenamiento_'+error_n+'_'+item_n+'_'+count+'" class="form-control" required="">';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	$('#canvas_punto_entrenamiento_'+error_n+'_'+item_n).append(html);
	$("select").select2();
}