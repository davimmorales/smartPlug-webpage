<?php
function echoActiveClassIfRequestMatches($requestUri)
{
  $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

  if ($current_file_name == $requestUri)
  echo 'class="active"';
}
?>
<ul class="nav nav-tabs">
  <li role="presentation"<?=echoActiveClassIfRequestMatches("store")?>><a href="store.php">Compre</a></li>
  <li role="presentation"><a href="https://www.moip.com.br/ProcessShoppingCart.do?method=view&id=thegusmp@gmail.com"><span class="glyphicon glyphicon-shopping-cart"> </span> Meu carrinho</a></li>
</ul>
