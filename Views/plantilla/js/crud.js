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

    $(document).on('click','.editarInfo',function(){
        const reg = JSON.parse($(this).attr('data-datos'))
        
        $('#idEdit').val(reg['id']);
        $('#nombre').val(reg['nombre']);
        $('#edad').val(reg['edad']);
        $('#cargo').val(reg['puesto']);
    })

    $('#editarP').on('submit',function(e){
        e.preventDefault();
        let base = $('#base').val();
        
        const datos = {
            id: $('#idEdit').val(),
            nombre: $('#nombre').val(),
            edad: $('#edad').val(),
            cargo: $('#cargo').val()
        }

        $.ajax({
            url: base + "personal/update",
            type: "POST",
            data: datos,
            success: function(response){
                $("#editarModal").modal('hide');
                swal.fire('Infromacion Actualizada', 'Correctamente','success');
                $(".personal tbody").html(response);
                $("#editarP")[0].reset();
            }
        });
    })

    $(document).on('click','.elimInfo',function(){
        let id = $(this).attr('data-id');
        let base = $('#base').val();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Estas seguro que quieres eliminar el registro?',
            text: "No seras capas de revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: base + 'personal/delete',
                    type: 'POST',
                    data: {id},
                    success: function(response){
                        // swalWithBootstrapButtons.fire(
                        //     'Deleted!',
                        //     'Your file has been deleted.',
                        //     'success'
                        //   )

                        // $(".personal tbody").html(response);
                        alert(response)
                    }
                })
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })
    })
})