<?php
header("Content-type: application/json");
include "classes/mysql_crud.php";

function obterOcorrencias() {
  $db = new Database();
  $db -> connect();
  $db -> select('avisos',
    'count(SQRT(POW(69.1 * (latitude - -23.5683 ), 2) + POW(69.1 * (-46.6409 - longitude) * COS(latitude / 57.3), 2))) AS distance',
    NULL,
    'id_tipo_aviso < 3 HAVING distance < 150',
    'distance DESC');
  $dados = $db -> getResult();
  $ObjJSON = json_encode($dados);
  $ObjJSONValido = str_replace("]", "}", str_replace("[", "{", $ObjJSON));
  return $ObjJSONValido;
}
echo obterOcorrencias();
?>