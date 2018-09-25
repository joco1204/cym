$(function(){

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

	$('#matriz_form').submit(function(e){
		e.preventDefault();
		$('#action').val('crear_matriz')
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

	$('#nuevo_error_form').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrmatriz.php',
			data: data,
			dataType: 'json'
		}).done(function(result){
			if(result.bool){
				$('#nuevo_error').modal().hide();
				$("#nuevo_error .close").click();
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
	if($('#empresa').val() == '' && $('#campana').val() == ''){
		swal("Atención!","Debe seleccionar empresa y campana","warning");
	} else if($('#empresa').val() == '' && $('#campana').val() != ''){
		swal("Atención!","Debe seleccionar empresa","warning");
	} else if($('#empresa').val() != '' && $('#campana').val() == ''){
		swal("Atención!","Debe seleccionar campana","warning");
	} else {
		var empresa = document.getElementById("empresa");
  		var campana = document.getElementById("campana");
  		$('#matriz_pannel').show();
		$('#empresa_matriz').html(empresa.options[empresa.selectedIndex].text);
		$('#campana_matriz').html(campana.options[campana.selectedIndex].text);
		$('#empresa_form').val(empresa.value);
		$('#campana_form').val(campana.value);
		$('#empresa').attr("disabled", true);
		$('#campana').attr("disabled", true);
		$('#add_matriz').attr("disabled", true);
	}
}

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
	html += '<div class="input-group">';
	html += '<select name="tipo_error_'+count+'" id="tipo_error_'+count+'" class="form-control" required=""></select> ';
	html += '<span class="input-group-btn">';
	html += '<button type="button" class="btn btn-danger btn-sm" style="border-radius: 5px;" onclick="javascript: nuevoError();">';
	html += '<span class="glyphicon glyphicon-plus"></span>';
	html += '</button>';
	html += '</span>';
	html += '</div>';
	html += '</div>';

	html += '</div>';
	html += '<div class="col col-md-3">';
	html += '<div class="form-group">';
	html += '<label for="calculo_porcentaje_'+count+'" class="control-label">Calculo Valor</label>';
	html += '<select name="calculo_porcentaje_'+count+'" id="calculo_porcentaje_'+count+'" class="form-control" required="" style="width:100%;">';
	html += '<option></option>';
	html += '<option value="por">Porcentual</option>';
	html += '<option value="sum">Sumatorio</option>';
	html += '</select>';
	html += '</div>';
	html += '</div>';

	html += '<div class="col col-md-1">';
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

function nuevoError(){
	$("#nuevo_error").modal();
}

