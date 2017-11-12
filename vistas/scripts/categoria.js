
var tabla;

//Funcion que se ejecuta al inicio

function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    })
}


function limpiar() {
    $("#idcategoria").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
}


function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);

    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();

    }
}



function cancelarform() {
    limpiar();
    mostrarform(false);
}



function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, //activamos el procesamiento del datatables
        "aServerSide": true, //paginacion y filtrado realizados por el servidor
        dom: 'Bfrtip', //definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax":
                {
                    url: '../ajax/categoria.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);
                    }
                },
        "bDestroy": true,
        "iDisplayLength": 5, //paginacion
        "order": [[0, "desc"]]
    }).DataTable();
}



function guardaryeditar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}



function mostrar(idcategoria){
    $.post("../ajax/categoria.php?op=mostrar",{idcategoria:idcategoria},function(data, status){
       data = JSON.parse(data);
       mostrarform(true);
       
       $("#nombre").val(data.nombre);
       $("#descripcion").val(data.descripcion);
       $("#idcategoria").val(data.idcategoria);
    })
}



function desactivar(idcategoria){
    bootbox.confirm("Deseja desactivar la Categoria?", function(result){
        if(result){
           $.post("../ajax/categoria.php?op=desactivar",{idcategoria:idcategoria},function(e){
              bootbox.alert(e);
              tabla.ajax.reload();
           });
        }
    })
}
function activar(idcategoria){
    bootbox.confirm("Deseja activar la Categoria?", function(result){
        if(result){
           $.post("../ajax/categoria.php?op=activar",{idcategoria:idcategoria},function(e){
              bootbox.alert(e);
              tabla.ajax.reload();
           });
        }
    })
}



init();
