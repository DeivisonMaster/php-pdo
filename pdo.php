<?php

$pdo    = new PDO('mysql:host=localhost;port=3306;dbname=devmedia', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          // todos os erros devem ser tratados como exceção
$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");

try {
    $pdoStatement = $pdo->query("SELECT id, nome, descricao FROM produto LIMIT 5");

    while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){ // row é um array, mas ele nao foi declarado??
        print "<p> {$row['id']} {$row['nome']} {$row['descricao']} </p>";
    }

} catch (\Exception $e) {
    print "Erro: {$e->getMessage()}";
}