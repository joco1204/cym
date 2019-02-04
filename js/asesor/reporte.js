$(function(){
	$.ajax({
		type: 'post', 
		url: '../controller/ctrasesor.php',
		data: {
			action: 'informe_general_asesor',
			identificacion: $('#identificacion').val(),
			empresa: $('#empresa').val(),
			campana: $('#campana').val(),
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<div class="row">';
			$.each(data, function(i, row){
				html += '<div class="col-xs-6 col-md-3 text-center">';
				html += '<input type="text" class="knob" value="'+row.porcentaje+'" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="'+row.color_informe+'" readonly="">';
				html += '<div class="knob-label">'+row.error+'</div>';
				html += '</div>';
			});
			html += '</div>';
			html += '<script src="../../libs/plugins/knob/knob.js"></script>';
			$('#reporte_general').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	$.ajax({
		type: 'post', 
		url: '../controller/ctrasesor.php',
		data: {
			action: 'fechas_monitoreo',
			identificacion: $('#identificacion').val(),
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			$.each(data, function(i, row){
				html += '<option value="'+row.id_monitoreo+'">'+row.fecha_llamada+'</option>'
			});
			$('#fecha').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});

	

	$.ajax({
		type: 'post', 
		url: '../controller/ctrasesor.php',
		data: {
			action: 'ultima_fecha_monitoreo',
			identificacion: $('#identificacion').val(),
		},
		dataType: 'json'
	}).done(function(result_ultima_data){
		if(result_ultima_data.bool){
			var ultima_data = $.parseJSON(result_ultima_data.msg);
			$.each(ultima_data, function(i, row_ultima_data){


				$.ajax({
					type: 'post', 
					url: '../controller/ctrasesor.php',
					data: {
						action: 'descripcion_error',
						id_monitoreo: row_ultima_data.id_monitoreo
					},
					dataType: 'json'
				}).done(function(result){
					if(result.bool){
						var data = $.parseJSON(result.msg);
						var html = '';
						$.each(data, function(i, row){
							html += '';
							html += '<hr>';
							html += '<div class="row">';
							html += '<div class="col-md-4">';
							html += '<label>Tipo de error:</label>';
							html += '</div>';
							html += '<div class="col-md-8">';
							html += '<span>'+row.error+'</span>';
							html += '</div>';
							html += '</div>';
							html += '<div class="row">';
							html += '<div class="col-md-12"><label>Punto de entrenamiento:</label></div>';
							html += '</div>';
							html += '<div class="row">';
							html += '<div class="col-md-12">';
							html += '<div class="panel panel-primary">';
							html += '<div class="panel-body"><p>'+row.punto_entrenamiento+'</p></div>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
						});
						$('#errores_detallados').html(html);
					} else {
						console.log('Error: '+result.msg);
					}
				});




				
				$.ajax({
					type: 'post', 
					url: '../controller/ctrasesor.php',
					data: {
						action: 'informe_detallado_asesor',
						identificacion: $('#identificacion').val(),
						fecha: row_ultima_data.ultima_fecha
					},
					dataType: 'json'
				}).done(function(result){
					if(result.bool){
						var data = $.parseJSON(result.msg);
						var porc = '';

						var arrayl=[];
						var auxN = 0;
						var aux = "";
						alert(auxN);

						$.each(data, function(i, row){
							var arrayin = {x:row.siglas, y:row.porcentaje}
							arrayl.push(arrayin);

							/*if(auxN==0){
								aux+="{x:'"+row.siglas+"', y:'"+row.porcentaje+"'}";
								alert(aux);
							}else{
								aux+=",{x:'"+row.siglas+"', y:'"+row.porcentaje+"'}";
								alert(aux);
							}
							auxN++;
							alert(auxN);*/
						});

						Morris.Bar({
							element: 'repo_detallado',
							resize: true,
							data: arrayl,
							xkey: 'x',
							ykeys: ['y'],
							labels: ['%'],
							gridTextSize: 12,
							barColors: function (row2, series, type){
								if(type === 'bar'){
									if(row2.x == 0){
										return '#00a65a';
									}
									if(row2.x == 1){
										return '#dd4b39';
									}
									if(row2.x == 2){
										return '#3c8dbc';
									}
								} else {
									return '#fff';
								}
							},
						});
						alert(auxN+'N');
						console.log(arrayl);
					} else {
						console.log('Error: '+result.msg);
					}
				});
			});
		} else {
			console.log('Error: '+result_ultima_data.msg);
		}
	});


			
});
	
	
	