<?php
function estado($tomada, $modo){
  if(isset($_SESSION[$tomada])){
    if($_SESSION[$tomada]==true){
      if($modo==1){
        print "btn-success";}
        else{
          print "Ligado";
        }
      }
      else{
        if($modo==1){
          print " btn-danger";
        }
           else{
            print "Desligado";
          }
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
              <td><a class="btn <?php estado("t0",1);?>" href="switch.php?ID='t0'"><?php estado("t0",2)?></a>
              </td>
              <td><a class="btn btn-cinza"><span class="glyphicon glyphicon-cog"></span></a>
              </td>
            </tr>
            <tr>
              <td>2
              </td>
              <td>TV do Quarto
              </td>
              <td><a class="btn <?php estado("t1",1);?>" href="switch.php?ID='t1'"><?php estado("t1",2)?></a>
              </td>
              <td><a class="btn btn-cinza"><span class="glyphicon glyphicon-cog"></span></a>
              </td>
            </tr>
            <tr>
              <td>3
              </td>
              <td>Aparelho super secreto
              </td>
              <td><a class="btn <?php estado("t2",1);?>" href="switch.php?ID='t1'"><?php estado("t2",2)?></a>
              </td>
              <td><a class="btn btn-cinza"><span class="glyphicon glyphicon-cog"></span></a>
              </td>
            </tr>
          </table>
        </div>

      </div>
      <div class-"col-md-7" >
        <p>Oi</p>
      </div>
    </div>