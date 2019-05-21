<?php
session_start ();
session_unset ( $_SESSION [ 'ident' ]);
session_destroy ();
header ('location:../../' );
?>
