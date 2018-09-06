$(function(){

	//Ajax tabla matrices
	$.ajax({
		type: 'post',
		url: '../controller/ctrmatriz.php',
		data: {
			action: 'tabla_matriz',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_matriz">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID MATRIZ</th>';
			html += '<th>EMPRESA</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '<th>VER MÁS</th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.empresa+'</td>';
				html += '<td>'+row.campana+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs">Modificar</button></td>';
				html += '<td>';
				html += '<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#info_matriz_'+row.id+'">';
				html += '<span class="glyphicon glyphicon-plus"></span>';
				html += '</button>';
				html += '</td>';
				html += '</tr>';

				html += '<div id="info_matriz_'+row.id+'" class="modal fade" role="dialog" style="font-size: 12px;">';
				html += '<div class="modal-dialog modal-lg">';
				html += '<div class="modal-content">';
				html += '<div class="modal-header bg-blue text-center">';
				html += '<button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>';
				html += '<h4 class="modal-title"> <b>Matriz ID</b>: '+row.id+' - <b>Empresa:</b> '+row.empresa+' - <b>Campaña:</b> '+row.campana+' </h4>';
				html += '</div>';
				html += '<div class="modal-body" id="vista_matriz_'+row.id+'">';

				$.ajax({
					type: 'post',
					url: '../controller/ctrmonitoreo.php',
					data: {
						action: 'tipo_error',
						id_matriz: row.id
					},
					dataType: 'json'
				}).done(function(result2){
					if(result2.bool){
						var data2 = $.parseJSON(result2.msg);
						var html2 = '';
						$.each(data2, function(j, row2){
							j = j+1;
							html2 += '<div class="panel panel-primary">';
							html2 += '<div class="panel-heading"><p><b>TIPO DE ERROR '+j+': </b> '+row2.tipo_error+'</p></div>';
							html2 += '<div class="panel-body" id="vista_items_'+row2.id_error+'">';

							$.ajax({
								type: 'post',
								url: '../controller/ctrmonitoreo.php',
								data: {
									action: 'item_error',
									id_matriz: row.id,
									id_error: row2.id_error
								},
								dataType: 'json'
							}).done(function(result3){
								var data3 = $.parseJSON(result3.msg);
								var html3 = '';
								$.each(data3, function(k, row3){
									k = k+1;
									html3 += '<div class="panel panel-success">';
									html3 += '<div class="panel-heading">';
									html3 += '<div class="row">';
								    html3 += '<div class="col-md-6"><b>ITEM '+k+':</b> '+row3.item+'</div>';
								    html3 += '<div class="col-md-6"><b>VALOR:</b> '+row3.valor+' %</div>';
								    html3 += '</div>';
									html3 += '</div>';
									html3 += '<div class="panel-body">';
									html3 += '<ul id="puntos_item_'+row3.id+'">';

									$.ajax({
										type: 'post',
										url: '../controller/ctrmonitoreo.php',
										data: {
											action: 'punto_entrenamiento',
											id_item: row3.id
										},
										dataType: 'json'
									}).done(function(result4){
										var data4 = $.parseJSON(result4.msg);
										var html4 = '';
										$.each(data4, function(l, row4){
											l = l+1;
											html4 += '<li style="color: #145A32;"><b>PUNTO ENTRENAMIENTO '+l+':</b> '+row4.punto_entrenamiento+'</li>';
										});
										$('#puntos_item_'+row3.id).html(html4);
									});

									html3 += '</ul>';
									html3 += '</div>';
									html3 += '</div>';

								});
								$('#vista_items_'+row2.id_error).html(html3);
							});
							html2 += '</div>';
							html2 += '</div>';

						});
						$('#vista_matriz_'+row.id).html(html2);
					} else {
						console.log('Error: '+result2.msg);
					}
				});




				html += '</div>';
				html += '<div class="modal-footer">';
				html += '<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CERRAR</button>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID MATRIZ</th>';
			html += '<th>EMPRESA</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '<th>VER MÁS</th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_matriz').html(html);
			$('#tabla_matriz').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
});