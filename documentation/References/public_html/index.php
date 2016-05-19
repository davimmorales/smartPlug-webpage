<!DOCTYPE html>
<html lang="pt-br">
  <?php $cabecalho_title="Cadastro de Projetos";
    include("header.php"); 
    session_start();
  ?>
  <body>
    <div class="container">
      <div class="row">
        <div class = "col-md-4 col-sm-6"> 
          <div class = "thumbnail">
            <div class="caption">
              <form action="pesquisa.php"  method="GET">
                <?php include("busca.php"); ?>
              </form>
            </div>
          </div>
        </div>
        <div class = "col-md-4 col-sm-6"> 
          <div class = "thumbnail">
            <div class="caption">
              <h3>Oportunidades</h3>
              <p>
                Procurando por oportunidades em projetos?<br>   
                Clique abaixo para acessar as vagas disponíveis.
              </p>
              <p><a href="oportunidades.php" class="btn btn-primary" role="button"><?=$vagas?> vagas disponíveis</a></p>
            </div>
          </div>
        </div>
        <div class = "col-md-4 col-sm-6"> 
          <div class = "thumbnail">     
            <div class="caption">
              <?php
                session_start();
                if($_SESSION['user'] == ''){
                  echo'
                  <h3>Login</h3>
                  <p>
                    É professor pesquisador do ICT? Clique abaixo para acessar o sistema de login.<br>      
                  </p>
                  <p><a href="login.php" class="btn btn-primary" role="button">Fazer login</a></p>';
                }else{
                  echo '
                  <h3>Painel do professor</h3>
                  <p>
                    Olá professor! Clique abaixo para acessar o seu painel de administração!
                  </p>
                  <p><a href="painel.php" class="btn btn-primary" role="button">Acessar painel</a></p>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <?php include("footer.php") ?>
</html>
