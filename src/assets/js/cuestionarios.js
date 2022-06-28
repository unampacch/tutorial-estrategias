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
