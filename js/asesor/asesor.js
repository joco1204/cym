$(function(){

	$.ajax({
		type: 'post', 
		url: '../controller/ctrasesor.php',
		data: {
			action: 'informe_general_asesor',
			identificacion: $('#identificacion').val(),
			empresa: $('#empresa').val(),
			campana: $('#campana').val(),
			desde: '2018-10-01',
			hasta: '2018-10-30'
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = "";

		} else {
			console.log('Error: '+result.msg);
		}
	});



	Morris.Bar({
		element: 'repo_detallado',
		resize: true,
		data: [
			{x: 'ENC', y: 80},
			{x: 'ECS', y: 100},
			{x: 'ECO', y: 100},
			{x: 'ECC', y: 100},
		],
		xkey: 'x',
		ykeys: ['y'],
		labels: ['%'],
		gridTextSize: 12,
		barColors: function (row, series, type) {
		if(type === 'bar'){
			if(row.x == 0){
				return '#00a65a';
			}
				if(row.x == 1){
					return '#f39c12';
				}
				if(row.x == 2){
					return '#dd4b39';
				}
				if(row.x == 3){
					return '#3c8dbc';
				}
			} else {
				return '#fff';
			}
		},
	});
});

	