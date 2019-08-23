<?php

$pdo    = new PDO('mysql:host=localhost;port=3306;dbname=devmedia', 'root', ''); // obtem uma conexão atraves do banco, url, usuario e senha
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          // todos os erros devem ser tratados como exceção
$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");  // seta atributo charset UTF-8

try {
    $pdoStatement = $pdo->query("SELECT id, nome, descricao FROM produto LIMIT 5"); // efetua consulta

    while($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){  // atribui o resultado da consulta a um array e itera enquanto houver dados
        print "<p> {$row['id']} {$row['nome']} {$row['descricao']} </p>"; // imprime cada coluna da consulta
    }

} catch (\Exception $e) {  // captura exceção de alto nivel lançada em caso de erro
    print "Erro: {$e->getMessage()}";
}