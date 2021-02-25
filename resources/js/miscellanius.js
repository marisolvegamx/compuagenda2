/**
 * 
 */
function validar(form, paso){

	switch(paso){
	case 1:
		if($("#nameusu").val()=="")
		{
			$("#nameusu").focus();
			alert("Proporciona un nombre para crear tu cuenta");
			return false;
		}
		if($("#emailusu").val()=="")
		{
			$("#emailusu").focus();
			alert("Proporciona un correo electrónico para crear tu cuenta");
			return false;
		}

		break;
		
	case 2:
		if($("#name").val()=="")
		{
			$("#name").focus();
			alert("Proporciona un nombre para crear tu cuenta");
			return false;
		}
		if($("#description").val()=="")
		{
			$("#description").focus();
			alert("Proporciona un correo electrónico para crear tu cuenta");
			return false;
		}
		if($("#address").val()=="")
		{
			$("#address").focus();
			alert("Proporciona un nombre para crear tu cuenta");
			return false;
		}
		return selectVacio("#state","el estado");
		
		break;
	
	case 3:
		return selectVacio("#category","el estado");
		var ban=0;
		var tot_etiq= $("#subcategorias").length;
		for(i=1;i=tot_etiq;i++){
			if($("subcategory_"+i).is(":checked"))
				//con uno encendido
				ban=1;
		}
		if(ban==0)
			{
		    alert("Selecciona al menos una etiqueta");
			return false;}
		
		
		
		break;
	}
	
	
	
	
return true;	

}
function selectVacio(campo, nombre)
{
	
	 if($(campo).val()==''){
		alert("Por favor, seleccione "+nombre);
		$(campo).focus();
		
		return false;
		}
		return true;
}

function cargaContenidoCombo(param, idchild,url,tipo)
{
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	if(param>0){
	var param2={"parentval":param,"tipo":tipo};

	$.ajax({
		data:param2,
	url:url,
	type:"post",
	beforeSend:function(){
		$("#"+idchild).html("cargando...");
	},
	success:function(response){
		$("#"+idchild).append("<option value=''>- Todas -</option>");
		$("#"+idchild).append(response);
	}
	});
	}else
	{	
		$("#"+idchild).html("cargando...");
		$("#"+idchild).append("<option value='0'>- Todas -</option>");
	}
}
