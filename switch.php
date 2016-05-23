<?php
$tomada =$_GET["ID"];
 
if(isset($_SESSION[$tomada])){
    if( $_SESSION[$tomada]){
    $_SESSION[$tomada]=false;
    }
    else{
         $_SESSION[$tomada]=true;
    }

}

header("location: account.php");
/*<h1><?php print $tomada;?></h1>
<h1><?php print  $_SESSION[$tomada] ?></h1>*/
?>

