$(function(){

	//Ajax tabla servicios
	var userid = $('#userID').val();

	$.ajax({
		type: 'post',
		url: '../controller/ctrusuarios.php',
		data: {
			action: 'get_usuarios',
			iduser:userid
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			
			
			$.each(data, function(i, row){
				html += '<div class="row">';
				html += '<div class="col col-md-4">';
				html += '<span class="bg bg-success">NOMBRE</span>';
                html += '</div>';
                html += '<div class="col col-md-4">';
				html += '<span class="bg bg-success">ESTADO</span>';
                html += '</div>';
                html += '<div class="col col-md-4">';
				html += '<span class="bg bg-success">CONTRASEÑA</span>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
				html += '<div class="col col-md-4">';
				html += '<input type="text" value="'+row.usuario+'"/>';
                html += '</div>';
                html += '<div class="col col-md-4">';
                html += '<select>';
                html += '<option value="Activo">Activo</option> <option value="Desactivo">Desactivo</option>';
                html += '</select>';
				//html += '<input type="text" value="'+row.estado+'"/>';
                html += '</div>';
                html += '<div class="col col-md-4">';
				html += '<input type="text" value="'+row.password+'"/>';
                html += '</div>';
                html += '</div>';
            });
			
			
			

			$('#ctr_perfil').html(html);
			
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
});