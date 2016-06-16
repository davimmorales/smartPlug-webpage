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
  <center>
    <h1>Minha Conta</h1>
    <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
  </center>

  <div class="container-fluid">
    <div class="row" style="margin-top:85px;">
      <div class="col-md-5" >

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading text-center" style="color:#FCFBD7;">
            <b>Seus Dispositivos</b>
            <button class="btn btn-cinza"><span class="glyphicon glyphicon-plus"data-toggle="modal" data-target="#ModalAdicionarTomada"></span></button>
          </div>
          <!-- Modal Add-->
          <div class="modal fade" id="ModalAdicionarTomada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Adicionar Novo Dispositivo</h4>
                </div>
                <div class="modal-body">
                  <form action="autenticacao.php" method:"post">
                    <input type="text" name="nomeTomada" class="form-control" placeholder="nome"><br/>
                    <input type="text" name="cSerie" class="form-control" placeholder="Código de Série"><br/>
                    <input type="submit" value="Adicionar Dispositivo" name="submitNovaTomada" class="btn btn-cinza"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </form>
                </div>
                <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-cinza">Save changes</button> -->
                <!-- </div> -->
              </div>
            </div>
          </div>

          <!-- Table -->
          <div class="table-responsive text-center">
            <table class=" table">
              <tr>
                <td>Nº
                </td>
                <td>Nome
                </td>
                <td>Estado
                </td>
                <td>Configurar
                </td>
                <td>Excluir
                </td>
              </tr>
              <tr>
                <td>1
                </td>
                <td>TV da Sala
                </td>
                <td><a class="btn <?php estado("t0",1);?>" href="switch.php?ID=t0"><?php estado("t0",2)?></a>
                </td>
                <td><button class="btn btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT0"></span></button>
                  <!--Modal -->
                  <div class="modal fade" id="ModalT0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Tomada 1</h4>
                        </div>
                        <div class="modal-body">
                          Aqui virão funções para programar a tomada para ligar automaticamente na hora que você quiser!
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-cinza">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
                <td><a class="btn btn-cinza"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
              <tr>
                <td>2
                </td>
                <td>TV do Quarto
                </td>
                <td><a class="btn <?php estado("t1",1);?>" href="switch.php?ID=t1"><?php estado("t1",2)?></a>
                </td>
                <td><button class="btn btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT1"></span></button>
                  <!--Modal -->
                  <div class="modal fade" id="ModalT1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Tomada 2</h4>
                        </div>
                        <div class="modal-body">
                          Aqui virão funções para programar a tomada para ligar automaticamente na hora que você quiser!
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-cinza">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
                <td><a class="btn btn-cinza"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
              <tr>
                <td>3
                </td>
                <td>Aparelho super secreto
                </td>
                <td><a class="btn <?php estado("t2",1);?>" href="switch.php?ID=t2"><?php estado("t2",2)?></a>
                </td>
                <td><button class="btn btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT2"></span></button>
                  <!--Modal -->
                  <div class="modal fade" id="ModalT2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Tomada 3</h4>
                        </div>
                        <div class="modal-body">
                          Aqui virão funções para programar a tomada para ligar automaticamente na hora que você quiser!
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-cinza">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </td>
                <td><a class="btn btn-cinza"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
            </table>
          </div>
        </div>

      </div>
      <div class="col-md-7" >
        <div class="row">
          <div class="col-sm-6 chartArea"><div  id="Graph1"></div></div>
          <div class="col-sm-6 chartArea"><div id="Graph3"></div></div>
        </div>
        <div class="row">
          <div class="col-sm-6 chartArea"><div id="Graph2"></div></div>
          <div class="col-sm-6 chartArea"><div id="Graph4"></div></div>
        </div>
      </div>
    </div>
  </div>
