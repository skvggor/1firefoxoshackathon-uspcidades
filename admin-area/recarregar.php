<?php
include "classes/mysql_crud.php";

// Recarregar
// $idUsuario = $_GET["id_usuario"];
$placa = "COP-1148";
$valorRecarga = floatval($_GET["radio-choice"]);

function selecionarDados() {
  $db = new Database();
  $db -> connect();
  $db -> select('dadosCidadeMais',
    'saldo',
    NULL,
    'dadosCidadeMais.id = 15');
  $saldo = $db -> getResult();

  return floatval($saldo) + $valorRecarga;
}

function atualizarDados() {
  $saldoCalculado = selecionarDados();
  $db = new Database();
  $db -> connect();
  $db -> update('dadosCidadeMais', array(
    'saldo' => '190'),
    'dadosCidadeMais.id = 15');
  $creditos = $db -> getResult();
  return print_r($creditos);
}
atualizarDados();
?>