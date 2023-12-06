<?php
if(!isset($_SESSION)){
   session_start();
}
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Você não está logado')</script>";
    echo "<script>window.location.href='../PaginasPaciente/login.php';</script>";
} else {
    session_destroy();
    header("Location: ../PaginasPaciente/login.php");
    exit(); 
}
?>