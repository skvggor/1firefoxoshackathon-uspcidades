<?php
header("Content-type: application/json");
include "classes/mysql_crud.php";

function obterSaldo() {
  $db = new Database();
  $db -> connect();
  $db -> select('dadosCidadeMais',
    'saldo',
    NULL,
    'dadosCidadeMais.id = 15',
    'saldo DESC');
  $dados = $db -> getResult();
  $ObjJSON = json_encode($dados);
  $ObjJSONValido = str_replace("]", "}", str_replace("[", "{", $ObjJSON));
  return $ObjJSONValido;
}
echo obterSaldo();
?>