<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style7.css" media="screen"/>
    <title>Alterar Questões</title>
</head>
<body>
<!-- FORMULÁRIO PARA REQUISIÇÃO DE DADOS -->
<!-- * ACTION: envia para a págia na qual fará a consulta no banco de dados -->
<!-- * METHOD: método pelo qual enviaremos os dadaos, nesse caso é o POST -->
<form action="Controller/salvaTeste.php" method="POST" enctype="multipart/form-data">
    <div class="principal">
        <div class="campo">
            <label>Nome</label>
            <input type= "text" name="NomeUsuario" class="form-control" rows="3"/>
            <!-- Colocar atributo NAME para pegarmos através do $_POST -->
        </div>

        <div class="campo">
            <label>Tipo Usuário</label>
            <input type= "text" name="TipoUsuario" class="form-control" rows="3"/>
            <!-- Colocar atributo NAME para pegarmos através do $_POST -->
        </div>

        <div class="campo">
            <label>E-mail</label>
            <input type= "text" name="Email" class="form-control" rows="3"/>
            <!-- Colocar atributo NAME para pegarmos através do $_POST -->
        </div>

        <div class="campo">
            <label>Senha</label>
            <input type= "text" name="Senha" class="form-control" rows="3"/>
            <!-- Colocar atributo NAME para pegarmos através do $_POST -->
        </div>

        <input type="checkbox" name="FlgAtivo" class="" rows="3" style="margin-top: 25px"/>
        <!-- Colocar atributo NAME para pegarmos através do $_POST -->

        <div class="campo">
            <button type="submit" class="botao_crud" name="insertdata" value="inserir">Inserir</button>
        </div>
    </div>
</form> 

</body>
</html> 