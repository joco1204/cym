$(function(){

	//Ajax tabla matrices
	$.ajax({
		type: 'post',
		url: '../controller/ctrmatriz.php',
		data: {
			action: 'tabla_declinadas',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_declinadas">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID VALIDACIÓN</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>AGENT ASESOR</th>';
			html += '<th>FECHA VALIDACIÓN</th>';
			html += '<th>ESTADO</th>';
			html += '<th>ACCIONES</th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tr>';
			html += '<th>ID VALIDACIÓN</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>AGENT ASESOR</th>';
			html += '<th>FECHA VALIDACIÓN</th>';
			html += '<th>ESTADO</th>';
			html += '<th>ACCIONES</th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_declinadas').html(html);

			$('#tabla_declinadas').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25, 
				"language": {
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
				    },
				    "oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
				}
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});


});