<?php
require_once __DIR__ . "/config.php";
require_once __DIR__.'/login/auth.php';

if (!Auth::status())
{
  header("Location: login/index.php");
}

?>

<?php include_once './includes/header.inc.php' ?>

<?php include_once './includes/menu.inc.php' ?>

     <div class="row container">
                <p>&nbsp;</p>
                <form action="banco_de_dados/create.php" method="post" class="col s12">
                    <fieldset class="formulario" style="padding: 15px">  
                    <legend>
                        <img src="imagens/avatar.png" alt="[imagem]" width="70" />
                    </legend>
                    <h5 class="light center">Cadastro de Clientes</h5>
                    
                    <?php
                        if(isset($_SESSION['msg'])):
                          echo $_SESSION['msg'];
                          unset($_SESSION['msg']);
                          endif;
                    ?>
                    
                    
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                        <label for="nome">Nome do Cliente</label>
                        
                        
                    </div>
                     <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" id="email" maxlength="50" required>
                        <label for="email">Email do Cliente</label>    
                    </div>
                    
                     <div class="input-field col s12">
                        <i class="material-icons prefix">phone</i>
                        <input type="tel" name="telefone" id="telefone" maxlength="15" required>
                        <label for="telefone">Telefone do Cliente</label>
                     </div>

                     <div class="input-field col s12">
                        <i class="material-icons prefix">home</i>
                        <input type="text" name="endereco" id="endereco" maxlength="40" required autofocus>
                        <label for="endereco">Endereço do Cliente</label>                    
                   </div> 


                   <div class="input-field col s12">
                        <i class="material-icons prefix">location_on</i>
                        <input type="text" name="bairro" id="bairro" maxlength="40" required autofocus>
                        <label for="bairro">Bairro do Cliente</label>                    
                   </div> 

                   <div class="input-field col s12">
                        <i class="material-icons prefix">location_searching</i>
                        <input type="text" name="cidade" id="cidade" maxlength="40" required autofocus>
                        <label for="cidade">Cidade do Cliente</label>                    
                   </div> 
                    <div class="input-field col s12">
                        <input type="submit" value="cadastar" class="btn blue">
                        <input type="reset" value="limpar" class="btn red">
                        </div>
                    </fieldset>
                </form>
            </div>
      
    <?php include_once './includes/footer.inc.php'?>        
           
