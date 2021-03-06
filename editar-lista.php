<?php
include './header.php';
require_once './util/Conexao.class.php';
require_once './util/funcoes.php';
session_start();

if (!isLogged())
    header("Location: login.php");
else {
    $conexao = new Conexao();
    $id = $_GET['id'];
    $colunas = array("lista.*");
    $data = $conexao->select("lista", $colunas, "WHERE LIS_CODIGO = $id")[0];
    ?>
    <div class="container">
        <h1>Editar Lista</h1>
        <form method="post" action="alterar-lista.php?id=<?php echo $data["LIS_CODIGO"] ?>"
              id="formLista">
            <div class="form-group">
                <label>Nome da Lista</label>
                <input type="text" class="form-control" name="nomeLista" 
                       value="<?php echo $data['LIS_NOME']; ?>"/>
            </div>
            <input type="submit" class="btn btn-default" value="Alterar"/>
        </form>
    </div>
    <?php
}

