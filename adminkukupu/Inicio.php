<?php
session_start();
include("Header.php");
if(!empty($_SESSION['autenticado']) && $_SESSION['autenticado'] == true)
{
?>
<div>
</div>
<?php
}
else{
  ?>
    <script type='text/javascript'>redireccionarInicio();</script>
<?php
}
include("Footer.php");
?>
