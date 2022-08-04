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

$("#b2_06_1").on("submit",function(event){
    event.preventDefault();
    $datos = $(this).serialize();

    let nradios = ($("[type=radio]", this ).length) / 4;
    let nradiosCheck = $("[type=radio]:checked", this).length;
    let clasifica = $("#b2_06_01_cla", this).val();

    console.log(clasifica);
    if(nradios == nradiosCheck && clasifica != ""){

        $.ajax({
            type: "POST",
            url: "/bloques/aprender/busqueda-de-informacion/js",
            data: $datos,
            success: function(data) {
                if(data.respuesta == "exito"){
                    let datos_respuesta = retro_b2_b6_1(data);
                    console.log(datos_respuesta);
                    $('#b2_06_1').addClass('d-none');
                    $('#retroalimentacion, .retroalimentacion_b2_06_1').removeClass('d-none');

                    if(datos_respuesta.retro == 1){
                        $("#retro_b2_06_1_fail").removeClass("d-block");
                        $("#retro_b2_06_1_success").removeClass("d-none").addClass("d-block");
                    }else{
                        $("#retro_b2_06_1_fail").addClass("d-block");
                    }

                }
                console.log(data);
        },
        error: function(error) {
            alert('error handing here '+  JSON.stringify(error));
        }
        });
    }else{
        $('#HoneyError').modal('show');
        console.log("Falta seleccionar mas radios");
    }
});

$("#b2_06_2").on("submit",function(event){
    event.preventDefault();

    let nradios = ($("[type=radio]", this ).length) / 4;
    let nradiosCheck = $("[type=radio]:checked", this).length;
    let titulo = $("#b2_06_02_titulo", this).val();
    let clasi = $("#b2_06_02_clasi", this).val();

    if(nradios == nradiosCheck && titulo != "" && clasi != ""){
        $.ajax({
            type: "POST",
            url: "/bloques/aprender/busqueda-de-informacion/js",
            data: $(this).serialize(),
            success: function(data) {
                if(data.respuesta == "exito"){
                    $('#b2_06_2').addClass('d-none');
                    $('#retroalimentacion').removeClass('d-none').addClass('d-block');
                }
                console.log(data);
        },
        error: function(error) {
            alert('error handing here '+  JSON.stringify(error));
        }
        });
    }else{
        $('#HoneyError').modal('show');
        console.log("Falta seleccionar mas radios");
    }
});

$("#b2_06_3").on("submit",function(event){
    event.preventDefault();

    var nradios = ($("[type=radio]", this ).length) / 3;
    var nradiosCheck = $("[type=radio]:checked", this).length;

    if(nradios == nradiosCheck){
    
        $.ajax({
            type: "POST",
            url: "/bloques/aprender/busqueda-de-informacion/js",
            data: $(this).serialize(),
            success: function(data) {
                if(data.respuesta == "exito"){
                    $('#b2_06_3').addClass('d-none');
                    $('#retroalimentacion, .retroalimentacion.b2_06_3').removeClass('d-none').addClass('d-block');
                }
                console.log(data);
            },
            error: function(error) {
                alert('error handing here '+  JSON.stringify(error));
            }
        });
    }else{
        $('#HoneyError').modal('show');
        console.log("Falta seleccionar mas radios");
    }
});


$("#b2_10").on("submit",function(event){
    event.preventDefault();

    var nradios = ($("[type=radio]", this ).length) / 2;
    var nradiosCheck = $("[type=radio]:checked", this).length;

    if(nradios == nradiosCheck){
    
        $.ajax({
            type: "POST",
            url: "/bloques/aprender/habitos-de-estudio/js",
            data: $(this).serialize(),
            success: function(data) {
                if(data.respuesta == "exito"){
                    $('.col-preguntas').addClass('d-none');
                    $('#retroalimentacion').removeClass('d-none').addClass('d-block');
                }
                console.log(data);
            },
            error: function(error) {
                alert('error handing here '+  JSON.stringify(error));
            }
        });
    }else{
        $('#HoneyError').modal('show');
        console.log("Falta seleccionar mas radios");
    }
});


function retro_b2_b6_1(data){
    
    let rp = 0;
    let plantel = '';
    let titulo = '';

    switch (data.p3) {
        case 'PQ7297.P21B37':
            if (data.p2 == 1){
                rp = 1;
            }
            break;
        case 'PQ7297.F85A813':
            if (data.p2 == 2){
                rp = 1;
            }
            break;
        case 'PQ8180.17A73A55':
            if (data.p2 == 3){
                rp = 1;
            }
            break;
    }

    switch (data.p1) {
        case "31":
            plantel = 'Azcapotzalco';
            break;
        case "32":
            plantel = 'Naucalpan';
            break;
        case "33":
            plantel = 'Vallejo';
            break;
        case "34":
            plantel = 'Oriente ';
            break;
        case "35":
            plantel = 'Sur';
            break;
    }

    switch (data.p2) {
        case "1":
            titulo = 'Las Batallas en el Desierto ';
            break;
        case "2":
            titulo = 'Aura';
            break;
        case "3":
            titulo = 'El Amor en los Tiempos del Cólera ';
            break;
    }

    let respuestas = {'p1' : plantel, 'p2' : titulo, 'p3' : data.p3, 'retro' : rp };

    return respuestas;
}