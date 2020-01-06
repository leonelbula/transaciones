$(".tablacuentausuario").on("click", ".btnEliminarCuenta", function(){

  var idcuenta = $(this).attr("idcuenta");

  swal({
        title: '¿Está seguro de borrar registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Registro!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "eliminarcuenta&id="+idcuenta;
        }

  })

})

$(".tablacuentausuario").on("click", ".btnEditarCuenta", function(){

  var idcuenta = $(this).attr("idcuenta");

  var datos = new FormData();
	datos.append("idCuenta", idcuenta);

	$.ajax({

		url:"../ajax/cuentasAjax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarCuenta .id").val(respuesta["id"]);
			
			$("#modalEditarCuenta .num_cuenta").val(respuesta["num_cuenta"]);
			$("#modalEditarCuenta .titular").val(respuesta["titular"]);
			$("#modalEditarCuenta .identificacion").val(respuesta["cedula"]);
			
			if(respuesta["id_banco"] != 0){
			
				var datosCuenta = new FormData();
				datosCuenta.append("idbanco", respuesta["id_banco"]);
				

				$.ajax({

						url:"../ajax/bancosAjax.php",
						method: "POST",
						data: datosCuenta,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta2){
							
							$("#modalEditarCuenta .seleccionarBancos").val(respuesta2["id"]);
							$("#modalEditarCuenta .optionEditarCuenta").html(respuesta2["nombre"]);
						}

					})

			}else{

				$("#modalEditarCuenta .seleccionarBancos").html("SIN banco");

			}
			
			if(respuesta["tipo_cuenta"] != 0){
			
				
				$("#modalEditarCuenta .seleccionarTipoCuenta").val(respuesta["tipo_cuenta"]);
				$("#modalEditarCuenta .optionEditarTipoCuenta").html(respuesta["tipo_cuenta"]);
					

			}else{

				$("#modalEditarCuenta .seleccionarBancos").html("SIN banco");

			}


						
		}
	})

})
