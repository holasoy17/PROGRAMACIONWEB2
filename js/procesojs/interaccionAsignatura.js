
function probando(){
    
    
     if( $('#ida').val()==""){
        if ($('#codigo').val() && $('#credito').val() && $('#nombre').val()!="") {
         ingresarAsignatura2();
        }else{alert("Porfavor llenar los campos WEY!!");}
       }else{
     modificarAsignatura();
       }
    
   
}




function ingresarAsignatura2(){


    var data= new   FormData();
    data.append('code',$('#codigo').val());
    data.append('nom',$('#nombre').val());
    data.append('cre',$('#credito').val());
    data.append('idcarrera',$('#select1').val());

         $.ajax({
                    url: "procesos/ingresarAsignatura.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                   success:function(requestData,resp){
                    cargarAsignatura();
                    console.log('resp');
                     $('#formDatos')[0].reset()
                    }
                  

                 });
}
 
function crearCarrera(){
  if($('#des').val()==""){
    alert("llenar campo")
  }else{
    var data=new FormData();
  data.append('d',$('#des').val());

  $.ajax({
    url:"procesos/ingresarCarrera.php",
    type:"POST",
    data: data,
    contentType:false,
    cache:false,
    processData:false,
  

      success:function(requestData){
         cargarCombo();
         $('#des').val(" ");
      }
                  

  })
  }
  

}


function cargarCombo() {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                //data.append('opc',  "4");

                $.ajax({
                    url: "procesos/mostrarCarrera.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        llenarcombo(data);
                    }
                 });

}
function obtenerCarrera() {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                //data.append('opc',  "4");

                $.ajax({
                    url: "procesos/mostrarCarrera.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        actualizartablaCarrera(data);
                    }
                 });

}


function obtenerConsulta() {
    //alert("En esta funcion se carga la tabla");
               
                var data = new FormData();
                 
                 data.append('idas',$('#buscar').val());
                $.ajax({
                    url: "procesos/busquedalike.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        actualizartabla(data);
                    }
                 });

}

function cargarAsignatura() {
	//alert("En esta funcion se carga la tabla");

	 			    var data= new   FormData();

                $.ajax({
                    url: "procesos/mostrarAsignatura.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                        actualizartabla(data);
                    }
                 });

}




function eliminarAsignatura(ida){
    var data= new FormData();
    //data.append('opc', "3");
    data.append('ida', ida);

    $.ajax({
        url:"procesos/eliminarAsignatura.php",
        type:"POST",
        data: data,
        contentType:false,
        cache:false,
        processData:false,
        success:function(requestData){
            cargarAsignatura();
        }
    });
}

function EliminarCarrera(idca){
  
   var data= new FormData();
    //data.append('opc', "3");
    data.append('idca', idca);

    $.ajax({
        url:"procesos/eliminarCarrera.php",
        type:"POST",
        data: data,
        contentType:false,
        cache:false,
        processData:false,
        success:function(requestData){
            obtenerCarrera();
            cargarCombo();
        }
    });
}


function actualizartabla(data){
  $("#tablaDatos").html("");
  $.each(data,function(i,item){
    $("#tablaDatos").append("<tr><td>"+item.codi+"\
            </td><td>"+ item.nom +"</td>\
            <td>"+ item.cre +"</td> \
            <td>"+ item.carrera +"</td>\
            <td><button type='button' class='btn btn-info' onClick='preparaActualizar("+item.ida+")'><i class='fa fa-check'></i></button></td>\
            <td><button type='button' class='btn btn-danger' onClick='eliminarAsignatura("+item.ida+")'><i class='fa fa-close'></i></button></td></tr>");
                 
        
  });
}

function actualizartablaCarrera(data){
  $("#tablaDatos2").html("");
  $.each(data,function(i,item){
    $("#tablaDatos2").append("<tr><td>"+item.idca+"\
            </td><td>"+ item.des +"</td>\
            <td><button type='button' class='btn btn-info' onClick='preparaActualizarCarrera("+item.idca+")'><i class='fa fa-check'></i></button></td>\
            <td><button type='button' class='btn btn-danger' onClick='EliminarCarrera("+item.idca+")'><i class='fa fa-close'></i></button></td></tr>");
                 
        
  });
}

function llenarcombo(data){
  $("#select1").html("");
  $.each(data,function(i,item){
    $("#select1").append("<option value="+item.idca+">"+item.des+"</option>"
            ); 
  });
}

function modificarAsignatura(){


    var data= new   FormData();
    data.append('code',$('#codigo').val());
    data.append('nom',$('#nombre').val());
    data.append('cre',$('#credito').val());
    data.append('idcarrera',$('#select1').val());
    data.append('id',$('#ida').val());

         $.ajax({
                    url: "procesos/actualizarAsignatura.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                   success:function(requestData,resp){
                    cargarAsignatura();
                    console.log('resp')
                     $('#formDatos')[0].reset()
                    }
                  

                 });
}

function validarcarrera(){
  if($('#idca').val()==""){crearCarrera();}else{modificarCarrera();}
}
function modificarCarrera(){


    var data= new   FormData();
    data.append('id',$('#idca').val());
    data.append('des',$('#des').val());
  
         $.ajax({
                    url: "procesos/actualizarcarrera.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                   success:function(requestData,resp){
                    obtenerCarrera();
                    console.log('resp')
                     
                    }
                  

                 });
}

function preparaActualizar(id){
 var data= new   FormData();
    data.append('idas',id);
       $.ajax({
                    url: "procesos/busquedadValor.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                  success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                       // alert(data);
                        llenarForm(data);
                    }
                  

                 });


}


function preparaActualizarCarrera(idca){
 var data= new   FormData();
    data.append('idca',idca);
       $.ajax({
                    url: "procesos/obtenerCarreraid.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                  success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                       // alert(data);
                        llenarFormCarrera(data);
                    }
                  

                 });


}



function llenarForm(data){
     $.each(data,function(i,item){
     $('#ida').val(item.ida);
     $('#nombre').val(item.nom);
     $('#codigo').val(item.codi);
     $('#credito').val(item.cre);
     $('#select1').val(item.idca);
    
 }); 
  
 
}

function llenarFormCarrera(data){
     $.each(data,function(i,item){
     $('#idca').val(item.idca);
     $('#des').val(item.des);
    
    
 }); 
  
 
}


 
