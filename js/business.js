//Function to load the content of each module
var pageContent = function(page, settings){
	sessionStorage.setItem("navigator", page);
	//Valid whether the configuration parameters are defined or not
	if (settings === undefined || settings === null || settings  === ''){
		//Make the page load in the container
		$("#contenido-index").load(page+".php", function(response, status, xhr){
			//Valid if the status of the file's upload is correct or not
			if (status == "error"){
				$("#contenido-index").load("config/error.php");
			}
		});
	} else {
		try{
			var params 	= JSON.parse(settings);
			var bool 	= true;
		} catch(e){
			var params 	= settings;
			var bool 	= false;
		}
		//Make the page load in the container
		$("#contenido-index").load(page+".php", params, function(response, status, xhr){
			//Valid if the status of the file's upload is correct or not
			if(status == "error"){
				$("#contenido-index").load("config/error.php");
			} else {
				//Validate that the Boolean variable is true
				if (bool){
					//The parameters are loaded in the form
					if(params.length){
						$.each(params, function(n, v){
							if ($("[name="+n+"]").length){
								$("[name="+n+"]").val(v);
							}
						});
					}
				}
			}
		});
	}
}
//Función para cerrar session de la aplicación
var logout = function(){
	sessionStorage.removeItem('iduser');
	sessionStorage.removeItem('idprofile');
	sessionStorage.removeItem('userprofile');
	sessionStorage.removeItem('username');
	sessionStorage.removeItem('lastname');
	sessionStorage.removeItem('ncompany');
	sessionStorage.removeItem('company');
	sessionStorage.removeItem('companyweb');
	sessionStorage.removeItem('companylogo');
	sessionStorage.removeItem('headquarters');
	sessionStorage.removeItem('country');
	sessionStorage.removeItem('city');
	sessionStorage.removeItem('position');
	sessionStorage.removeItem('token');
	sessionStorage.clear();
	$.ajax({
		type: "POST", 
		url: "../controller/ctrlogout.php",
		data: {
			action: 'logout',
		},
		dataType: 'json'
	}).done(function(result){
		if (result.bool){
			location.href = "../../index.php";	
		} else {
			swal("Error!",result.msg,"error");
		}
		
	});	
};


