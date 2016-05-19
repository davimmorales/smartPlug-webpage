<!DOCTYPE html>
<html lang="pt-br">
  <?php   
  $cabecalho_title="Pesquisa";
  include("header.php");
  include("database.php");
  if($_GET["tipo"]=="Projetos" || empty($_GET["tipo"])) {
    $sql = "SELECT * FROM projetos";
    if(!empty($_GET["curso"]) && $_GET["curso"] != "Todos") {
      $sql.= ", cursos, Proj_Curso WHERE cursos.Cod_Curso = Proj_Curso.Cod_Curso AND projetos.Cod_Proj = Proj_Curso.Cod_Proj AND cursos.Curso = '" . $_GET["curso"] . "';"; 
    }
    $result = $conn->query($sql);
  }else if($_GET["tipo"]=="Professores"){
    $sql = "SELECT * FROM professor";
    if(!empty($_GET["curso"]) && $_GET["curso"] != "Todos") {
      $sql.= ", cursos, Prof_Curso WHERE cursos.Cod_Curso = Prof_Curso.Cod_Curso AND professor.Cod_Prof = Prof_Curso.Cod_Prof AND cursos.Curso = '" . $_GET["curso"] . "';"; 
     
    }
    $result = $conn->query($sql);
  }
  ?>
  <body>
    <div class="container">
      <div class="row">
        <div class = "col-md-4 col-sm-12"> 
          <form action="pesquisa.php"  method="GET">
            <?php include("busca.php"); ?>
          </form>
        </div>
        <div class = "col-md-8 col-sm-12"> 
          <?php
            if($result->num_rows == 0){
              echo "<center><h3 style='color:gray'>Nenhum resultado encontrado, desculpe.</h3></center>";
            }else{
              if($_GET["tipo"]=="Projetos" || empty($_GET["tipo"])){
                while($row = $result->fetch_assoc()) {
                  echo '<div class="media thumbnail content-link" tabindex="0">';
                    echo '<div class="pull-left"><img class="media-object" data-src="holder.js/64x64" alt="..."></div>';
                    echo '<div class="media-body">';
                      echo '<h4 class="media-heading">' . $row["Titulo"]  . 
                            '  <span class="badge">';
                            if( $row["Vagas"] == 1 ) echo $row["Vagas"] . " vaga disponível";
                            else echo $row["Vagas"] . " vagas disponíveis";
                            echo '</span>
                          </h4>';
                      echo '<p>'. $row["Descricao"] . "</p>";
                      echo '<a href="projeto.php?id=' . $row["Cod_Proj"] . '" class="btn btn-primary pull-right" role="button">
                              <span class="glyphicon glyphicon-eye-open"> </span>
                              Ver Página
                            </a>
                      </div>
                    </div>';
                  }
                }else if($_GET["tipo"]=="Professores") {
                  while($row = $result->fetch_assoc()) {
                    echo '<div class="media thumbnail content-link" tabindex="0">';
                    echo '<div class="pull-left"><img class="media-object" data-src="holder.js/64x64" alt="..."></div>';
                    echo '<div class="media-body">';
                      echo '<h4 class="media-heading">' . $row["Nome"]  . '</h4>';
                      echo '<p>'. $row["Descricao"] . "</p>";
                      echo '<a href="professor.php?id=' . $row["Cod_Prof"] . '" class="btn btn-primary pull-right" role="button">
                              <span class="glyphicon glyphicon-eye-open"> </span>
                              Ver Página
                            </a>
                      </div>
                    </div>';
                  }
                }
              }
            ?>          
        </div>
      </div>
    </div>
  </body>
  <?php include("footer.php") ?>
  <script type="text/javascript">
    $(document).ready(function(){
    $('.content-link').bind('focusin', function (){
    $(this).find('.content').show();
    });
    $('.content-link').bind('focusout', function (){
    $(this).find('.content').hide();
    });
    });
  </script>
</html>
