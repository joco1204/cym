$(function(){
	$.ajax({
		type: 'post', 
		url: '../controller/ctrempresas.php',
		data: {
			action: 'empresa_analista',
		},
		dataType: 'json'
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			var num_empresas = $('#num_empresas').val();
			html += '<div class="row text-center">';
			for(var j = 1; j <= num_empresas; j++){
				var empresa = $('#empresa_'+j).val();
				$.each(data, function(i, row){
					var i = i+1;
					if(empresa == 0){
						html += '<div class="col-md-3">';
						html += '<div class="info-box bg-blue" onclick="javascript: pageContent(\'analista/campanas\',  \'id_empresa='+row.id+'&empresa='+row.empresa+'\');" style="cursor:pointer;">';
						html += '<span class="info-box-icon">';
						if(row.imagen != ''){
							html += '<center><img src="'+row.imagen+'" class="img-responsive" alt="'+row.empresa+'" style="width: 90px; height: 90px;"></center>';
						} else {
							html += '<center><img src="../../img/logo.png" class="img-responsive" alt="'+row.empresa+'" style="width: 90px; height: 90px;"></center>';
						}
						html += '</span>';
						html += '<div class="info-box-content">';
						html += '<center><p><b>'+row.empresa.toUpperCase()+'</b></p></center>';
						html += '<span class="info-box-number"></span>';
						html += '</div>';
						html += '</div>';
						html += '</div>';
						if(i%3 == 0){
							html += '</div><div class="row text-center">';
						}
					} else {
						if(empresa == row.id){
							html += '<div class="col-md-3">';
							html += '<div class="info-box bg-blue" onclick="javascript: pageContent(\'analista/campanas\',  \'id_empresa='+row.id+'&empresa='+row.empresa+'\');" style="cursor:pointer;">';
							html += '<span class="info-box-icon">';
							if(row.imagen != ''){
								html += '<center><img src="'+row.imagen+'" class="img-responsive" alt="'+row.empresa+'" style="width: 90px; height: 90px;"></center>';
							} else {
								html += '<center><img src="../../img/logo.png" class="img-responsive" alt="'+row.empresa+'" style="width: 90px; height: 90px;"></center>';
							}
							html += '</span>';
							html += '<div class="info-box-content">';
							html += '<center><p><b>'+row.empresa.toUpperCase()+'</b></p></center>';
							html += '<span class="info-box-number"></span>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
							if(i%3 == 0){
								html += '</div><div class="row text-center">';
							}
						}
					}
				});
			}

			html += '</div>';
			$('#container_panel').html(html);
		} else {
			console.log('Error: '+result.msg);
		}
	});
});