$(function(){

	//Ajax tabla cliente
	$.ajax({
		type: 'post',
		url: '../controller/ctrclientes.php',
		data: {
			action: 'tabla_clientes',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_clientes">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID CLIENTE</th>';
			html += '<th>NOMBRE CLIENTE</th>';
			html += '<th>ESTADO</th>';
			html += '<th>LOGO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.cliente+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td></td>';
				html += '<td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modifica_cliente_'+row.id+'">Modificar</button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID CLIENTE</th>';
			html += '<th>NOMBRE CLIENTE</th>';
			html += '<th>ESTADO</th>';
			html += '<th>LOGO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$.each(data, function(i, row){
				html += '<div id="modifica_cliente_'+row.id+'" class="modal fade" role="dialog">';
				html += '<div class="modal-dialog">';
				html += '<div class="modal-content">';
				html += '<form id="form_modifica_cliente_'+row.id+'" autocomplete="off">';
				html += '<div class="modal-header bg-blue">';
				html += '<button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>';
				html += '<input type="hidden" id="id_cliente" name="id_cliente" valule="'+row.id+'">';
				html += '<h4 class="modal-title">MODIFICA CLIENTE</h4>';
				html += '<input type="hidden" id="action" name="action" value="update_cliente">';
				html += '</div>';
				html += '<div class="modal-body">';
				html += '<div class="row">';
				html += '<div class="col col-md-6">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="nombre_cliente">CLIENTE:</label>';
				html += '<input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" value="'+row.cliente+'">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-6">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="logo_cliente">LOGO:</label>';
				html += '<input type="file" id="logo_cliente" name="logo_cliente" class="form-control">';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="row">';
				html += '<div class="col col-md-6">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="">ESTADO:</label>';
				html += '<select class="form-control" id="estado_cliente" name="estado_cliente">';
				if(row.estado == 'activo'){
					html += '<option></option>';
					html += '<option value="activo" selected>activo</option>';
					html += '<option value="inactivo">inactivo</option>';
				} else if(row.estado == 'inactivo'){
					html += '<option></option>';
					html += '<option value="activo">activo</option>';
					html += '<option value="inactivo" selected>inactivo</option>';
				} else {
					html += '<option selected></option>';
					html += '<option value="activo">activo</option>';
					html += '<option value="inactivo">inactivo</option>';
				}
				html += '</select>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="modal-footer">';
				html += '<button type="button" class="btn btn-success btn-sm" >GUARDAR</button>';
				html += '<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CERRAR</button>';
				html += '</div>';
				html += '</form>';
				html += '</div>';
				html += '</div>';
				html += '</div>'; 

				//Actualiza cliente
				$('#form_modifica_cliente_'+row.id).submit(function(e){
					e.preventDefault();
					var data = $('#form_modifica_cliente').serialize();
					$.ajax({
						type: 'post',
						url: '../controller/ctrclientes.php',
						data: data,
						dataType: 'json',
					}).done(function(result){
						if(result.bool){
							$('#crear_cliente').modal().hide();
							$("#crear_cliente .close").click();
							swal({
								title: "¡Success!",
								text: result.msg,
								type: 'success',
								showCancelButton: false,
								confirmButtonClass: "btn-success",
								confirmButtonText: "Aceptar",
								closeOnConfirm: true,
							},function(){
								pageContent('administrador/clientes/index');
							});
						} else {
							swal('Error!',result.msg,'error');
							console.log('Error: '+result.msg);
						}
					});
				});
			});

			$('#data_clientes').html(html);
			$('#tabla_clientes').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});

	//Crea cliente
	$('#form_crear_cliente').submit(function(e){
		e.preventDefault();
		var data = $('#form_crear_cliente').serialize();
		$.ajax({
			type: 'post',
			url: '../controller/ctrclientes.php',
			data: data,
			dataType: 'json',
		}).done(function(result){
			if(result.bool){
				$('#crear_cliente').modal().hide();
				$("#crear_cliente .close").click();
				swal({
					title: "Correcto!",
					text: result.msg,
					type: 'success',
					showCancelButton: false,
					confirmButtonClass: "btn-success",
					confirmButtonText: "Aceptar",
					closeOnConfirm: true,
				},function(){
					pageContent('administrador/clientes/index');
				});
			} else {

				swal('Error!',result.msg,'error');
				console.log('Error: '+result.msg);
			}
		});
	});
});