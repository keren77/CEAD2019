//alert("sdfdf");
var usuario;
var idusuario;

$("#recupcorreo").click(function(){
  usuario=$("input[name=txtusuario]").val();
  params={
      "usuario":usuario
  };
  $.ajax({
       url:"../acead/modelos/usuarios.modelo.php?caso=metcorreo",
       data: params,
       type:"post",
       success:function(){},
       error:function(){}
  });
});

$("#recupreguntas").click(function(){
     usuario=$("input[name=txtusuario]").val();
     if (usuario==''||usuario==null||usuario=='undefined'){
         alert("Debe ingresar un usuario valido!!");
     }else{
         var param1={
             "usuario":usuario
         }
         
         $.ajax({
            url:"../acead/modelos/usuarios.modelo.php?caso=verifuser",
            data: param1,
            type:"post",
            dataType: 'json',
            success:function(data){
                if(data == ''){
                    alert('Usuario no existe en el sistema!!');
                    $('input[name=txtusuario]').val('');
                }else{
                    $.each(data,function(i,item){
                        //alert(item[0]);
                        idusuario = item[0];
                    });
                    
                    var data1 = {
                        "uname": usuario
                    }
                    
                    localStorage.setItem("data1", JSON.stringify(data1));
                    
                    window.location.href="contestapreg";
                }
                 
            },
            error:function(){}            
         });
             
     }
     
});


$("#btnojito2").mousedown(function(){
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type","text");
    
});

$("#btnojito2").mouseup(function(){
    $("#nuevopass").removeAttr("type");
    $("#nuevopass").attr("type","password");
    
});


$("#btnojito3").mousedown(function(){
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type","text");
    
});

$("#btnojito3").mouseup(function(){
    $("#confirmapass").removeAttr("type");
    $("#confirmapass").attr("type","password");
    
});

//AJAX para cargar el SELECT de las preguntas disponibles para el usuario
$.ajax({
    type: "POST",
    url: "../acead/modelos/usuarios.modelo.php?caso=cargapreguntas&idu="+idusuario,
    success: function(response)
    {
        //alert(response);
        //$('#preguntas').html(response).fadeIn();
    }
});
