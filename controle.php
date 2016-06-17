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
  <center class="NomePage ">
    <h1>Minha Conta</h1>
    <p>Aqui você acessa suas opções de conta e gerencia suas tomadas</p>
  </center>

  <div class="container">
    <div class="row" >
      <div class="col-md-5" >

        <div class="panel panel-default regioes">
          <!-- Default panel contents -->
          <div class="panel-heading" style="color:white;">

            <div class="row">
              <div class="col-xs-4">
                <button class=" btn-cinza"><span class="glyphicon glyphicon-option-vertical" data-toggle="modal" data-target="#ModalMenu">   </span><button>
              </div>
              <div class="col-xs-4 text-center"><b>Seus Dispositivos</b></div>
              <div class="col-xs-4 text-right">
                <button class=" btn-cinza"><span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#ModalAdicionarTomada">   </span></button>
                <button class=" btn-cinza"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#ModalRemove">   </span><button>
                <button class=" btn-cinza"><span class="glyphicon glyphicon-cog"data-toggle="modal" data-target="#ModalT0">  </span><button>
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
              </tr>
              <tr>
                <td>1
                </td>
                <td>TV da Sala
                </td>
                <td><a class="btn <?php estado("t0",1);?>" href="switch.php?ID=t0"><?php estado("t0",2)?></a>
                </td>
              </tr>
              <tr>
                <td>2
                </td>
                <td>TV do Quarto
                </td>
                <td><a class="btn <?php estado("t1",1);?>" href="switch.php?ID=t1"><?php estado("t1",2)?></a>
                </td>
              </tr>
              <tr>
                <td>3
                </td>
                <td>Aparelho super secreto
                </td>
                <td><a class="btn <?php estado("t2",1);?>" href="switch.php?ID=t2"><?php estado("t2",2)?></a>
                </td>
              </tr>
            </table>
          </div>
        </div>

      </div>
      <div class="col-md-7  regioes" >
        <div class="row">
          <div class="col-sm-6 "><center><div  class="chartArea" id="Graph1"></div></center></div>
          <div class="col-sm-6 "><center><div class="chartArea"  id="Graph3"></div></center></div>
        </div>
        <div class="row">
          <div class="col-sm-6 "><center><div class="chartArea"  id="Graph2"></div></center></div>
          <div class="col-sm-6 "><center><div class="chartArea"  id="Graph4"></div></center></div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal APAGAR TOMADA -->
<div class="modal fade" id="ModalRemove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h2 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Remoção de tomadas!</h2></center>
      </div>
      <div class="modal-body">

        <center>

          <form role="form">
            <div class="form-group">
              <label for="sel1">Selecione a tomada a ser removida</label><br/>
              <select class="form-control selec" id="sel1">
                <option class="text-center">1: TV da Sala </option>
                <option class="text-center">2: TV do Quarto </option>
                <option class="text-center">3: Aparelho Super Secreto </option>
              </select>
            </div>
          </form>
        </center>

      </div>
      <div class="modal-footer">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="text-center"><strong>Cuidado! </strong></p>
          <p class="text-center">Após a remoção a tomada não funcionará até ser readicionada!</p>
          <p class="text-center"> Você tem certeza que quer removê-la?</p>
        </div>
        <br/>
        <button type="button" class="btn btn-danger">Remover tomada</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Não remova!</button>
      </div>
    </div>
  </div>
</div>


<!--Modal PROGRAMAÇÃO -->
<div class="modal fade modal" id="ModalT0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form role="form">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><h2 class="modal-title" id="myModalLabel">Programação<br/><small>Aqui você programa o funcionamento da sua tomada</h2></center>
          </div>
          <div class="modal-body">


            <center>
              <h3 class="subreg">Nova programação</h3>

              <div class="form-group">
                <label for="acao">Selecione a ação</label><br/>
                <select class="form-control selec" id="acao">
                  <option class="text-center">Ligar</option>
                  <option class="text-center">Desligar</option>
                </select><br/>
                <label for="sel1">Selecione a tomada</label><br/>
                <select class="form-control selec" id="sel1">
                  <option class="text-center">1: TV da Sala </option>
                  <option class="text-center">2: TV do Quarto </option>
                  <option class="text-center">3: Aparelho Super Secreto </option>
                </select><br/>
                <label for="dia">Selecione o dia</label><br/>
                <input class="form-control selec" type="date" name="pday" id="dia"/><br/>
                <label for="hora">Selecione o horário</label><br/>
                <input class="form-control selec"  type="time" name="usr_time" id="hora"><br/>
                <button class="btn btn-cinza">Salvar</button>
              </div>

            </center>
            <hr/>
            <center>
              <h3 class="subreg">Programações</h3>
              <div class="table-responsive">
                <table class="table programacao text-center">
                  <thead>
                    <tr>
                      <th>Ação</th>
                      <th>Tomada</th>
                      <th>Dia</th>
                      <th>Horário</th>
                      <th>Cancela</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="label label-success">Ligar</span></td>
                      <td>1: TV da Sala</td>
                      <td>26/12/2016</td>
                      <td>18:00</td>
                      <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                    <tr>
                      <td><span class="label label-danger">Desligar</span></td>
                      <td>2: TV do Quarto</td>
                      <td>27/12/2016</td>
                      <td>00:00</td>
                      <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                    <tr>
                      <td><span class="label label-success">Ligar</span></td>
                      <td>3: Aparelho Super Secreto</td>
                      <td>19/09/2016</td>
                      <td>18:00</td>
                      <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                    <tr>
                      <td><span class="label label-danger">Desligar</span></td>
                      <td>3: Aparelho Super Secreto</td>
                      <td>19/09/2016</td>
                      <td>19:00</td>
                      <td><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </center>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </form>
  </div>




  <!--Modal OPÇÕES -->
  <div class="modal fade modal" id="ModalMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form role="form">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h2 class="modal-title" id="myModalLabel">Opções<br/><small>Aqui você encontra opções para gráficos<br/> e altera suas tomadas</h2></center>
            </div>
            <div class="modal-body">
              <center>
                <h4>Exportar</h4><br/>
                <button class="btn btn-success disabled"> Excel</button>
              </center>
              <hr/>
              <center>
                <h4>Alterar tomada</h4><br/>

                <label for="sel2">Selecione a tomada</label><br/>
                <select class="form-control" id="sel2">
                  <option class="text-center">1: TV da Sala </option>
                  <option class="text-center">2: TV do Quarto </option>
                  <option class="text-center">3: Aparelho Super Secreto </option>
                </select><br/>
                <label for="Volts1">Selecione a tensão em que a tomada trabalha</label><br/>
                <select class="form-control" id="Volts1">
                  <option class="text-center">110V</option>
                  <option class="text-center">220V</option>
                </select><br/>
                <input type="text" name="nomeTomada" class="form-control" placeholder="Alterar nome"><br/>
                <input type="text" name="cSerie" class="form-control" placeholder="Alterar código de Série"><br/>


              </center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-cinza">Salvar</button>
            </div>
          </div>
        </div>
      </form>
    </div>

<!-- Modal ADICIONAR TOMADA-->
<div class="modal fade" id="ModalAdicionarTomada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adicionar Novo Dispositivo</h4>
      </div>
      <form action="autenticacao.php" method:"post">
        <div class="modal-body">

          <div class="form-group">


            <input type="text" name="nomeTomada" class="form-control" placeholder="nome"><br/>
            <input type="text" name="cSerie" class="form-control" placeholder="Código de Série"><br/>
            <label for="Volts">Selecione a tensão em que a tomada trabalha</label><br/>
            <select class="form-control" id="Volts">
              <option class="text-center">110V</option>
              <option class="text-center">220V</option>
            </select><br/>

          </div>

        </div>
        <div class="modal-footer">
          <input type="submit" value="Adicionar Dispositivo" name="submitNovaTomada" class="btn btn-cinza"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
