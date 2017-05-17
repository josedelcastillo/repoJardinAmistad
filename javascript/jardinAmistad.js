function gaTracker(id){
  $.getScript('//www.google-analytics.com/analytics.js'); // jQuery shortcut
  window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
  ga('create', id, 'auto');
  ga('send', 'pageview');   
} 
function gaTrack(path, title) {
  ga('create', 'UA-78560272-2', 'auto');
  ga('set', { page: path, title: title });
  ga('send', 'pageview');
}
function cargarTablaMarcacionesHoy(){
	var local=$("#local").val();
	if (local==undefined)
		local="";
	 $.ajax({
		type: "POST",
		async:false, 
		datatype: 'json',
		contentType: "application/json; charset=utf -8",
		url: "listaMarcaciones.php?local="+local, 
		success: function(data) {
			$("#tablaProfes").html(data);
				
			},
	  	error: function (error) {
	  				  alert("Ocurrio un error, marcar manualmente");
	                  return -2;
	              }
		});
}
function cargarTablaMarcacionesAyer(){
	var local=$("#local").val();
	var currentdate = new Date(); 
	var fecha =
				 ("0" + (currentdate.getDate()-1) ).slice(-2) + "-"   
				 + ("0" + (currentdate.getMonth()+1) ).slice(-2) 
				+ "-"  + (currentdate.getFullYear()); 
	if (local==undefined)
		local="";
	 $.ajax({
		type: "POST",
		async:false, 
		datatype: 'json',
		contentType: "application/json; charset=utf -8",
		url: "listaMarcacionesFecha.php?local="+local+"&fecha="+fecha, 
		success: function(data) {
			$("#tablaProfes").html(data);
				
			},
	  	error: function (error) {
	  				  alert("Ocurrio un error, marcar manualmente");
	                  return -2;
	              }
		});
}
function marcar(){
	var documentoIdentidad=$("#documentoIdentidad").val();
	var local=$("#local").val();
	$('#lblMsg').html("");
	
	$('#lblError').html("");
	
	if(documentoIdentidad=="")
	{
		alert("Debe Ingresar un número de documento");
		return -1;
	}
	else
	{	
	  data="numeroDocumento="+documentoIdentidad+"&local="+local;
	 $.ajax({
		type: "POST",
		async:false, 
		datatype: 'json',
		contentType: "application/json; charset=utf -8",
		url: "marcar.php?"+data, 
		success: function(data) {
			var rpta=JSON.parse(data);

			if(rpta.codigo!=0)
			{
				$('#lblError').html(rpta.mensaje);

			}
			else{
				var currentdate = new Date(); 
				var datetime =
				 ("0" + currentdate.getHours() ).slice(-2) + ":"   
				 + ("0" + currentdate.getMinutes() ).slice(-2) 
				+ ":"  + ("0" + currentdate.getSeconds() ).slice(-2); 
				$('#lblMsg').html("Marca Ingresada: "+datetime);
				cargarTablaMarcacionesHoy();
				$("#documentoIdentidad").val("");
			}
				
			},
	  	error: function (error) {
	  				  alert("Ocurrio un error, marcar manualmente");
	                  return -2;
	              }
		});

	}
}
