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

	
	var bar = new Morris.Bar({
		element: 'repo_detallado',
		resize: true,
		data: [
			{y: '01', a: 100, b: 100, c: 100, d: 100},
			{y: '05', a: 100, b: 100, c: 100, d: 100},
			{y: '08', a: 80, b: 100, c: 100, d: 0},
			{y: '08', a: 100, b: 0, c: 100, d: 100},
			{y: '10', a: 100, b: 100, c: 100, d: 0},
			{y: '15', a: 100, b: 100, c: 0, d: 100},
			{y: '16', a: 40, b: 0, c: 100, d: 100},
			{y: '19', a: 40, b: 0, c: 100, d: 100}
		],
		barColors: ["#00a65a", "#f39c12", "#dd4b39", "#3c8dbc"],
		xkey: 'y',
		ykeys: ['a', 'b', 'c', 'd'],
		labels: ['ENC', 'ECS', 'ECO', 'ECC'],
		hideHover: 'auto'
	});

});

	