$(function(){

	//Ajax tabla empresa
	$.ajax({
		type: 'post',
		url: '../controller/ctrempresas.php',
		data: {
			action: 'tabla_empresas',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_empresas">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID EMPRESA</th>';
			html += '<th>LOGO</th>';
			html += '<th>NOMBRE EMPRESA</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>';
				html += '<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#campana_empresa_'+row.id+'">';
				html += '<span class="glyphicon glyphicon-plus"></span>';
				html += '</button> ';
				html += row.id+'</td>';
				html += '<div id="campana_empresa_'+row.id+'" class="modal fade" role="dialog">';
				html += '<div class="modal-dialog">';
				html += '<div class="modal-content">';
				html += '<div class="modal-header bg-blue">';
				html += '<button type="button" class="close" data-dismiss="modal">&times;</button>';
				html += '<h4 class="modal-title">'+row.empresa+'</h4>';
				html += '</div>';
				html += '<div class="modal-body" id="empresas_campanas_'+row.id+'">';

				$.ajax({
					type: 'post',
					url: '../controller/ctrcampanas.php',
					data: {
						action: 'campanas',
						id_empresa: row.id
					},
					dataType: 'json',
				}).done(function(result1){
					var data1 = $.parseJSON(result1.msg);
					var html1 = '';
					html1 += '<div class="row">';
					html1 += '<div class="col col-md-4"><b>ID CAMPAÑA</b></div>';
					html1 += '<div class="col col-md-8"><b>CAMPAÑA</b></div>';
					html1 += '</div>';
					$.each(data1, function(i, row1){
						html1 += '<div class="row">';
						html1 += '<div class="col col-md-4">'+row1.id+'</div>';
						html1 += '<div class="col col-md-8">'+row1.campana+'</div>';
						html1 += '</div>';
					});
					$('#empresas_campanas_'+row.id).html(html1);
				});

				html += '</div>';
				html += '<div class="modal-footer">';
				html += '<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '<td>';
				if(row.imagen != ''){
					html += '<img src="'+row.imagen+'" class="img-fluid img-thumbnail" alt="'+row.empresa+'" style="width: 15px; height: 15px;">';
				}
				html += '</td>';
				html += '<td>'+row.empresa+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modifica_empresa_'+row.id+'">Modificar</button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID EMPRESA</th>';
			html += '<th>LOGO</th>';
			html += '<th>NOMBRE EMPRESA</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$.each(data, function(i, row){
				html += '<div id="modifica_empresa_'+row.id+'" class="modal fade" role="dialog">';
				html += '<div class="modal-dialog modal-lg">';
				html += '<div class="modal-content">';
				html += '<form id="form_modifica_empresa_'+row.id+'" autocomplete="off">';
				html += '<div class="modal-header bg-blue">';
				html += '<button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>';
				html += '<input type="hidden" id="id_empresa" name="id_empresa" valule="'+row.id+'">';
				html += '<h4 class="modal-title">MODIFICA EMPRESA</h4>';
				html += '<input type="hidden" id="action" name="action" value="update_empresa">';
				html += '</div>';
				html += '<div class="modal-body">';
				html += '<div class="row">';
				html += '<div class="col col-md-12 text-center">';
				if(row.imagen != ''){
					html += '<img src="'+row.imagen+'" class="img-fluid img-thumbnail" alt="'+row.empresa+'" style="height: 50px;">';	
				}
				html += '</div>';
				html += '</div>';

				html += '<div class="row">';
				html += '<div class="col col-md-8">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="nombre_empresa">EMPRESA:</label>';
				html += '<input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" value="'+row.empresa+'">';
				html += '</div>';
				html += '</div>';
				html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="logo_empresa">LOGO:</label>';
				html += '<input type="file" id="logo_empresa" name="logo_empresa" class="form-control">';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '<div class="row">';
				html += '<div class="col col-md-4">';
				html += '<div class="form-group has-feedback">';
				html += '<label class="control-label" for="estado_empresa">ESTADO:</label>';
				html += '<select class="form-control" id="estado_empresa" name="estado_empresa" style="width: 100%;">';
				if(row.estado == 'activo'){
					html += '<option value="activo" selected>activo</option>';
					html += '<option value="inactivo">inactivo</option>';
				} else if(row.estado == 'inactivo'){
					html += '<option value="activo">activo</option>';
					html += '<option value="inactivo" selected>inactivo</option>';
				} else {
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

				//Actualiza empresa
				$('#form_modifica_empresa_'+row.id).submit(function(e){
					e.preventDefault();
					var data = $('#form_modifica_empresa').serialize();
					$.ajax({
						type: 'post',
						url: '../controller/ctrempresas.php',
						data: data,
						dataType: 'json',
					}).done(function(result){
						if(result.bool){
							$('#crear_empresa').modal().hide();
							$("#crear_empresa .close").click();
							swal({
								title: "¡Success!",
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

			$('#data_empresas').html(html);
			$('#tabla_empresas').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
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
			dataType: 'json',
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
});