<h3>Busca</h3>
<p>
  Deseja procurar por algum projeto específico no ICT?<br>        
  Deseja conhecer projetos de alguma área, ou conhecer os projetos de pesquisa de cada professor?<br>
  Utilize os campos abaixo para pesquisar.
</p>
<div class="form-group">
  <select class="selectpicker" id="tipo" name="tipo" data-width="100%">
    <?php
      if($_GET["tipo"]==="Projetos"){
        echo "<option selected >Projetos</option>";
      }else{
        echo "<option >Projetos</option>";
      }
      if($_GET["tipo"]==="Professores"){
        echo "<option selected >Professores</option>";
      }else{
        echo "<option >Professores</option>";
      }
    ?>
  </select>
  <select class="selectpicker" id="curso" name="curso" data-width="100%">
    <!-- <option>Selecione um Curso</option> -->
    <?php 
    include("database.php");
    $sql = "SELECT * FROM cursos";
    $cursos = $conn->query($sql);
    echo "<option>Todos</option>";
    while($curso = $cursos->fetch_assoc()){
      echo "<option ";
      if($curso["Curso"]==$_GET["curso"]){
        echo "selected";
      }
      echo " >" . $curso["Curso"] . "</option>";
    }
    ?>
  </select>
  <div class="input-group">
    <input type="text" name="termos" class="form-control">
    <div class="input-group-btn">
      <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        Buscar
      </button>
    </div>
  </div>
</div>