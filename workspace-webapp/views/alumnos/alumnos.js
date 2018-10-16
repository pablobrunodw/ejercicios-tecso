$(document).ready(function(){                
    $("#sd_alumnos").addClass("active");

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
    $(".btnReg").on('click', function() {
        var nombre = $('.nombre').val().trim(),
            apellido = $('.apellido').val().trim(),
            tipodoc = $('.slt_tdoc').val(),
            nroDoc = $('.nroDoc').val(),
            fechaNac = $('.fechaNac').val().trim(),
            nroLegajo = $('.nroLegajo').val().trim(),
            self = this;
            console.log(nombre,apellido,tipodoc,nroDoc,fechaNac,nroLegajo);

        $.ajax({
            type: "POST",
            url: "/res/php/admin_actions/action_nuevo_alumno.php",
            data: {
                nombre : nombre,
                apellido : apellido,
                tipodoc : tipodoc,
                nroDoc : nroDoc,
                fechaNac : fechaNac,
                nroLegajo : nroLegajo
            },
            success: function(data) {
                // console.log(data);
                window.location.href = "/index.php?view=alumno_detalle&idAlumno="+data;
            },
            error: function() {
                alert("Se ha producido un error");
            }
        });
    });
});

  $(document).ready(function() {
    $(".btnGuardarAlumno").on('click', function() {
        var idpersona = $('.idpersona').val(),
            idalumno = $('.idalumno').val(),
            nombre = $('.nombre').val().trim(),
            apellido = $('.apellido').val().trim(),
            tipodoc = $('.slt_tdoc').val(),
            nroDoc = $('.nroDoc').val(),
            fechaNac = $('.fechaNac').val().trim(),
            nroLegajo = $('.nroLegajo').val().trim(),
            self = this;

        $.ajax({
            type: "POST",
            url: "/res/php/admin_actions/action_guardar_alumno.php",
            data: {
                idpersona : idpersona,
                idalumno : idalumno,
                nombre : nombre,
                apellido : apellido,
                tipodoc : tipodoc,
                nroDoc : nroDoc,
                fechaNac : fechaNac,
                nroLegajo : nroLegajo
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

  $(document).ready(function() {
    $(".btnInscCarrera").on('click', function() {
        var idalumno = $('.idalumnocarrera').val(),
            idcarrera = $('.slt_carrera').val(),
            fechainscripcion = $('.fechainscripcion').val(),
            self = this;
            console.log(idalumno,idcarrera,fechainscripcion);

        $.ajax({
            type: "POST",
            url: "/res/php/admin_actions/action_inscribir_alumno.php",
            data: {
                idalumno : idalumno,
                idcarrera: idcarrera,
                fechainscripcion:fechainscripcion
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

  $(document).ready(function() {
    $(".historial").on('click', function() {
      var idcarrera = $(this).attr('data-idcarrera');
        $('#Carrera_'+idcarrera).modal('show');
    });
});