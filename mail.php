<?php ob_start();
$from = "jaime-maraujo@educar.rs.gov.br";
$to = "contato.araujo018@gmail.com";
$subject = $_POST['assunto'];
$message = $_POST['msg'];
$headers = "De: ". $from;
mail($to, $subject, $message, $headers);
echo "A mensagem de e-mail foi enviada.";
header("refresh: 3,url= ./");
ob_end_flush();
?>