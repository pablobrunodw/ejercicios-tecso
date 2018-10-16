$(document).ready(function(){                
    $("#sd_cursos").addClass("active");

    $(".nuevoAlumno").on("click",function(){
      $('input').val('');
      $('select').val('DNI');
    });
  });


  $(document).ready(function() {
    $('.table').DataTable({
      "dom": 'Bfrtip',
      "buttons": ['copy', 'csv', 'excel', 'print'],
      "iDisplayLength":10,
      "order": [],
      "language": {
          "sProcessing":    "Procesando...",
          "sLengthMenu":    "Mostrar _MENU_ registros",
          "sZeroRecords":   "No se encontraron resultados",
          "sEmptyTable":    "Ningún dato disponible en esta tabla",
          "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":   "",
          "sSearch":        "Buscar:",
          "sUrl":           "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "sCopyButton": "Copiar",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":    "Último",
              "sNext":    "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }                                
    });
  });

  $(document).ready(function() {
    $(".btnInscCurso").on('click', function() {
        var idalumno = $(this).attr('data-idalumno'),
            idcurso = $(this).attr('data-idcurso')
            self = this;

        $.ajax({
            type: "POST",
            url: "/res/php/admin_actions/action_inscribir_alumno_curso.php",
            data: {
                idalumno : idalumno,
                idcurso: idcurso
            },
            success: function(data) {
                // console.log(data);
                window.location.reload();
            },
            error: function() {
                alert("Se ha producido un error");
            }
        });
    });
  });