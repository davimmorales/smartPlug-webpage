<?php
function estado($tomada){
  if(isset($_SESSION[$tomada])){
    if($_SESSION[$tomada]==true){
      print "btn-success";
    }
    else{
      print "btn-danger";
    }
  }
}
?>
<div class="container">
  <h1>Minha Conta</h1>
  <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
</div>

<div class="row" style="margin-top:50px;">
  <div class="col-md-5" >

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading text-center" style="color:#FCFBD7;">Seus dispositivos</div>

      <!-- Table -->
      <table class="text-center table">
        <tr>
          <td>Nº
          </td>
          <td>Nome
          </td>
          <td>Estado
          </td>
          <td>Configurar
          </td>
        </tr>
        <tr>
          <td>1
          </td>
          <td>TV da Sala
          </td>
          <td><a class="btn <?php estado("t0");?>" href="switch.php?ID='t0'">Ligado</a>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>2
        </td>
        <td>TV do Quarto
        </td>
        <td>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>3
        </td>
        <td>Aparelho super secreto
        </td>
        <td>
        </td>
        <td>
        </td>
      </tr>
    </table>
  </div>

</div>
<div class-"col-md-7" >
  <p>Oi</p>
</div>
</div>
