<?php

session_start();

if(!isset($_SESSION["user_id"])){
header("Location: login.html");
exit;
}

?>

<h1>Bem-vindo!</h1>
<p>Você está logado como: <?php echo $_SESSION['user_email'];?></p>
<a href="logout.php">Sair</a>