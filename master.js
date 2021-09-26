$("#iFiltro").on("click", function(){

    var ano         = document.querySelector("#iAnoFiltro").value;
    var banca       = document.querySelector("#iBancaFiltro").value;
    var respondidas = document.querySelector("#iRespondidasFiltro").checked;
    var materia     = document.querySelector("#iMateria").value;
    var assunto     = document.querySelector("#iAssunto").value;

    $.ajax({
        url: "Controller/ajax/load-lista-questoes.php?ano="+ano+"&banca="+banca+"&resp="+respondidas+"&mat="+materia+"&as="+assunto,
        success: function(result){
            $(".questoes-container-content").html(result);
            
        },
        error: function(result){
            $(".questoes-container-content").html(result);
            
        }            
    });   

})