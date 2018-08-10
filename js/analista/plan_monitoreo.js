$(function(){
	
	$.ajax({
		type: 'post', 
		url: '../controller/ctrplanmonitoreo.php',
		data: {
			action: 'empresa_campana',
			id_empresa: $('#id_empresa').val(),
			id_campana: $('#id_campana').val(),
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			$.each(data, function(i, row){
				$('#empresa_nom').html(row.empresa.toUpperCase());
				$('#campana_nom').html(row.campana.toUpperCase());
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});


	$.ajax({
		type: 'post',
		url: '../controller/ctrplanmonitoreo.php',
		data: {
			action: 'tabla_asesor',
			id_empresa: $('#id_empresa').val(),
			id_campana: $('#id_campana').val(),
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_asesor">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID ASESOR</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>APELLIDO(S)</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.identificacion+'</td>';
				html += '<td>'+row.nombres+'</td>';
				html += '<td>'+row.apellidos+'</td>';
				html += '<td>'+row.empresa.toUpperCase()+' '+row.campana.toUpperCase()+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-sm" onclick="javascript: pageContent(\'analista/agenda_monitoreo\',\'id_empresa='+$('#id_empresa').val()+'&id_campana='+$('#id_campana').val()+'&id_asesor='+row.id+'\');">Plan Monitoreo</button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID ASESOR</th>';
			html += '<th>IDENTIFICACIÓN</th>';
			html += '<th>NOMBRE(S)</th>';
			html += '<th>APELLIDO(S)</th>';
			html += '<th>CAMPAÑA</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_asesores').html(html);
			$('#tabla_asesor').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});


});