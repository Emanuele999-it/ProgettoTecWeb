<?php

session_start();

session_unset();

session_destroy();

//reindirizzamento
header("Location: ../index.php");
exit;
?>