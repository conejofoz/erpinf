
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



function mostrar(idcategoria) {
    $.post("../ajax/categoria.php?op=mostrar", {idcategoria: idcategoria}, function (data, status) {
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idcategoria").val(data.idcategoria);
    })
}



/*function desactivar(idcategoria){
 bootbox.confirm("Deseja desactivar la Categoria?", function(result){
 if(result){
 $.post("../ajax/categoria.php?op=desactivar",{idcategoria:idcategoria},function(e){
 bootbox.alert(e);
 tabla.ajax.reload();
 });
 }
 })
 }*/



function desactivar(idcategoria) {
    swal({
        title: "Tem certeza que quer desativar a categoria?",
        text: "Essa operação não poderá ser revertida!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        cancelButtonColor: "#3cb371",
        cancelButtonText: "Não",
        //closeOnConfirm: false,   
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.post("../ajax/categoria.php?op=desactivar", {idcategoria: idcategoria}, function (e) {
                if (e == 'Categoria Desactivada') {
                    //swal("Here's a message!");
                    swal({title: "Desativado!",text: "Registro desativado",closeOnConfirm: false});
                    tabla.ajax.reload();
                } else {
                    swal("Erro", "Houve um erro :)", "error");
                }
            });
        } else {
            swal("Operação cancelada", "A operação foi cancelada :)", "error");
        }
    });
}



function activar(idcategoria) {
    swal({
        title: "Tem certeza que quer ativar a categoria?",
        text: "Essa operação não poderá ser revertida!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim",
        cancelButtonColor: "#3cb371",
        cancelButtonText: "Não",
        //closeOnConfirm: false,   
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.post("../ajax/categoria.php?op=activar", {idcategoria: idcategoria}, function (e) {
                if (e == 'Categoria Activada') {
                    //swal("Here's a message!");
                    swal({title: "Ativado!",text: "Registro ativado",closeOnConfirm: false});
                    tabla.ajax.reload();
                } else {
                    swal("Erro", "Houve um erro :)", "error");
                }
            });
        } else {
            swal("Operação cancelada", "A operação foi cancelada :)", "error");
        }
    });
}







/*function activar(idcategoria) {
    bootbox.confirm("Deseja activar la Categoria?", function (result) {
        if (result) {
            $.post("../ajax/categoria.php?op=activar", {idcategoria: idcategoria}, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}*/



$(".tst1").on("click", function () {
        $.toast({
            heading: 'Welcome to my Elite admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3000,
            stack: 6
        });

    });
    
    $(".tst2").on("click", function () {
        $.toast({
            heading: 'Welcome to my Elite admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        });

    });
    $(".tst3").on("click", function () {
        $.toast({
            heading: 'Welcome to my Elite admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });

    });

    $(".tst4").on("click", function () {
        $.toast({
            heading: 'Welcome to my Elite admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 3500

        });

    });



init();
