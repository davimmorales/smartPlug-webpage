<?php
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}
 ?>
<ul class="nav nav-tabs">
  <li role="presentatio"<?=echoActiveClassIfRequestMatches("store")?>><a href="store.php">Compre</a></li>
  <li role="presentation"<?=echoActiveClassIfRequestMatches("carrinho")?>><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"> </span> Meu carrinho</a></li>
  <li role="presentation" <?=echoActiveClassIfRequestMatches("pedidos")?> ><a href="pedidos.php">Meus pedidos</a></li>
</ul>
