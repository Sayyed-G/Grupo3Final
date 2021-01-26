
function guardarControl() {
   var dato = $('#formControl').serialize();
    var x = $('input[name="resultado"]:checked').val();
   
   $.ajax({
   	method: 'POST',
   	url: 'ajax.php',
   	data: dato+'&resultado='+x,
   })
   .done(function(obj){
   	 $('#listarControl').html(obj);
   })
}


function buscarPersona() {
	
	urlx = 'https://dni.optimizeperu.com/api/persons/'+$('#dni').val()+'?format=json';
      $.ajax({
          method: "GET",
          url: urlx
      })
      .done(function( json ) {
            $("#nombres").val(json.name);
            $('#apellidos').val(json.first_name+' '+json.last_name);
//GHADIR----------------------------------------------------------------------------------------
            $("#nombre_paciente").val(json.name);
            $('#apellido_paciente').val(json.first_name + ' ' + json.last_name);
            $("#dni_paciente").val($('#dni').val());
//----------------------------------------------------------------------------------------------
            
            mostrarLista($('#dni').val());
           
            var txt = aleatorio(4);
            $('#codigo').val(txt+$('#dni').val());
           
      });  	
}

function aleatorio(length) {
   var result           = '';
   var characters       = '0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

function mostrarLista(dni) {
   var dato ={dni:dni,'accion':'MOSTRAR_LISTA'}
   $.ajax({
      method: 'POST',
      url: 'ajax.php',
      data: dato,
   })
   .done(function(obj){
       console.log(obj);
       $('#listarControl').html(obj);
       
   })
}

//GHADIR------------------------------------------------------------------------------------------------
function buscarHistorialClinico() {

    var data = $('#formBuscarHistorialClinico').serializeArray();

    $.ajax({
        method: 'POST',
        url: 'ajax.php',
        data,
        dataType: 'json'
    })
        .done(function(obj) {

            console.log(obj);
            $('.alert').remove();
            $('.datosPaciente').css('display','none');
            $('.contenidoHistorialClinico').css('display','none');
            $('.contenidoIndividualHC').remove();
            if(obj.paciente.documento){

                $('.alert').remove();

                $('.datosPaciente').css('display','block');
                $('.dniPacienteMostrar').html(obj.paciente.documento);
                $('.nombrePacienteMostrar').html(obj.paciente.nombres);
                $('.apellidosPacienteMostrar').html(obj.paciente.apellidos);

                if(obj.historialClinico.length != 0){

                    $('.contenidoHistorialClinico').css('display','block');

                    for(let i=0; i<obj.historialClinico.length; i++){

                        let resultado = obj.historialClinico[i].resultado == 'on' ? 'POSITIVO' : 'NEGATIVO';
                        console.log(resultado);

                        $('.contenidoHistorialClinico').append(`<div class="contenidoIndividualHC" style="padding:50px;margin-bottom:15px; background-color:#F6F8FF;">
                                                                    <table class="table table-bordered table-hover table-striped" style="width:430px;">
                                                                        <tr>
                                                                            <td>CODIGO:</td>
                                                                            <td>${obj.historialClinico[i].codigo}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>DOC PRUEBA:</td>
                                                                            <td>${obj.historialClinico[i].docprueba}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>DOCUMENTO:</td>
                                                                            <td>${obj.historialClinico[i].documento}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>ESTADIA PERSONA:</td>
                                                                            <td>${obj.historialClinico[i].estadiapersona}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>MEDIO DE TRANSPORTE:</td>
                                                                            <td>${obj.historialClinico[i].mtransporte}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>TIPO PRUEBA</td>
                                                                            <td>${obj.historialClinico[i].tipoprueba}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>RESULTADO</td>
                                                                            <td>${resultado}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>FECHA PRUEBA</td>
                                                                            <td>${obj.historialClinico[i].fechaprueba}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>FECHA REGISTRO</td>
                                                                            <td>${obj.historialClinico[i].fechareg}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>`);

                    }

                }else{
                    $('#contenidoHistorialClinico').append(`<div class="alert alert-danger" role="alert" style="padding: 20px;">
                                                            No hay datos
                                                          </div>`);
                }

            }else{
                $('.wrapperHistorialClinico').append(`<div class="alert alert-danger" role="alert" style="padding: 20px;">
                                                       Paciente no registrado
                                                    </div>`);
            }

        })
}
//-------------------------------------------------------------------------------------------------------