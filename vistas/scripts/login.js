$("#loginform").on('submit', function(e){
    e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();
    
    
    
    $.post("../ajax/usuario.php?op=verificar", {"logina":logina, "clavea":clavea}, function(data){
        if(data!="null"){ //estava entrando em qualquer usuario pq o null estava sem aspas
            bemVindo();
            $(location).attr("href", "escritorio.php");
            
        } else {
            bootbox.alert("Usuario y/o Password incorrectos");
        }
    })
    
    
})

function bemVindo(){
   // $("#botao").on("click", function () {
    $.toast({
            heading: 'Seja bem vindo(a)',
            text: 'Você está logado(a) no sistema.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });
    //});
}