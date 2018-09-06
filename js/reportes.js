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

	$('#descargar_general').click(function(){
		var empresa = $('#empresa').val();
		var campana = $('#campana').val();
		var desde_general = $('#desde_general').val();
		var hasta_general = $('#hasta_general').val();
		if(empresa == ''){
			swal("Atención!","Debe seleccionar una empresa","warning");
		} else {
			if(campana == ''){
				swal("Atención!","Debe seleccionar una campaña","warning");
			} else {
				if (desde_general > hasta_general){
					swal("Atención!","La fecha iniciarl no puede ser mayor a la fecha final","warning");
				} else {
					window.location.href = "../model/reportes/reporte_general.php?empresa="+empresa+"&campana="+campana+"&desde_general="+desde_general+"&hasta_general="+hasta_general;
				}
			}
		}
					
	});

});