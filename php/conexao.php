<?php

$host = 'localhost';
$db = 'testesaep';
$user = 'root';
$pass = '';


try {
    $conn = new PDO ("mysql:host=$host;dbname=$db;charset-utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo 'Conexão realizada com sucesso!';
} catch (PDOException $e) {
    echo 'Erro de conexão' . $e->getMessage();
}

?>