$("#areas").on("submit",function(event){
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "/bloques/el-cch/asignaturas-areas/js",
        data: $(this).serialize(),
        success: function(data) {
            if(data.respuesta == "exito"){
                $("#areas").addClass('d-none');
                $('#retroalimentacion').removeClass('d-none');
            }
            console.log(data);
       },
      error: function(error) {
          alert('error handing here '+  JSON.stringify(error));
      }
    });
});


$("#b2_01").on("submit",function(event){
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "/bloques/aprender/que-es-aprender/js",
        data: $(this).serialize(),
        success: function(data) {
            if(data.respuesta == "exito"){
                $('#b2_01').addClass('d-none');
                $('#retroalimentacion').removeClass('d-none');
            }
            console.log(data);
       },
      error: function(error) {
          alert('error handing here '+  JSON.stringify(error));
      }
    });
});

$("#b2_04").on("submit",function(event){
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "/bloques/aprender/estrategias-de-aprendizaje/js",
        data: $(this).serialize(),
        success: function(data) {
            if(data.respuesta == "exito"){
                $('#b2_04').addClass('d-none');
                $('#retroalimentacion').removeClass('d-none');
            }
            console.log(data);
       },
      error: function(error) {
          alert('error handing here '+  JSON.stringify(error));
      }
    });
});