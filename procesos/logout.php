<?php
    session_start();
    $_SESSION['iniciado'] = '';
    $_SESSION['usuario'] = '';
    header('location:../index.php');
    



