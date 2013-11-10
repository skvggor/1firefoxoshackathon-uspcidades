<?php
// Classe para CRUD
include "classes/mysql_crud.php";

$db = new Database();
$db -> connect();

function selecionarDados() {
  $db -> select('nomeTabela',
    'campo1, campo2',
    'campo2 = "dado"', // WHERE
    'campo1 DESC'); // ORDER BY
}

function inserirDados() {
  $db -> insert('nomeTabela', array(
    'campo' => 'dado',
    'outro_campo' => 'dado'
    ));
}

function atualizarDados() {
  $db -> update('nomeTabela', array(
    'campo' => 'Name 4',
    'campo' => 'dado'),
    'campo = "dado" AND campo = "nome"'); // WHERE
}

function deletarDados() {
  $db -> delete('nomeTabela',
    'campo = "dado"');
}

selecionarDados()
inserirDados();
atualizarDados();
deletarDados();

?>