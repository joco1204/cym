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