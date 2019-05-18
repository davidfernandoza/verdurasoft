<?php
session_start ();
session_unset ($_SESSION['detalle']);
session_unset ($_SESSION['id_usuario']);
session_destroy ();
header ('location:../../index.php' );
?>
