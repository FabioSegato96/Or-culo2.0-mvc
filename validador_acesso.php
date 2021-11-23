<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
  if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
    header('Location: ../views/login.php?login=erro2');
  }
?>
