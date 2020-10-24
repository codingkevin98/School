$(document).ready(function(){
    $("#agregarP").submit(function(e){
        e.preventDefault();
        let datos = {
            "nombre" : $("#name").val(),
            "edad" : $("#age").val(),
            "puesto" : $("#puesto").val(),
        }
        
        $.ajax({
            url: "personal/agregar",
            type: "POST",
            data : datos,
            success: function(response){
                $(".personal tbody").html(response);
                $("#agregarModal").modal('hide');
                $("#agregarP")[0].reset();
            },
            error: function(){
                console.error("Error al agregar");
            }
        })
    })
})