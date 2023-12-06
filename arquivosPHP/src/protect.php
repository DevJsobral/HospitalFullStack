<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])) {    
    die("<script>alert('VOCÊ NÃO ESTÁ LOGADO, acesse o menu de login ou cadastre-se na página inicial');</script><a href='login.php'>Logar no site</a>");
}

?>