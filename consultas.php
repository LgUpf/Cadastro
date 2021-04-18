<?php
require_once __DIR__ . "/config.php";
require_once __DIR__.'/login/auth.php';

if (!Auth::status())
{
  header("Location: login/index.php");
  exit();
}

?>
<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>
<div class="row container">
    <div class="col s12">
        <div class="row">
            <div class="col s6">
                <h5>Consultas</h5>
            </div>
            <div class="col s6 right-align">
                <a href="csv/relatorio_cliente.php" target="_blanck" class="btn" style="display: flex; width: 140px; margin-top: 10px; float: right;">
                    <i class="material-icons" style="padding-right: 10px; margin-top: 0px;">cloud_download</i>
                    <span>Download</span>
                </a>
            </div>
        </div>
        <hr>
        
        <table class="striped" >
            <thead>
                <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once './banco_de_dados/read.php'; 
                ?>
               
            </tbody>
        </table>
    </div>
</div>     

<?php include_once './includes/footer.inc.php' ?>
