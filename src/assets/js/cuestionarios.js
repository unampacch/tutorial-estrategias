$("#areas").on("submit",function(event){
    event.preventDefault();
    data = JSON.stringify($(this).serialize());
    console.log(data);

    $.ajax({
        type: "POST",
        url: "http://localhost/bloques/el-cch/asignaturas-areas/js",
        data: data,
        headers: {
            "Content-Type": "application/json",
        },
        dataType: 'json',
        success: function(data) {
            //var obj = jQuery.parseJSON(data); if the dataType is not     specified as json uncomment this
          // do what ever you want with the server response
          console.log(data);
       },
      error: function(error) {
          alert('error handing here '+  JSON.stringify(error));
      }
    });
});